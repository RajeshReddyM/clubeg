<?php

use Illuminate\Database\Seeder;
use App\Livescore;
use App\Tournament;
use App\User;

class LivescoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livescores')->delete();

        // scores
        for($i = 1; $i < 50; $i++) {
            Livescore::create([
                'tournament_id' => rand(1,6),
                'user_id' => rand(1,6),
                'golfcourse_id' => rand(1,6),
                'H1'=> rand(1,5), 'H2' => rand(1,5), 'H3'=> rand(1,5), 'H4'=> rand(1,5), 'H5'=> rand(1,5),'H6'=> rand(1,5),   
                'H7'=> rand(1,5), 'H8' => rand(1,5), 'H9'=> rand(1,5), 'H10'=> rand(1,5), 'H11'=> rand(1,5),'H12'=> rand(1,5),
                'H13'=> rand(1,5), 'H14' => rand(1,5), 'H15'=> rand(1,5), 'H16'=> rand(1,5), 'H17'=> rand(1,5),'H18'=> rand(1,5),
                'groupNo' => rand(1,10), 'teamNo' => rand(1,10)
            ]);
        }
    }
}
