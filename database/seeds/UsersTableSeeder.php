<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
		//insert some dummy records
		DB::table('users')->insert(array(
			array('first_name'=>'Rajesh', 'last_name' => 'Reddy', 'handicap' => '5', 'email'=>'rajesh@example.com','password'=> Hash::make('password')),
			array('first_name'=>'John', 'last_name' => 'Doe', 'handicap' => '5', 'email'=>'jdoe@example.com','password'=> 
				Hash::make('password'))
		));
    }
}
