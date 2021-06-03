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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('events')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        foreach(range(1, 50) as $index)
        {
            $enabled = $faker->boolean();

            Event::create([
                'name'          => $faker->sentence(2),
                'city'          => $faker->city,
                'street'        => $faker->company,
                'description'   => $faker->paragraphs(1, true),
                'enabled'       => $enabled,
                'activated'     => ($enabled) && $faker->boolean(),
                'started_at'    => time(),
            ]);
        }
    }
}
