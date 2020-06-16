<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('generating_unit_no');
            $table->string('product_type');
            $table->string('generating_unit_type');
            $table->string('power');
            $table->integer('phases_number');
            $table->string('unit');
            $table->integer('init_stock')->unsigned();
            $table->integer('warehousing_count')->unsigned();
            $table->integer('out_count')->unsigned();
            $table->integer('inventory_quantity')->unsigned();
            $table->integer('warehousing_price')->unsigned();
            $table->integer('stock_amount')->unsigned();
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('stocks');
	}
}