<?php

namespace App\Observers;

use App\Models\Collected;
use Illuminate\Support\Facades\DB;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
use App\Models\User;
class CollectedObserver
{
    public function created(Collected $collected)
    {
        //每次创建收款明细  生成应收款记录
            $order=DB::table('orders')->where([['order_id',$collected->order_id],['order_state','已通过'],])->first();

            // 收款记录同个订单的
          $collecteds=DB::table('collecteds')->where('order_id',$collected->order_id)->get();

          $received=0;
          foreach ($collecteds as $collect) {
            $received+=$collect->collected_amount;
          }
          // 销售单的创建者
       $user=User::where('id',$order->user_id)->first();
           // 更新或创建数据   好像是根据主键
          DB::table('receivables')->updateOrInsert(['order_id' => $order->order_id],[

            'customer_name' =>  $order->customer_name,
            'receivable_amount' => $order->total_cost,
            'received'=>$received,
            'remaining_receivables'=>($order->total_cost-$received),
            'user_name'=>$user->name,
            'accountant'=>config('global.accountant'),
            'check_man'=>$collected->check_man,
            'remark'=>''
        ]);
    }

    public function deleting(Collected $collected)
    {



    }
}
