<?php

namespace App\Observers;

use App\Models\Collected;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class CollectedObserver
{
    public function created(Collected $collected)
    {
        //每次创建收款明细  生成应收款记录
            $order=DB::table('orders')->where([['order_id',$collected->order_id],['order_state','审核通过'],])->first();

            // 收款记录同个订单的
          $collecteds=DB::table('collected')->where('order_id',$collected->order_id)->get();

          $received=0;
          foreach ($collecteds as $collect) {
            $received+=$collect->collected_amount;
          }
           // 更新或创建数据   好像是根据主键
          DB::table('receivable')->updateOrCreate(['order_id' => $order->order_id],[

            'customer_name' =>  $order->customer_name,
            'receivable_amount' => $order->total_cost,
            'received'=>$received,
            'remaining_receivables'=>($order->total_cost-$received),
            'user_name'=>$order->user->name,
            'accountant'=>config('global.accountant'),
            'check_man'=>$collected->check_man,
            'remark'=>''
        ]);
    }

    public function deleted(Collected $collected)
    {

            // 收款记录同个订单的
          $collecteds=DB::table('collected')->where('order_id',$collected->order_id)->get();
          if($collecteds){
            $received=0;
            foreach ($collecteds as $collect) {
                $received+=$collect->collected_amount;
            }
            DB::table('receivable')->where('order_id',$collected->order_id)->update([
            'received'=>$received,
            ]);
          }else{
              // 订单收款记录不存在 应收款删除对应记录
              DB::table('receivable')->where('order_id',$collected->order_id)->delete();
          }


    }
}
