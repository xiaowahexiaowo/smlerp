<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blackboard;

class BlackboardPolicy extends Policy
{
    public function update(User $user, Blackboard $blackboard)
    {

        return $user->can('u_blackboards');
    }

    public function destroy(User $user, Blackboard $blackboard)
    {
        return $user->can('d_blackboards');
    }

       public function create(User $user, Blackboard $blackboard)
    {
        return $user->can('c_blackboards');
    }

        public function index(User $user, Blackboard $blackboard)
    {
        return $user->can('r_blackboards');
    }
}
