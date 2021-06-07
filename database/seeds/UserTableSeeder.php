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
        DB::table('event_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index)
        {
            $user = new User;

            // user's personal data
            $user->name = $faker->name('male');
            $user->email = $faker->name(null) . "@gmail.com";
            $user->password = $faker->password();

            $user->save();

            // creation of relations between a user and random events
            // here we'll find an events by random id and enabled == true
            $events = Event::where('enabled', true)
                            ->inRandomOrder()
                            ->limit(random_int(0, 5))
                            ->get();
            if ($events)
            {
                $user->events()->attach($events);
            }




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
