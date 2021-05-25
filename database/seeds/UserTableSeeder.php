<?php

use App\User;

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

        foreach(range(1, 20) as $index)
        {
            User::create([
                'name'              => $faker->name('male'),
                'email'             => $faker->name(null) . "@gmail.com",
                'password'          => $faker->password(),
            ]);
        }
    }
}
