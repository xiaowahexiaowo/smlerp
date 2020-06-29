<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Outstock;

class OutstockPolicy extends Policy
{
    public function update(User $user, Outstock $outstock)
    {

        return $user->can('u_outstocks');
    }

    public function destroy(User $user, Outstock $outstock)
    {
        return $user->can('d_outstocks');
    }
     public function index(User $user, Outstock $outstock)
    {
        return $user->can('r_outstocks');
    }

      public function create(User $user, Outstock $outstock)
    {

        return $user->can('c_outstocks');
    }

      public function createDetail(User $user,Outstock $outstock)
    {
        return $user->hasRole('Storekeeper');
    }

      public function showDetail(User $user,Outstock $outstock)
    {
        return $user->can('r_outstockdetails');
    }

     public function export(User $user,Outstock $outstock)
    {
        return $user->hasRole('Storekeeper');
    }
}
