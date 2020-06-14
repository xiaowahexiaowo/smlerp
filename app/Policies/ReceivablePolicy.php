<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Receivable;

class ReceivablePolicy extends Policy
{
    public function update(User $user, Receivable $receivable)
    {
        // return $receivable->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Receivable $receivable)
    {
        return true;
    }

        public function index(User $user, Receivable $receivable)
    {
        // 这三人 才可以  操作收款明细
        return $user->name==config('global.approval_sale1')||$user->name==config('global.approval_sale2')||$user->name==config('global.approval_sale3');
    }
}
