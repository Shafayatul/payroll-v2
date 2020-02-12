<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('industry_id')->references('id')->on('industries');
            $table->foreign('public_holiday_calendar_id')->references('id')->on('public_holiday_calendars');
        });

        Schema::table('public_holiday_calendars', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
        
        Schema::table('calendar_years', function (Blueprint $table) {
            $table->foreign('calendar_id')->references('id')->on('public_holiday_calendars');
        });

        Schema::table('calendar_holidays', function (Blueprint $table) {
            $table->foreign('calendar_year_id')->references('id')->on('calendar_years');
        });
        
        Schema::table('offices', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('public_holiday_calendar_id')->references('id')->on('public_holiday_calendars');
        });
        
        Schema::table('feedback_categories', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('feedback_category_attributes', function (Blueprint $table) {
            $table->foreign('feedback_category_id')->references('id')->on('feedback_categories');
        });
        
        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
        });
        
        Schema::table('interview_types', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('smtp_settings', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('recruiting_email_templates', function (Blueprint $table) {
            $table->foreign('smtp_id')->references('id')->on('smtp_settings');
        });
        
        Schema::table('cost_centers', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('payroll_groups', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        
        });
        
        Schema::table('recruiting_phases', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('recurring_compensation_types', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
        
        Schema::table('payroll_histories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::table('attendence_working_hours', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('weekdays', function (Blueprint $table) {
            $table->foreign('working_hour_id')->references('id')->on('attendence_working_hours');
        });
        
        Schema::table('employee_information_sections', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
        
        Schema::table('employee_detail_attributes', function (Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('employee_information_sections')->onDelete('cascade');
        });
        
        Schema::table('employee_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('attribute_id')->references('id')->on('employee_detail_attributes')->onDelete('cascade');
        });
        
        Schema::table('employee_attribute_datatypes', function (Blueprint $table) {
            $table->foreign('attribute_id')->references('id')->on('employee_detail_attributes')->onDelete('cascade');
        });
        
        Schema::table('attribute_type_options', function (Blueprint $table) {
            $table->foreign('attribute_datatype_id')->references('id')->on('employee_attribute_datatypes');
        });
        
        Schema::table('payroll_settings', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('recurring_compensation_values', function (Blueprint $table) {
            $table->foreign('payroll_history_id')->references('id')->on('payroll_histories');
            $table->foreign('compensation_type_id')->references('id')->on('recurring_compensation_types');
        });
        
        Schema::table('recuriting_categories', function (Blueprint $table) {
            $table->foreign('autoresponder_template_id')->references('id')->on('recruiting_email_templates');
            $table->foreign('autoresponder_id')->references('id')->on('users');
        });

        Schema::table('boarding_templates', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::table('boarding_step_items', function (Blueprint $table) {
            $table->foreign('boarding_step_id')->references('id')->on('boarding_steps');
        });

        Schema::table('recuriting_settings', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

        Schema::table('form_sections', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

        Schema::table('evaluation_forms', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

        Schema::table('form_section_items', function (Blueprint $table) {
            $table->foreign('form_section_id')->references('id')->on('form_sections');
        });

        Schema::table('rules', function (Blueprint $table) {
            $table->foreign('attribute_id')->references('id')->on('employee_detail_attributes')->onDelete('cascade');
        });

        Schema::table('role_reminders', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('special_role_reminders', function (Blueprint $table) {
            $table->foreign('role_reminder_id')->references('id')->on('role_reminders');
        });

        Schema::table('calendars', function (Blueprint $table) {
            $table->foreign('absence_id')->references('id')->on('absences');
            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::table('absences', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::table('boarding_groups', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::table('document_categories', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });
        
        Schema::table('document_templates', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('document_categories');
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('rule_id')->references('id')->on('rules');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        // Schema::dropIfExists('permission_rule');
    }
}
