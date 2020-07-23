<?php

namespace App\Http\Controllers;

use App\Models\Outstockdetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OutstockdetailRequest;
use Illuminate\Support\Facades\DB;
class OutstockdetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }



	public function store(OutstockdetailRequest $request,Outstockdetail $detail)
	{
		// $outstockdetail = Outstockdetail::create($request->all());
          $detail->fill($request->all());
          // dd($detail->out_date);
        $generating_unit_type = $request->input('generating_unit_type');
        $set=DB::table('settings')->where('generating_unit_type', $generating_unit_type)->first();
        $stock=DB::table('stocks')->where('generating_unit_type',$generating_unit_type)->first();
        if(!$set){
            session()->flash('warning', '机组型号不存在！');
            return redirect()->route('outstocks.index');
        }elseif (!$stock) {
            session()->flash('warning', '物品库存中不存在该机组型号，请先录入物品库存中！');
            return redirect()->route('outstocks.index');
        }
         if($stock->inventory_quantity-$detail->out_count<0){
session()->flash('warning', '库存不足无法出库！');
            return redirect()->route('outstocks.index');
        }
        $detail->product_type=$set->product_type;

        $detail->power=$set->power;
        $detail->phases_number=$set->phases_number;
        $detail->unit=$set->unit;
        $detail->warehousing_price=$set->warehousing_price;

        //金额
        $detail->amount=($request->input('out_count'))*($set->warehousing_price);
        $detail->save();
 session()->flash('success', '出库单明细创建成功！');
		return redirect()->route('outstocks.index');
	}


	public function destroy(Outstockdetail $outstockdetail)
	{
		$this->authorize('destroy', $outstockdetail);
		$outstockdetail->delete();
 session()->flash('success', '出库单明细删除成功！');
		return redirect()->route('outstocks.index');
	}
}
