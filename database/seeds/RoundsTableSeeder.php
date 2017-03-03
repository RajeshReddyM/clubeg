<?php

use Illuminate\Database\Seeder;
use App\Round;
use App\Tournament;

class RoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rounds')->delete();

        // Round
        $round =  Round::create([
        	'tournament_id' => Tournament::first()->id,
            'round_no'=>'1'
        ]);
    }
}
