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
        Schema::create('permission_rule', function (Blueprint $table) {
           $table->unsignedBigInteger('rule_id');
           $table->unsignedBigInteger('permission_id');

           $table->foreign('rule_id')->references('id')->on('rules');
           $table->foreign('permission_id')->references('id')->on('permissions');
        });
        Schema::create('employee_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('attribute_id')->nullable();
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
        Schema::dropIfExists('permission_rule');
    }
}
