<?php

namespace App\Http\Controllers;

use App\Models\Outstock;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OutstockRequest;
use Illuminate\Support\Facades\DB;
class OutstocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$outstocks = Outstock::paginate();
		return view('outstocks.index', compact('outstocks'));
	}

    public function show(Outstock $outstock)
    {
        return view('outstocks.show', compact('outstock'));
    }

	public function create(Outstock $outstock)
	{
		return view('outstocks.create_and_edit', compact('outstock'));
	}

	public function store(OutstockRequest $request,Outstock $outstock)
	{
		$outstock->fill($request->all());
        $order_id=$request->input('order_id');

        $order=Order::where('order_id',$order_id)->first();
        if (!$order) {
               session()->flash('warning', '订单编号不存在！');
            return redirect()->route('outstocks.index');
        }
        $outstock->customer_name=$order->customer_name;

        $outstock->user_name=$order->user->name;
        $outstock->save();
		return redirect()->route('outstocks.show', $outstock->id)->with('message', 'Created successfully.');
	}

	public function edit(Outstock $outstock)
	{
        $this->authorize('update', $outstock);
		return view('outstocks.create_and_edit', compact('outstock'));
	}

	public function update(OutstockRequest $request, Outstock $outstock)
	{
		$this->authorize('update', $outstock);
		$outstock->update($request->all());

		return redirect()->route('outstocks.show', $outstock->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Outstock $outstock)
	{
		// $this->authorize('destroy', $outstock);
                  $outstockdetail=DB::table('outstockdetails')->where('stock_id', $outstock->id)->first();
       // 出库有明细  不允许删除
      if($outstockdetail){
         session()->flash('warning', '入库单有明细时，禁止删除！');
            return redirect()->route('outstocks.index');
      }
		$outstock->delete();

		return redirect()->route('outstocks.index')->with('message', 'Deleted successfully.');
	}

    public function createDetail(Outstock $outstocks)
    {

        return view('outstockdetails.create', compact('outstocks'));
    }

        public function showDetail(OutstockRequest $request, Outstock $outstock){

  // 按日期查询

        $date_begin=$request->input('date_begin');
        $date_end=$request->input('date_end');
         // 保存查询参数  供导出时使用
        $request->flash();
    if($date_begin&&$date_end){
          $outstocks = Outstock::whereBetween('out_date',[$date_begin,$date_end])->with('outstockdetails')->orderBy('out_date', 'desc')->paginate(30);
      }else{
          $outstocks = Outstock::with('outstockdetails')->orderBy('out_date', 'desc')->paginate(30);
      }



        return view('outstocks.outstock_detail', compact('outstocks'));
    }

     public function export()
    {

         return (new OutstocksExport)->download('出库明细.xlsx');
    }
}
