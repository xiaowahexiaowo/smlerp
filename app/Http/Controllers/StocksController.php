<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequest;
use Illuminate\Support\Facades\DB;
class StocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$stocks = Stock::paginate();
		return view('stocks.index', compact('stocks'));
	}

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

	public function create(Stock $stock)
	{
		return view('stocks.create_and_edit', compact('stock'));
	}

	public function store(StockRequest $request,Stock $stock)
	{
		$stock->fill($request->all());
        $generating_unit_no = $request->input('generating_unit_no');
        $set=DB::table('setting')->where('generating_unit_no', $generating_unit_no)->first();
        if(!$set){
            session()->flash('warning', '机组编号不存在！');
            return redirect()->route('orders.index');
        }
         $stock->product_type=$set->product_type;
         $stock->generating_unit_type=$set->generating_unit_type;
         $stock->power=$set->power;
         $stock->phases_number=$set->phases_number;
         $stock->unit=$set->unit;
         $stock->warehousing_price=$set->warehousing_price;
         //创建时出入库皆为0
         $stock->warehousing_count=0;
         $stock->out_count=0;
         // 创建时初始库存等于库存数量

         $stock->inventory_quantity=$request->input('init_stock');
        //库存数量*入库单价=金额
        $stock->stock_amount=($stock->inventory_quantity)*($set->warehousing_price);
        $stock->save();
		return redirect()->route('stocks.index', $stock->id)->with('message', 'Created successfully.');
	}

	public function edit(Stock $stock)
	{
        $this->authorize('update', $stock);
		return view('stocks.create_and_edit', compact('stock'));
	}

	public function update(StockRequest $request, Stock $stock)
	{
		$this->authorize('update', $stock);
		$stock->update($request->all());

		return redirect()->route('stocks.show', $stock->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Stock $stock)
	{
		$this->authorize('destroy', $stock);
		$stock->delete();

		return redirect()->route('stocks.index')->with('message', 'Deleted successfully.');
	}
}