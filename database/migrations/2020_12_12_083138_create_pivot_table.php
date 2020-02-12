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

        Schema::create('boarding_template_step', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('boarding_template_id');
            $table->unsignedBigInteger('boarding_step_id');
            $table->boolean('is_ingroup')->default(false);
            $table->integer('days')->nullable();
            $table->boolean('hire_type')->nullable();
            $table->string('responsible')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('boarding_template_id')->references('id')->on('boarding_templates');
            $table->foreign('boarding_step_id')->references('id')->on('boarding_steps');
        });

        Schema::create('employee_boarding_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('boarding_groups');
        });
        
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });

        // Schema::create('permission_rule', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('rule_id');
        //     $table->unsignedBigInteger('permission_id');
        //     $table->timestamps();

        //     $table->foreign('rule_id')->references('id')->on('rules');
        //     $table->foreign('permission_id')->references('id')->on('permissions');
        // });

        // Schema::create('role_permission_rule', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('role_id');
        //     $table->unsignedBigInteger('permission_rule_id');
        //     $table->timestamps();

        //     $table->foreign('permission_rule_id')->references('id')->on('permission_rules');
        //     $table->foreign('role_id')->references('id')->on('roles');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
