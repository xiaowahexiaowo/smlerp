<?php

namespace App\Http\Controllers;

use App\Models\Collected;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollectedRequest;
use Illuminate\Support\Facades\DB;
class CollectedsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

	public function index(Collected $collected)
	{
        $this->authorize('index',$collected);
		$collecteds = Collected::paginate();
		return view('collecteds.index', compact('collecteds'));
	}

    public function show(Collected $collected)
    {
        return view('collecteds.show', compact('collected'));
    }

	public function create(Collected $collected)
	{
		return view('collecteds.create_and_edit', compact('collected'));
	}

	public function store(CollectedRequest $request,Collected $collected)
	{
		$collected->fill($request->all());
        $order_id=$request->input('order_id');
        // 审核通过  订单存在  则创建
         $order=DB::table('orders')->where([['order_id',$order_id],['order_state','已通过'],])->first();
         if($order){
          $collected->customer_name=$order->customer_name;
           $collected->save();
           return redirect()->route('collecteds.index')->with('message', '创建成功.');
         }

		return redirect()->route('collecteds.index')->with('message', '创建失败，订单号不存在.或未审核通过！');
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

		return redirect()->route('collecteds.show', $collected->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Collected $collected)
	{
		$this->authorize('destroy', $collected);

          $collected->delete();

                    // 收款记录同个订单的
          $collecteds=DB::table('collecteds')->where('order_id',$collected->order_id)->get();
            // 小bug 订单明细不存在的时候。删不掉应收款。记录  没啥影响的。
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
              // 订单收款记录不存在 应收款删除对应记录
              DB::table('receivables')->where('order_id',$collected->order_id)->delete();
          }




		return redirect()->route('collecteds.index')->with('message', 'Deleted successfully.');
	}
}



