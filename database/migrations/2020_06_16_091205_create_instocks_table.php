<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstocksTable extends Migration 
{
	public function up()
	{
		Schema::create('instocks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('stock_type');
            $table->string('batch');
            $table->datetime('in_date');
            $table->string('supplier');
            $table->string('stock_man');
            $table->string('stock_factory');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('instocks');
	}
}
