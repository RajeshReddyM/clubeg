<?php

use Illuminate\Database\Seeder;
use App\Golfcourse;
use App\Golfclub;

class GolfcoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('golfcourses')->delete();

        // Golfcourse
        $golfcourse =  Golfcourse::create([
        	'golfclub_id'=> Golfclub::first()->id,
            'name'=>'Golfcourse1'
        ]);
    }
}
