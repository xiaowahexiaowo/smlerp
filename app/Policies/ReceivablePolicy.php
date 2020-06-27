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
        return $user->can('r_receivables');
    }
}
