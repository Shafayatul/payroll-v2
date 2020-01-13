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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->text('details')->nullable();
            $table->boolean('is_halfday')->nullable();
            $table->unsignedBigInteger('public_holiday_calendar_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('public_holiday_calendar_id')->references('id')->on('public holiday_calendars')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
}
