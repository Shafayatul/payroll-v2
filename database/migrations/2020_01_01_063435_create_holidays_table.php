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
        Schema::create('calendar_years', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year')->nullable();
            $table->unsignedBigInteger('calendar_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('calendar_holidays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->text('details')->nullable();
            $table->boolean('is_halfday')->nullable();
            $table->unsignedBigInteger('calendar_year_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('calendar_holidays');
        Schema::dropIfExists('calendar_years');
    }
}
