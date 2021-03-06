<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->enum('delete', ['deleted' ,'shown'])->default('shown');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone',30)->unique();
            $table->string('password');
            $table->enum('access',['admin','user'])->default('user');
            $table->enum('status',['active','passive'])->default('passive');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
