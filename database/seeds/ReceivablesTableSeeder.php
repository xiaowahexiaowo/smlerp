<?php

use Illuminate\Database\Seeder;
use App\Models\Receivable;

class ReceivablesTableSeeder extends Seeder
{
    public function run()
    {
        $receivables = factory(Receivable::class)->times(50)->make()->each(function ($receivable, $index) {
            if ($index == 0) {
                // $receivable->field = 'value';
            }
        });

        Receivable::insert($receivables->toArray());
    }

}

