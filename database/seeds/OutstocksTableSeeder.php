<?php

use Illuminate\Database\Seeder;
use App\Models\Outstock;

class OutstocksTableSeeder extends Seeder
{
    public function run()
    {
        $outstocks = factory(Outstock::class)->times(50)->make()->each(function ($outstock, $index) {
            if ($index == 0) {
                // $outstock->field = 'value';
            }
        });

        Outstock::insert($outstocks->toArray());
    }

}

