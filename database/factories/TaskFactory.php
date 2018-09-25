<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    $userid = App\User::inRandomOrder()->first()->id;
    return [
        'user_id' => $userid,
        'title' => $faker->sentence(3, true)
    ];
});
