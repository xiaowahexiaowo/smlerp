<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Stock;

class StockPolicy extends Policy
{
    public function update(User $user, Stock $stock)
    {
        // return $stock->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Stock $stock)
    {
        return $user->hasRole('Storekeeper');
    }
     public function create(User $user, Stock $stock)
    {
        return $user->hasRole('Storekeeper');
    }

          public function export(User $user, Stock $stock){



          return $user->hasRole('Treasurer');

    }
}

