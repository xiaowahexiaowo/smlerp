<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_no')->unique()->unsigned();
            $table->string('order_id')->unique();
            $table->string('order_type');
            $table->datetime('order_date');
            $table->string('order_ticket');
            $table->text('customer_name');
            $table->integer('user_id')->unsigned()->index();
            $table->string('payment_type');
            $table->float('total_cost',10,2);
            $table->string('payment_method');
            $table->string('remark');
            $table->float('payment_amount',10,2);
            $table->float('tax_deductible',10,2);
            $table->float('arrears',10,2);
            $table->string('order_state')->index();
            $table->integer('order_detail_id')->unsigned()->index();
            $table->text('appendix');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('orders');
	}
}

