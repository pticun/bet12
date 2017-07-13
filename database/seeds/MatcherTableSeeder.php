<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MatcherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('matches')->insert([
	            'home_team' => $faker->city,
	            'away_team' => $faker->city,
	            'home_rate' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0.3, $max = 1.8),
	            'draw_rate' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0.3, $max = 1.8),
	            'away_rate' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0.3, $max = 1.8),
	            'start_at' => '2017-07-16 19:00:00',
	            'end_at' => '2017-07-16 22:30:00',
	            'close_at' => '2017-07-16 15:20:00',
	            'public' => '0',
	        ]);
        }
    }
}
