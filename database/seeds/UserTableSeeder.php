<?php

use App\User;
use App\Event;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('profiles')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index)
        {
            $user = new User;

            // user's personal data
            $user->name = $faker->name('male');
            $user->email = $faker->name(null) . "@gmail.com";
            $user->password = $faker->password();

            // relations with a user
            $eventsIds = [];
            $eventsCount = 0;
            while ($eventsCount < random_int(0, 3))
            {
                // events ids
                $eventsIds[] = random_int(1, 50);
                // знайти events по events ids and enabled == true
                _HERE_
                $eventsCount++;
            };

            if ($eventsIds != [] && $user->id)
            {
                $user->events()->sync($eventsIds);
            }

            $user->save();


            /*
            User::create([
                'name'              => $faker->name('male'),
                'email'             => $faker->name(null) . "@gmail.com",
                'password'          => $faker->password(),
            ]);
            */
        }
    }
}
