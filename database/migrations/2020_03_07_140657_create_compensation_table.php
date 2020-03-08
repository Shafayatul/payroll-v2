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
            $table->string('compensatory')->nullable();
            $table->string('increase')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::create('mutualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('rate')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });
        // Schema::create('user_absence', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->timestamp('absence_from')->nullable();
        //     $table->timestamp('absence_to')->nullable();
        //     $table->string('reason')->nullable();
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('absence_id');
        //     $table->timestamps();

        //     $table->foreign('absence_id')->references('id')->on('absences');
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compensations');
        Schema::dropIfExists('mutualities');
        // Schema::dropIfExists('user_absence');
    }
}
