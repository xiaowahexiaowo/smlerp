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

    public function check(User $user, Order $order){
        // 这三人 才可以审核
        return $user->name==config('global.approval_sale1')||$user->name==config('global.approval_sale2')||$user->name==config('global.approval_sale3');
    }

    public function showDetail(User $user, Order $order){
// 这三人 才可以  查看明细
        return $user->name==config('global.approval_sale1')||$user->name==config('global.approval_sale2')||$user->name==config('global.approval_sale3');
    }
}
