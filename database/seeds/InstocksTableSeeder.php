<?php

use Illuminate\Database\Seeder;
use App\Models\Instock;

class InstocksTableSeeder extends Seeder
{
    public function run()
    {
        $instocks = factory(Instock::class)->times(50)->make()->each(function ($instock, $index) {
            if ($index == 0) {
                // $instock->field = 'value';
            }
        });

        Instock::insert($instocks->toArray());
    }

}

