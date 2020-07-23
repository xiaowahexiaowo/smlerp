<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstockdetailsTable extends Migration
{
	public function up()
	{
		Schema::create('instockdetails', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('in_date');
            $table->integer('stock_id')->unsigned();

            $table->string('product_type');
            $table->string('generating_unit_type');
            $table->string('power');
            $table->integer('phases_number');
            $table->string('unit');
            $table->integer('warehousing_count')->unsigned();
            $table->float('warehousing_price',10,2);
            $table->float('stock_amount',10,2);
            $table->string('stock_man');
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('instockdetails');
	}
}
