<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('is_halfday')->nullable();
            $table->integer('public_holiday_calendar_id')->unsigned();
            $table->foreign('public_holiday_calendar_id')->references('id')->on('public_holiday_calendars');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('holidays');
    }
}
