<?php

use Illuminate\Database\Seeder;
use App\Models\Outstockdetail;

class OutstockdetailsTableSeeder extends Seeder
{
    public function run()
    {
        $outstockdetails = factory(Outstockdetail::class)->times(50)->make()->each(function ($outstockdetail, $index) {
            if ($index == 0) {
                // $outstockdetail->field = 'value';
            }
        });

        Outstockdetail::insert($outstockdetails->toArray());
    }

}

