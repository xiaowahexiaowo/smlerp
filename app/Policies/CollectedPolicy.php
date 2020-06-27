<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Collected;

class CollectedPolicy extends Policy
{
    public function update(User $user, Collected $collected)
    {

       return $user->hasRole('Treasurer');
    }

    public function destroy(User $user, Collected $collected)
    {

         return $user->hasRole('Treasurer');
    }

       public function index(User $user, Collected $collected)
    {
        return $user->can('r_collecteds');
    }

      public function create(User $user, Collected $collected)
    {

         return $user->hasRole('Treasurer');
    }


}
