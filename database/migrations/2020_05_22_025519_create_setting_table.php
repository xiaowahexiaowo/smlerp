<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // 机组编号不能重复
            $table->string('generating_unit_no')->index()->unique();
            $table->string('product_type');
            $table->string('generating_unit_type');
            $table->string('power');
            $table->integer('phases_number');
            $table->string('unit');
            $table->integer('warehousing_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}