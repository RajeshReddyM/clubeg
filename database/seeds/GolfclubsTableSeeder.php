<?php

use Illuminate\Database\Seeder;
use App\Golfclub;

class GolfclubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('golfclubs')->delete();

        // Golfclub
        $golfclub =  Golfclub::create([
            'name'=>'Club1', 'street_no' => '123', 'street_name' => 'Deerfield', 'city' => 'Ottawa', 'province' => 'ON', 'postal_code'=>'K2G3R6'
        ]);
    }
}
