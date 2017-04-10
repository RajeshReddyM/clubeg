<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolfcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golfcourses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('golfclub_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->integer('hole_no')->unsigned()->nullable();
            $table->integer('P1')->nullable();
            $table->integer('P2')->nullable();
            $table->integer('P3')->nullable();
            $table->integer('P4')->nullable();
            $table->integer('P5')->nullable();
            $table->integer('P6')->nullable();
            $table->integer('P7')->nullable();
            $table->integer('P8')->nullable();
            $table->integer('P9')->nullable();
            $table->integer('P10')->nullable();
            $table->integer('P11')->nullable();
            $table->integer('P12')->nullable();
            $table->integer('P13')->nullable();
            $table->integer('P14')->nullable();
            $table->integer('P15')->nullable();
            $table->integer('P16')->nullable();
            $table->integer('P17')->nullable();
            $table->integer('P18')->nullable();
            $table->string('hole_length');
            $table->string('logo')->nullable();
            $table->timestamps();
            $table->foreign('golfclub_id')
              ->references('id')->on('golfclubs')
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
        Schema::dropIfExists('golfcourses');
    }
}
