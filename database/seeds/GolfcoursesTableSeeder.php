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
        for ($i = 1; $i <= 20; $i++){
            $golfcourse =  Golfcourse::create([
                'name'=>'Golfcourse ' . $i,
                'golfclub_id'=> Golfclub::first()->id,
                'P1' => 5, 'P2' => 3,'P3' => 5,'P4' => 3,'P5' => 4,'P6' => 3,
                'P7' => 5,'P8' => 4,'P9' => 4,'P10' => 5,'P11' => 4,'P12' => 4,
                'P13' => 3,'P14' => 5,'P15' => 4,'P16' => 3,'P17' => 4,'P18' => 4
            ]);
        }
    }
}
