<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendenceWorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_rule', function (Blueprint $table) {
           $table->unsignedBigInteger('rule_id');
           $table->unsignedBigInteger('permission_id');

           $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendence_working_hours');
    }
}
