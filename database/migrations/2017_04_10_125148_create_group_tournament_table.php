<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_tournament', function (Blueprint $table) {
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')
                ->on('groups')->onDelete('cascade');

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
        Schema::dropIfExists('group_tournament');
    }
}
