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
            $table->string('name');
            $table->dateTime('start_time');
            $table->timestamps();
            $table->integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('golfcourses')->onDelete('cascade');
            $table->integer('type_id');
            $table->string('type_name');

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
