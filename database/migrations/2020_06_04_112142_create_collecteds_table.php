<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectedsTable extends Migration
{
	public function up()
	{
		Schema::create('collecteds', function(Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->datetime('collection_date');
            $table->string('customer_name');
            $table->float('collected_amount',10,2);
            $table->string('payment_method');
            $table->string('payee');
            $table->string('check_man');
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('collecteds');
	}
}
