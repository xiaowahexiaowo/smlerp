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
            $table->string('order_id')->unique()->unsigned();
            $table->string('order_type');
            $table->datetime('order_date');
            $table->string('order_ticket');
            $table->text('customer_name');
            $table->integer('user_id')->unsigned()->index();
            $table->string('payment_type');
            $table->integer('total_cost')->unsigned();
            $table->string('payment_method');
            $table->string('remark');
            $table->integer('payment_amount')->unsigned();
            $table->integer('tax_deductible')->unsigned();
            $table->integer('arrears');
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
