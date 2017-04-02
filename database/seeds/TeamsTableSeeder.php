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

        // groups
        $team =  Team::create(['name'=>'Team1']);
        $admin = User::find(1);
        $player = User::find(2);
        $team->users()->attach($admin->id);
        $team->users()->attach($player->id);
    }
}
