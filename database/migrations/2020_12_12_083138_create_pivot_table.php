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

        Schema::create('user_attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('in_time')->nullable();
            $table->timestamp('out_time')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('weekday_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('weekday_id')->references('id')->on('weekdays');
        });

        Schema::create('user_absence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('absence_from')->nullable();
            $table->timestamp('absence_to')->nullable();
            $table->string('reason')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('absence_id');
            $table->timestamps();

            $table->foreign('absence_id')->references('id')->on('absences');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('users_tem_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
         
          //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('tem_roles')->onDelete('cascade');
         
          //SETTING THE PRIMARY KEYS
            $table->primary(['user_id','role_id']);
        });

        Schema::create('roles_tem_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
           
            //FOREIGN KEY CONSTRAINTS
            $table->foreign('role_id')->references('id')->on('tem_roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('tem_permissions')->onDelete('cascade');
           
            //SETTING THE PRIMARY KEYS
            $table->primary(['role_id','permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('attributes_in_personal_data_sheets');
        Schema::dropIfExists('absences_type_payroll_settings');
        Schema::dropIfExists('boarding_template_step');
        Schema::dropIfExists('employee_boarding_group');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('user_attendance');
        Schema::dropIfExists('user_absence');
        Schema::dropIfExists('users_tem_roles');
        Schema::dropIfExists('roles_tem_permissions');
    }
}
