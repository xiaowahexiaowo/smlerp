<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class OrderObserver
{
    public function creating(Order $order)
    {
        //
    }

    public function updating(Order $order)
    {
        //
    }

    public function deleted(Order $order){
           DB::table('orderdetails')->where('order_id', $order->order_id)->delete();
    }
}
