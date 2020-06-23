<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlackboardsTable extends Migration
{
	public function up()
	{
		Schema::create('blackboards', function(Blueprint $table) {
            $table->increments('id');
            $table->string('model_type');
            $table->integer('ava1b1')->unsigned();
            $table->integer('dp')->unsigned();
            $table->integer('otw')->unsigned();
            $table->integer('chn')->unsigned();
            $table->integer('up')->unsigned();
            $table->integer('available_count')->unsigned();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('blackboards');
	}
}
