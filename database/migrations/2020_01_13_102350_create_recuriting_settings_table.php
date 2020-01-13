<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecuritingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuriting_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_xml_interface_enabled')->default(false);
            $table->string('email_for_applicants')->nullable();
            $table->boolean('is_interview_calendar_invites')->default(false);
            $table->string('email_sender_name')->nullable();
            $table->boolean('is_autometic_applicant_anonymization')->default(false);
            $table->string('anonymization_after')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
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
        Schema::dropIfExists('recuriting_settings');
    }
}
