<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_reminders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('remind_key')->nullable();
            $table->tinyInteger('about_key')->nullable();
            $table->tinyInteger('filter_type')->nullable();
            $table->string('automatic_offset')->nullable();
            $table->tinyInteger('automatic_offset_unit')->nullable();
            $table->tinyInteger('automatic_offset_sign')->nullable();
            $table->boolean('reminder_type')->default(false);
            $table->boolean('is_yearly')->default(false);
            $table->string('title')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
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
        Schema::dropIfExists('role_reminders');
    }
}
