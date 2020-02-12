<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission_meta')->nullable();
            $table->string('permission_key')->nullable();
            $table->tinyInteger('access_type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission_meta')->nullable();
            $table->string('permission_key')->nullable();
            $table->bigInteger('foreign_id')->nullable();
            $table->unsignedBigInteger('rule_id')->nullable();
            $table->tinyInteger('access_type')->nullable();
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
        Schema::dropIfExists('permission_metas');
        Schema::dropIfExists('permissions');
    }
}
