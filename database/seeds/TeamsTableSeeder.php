<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\User;


class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->delete();

        // Teams
        for($i = 1; $i <= 10; $i++) {
            $team =  Team::create(['name'=> 'Team'. (string)$i]);
            $team->users()->attach(rand(1,20));
            $team->users()->attach(rand(1,20));
            $team->tournaments()->attach(rand(1,10));
            $team->tournaments()->attach(rand(1,10));
        }
    }
}
