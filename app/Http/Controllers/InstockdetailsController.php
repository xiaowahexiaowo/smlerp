<?php

namespace App\Http\Controllers;

use App\Models\Instockdetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstockdetailRequest;
use Illuminate\Support\Facades\DB;
class InstockdetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }




	public function store(InstockdetailRequest $request,Instockdetail $detail)
	{

        $detail->fill($request->all());
        $generating_unit_no = $request->input('generating_unit_no');
        $set=DB::table('setting')->where('generating_unit_no', $generating_unit_no)->first();
        $stock=DB::table('stocks')->where('generating_unit_no',$generating_unit_no)->first();
        if(!$set){
            session()->flash('warning', '机组编号不存在！');
            return redirect()->route('instocks.index');
        }elseif (!$stock) {
            session()->flash('warning', '物品库存中不存在该机组编号，请先录入物品库存中！');
            return redirect()->route('instocks.index');
        }
        $detail->product_type=$set->product_type;
        $detail->generating_unit_type=$set->generating_unit_type;
        $detail->power=$set->power;
        $detail->phases_number=$set->phases_number;
        $detail->unit=$set->unit;
        $detail->warehousing_price=$set->warehousing_price;

        //出库数量*入库单价=金额
        $detail->stock_amount=($request->input('warehousing_count'))*($set->warehousing_price);
        $detail->save();

        return redirect()->route('instocks.index')->with('message', '入库明细创建成功！');


	}



	public function destroy(Instockdetail $instockdetail)
	{
		$this->authorize('destroy', $instockdetail);
 $stock=DB::table('stocks')->where('generating_unit_no',$instockdetail->generating_unit_no)->first();
    if($stock->inventory_quantity-$instockdetail->warehousing_count<0){
session()->flash('warning', '库存不足无法删除该入库明细！');
            return redirect()->route('instocks.index');
        }

		$instockdetail->delete();

		return redirect()->route('instocks.index')->with('message', 'Deleted successfully.');
	}
}
