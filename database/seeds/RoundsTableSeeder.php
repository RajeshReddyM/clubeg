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

        // rounds
        for($i = 1; $i <= 10; $i++) {
            $round =  Round::create(['name'=> 'Round'. (string)$i, 'tournament_id' => rand(1,10)]);
        }
    }
}
