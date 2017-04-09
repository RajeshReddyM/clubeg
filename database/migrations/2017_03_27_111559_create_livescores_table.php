<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivescoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livescores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('H1')->nullable();
            $table->integer('H2')->nullable();
            $table->integer('H3')->nullable();
            $table->integer('H4')->nullable();
            $table->integer('H5')->nullable();
            $table->integer('H6')->nullable();
            $table->integer('H7')->nullable();
            $table->integer('H8')->nullable();
            $table->integer('H9')->nullable();
            $table->integer('H10')->nullable();
            $table->integer('H11')->nullable();
            $table->integer('H12')->nullable();
            $table->integer('H13')->nullable();
            $table->integer('H14')->nullable();
            $table->integer('H15')->nullable();
            $table->integer('H16')->nullable();
            $table->integer('H17')->nullable();
            $table->integer('H18')->nullable();
            $table->integer('score')->nullable();
            $table->dateTime('timeUpdate')->nullable();
            $table->integer('groupNo')->nullable();
            $table->integer('teamNo')->nullable();
            $table->integer('INScore')->nullable();
            $table->integer('OUTScore')->nullable();
            $table->integer('toPar')->nullable();
            $table->integer('official')->nullable();
            $table->integer('status')->nullable();
            $table->integer('lostPlayoff')->nullable();
            $table->integer('round1')->nullable();
            $table->integer('r1ToPar')->nullable();

            $table->integer('tournament_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('tournament_id')
              ->references('id')->on('tournaments')
              ->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('livescores');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
