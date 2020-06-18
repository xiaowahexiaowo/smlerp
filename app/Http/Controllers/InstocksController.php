<?php

namespace App\Http\Controllers;

use App\Models\Instock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstockRequest;
use App\Exports\InstocksExport;
use Illuminate\Support\Facades\DB;
class InstocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$instocks = Instock::paginate();
		return view('instocks.index', compact('instocks'));
	}

    public function show(Instock $instock)
    {
        return view('instocks.show', compact('instock'));
    }

	public function create(Instock $instock)
	{
		return view('instocks.create_and_edit', compact('instock'));
	}

	public function store(InstockRequest $request)
	{
		$instock = Instock::create($request->all());
		return redirect()->route('instocks.show', $instock->id)->with('message', 'Created successfully.');
	}

	public function edit(Instock $instock)
	{
        $this->authorize('update', $instock);
		return view('instocks.create_and_edit', compact('instock'));
	}

	public function update(InstockRequest $request, Instock $instock)
	{
		$this->authorize('update', $instock);
		$instock->update($request->all());

		return redirect()->route('instocks.show', $instock->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Instock $instock)
	{
		// $this->authorize('destroy', $instock);
// 删除对应明细
         DB::table('instockdetails')->where('stock_id', $instock->id)->delete();
         // 删除明细后  还需要重新计算  吐血
		$instock->delete();

		return redirect()->route('instocks.index')->with('message', 'Deleted successfully.');
	}

    // 什么鬼   约定 是$instocks  才可以把值传过去   定义成单数  传不过去。。。
        public function createDetail(Instock $instocks)
    {
        // $this->authorize('createDetail', $instock);
        return view('instockdetails.create', compact('instocks'));
    }

    public function showDetail(InstockRequest $request, Instock $instock){
        // $this->authorize('showDetail', $order);
  // 按日期查询

        $date_begin=$request->input('date_begin');
        $date_end=$request->input('date_end');
         // 保存查询参数  供导出时使用
        $request->flash();
    if($date_begin&&$date_end){
          $instocks = Instock::whereBetween('in_date',[$date_begin,$date_end])->with('instockdetails')->orderBy('in_date', 'desc')->paginate(30);
      }else{
          $instocks = Instock::with('instockdetails')->orderBy('in_date', 'desc')->paginate(30);
      }



        return view('instocks.instock_detail', compact('instocks'));
    }

       public function export()
    {
        // return (new InvoicesExport)->forYear(2018)->download('invoices.xlsx');
        // return Excel::download(new OrdersExport, '销售明细单.xlsx');
         return (new InstocksExport)->download('入库明细.xlsx');
    }
}
