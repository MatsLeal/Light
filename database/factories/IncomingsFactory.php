<?php

use Faker\Generator as Faker;

$factory->define(App\Incoming::class, function (Faker $faker) {
    return [
	'amount' => $faker->integer,
	'description' => $faker->text,
	'user_id' => 0
    ];
});
