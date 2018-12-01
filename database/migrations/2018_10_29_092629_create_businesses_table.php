<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('user_id');
            $table->enum('delete', ['deleted' ,'shown'])->default('shown');
            $table->string('name', 100);
            $table->text('description');
            $table->enum('admin_status', ['passive', 'active']);
            $table->enum('user_status', ['passive', 'active']);
            $table->string('logo', 300)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
