<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->delete();

        // Sponsor
        $sponsor =  Sponsor::create([
            'name'  => 'Sponsor1',
            'email' => 'sponsor@example.com'
        ]);
    }
}
