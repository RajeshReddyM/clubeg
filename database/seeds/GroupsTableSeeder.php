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

        // groups
        $group =  Group::create(['name'=>'Group1']);
        $admin = User::find(1);
        $player = User::find(2);
        $group->users()->attach($admin->id);
        $group->users()->attach($player->id);
    }
}
