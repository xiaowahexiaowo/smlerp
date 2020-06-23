<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Outstockdetail;

class OutstockdetailPolicy extends Policy
{
    public function update(User $user, Outstockdetail $outstockdetail)
    {
        // return $outstockdetail->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Outstockdetail $outstockdetail)
    {
        return true;
    }
}
