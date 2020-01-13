<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->nullable();
            $table->boolean('is_track_overtime')->nullable();
            $table->string('overtime_calculation')->nullable();
            $table->string('overtime_cliff')->nullable();
            $table->boolean('is_deficit')->default(false);
            $table->boolean('is_prorate_vacation')->default(false);
            $table->integer('reference_value')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendence_working_hours');
    }
}
