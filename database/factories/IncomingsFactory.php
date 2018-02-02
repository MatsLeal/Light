<?php

use Faker\Generator as Faker;

$factory->define(App\Incoming::class, function (Faker $faker) {
    return [
      'amount' => $faker->numberBetween(1,200),
      'description' => $faker->sentence(5,true),
      'user_id' => 0
    ];
});
