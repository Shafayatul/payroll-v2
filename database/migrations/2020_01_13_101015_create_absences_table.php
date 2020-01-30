<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('office_id')->nullable();
            $table->string('name')->nullable();
            $table->string('color')->nullable();
            $table->boolean('is_halfday_request')->default(false);
            $table->boolean('certificate_required')->default(false);
            $table->tinyInteger('is_substituting')->default(false);
            $table->boolean('is_employee_substituting_absence')->default(false);
            $table->string('valid_on')->nullable();
            $table->string('carryover_type')->nullable();
            $table->string('carryover_date')->nullable();
            $table->boolean('is_absence_period_as_overtime')->default(false);
            $table->boolean('is_accrual_policies')->default(false);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('absences');
    }
}
