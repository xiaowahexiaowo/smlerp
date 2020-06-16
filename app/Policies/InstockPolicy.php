<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Instock;

class InstockPolicy extends Policy
{
    public function update(User $user, Instock $instock)
    {
        // return $instock->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Instock $instock)
    {
        return true;
    }
}
