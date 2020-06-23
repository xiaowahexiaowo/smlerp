<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blackboard;

class BlackboardPolicy extends Policy
{
    public function update(User $user, Blackboard $blackboard)
    {
        // return $blackboard->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Blackboard $blackboard)
    {
        return true;
    }
}
