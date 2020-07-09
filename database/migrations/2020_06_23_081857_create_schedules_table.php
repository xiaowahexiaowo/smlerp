<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table) {
            $table->increments('id');
            //排产单号
            $table->string('schedules_id');
            // 排产状态
            $table->string('schedules_state');
            $table->string('appendix');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('schedules');
	}
}
