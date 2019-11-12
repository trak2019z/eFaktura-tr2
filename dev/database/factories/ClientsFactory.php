<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    static $password;

    return [
		'firstName' => $faker->name,
		'lastName' => $faker->name,
		'name' => $faker->company,
		'town' => $faker->address,
		'postcode' => '36-145',
		'postcode_town' => $faker->address,
		'property_number' => '23',
    ];
});

