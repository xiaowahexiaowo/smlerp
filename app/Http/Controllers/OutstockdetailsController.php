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
        $generating_unit_no = $request->input('generating_unit_no');
        $set=DB::table('setting')->where('generating_unit_no', $generating_unit_no)->first();
        $stock=DB::table('stocks')->where('generating_unit_no',$generating_unit_no)->first();
        if(!$set){
            session()->flash('warning', '机组编号不存在！');
            return redirect()->route('outstocks.index');
        }elseif (!$stock) {
            session()->flash('warning', '物品库存中不存在该机组编号，请先录入物品库存中！');
            return redirect()->route('outstocks.index');
        }
        $detail->product_type=$set->product_type;
        $detail->generating_unit_type=$set->generating_unit_type;
        $detail->power=$set->power;
        $detail->phases_number=$set->phases_number;
        $detail->unit=$set->unit;
        $detail->warehousing_price=$set->warehousing_price;

        //金额
        $detail->amount=($request->input('out_count'))*($set->warehousing_price);
        $detail->save();

		return redirect()->route('outstocks.index')->with('message', 'Created successfully.');
	}


	public function destroy(Outstockdetail $outstockdetail)
	{
		$this->authorize('destroy', $outstockdetail);
		$outstockdetail->delete();

		return redirect()->route('outstocks.index')->with('message', 'Deleted successfully.');
	}
}
