<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Event::class, function (Faker $faker) {
    return [
        'name'          => 'Laravel and Coffee',
        'enabled'       => 1,
        'started_at'    => now(),
        'max_attendees' => 3,
        'street'        => 'City Coffee Shop',
        'city'          => 'Dublin',
        'description'   => "Let's drink coffee and learn Laravel together!"
    ];
});

$factory->state(\App\Event::class, 'incorrect_capitalization', [
    'name' => "have fun WITH the raspberry pi",
]);


