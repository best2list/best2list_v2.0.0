<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_subjects', function (Blueprint $table) {

            $table->increments('id');
            $table->string('subject', 300);
            $table->string('description',1000)->nullable();
            $table->unsignedInteger('ticket_cat_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->enum('status',['open', 'close'])->default('open');
            $table->timestamps();
            $table->foreign('ticket_cat_id')->references('id')->on('ticket_categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ticket_subjects');
    }
}
