<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('form_item_type_id');
            $table->string('label', 200);
            $table->enum('mandatory', ['null', 'not-null'])->default('null');
            $table->enum('duplicate', ['duplicate', 'unique'])->default('duplicate');
            $table->enum('visibility', ['enable', 'disable', 'hidden'])->default('enable');
            $table->enum('encrypt', ['no', 'yes'])->default('no');
            $table->enum('initial', ['no', 'yes'])->default('no');
            $table->enum('format', ['no', 'yes'])->default('no');
            $table->unsignedInteger('min')->default(0);
            $table->unsignedInteger('max');
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('form_item_type_id')->references('id')->on('form_item_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_items');
    }
}
