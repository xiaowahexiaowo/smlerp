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

            $table->string('generating_unit_no');
            $table->string('product_type');
            $table->string('generating_unit_type');
            $table->string('power');
            $table->integer('phases_number');
            $table->string('unit');
            $table->integer('out_count')->unsigned();
            $table->integer('warehousing_price')->unsigned();
            $table->integer('amount')->unsigned();
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('outstockdetails');
	}
}
