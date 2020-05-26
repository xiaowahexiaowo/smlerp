<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Orderdetail;
// use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class OrderdetailsController extends Controller
{
    //

  public function __construct()
    {
        $this->middleware('auth');
    }

  public function store(Request $request,Orderdetail $detail)
    {

        $detail->fill($request->all());
$generating_unit_no = $request->input('generating_unit_no');
$set=DB::table('setting')->where('generating_unit_no', $generating_unit_no)->first();
if(!$set){
    session()->flash('warning', '机组编号不存在！');
 return redirect()->route('orders.index');
}

        $detail->product_type=$set->product_type;
        $detail->generating_unit_type=$set->generating_unit_type;
         $detail->power=$set->power;
         $detail->phases_number=$set->phases_number;
         $detail->unit=$set->unit;
        $detail->warehousing_price=$set->warehousing_price;
        //出库数量*入库单价=金额
        $detail->amount=($request->input('count'))*($set->warehousing_price);
        $detail->save();
        return redirect()->route('orders.index')->with('message', '订单详情创建成功！');
    }
}
