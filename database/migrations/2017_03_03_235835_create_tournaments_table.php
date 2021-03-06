<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Updated 2017-03-06 - MT
        */
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('golfcourse_id')->unsigned()->nullable();
            $table->string('name');
            $table->dateTime('start_date')->nullable();
            $table->string('type')->nullable();
            $table->string('visibility')->nullable();
            $table->string('division')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
            $table->foreign('golfcourse_id')
              ->references('id')->on('golfcourses')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
