<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutstockdetailsTable extends Migration
{
	public function up()
	{
		Schema::create('outstockdetails', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('stock_id');
            $table->datetime('out_date');
            $table->string('generating_unit_no')->unique();
            $table->string('product_type');
            $table->string('generating_unit_type');
            $table->string('power');
            $table->string('phases_number');
            $table->string('unit');
            $table->integer('out_count')->unsigned();
            $table->float('warehousing_price',10,2);
            $table->float('amount',10,2);
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('outstockdetails');
	}
}
