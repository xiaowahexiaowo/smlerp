<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;

class OrderPolicy extends Policy
{

   public function index(User $user, Order $order){
        return $user->can('r_orders');
   }
    public function show(User $user, Order $order){
         if($user->hasRole('Flb_saleman')){
             return $order->user_id == $user->id;
        }else{
            return $user->can('r_orders');
         }
   }


       public function edit(User $user, Order $order)
    {
        return $order->user_id == $user->id||$user->hasRole('Maintainer');

    }

    public function destroy(User $user, Order $order)
    {
        return $order->user_id == $user->id||$user->hasRole('Maintainer');
    }

    public function createDetail(User $user, Order $order)
    {
        return $order->user_id == $user->id;
    }

    public function check(User $user, Order $order){
        // 三级审核
        return $user->can('1_check')||$user->can('2_check')||$user->can('3_check');
    }

    public function showDetail(User $user, Order $order){



          return $user->can('r_orderdetails');

    }
}
