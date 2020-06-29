<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivablesTable extends Migration
{
	public function up()
	{
		Schema::create('receivables', function(Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('customer_name');
            $table->float('receivable_amount',8,2);
            $table->float('received',8,2);
            $table->float('remaining_receivables',8,2);
            $table->string('user_name');
            $table->string('accountant');
            $table->string('check_man');
            $table->string('remark');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('receivables');
	}
}
