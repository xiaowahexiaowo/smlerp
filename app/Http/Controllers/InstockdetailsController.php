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
        $generating_unit_type = $request->input('generating_unit_type');
        $set=DB::table('settings')->where('generating_unit_type', $generating_unit_type)->first();
        $stock=DB::table('stocks')->where('generating_unit_type',$generating_unit_type)->first();
        if(!$set){
            session()->flash('warning', '机组型号不存在！');
            return redirect()->route('instocks.index');
        }elseif (!$stock) {
            session()->flash('warning', '物品库存中不存在该机组型号，请先录入物品库存中！');
            return redirect()->route('instocks.index');
        }
        $detail->product_type=$set->product_type;

        $detail->power=$set->power;
        $detail->phases_number=$set->phases_number;
        $detail->unit=$set->unit;
        $detail->warehousing_price=$set->warehousing_price;

        //出库数量*入库单价=金额
        $detail->stock_amount=($request->input('warehousing_count'))*($set->warehousing_price);
        $detail->save();
 session()->flash('success', '入库单明细创建成功！');
        return redirect()->route('instocks.index');


	}



	public function destroy(Instockdetail $instockdetail)
	{
		$this->authorize('destroy', $instockdetail);
 $stock=DB::table('stocks')->where('generating_unit_type',$instockdetail->generating_unit_type)->first();
    if($stock->inventory_quantity-$instockdetail->warehousing_count<0){
session()->flash('warning', '库存不足无法删除该入库明细！');
            return redirect()->route('instocks.index');
        }

		$instockdetail->delete();
 session()->flash('success', '入库单明细删除成功！');
		return redirect()->route('instocks.index');
	}
}
