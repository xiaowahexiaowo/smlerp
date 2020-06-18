<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Instockdetail;

class InstockdetailPolicy extends Policy
{
    public function update(User $user, Instockdetail $instockdetail)
    {
        // return $instockdetail->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Instockdetail $instockdetail)
    {
        return true;
    }
}
