<?php

use App\State;

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('states')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index)
        {
            $state = $faker->state;

            $statesWords = explode(" ", $state);
            if (count($statesWords) != 1)
            {
                $abbreviation = strtoupper($statesWords[0][0].$statesWords[1][0]);
            }
            else
            {
                $abbreviation = strtoupper($state[0].$state[1]);
            }

            State::create([
                'name'              => $state,
                'abbreviation'      => $abbreviation,
            ]);
        }
    }
}
