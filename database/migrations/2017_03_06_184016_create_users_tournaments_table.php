<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Created 2017-03-06 - MT
        */
        Schema::create('users_tournaments', function (Blueprint $table) {
            $table->integer('id');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->integer('tournament_id')->unsigned()->nullable();
            $table->foreign('tournament_id')->references('id')
                ->on('tournaments')->onDelete('cascade');

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
        Schema::dropIfExists('users_tournaments');
    }
}
