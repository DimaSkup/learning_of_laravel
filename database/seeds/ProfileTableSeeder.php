<?php

use App\Profile;
use App\User;

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index)
        {
            $profile = new Profile;

            $profile->telephone = $faker->phoneNumber;
            $profile->url = $faker->url;


            $user = User::find($index);
            $user->profile()->save($profile);
        }
    }
}
