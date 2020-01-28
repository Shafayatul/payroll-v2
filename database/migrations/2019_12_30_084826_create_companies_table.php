<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->boolean('is_sub_company_enable')->default(false);
            $table->boolean('is_email_notification_enable')->default(true);
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->string('timezone')->nullable();
            $table->string('contact_for_maintenance')->nullable();
            $table->integer('company_employee_size')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->unsignedBigInteger('public_holiday_calendar_id')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('companies');
    }
}
