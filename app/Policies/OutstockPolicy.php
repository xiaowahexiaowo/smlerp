<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Outstock;

class OutstockPolicy extends Policy
{
    public function update(User $user, Outstock $outstock)
    {
        // return $outstock->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Outstock $outstock)
    {
        return true;
    }
}
