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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->tinyInteger('is_sub_company_enable')->default(0);
            $table->tinyInteger('is_email_notification_enable')->default(1);
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->integer('industry_id')->nullable();
            // $table->foreign('industry_id')->references('id')->on('industries');
            $table->string('timezone')->nullable();
            $table->integer('public_holiday_id')->nullable();
            // $table->foreign('public_holiday_id')->references('id')->on('public_holidays');
            $table->string('maintenance_emails')->nullable();
            $table->string('logo')->nullable();
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
        Schema::drop('companies');
    }
}
