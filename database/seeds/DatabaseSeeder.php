<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BouncerRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GolfclubsTableSeeder::class);
        $this->call(GolfcoursesTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(TournamentsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(RoundsTableSeeder::class);
    }
}
