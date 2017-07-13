<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        * Fill data to Bets Table by Query Builder
        */
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('bets')->insert([
                'user_id' => $faker->numberBetween($min = 147, $max = 157),
                'match_id' => 36,
                'place_bet' =>$faker->numberBetween($min = 0, $max = 2),
                'betting_money' => $faker->numberBetween($min=100, $max=400),
                'bet_at' => '2017-07-10 19:00:00',
            ]);
        }
    }
}
