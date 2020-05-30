<?php

namespace App\Observers;

use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class OrderdetailObserver
{

    public function created(Orderdetail $detail)
    {
        //订单详情 加新记录后。 更改对应订单的尚欠金额和总金额     等有时间再整合一下重复代码

       $orderdetails=DB::table('orderdetails')->where('order_id', $detail->order_id)->get();

       $total_cost=0;
       foreach ($orderdetails as $orderdetail) {
       $total_cost+=$orderdetail->amount;
       }
        $order=DB::table('orders')
              ->where('order_id', $detail->order_id)->first();
              // 尚欠金额=订单总金额-支付金额-2307可抵免税款
            $arrears=$total_cost-$order->payment_amount-$order->tax_deductible;

       DB::table('orders')
              ->where('order_id', $detail->order_id)
              ->update(['total_cost' => $total_cost,'arrears'=>$arrears]);
    }

    public function deleted(Orderdetail $detail)
    {
           $orderdetails=DB::table('orderdetails')->where('order_id', $detail->order_id)->get();

       $total_cost=0;
       foreach ($orderdetails as $orderdetail) {
       $total_cost+=$orderdetail->amount;
       }
        $order=DB::table('orders')
              ->where('order_id', $detail->order_id)->first();
              // 尚欠金额=订单总金额-支付金额-2307可抵免税款
            $arrears=$total_cost-$order->payment_amount-$order->tax_deductible;

       DB::table('orders')
              ->where('order_id', $detail->order_id)
              ->update(['total_cost' => $total_cost,'arrears'=>$arrears]);

    }


}
