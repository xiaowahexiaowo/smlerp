<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutstocksTable extends Migration 
{
	public function up()
	{
		Schema::create('outstocks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('out_stock_type');
            $table->datetime('out_date');
            $table->string('order_id');
            $table->string('customer_name');
            $table->string('user_name');
            $table->string('out_stock_factory');
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('outstocks');
	}
}
