<?php

use Illuminate\Database\Seeder;
use App\Tournament;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments')->delete();

        for ($i = 0; $i < 20; $i++){
            $tournament =  Tournament::create([
                'name'=>'Tournament ' . $i,
                'golfcourse_id' => '1'
            ]);
        }


    }
}