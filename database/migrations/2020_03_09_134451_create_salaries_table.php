<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('get_salary_month')->nullable();
            $table->string('date')->nullable();
            $table->string('complements')->nullable();
            $table->string('advantage')->nullable();
            $table->string('unemployment')->nullable();
            $table->decimal('total',2,8)->default(0);
            $table->boolean('is_paid')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('office_id')->references('id')->on('offices');
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
        
        Schema::dropIfExists('salaries');
    }
}
