<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Orderdetail;

class OrderdetailPolicy extends Policy
{
    public function update(User $user, Orderdetail $detail)
    {
        // return $order->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Orderdetail $detail)
    {
        return true;
    }
}
