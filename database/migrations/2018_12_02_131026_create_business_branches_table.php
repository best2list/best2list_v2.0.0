<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id');
            $table->string('branch',100);
            $table->string('slug');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('city_id');
            $table->integer('location_x');
            $table->integer('location_y');
            $table->string('address',255);
            $table->string('zip_code',25);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_branches');
    }
}
