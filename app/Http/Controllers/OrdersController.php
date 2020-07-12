<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Auth;
use App\Handlers\ImageUploadHandler;

use App\Exports\OrdersExport;
use App\Models\User;
use App\Notifications\OrderCheck;
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Order $orders)
	{
        $this->authorize('index', $orders);
        $user=Auth::user();
        $name=$user->name;

        // 财务和管理员查看的是所有
        if(!$user->hasRole('Flb_saleman')){
           $orders = Order::orderBy('created_at','desc')->paginate(30);
        }else{
           $orders=Order::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(30);
        }
		return view('orders.index', compact('orders'));
	}

    public function show(Order $order)
    {
       $this->authorize('show', $order);
        return view('orders.show', compact('order'));
    }

	public function create(Order $order)
	{
		return view('orders.create_and_edit', compact('order'));
	}

    public function createDetail(Order $orders)
    {
        $this->authorize('createDetail', $orders);
        return view('orderdetails.create', compact('orders'));
    }

	public function store(OrderRequest $request,Order $order)
	{
		// $order = Order::create($request->all());
        $order->fill($request->all());
        $order->user_id = Auth::id();
        $order->total_cost = 0;//创建订单时总金额为0  追加订单详情时。再更新数值
        $order->order_state ='待审核'; //默认值为待审核。  财务人员 可更改为审核通过。或审核失败。
        $order->order_detail_id=0;//应该是搞成数组 存订单详情的id来着  这里先不动
        $order->arrears=0;
        //尚欠金额=订单总金额-支付金额-2307可抵免税款     因为创建订单时，订单详情还没填写，所以尚欠金额创建时设为0 当订单详情填写后动态更改尚欠金额。  会有很多bug 如之后更改金额
        $order->save();
        session()->flash('success', '创建成功');
		return redirect()->route('orders.show', $order->id);
	}

	public function edit(Order $order)
	{
        $this->authorize('edit', $order);
		return view('orders.create_and_edit', compact('order'));
	}

	public function update(OrderRequest $request, Order $order)
	{
// 审核和编辑  共用update
        if($request->input('order_state')!='待审核'){

               $order->update($request->all());

              session()->flash('success', '审核完毕！');

                      // 通知审核员
              if ($request->input('order_state')=='初步审核') {
                  $user = User::role('Checkman2')->first();
              }
              if ($request->input('order_state')=='二次审核') {
                  $user = User::role('Checkman3')->first();
              }
// 通知 销售员
               if ($request->input('order_state')=='不通过'||$request->input('order_state')=='已通过') {

                  $user=$order->user;
              }

        $user->notify(new OrderCheck($order));

              return redirect()->route('orders.show', $order->id);
        }



        // 如果编辑销售单的支付金额 和定免税款 同时不存在对应的订单详情 那么需要重新计算
        if($order->total_cost==0){
            $order->update($request->all());

        }else{
            // 简化代码 多计算几次无所谓
            $arrears=$order->total_cost-$request->input('payment_amount')-$request->input('tax_deductible');

          // 优化以下代码
            // $order->update($request->all());
            //  $order->update(['arrears'=>$arrears]);
            // 优化后
            $order->fill($request->all());
            $order->fill(['arrears'=>$arrears])->save();

        }
        session()->flash('success', '修改成功！');
         return redirect()->route('orders.show', $order->id);


	}

	public function destroy(Order $order)
	{

		$this->authorize('destroy', $order);
		$order->delete();

session()->flash('success', '删除成功');
		return redirect()->route('orders.index');
	}

      public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'orders', \Auth::id(), 416);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }

    public function showDetail(OrderRequest $request,Order $order){
        $this->authorize('showDetail', $order);
        // with 预加载  解决N+1 问题
           // $orders = Order::with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
        // $user=Auth::user();
        // if($user->hasRole('Flb_saleman')){
        //      $orders = Order::where('user_id',$user->id)->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
        //      return view('orders.order_detail', compact('orders'));
        // }

        $order_type=$request->input('order_type');
        $date_begin=$request->input('date_begin');
        $date_end=$request->input('date_end');
         // 保存查询参数  供导出时使用
        $request->flash();
        if($order_type){
            if($date_begin&&$date_end){
                $orders = Order::where([ ['order_type','=',$order_type],['order_state', '!=', '待审核'], ])->whereBetween('order_date',[$date_begin,$date_end])->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
            }else{
                $orders = Order::where([ ['order_type','=',$order_type],['order_state', '!=', '待审核'], ])->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
            }
        }elseif ($date_begin&&$date_end) {
             $orders = Order::where('order_state','!=','待审核')->whereBetween('order_date',[$date_begin,$date_end])->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
        }else{
            $orders = Order::where('order_state','!=','待审核')->with('orderdetails','user')->orderBy('order_date', 'desc')->paginate(30);
        }


        return view('orders.order_detail', compact('orders'));
    }

     public function export()
    {

         return (new OrdersExport)->download('销售明细单.xlsx');
    }

    public function check(Order $order){
            $this->authorize('check', $order);
        return view('orders.check', compact('order'));
    }
}
