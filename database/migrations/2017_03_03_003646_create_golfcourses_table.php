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
            $table->string('name');
            $table->string('logo');
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
