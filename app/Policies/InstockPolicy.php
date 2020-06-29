<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Instock;

class InstockPolicy extends Policy
{
     public function show(User $user, Instock $instock)
    {
        return $user->hasRole('Storekeeper');
    }
     public function create(User $user, Instock $instock)
    {
        return $user->hasRole('Storekeeper');
    }
     public function createDetail(User $user, Instock $instock)
    {
        return $user->hasRole('Storekeeper');
    }
     public function export(User $user, Instock $instock)
    {
        return $user->hasRole('Storekeeper');
    }
    public function update(User $user, Instock $instock)
    {
        return $user->hasRole('Storekeeper');
    }

    public function destroy(User $user, Instock $instock)
    {
        return $user->hasRole('Storekeeper');
    }
}
