<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
use App\Notifications\OrderCheck;
use App\Models\User;
class OrderObserver
{
    public function created(Order $order)
    {
         // 通知话题作者有新的评论
        $user = User::role('Checkman1')->first();
        $user->notify(new OrderCheck($order));
    }

    public function updated(Order $order)
    {


    }

    public function deleted(Order $order){
           DB::table('orderdetails')->where('order_id', $order->order_id)->delete();
    }
}
