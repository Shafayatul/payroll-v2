<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('review_reminder_on')->default(false);
            $table->boolean('is_separate')->default(false);
            $table->string('prorate_salary_calculation')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
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
        Schema::dropIfExists('payroll_settings');
    }
}
