<?php

namespace App\Observers;

use App\Models\Instock;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
use Illuminate\Support\Facades\DB;
class InstockObserver
{
    public function creating(Instock $instock)
    {
        //
    }

      public function deleted(Instock $instock){

    }
}
