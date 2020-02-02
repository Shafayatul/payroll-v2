<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('permission_rule', function (Blueprint $table) {
        //    $table->unsignedBigInteger('rule_id');
        //    $table->unsignedBigInteger('permission_id');

        //    $table->foreign('rule_id')->references('id')->on('rules');
        //    $table->foreign('permission_id')->references('id')->on('permissions');
        // });

        Schema::create('attributes_in_personal_data_sheets', function (Blueprint $table) {
           $table->unsignedBigInteger('attribute_id');
           $table->unsignedBigInteger('payroll_setting_id');

           $table->foreign('attribute_id')->references('id')->on('employee_detail_attributes');
           $table->foreign('payroll_setting_id')->references('id')->on('payroll_settings');
        });

        Schema::create('absences_type_payroll_settings', function (Blueprint $table) {
           $table->unsignedBigInteger('absence_id');
           $table->unsignedBigInteger('payroll_setting_id');

           $table->foreign('absence_id')->references('id')->on('absences');
           $table->foreign('payroll_setting_id')->references('id')->on('payroll_settings');
        });
        // Schema::create('employee_details', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('value')->nullable();
        //     $table->unsignedBigInteger('user_id')->nullable();
        //     $table->unsignedBigInteger('attribute_id')->nullable();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('permission_rule');
    }
}
