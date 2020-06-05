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
        return true;
    }
}
