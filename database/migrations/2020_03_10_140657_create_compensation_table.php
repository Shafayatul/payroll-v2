<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->default(0);
            // $table->string('compensatory')->nullable();
            $table->string('increase')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::create('mutualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('rate')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::create('contributions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('rate')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::create('salary_contribution', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount')->nullable();
            $table->unsignedBigInteger('salary_id');
            $table->unsignedBigInteger('contribution_id');
            $table->timestamps();

            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->foreign('contribution_id')->references('id')->on('contributions');
        });
        Schema::create('salary_mutual', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount')->nullable();
            $table->unsignedBigInteger('salary_id');
            $table->unsignedBigInteger('mutual_id');
            $table->timestamps();

            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->foreign('mutual_id')->references('id')->on('mutualities');
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
        Schema::dropIfExists('compensations');
        Schema::dropIfExists('mutualities');
        Schema::dropIfExists('contributions');
        Schema::dropIfExists('salary_contribution');
        Schema::dropIfExists('salary_mutual');
    }
}
