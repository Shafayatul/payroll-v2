<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tem_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug'); 
            $table->string('name'); 
            $table->unsignedBigInteger('office_id');
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

        // Schema::create('users_tem_roles', function (Blueprint $table) {
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('role_id');
         
        //   //FOREIGN KEY CONSTRAINTS
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('role_id')->references('id')->on('tem_roles')->onDelete('cascade');
         
        //   //SETTING THE PRIMARY KEYS
        //     $table->primary(['user_id','role_id']);
        // });

        // Schema::create('roles_tem_permissions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('role_id');
        //     $table->unsignedBigInteger('permission_id');
           
        //     //FOREIGN KEY CONSTRAINTS
        //     $table->foreign('role_id')->references('id')->on('tem_roles')->onDelete('cascade');
        //     $table->foreign('permission_id')->references('id')->on('tem_permissions')->onDelete('cascade');
           
        //     //SETTING THE PRIMARY KEYS
        //     $table->primary(['role_id','permission_id']);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tem_roles');
        // Schema::dropIfExists('users_tem_roles');
        // Schema::dropIfExists('roles_tem_permissions');
    }
}
