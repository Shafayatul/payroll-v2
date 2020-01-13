<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('host')->nullable();
            $table->string('port')->nullable();
            $table->boolean('encrypt_type')->default(false);
            $table->string('username')->default(null);
            $table->string('password')->default(null);
            $table->unsignedBigInteger('office_id')->default(null);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('recruiting_email_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->unsignedBigInteger('smtp_id')->nullable();
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
        Schema::dropIfExists('recruiting_email_templates');
        Schema::dropIfExists('smtp_settings');
    }
}
