<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\User;


class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();


        // Groups
        for($i = 1; $i <= 10; $i++) {
            $group =  Group::create(['name' => 'Group'. (string)$i]);
            $group->users()->attach(rand(1,20));
            $group->users()->attach(rand(1,20));
            $group->tournaments()->attach(rand(1,10));
            $group->tournaments()->attach(rand(1,10));
        }
    }
}
