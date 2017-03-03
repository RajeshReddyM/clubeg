<?php

use Illuminate\Database\Seeder;
use App\Tournament;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments')->delete();

        // Tournament
        $tournament =  Tournament::create([
            'name'=>'Tournament1'
        ]);
    }
}
