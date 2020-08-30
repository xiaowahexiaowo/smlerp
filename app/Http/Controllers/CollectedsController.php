<?php

namespace App\Http\Controllers;

use App\Models\Collected;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollectedRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Exports\CollectedsExport;
class CollectedsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

	public function index(Collected $collected,CollectedRequest $request)
	{
        $this->authorize('index',$collected);
        $user=Auth::user();
           $date_begin=$request->input('date_begin');
        $date_end=$request->input('date_end');

         // 保存查询参数  供导出时使用
        $request->flash();
         // 财务和管理员查看的是所有
        if(!$user->hasRole('Flb_saleman')){
            if($date_begin&&$date_end){
              $collecteds = Collected::whereBetween('collection_date',[$date_begin,$date_end])->paginate(30);
            }else{

                $collecteds = Collected::paginate(30);
            }

        }else{
            $orders=$user->orders()->get();

            $order_ids= array();

            foreach ($orders as  $order) {
                $order_ids[] = $order->order_id;
            }

           $collecteds=Collected::whereIn('order_id', $order_ids)->paginate(30);
        }

		return view('collecteds.index', compact('collecteds'));
	}

    // public function show(Collected $collected)
    // {
    //     return view('collecteds.show', compact('collected'));
    // }

	public function create(Collected $collected)
	{
          $this->authorize('create',$collected);
		return view('collecteds.create_and_edit', compact('collected'));
	}

	public function store(CollectedRequest $request,Collected $collected)
	{
		$collected->fill($request->all());
        $order_id=$request->input('order_id');
        // 审核通过  订单存在
         $order=DB::table('orders')->where([['order_id',$order_id],['order_state','已通过'],])->first();

       if($order){
           // 收款记录同个订单的  收款数
          $collecteds=DB::table('collecteds')->where('order_id',$order_id)->get();

          $received=0;
          foreach ($collecteds as $collect) {
            $received+=$collect->collected_amount;
          }
           //加上 本次创建的  收款数
           $received+=$request->input('collected_amount');

          if($order->total_cost-$received<0){
             session()->flash('warning', '收款金额不能大于订单金额');
            return redirect()->route('collecteds.index');
          }
          // 销售单的创建者
       $user=User::where('id',$order->user_id)->first();
           // 更新或创建数据   好像是根据主键   生成应收账款统计

          DB::table('receivables')->updateOrInsert(['order_id' => $order->order_id],[

            'customer_name' =>  $order->customer_name,
            'receivable_amount' => $order->total_cost,
            'received'=>$received,
            'remaining_receivables'=>($order->total_cost-$received),
            'user_name'=>$user->name,
            'accountant'=>config('global.accountant'),
            'check_man'=>$collected->check_man,
            'remark'=>''
        ]);

            // 生成收款明细
            $collected->customer_name=$order->customer_name;
           $collected->save();
            session()->flash('success', '收款明细创建成功！');
           return redirect()->route('collecteds.index');


       }


 session()->flash('warning', '创建失败，订单号不存在.或暂未审核通过！！');
		return redirect()->route('collecteds.index');
	}

	public function edit(Collected $collected)
	{
        $this->authorize('update', $collected);
		return view('collecteds.create_and_edit', compact('collected'));
	}

	public function update(CollectedRequest $request, Collected $collected)
	{
		$this->authorize('update', $collected);
		$collected->update($request->all());
session()->flash('success', '收款明细更新成功！');
		return redirect()->route('collecteds.show', $collected->id);
	}

	public function destroy(Collected $collected)
	{
		$this->authorize('destroy', $collected);


 $collected->delete();

                    // 收款记录同个订单的
          $collecteds=DB::table('collecteds')->where('order_id',$collected->order_id)->get();

          if($collecteds){
            $received=0;
            foreach ($collecteds as $collect) {
                $received+=$collect->collected_amount;
            }
                $order=DB::table('orders')->where([['order_id',$collected->order_id],['order_state','已通过'],])->first();
            DB::table('receivables')->where('order_id',$collected->order_id)->update([
            'received'=>$received,'remaining_receivables'=>($order->total_cost-$received)
            ]);
          }else{
              // 订单收款记录不存在 应收款删除对应记录      bug 删除步调  但是没有任何不良影响
              DB::table('receivables')->where('order_id',$collected->order_id)->delete();
          }


session()->flash('success', '收款明细删除成功！');

		return redirect()->route('collecteds.index');
	}

             public function export(Collected $collected)
    {
         $this->authorize('export',$collected);

         return (new CollectedsExport)->download('收款明细.xlsx');
    }
}



