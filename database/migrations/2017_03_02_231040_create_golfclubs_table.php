<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateGolfclubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golfclubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('street_no');
            $table->string('street_name');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('logo');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('golfclubs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}