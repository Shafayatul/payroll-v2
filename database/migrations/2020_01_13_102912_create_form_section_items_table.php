<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_section_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_key')->nullable();
            $table->string('label_min')->nullable();
            $table->string('label_max')->nullable();
            $table->string('evaluator_info')->nullable();
            $table->string('weight')->nullable();
            $table->unsignedBigInteger('form_section_id')->nullable();
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
        Schema::dropIfExists('form_section_items');
    }
}
