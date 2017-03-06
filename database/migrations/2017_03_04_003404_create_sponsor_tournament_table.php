<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_tournament', function (Blueprint $table) {
            $table->integer('sponsor_id')->unsigned()->nullable();
            $table->foreign('sponsor_id')->references('id')
                ->on('sponsors')->onDelete('cascade');

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
        Schema::dropIfExists('sponsor_tournament');
    }
}
