<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration 
{
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_date');
            $table->datetime('delivery_date');
            $table->string('plan_no');
            $table->string('category');
            $table->string('appendix');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('schedules');
	}
}
