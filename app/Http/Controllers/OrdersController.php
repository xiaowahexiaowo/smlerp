<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Auth;
use App\Handlers\ImageUploadHandler;
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$orders = Order::paginate();
		return view('orders.index', compact('orders'));
	}

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

	public function create(Order $order)
	{
		return view('orders.create_and_edit', compact('order'));
	}

    public function createDetail(Order $orders)
    {
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
		return redirect()->route('orders.show', $order->id)->with('message', 'Created successfully.');
	}

	public function edit(Order $order)
	{
        $this->authorize('update', $order);
		return view('orders.create_and_edit', compact('order'));
	}

	public function update(OrderRequest $request, Order $order)
	{
		$this->authorize('update', $order);
		$order->update($request->all());

		return redirect()->route('orders.show', $order->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Order $order)
	{
		$this->authorize('destroy', $order);
		$order->delete();

		return redirect()->route('orders.index')->with('message', 'Deleted successfully.');
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
}
