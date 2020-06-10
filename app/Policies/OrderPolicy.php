<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;

class OrderPolicy extends Policy
{
    public function update(User $user, Order $order)
    {
        // return $order->user_id == $user->id;
         return true;
    }

       public function edit(User $user, Order $order)
    {
        return $order->user_id == $user->id;
        // return true;
    }

    public function destroy(User $user, Order $order)
    {
        return $order->user_id == $user->id;
    }

    public function createDetail(User $user, Order $order)
    {
        return $order->user_id == $user->id;
    }

    public function check(User $user){
        return $user->name==config('global.approval_sale1')||$user->name==config('global.approval_sale2')||$user->name==config('global.approval_sale3');
    }
}
