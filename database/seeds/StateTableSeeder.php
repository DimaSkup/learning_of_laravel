<?php

use App\State;
use App\User;

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
            $stateName = $faker->state;

            $statesWords = explode(" ", $stateName);
            if (count($statesWords) != 1)
            {
                $abbreviation = strtoupper($statesWords[0][0].$statesWords[1][0]);
            }
            else
            {
                $abbreviation = strtoupper($stateName[0].$stateName[1]);
            }

            $state = new State;

            $state->name = $stateName;
            $state->abbreviation = $abbreviation;
            $state->save();

            // set a user as an attendee to this state
            $user = User::find($index);
            $user->state_id = $state->id;
            $user->save();

            /*
             State::create([
                'name'              => $state,
                'abbreviation'      => $abbreviation,
            ]);
             */
        }
    }
}
