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
            $table->string('title', 100);
            $table->text('summary');
            $table->text('description');
            $table->string('email', 100);
            $table->string('zip_code', 30);
            $table->string('phone', 30);
            $table->string('fax', 30);
            $table->string('website', 100);
            $table->text('address');
            $table->string('city', 200);
            $table->string('location', 100);
            $table->enum('type', ['passive', 'active']);
            $table->boolean('status', ['passive', 'active']);
            $table->unsignedInteger('country');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('image_path', 300)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_id')->references('id')->on('businesses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
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
