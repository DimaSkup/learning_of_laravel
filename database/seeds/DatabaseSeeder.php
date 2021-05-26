<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('EventTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('ProfileTableSeeder');
        $this->call('StateTableSeeder');
    }
}
