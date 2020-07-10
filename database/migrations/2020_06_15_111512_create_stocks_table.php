<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('generating_unit_no')->unique();
            $table->string('product_type');
            $table->string('generating_unit_type');
            $table->string('power');
            $table->integer('phases_number');
            $table->string('unit');
            $table->integer('init_stock')->unsigned();
            $table->integer('warehousing_count')->unsigned();
            $table->integer('out_count')->unsigned();
            $table->integer('inventory_quantity')->unsigned();
            $table->float('warehousing_price',10,2);
            $table->float('stock_amount',10,2);
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('stocks');
	}
}
