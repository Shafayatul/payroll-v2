<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingStepItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_step_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_key')->nullable();
            $table->string('type_name')->nullable();
            $table->string('type_icon')->nullable();
            $table->string('value')->nullable();
            $table->boolean('is_required')->default(false);
            $table->unsignedBigInteger('boarding_step_id')->nullable();
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
        Schema::dropIfExists('boarding_step_items');
    }
}
