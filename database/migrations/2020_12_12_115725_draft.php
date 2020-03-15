<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Draft extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('calendar_years', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('year')->nullable();
        //     $table->unsignedBigInteger('calendar_id')->nullable();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
        
        // Schema::create('calendar_holidays', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name')->nullable();
        //     $table->text('details')->nullable();
        //     $table->boolean('is_halfday')->nullable();
        //     $table->unsignedBigInteger('calendar_year_id')->nullable();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });

        // Schema::table('calendar_years', function (Blueprint $table) {
        //     $table->foreign('calendar_id')->references('id')->on('public_holiday_calendars');
        // });

        // Schema::table('calendar_holidays', function (Blueprint $table) {
        //     $table->foreign('calendar_year_id')->references('id')->on('calendar_years');
        // });
        Schema::create('salary_compensation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount')->nullable();
            $table->unsignedBigInteger('salary_id');
            $table->unsignedBigInteger('compensation_id');
            $table->timestamps();

            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->foreign('compensation_id')->references('id')->on('compensations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('calendar_holidays');
        // Schema::dropIfExists('calendar_years');
    }
}
