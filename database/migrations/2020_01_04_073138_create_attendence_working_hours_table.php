<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendenceWorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence_working_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices');
            $table->string('name')->nullable();
            $table->tinyInteger('is_track_overtime')->nullable();
            $table->string('overtime_calculation')->nullable();
            $table->string('overtime_cliff')->nullable();
            $table->tinyInteger('deficit_hours')->nullable();
            $table->tinyInteger('is_prorate_vacation')->nullable();
            $table->integer('reference_value')->nullable();
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
        Schema::drop('attendence_working_hours');
    }
}
