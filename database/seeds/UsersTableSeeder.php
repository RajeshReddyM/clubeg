<?php

use Illuminate\Database\Seeder;
use App\User;
use Silber\Bouncer\Database\HasRolesAndAbilities;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete users table records
        DB::table('users')->delete();

        // Admin
        $admin =  User::create([
            'first_name'=>'Admin', 'last_name' => 'User', 'handicap' => '5', 'email'=>'admin@example.com','password'=> bcrypt('password')
        ]);
        $admin->assign('admin');
        $admin->assign('player');

        // Give admin all previleges in the app
        Bouncer::allow($admin)->everything();

        // Player
        $player =  User::create([
            'first_name'=>'Admin', 'last_name' => 'User', 'handicap' => '5', 'email'=>'player@example.com','password'=> bcrypt('password')
        ]);
        $player->assign('player');

        // Referee
        $referee =  User::create([
            'first_name'=>'Referee', 'last_name' => 'User', 'handicap' => '5', 'email'=>'referee@example.com','password'=> bcrypt('password')
        ]);
        $referee->assign('referee');

        // Scorer
        $scorer =  User::create([
            'first_name'=>'Scorer', 'last_name' => 'User', 'handicap' => '5', 'email'=>'scorer@example.com','password'=> bcrypt('password')
        ]);
        $scorer->assign('scorer');

        // Guest
        $guest =  User::create([
            'first_name'=>'Guest', 'last_name' => 'User', 'handicap' => '5', 'email'=>'guest@example.com','password'=> bcrypt('password')
        ]);
        $guest->assign('guest');

    }
}
