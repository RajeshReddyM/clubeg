<?php

use Illuminate\Database\Seeder;

class BouncerRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Delete roles table records
		DB::table('roles')->delete();
        Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Admin',
        ]);
        Bouncer::role()->create([
            'name' => 'player',
            'title' => 'Player',
        ]);
        Bouncer::role()->create([
            'name' => 'referee',
            'title' => 'Referee',
        ]);
        Bouncer::role()->create([
            'name' => 'scorer',
            'title' => 'Scorer',
        ]);
        Bouncer::role()->create([
            'name' => 'guest',
            'title' => 'Guest',
        ]);
        Bouncer::role()->create([
            'name' => 'golfcourse',
            'title' => 'GolfCourse',
        ]);

    }
}
