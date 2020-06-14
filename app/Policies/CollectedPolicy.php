<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Collected;

class CollectedPolicy extends Policy
{
    public function update(User $user, Collected $collected)
    {
         // return $collected->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Collected $collected)
    {
        // return $collected->user_id == $user->id;
         return true;
    }

       public function index(User $user, Collected $collected)
    {
        // 这三人 才可以  操作收款明细
        return $user->name==config('global.approval_sale1')||$user->name==config('global.approval_sale2')||$user->name==config('global.approval_sale3');
    }
}
