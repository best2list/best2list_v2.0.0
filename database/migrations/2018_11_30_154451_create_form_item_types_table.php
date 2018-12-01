<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormItemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_item_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 200);
            $table->enum('type', ['text', 'number', 'file'])->default('text');
            $table->enum('mandatory', ['null', 'not-null'])->default('null');
            $table->enum('duplicate', ['duplicate', 'unique'])->default('duplicate');
            $table->enum('visibility', ['enable', 'disable', 'hidden'])->default('enable');
            $table->enum('encrypt', ['no', 'yes'])->default('no');
            $table->enum('initial', ['no', 'yes'])->default('no');
            $table->enum('format', ['no', 'yes'])->default('no');
            $table->unsignedInteger('min')->default(0);
            $table->unsignedInteger('max');
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
        Schema::dropIfExists('form_item_types');
    }
}
