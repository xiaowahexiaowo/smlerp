<?php

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StocksTableSeeder extends Seeder
{
    public function run()
    {
        $stocks = factory(Stock::class)->times(50)->make()->each(function ($stock, $index) {
            if ($index == 0) {
                // $stock->field = 'value';
            }
        });

        Stock::insert($stocks->toArray());
    }

}

