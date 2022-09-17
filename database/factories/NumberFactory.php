<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Number;
use Faker\Generator as Faker;

$factory->define(Number::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'father_name' => $faker->lastName,
        'phone_type_id' => 1,
        'phone' => $faker->phoneNumber,
        'kathedra_id' => rand(1,2),
        'battalion_id' => rand(1,5),
        'rota_id' => rand(1,2),
        'service_id' => rand(1,2),
        'position_id' => rand(1,5),
        'rank_id' => rand(1,5),
    ];
});
