<?php

use App\Event;

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index)
        {
            Event::create([
                'name'          => $faker->sentence(2),
                'city'          => $faker->city,
                'street'        => $faker->company,
                'description'   => $faker->paragraphs(1, true),
                'enabled'       => $faker->boolean(),
                'started_at'    => time(),
            ]);
        }
    }
}
