<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'cellphone'     => $faker->randomNumber($nbDigits = 6).$faker->randomNumber($nbDigits = 4),
        'zipcode'       => $faker->randomNumber($nbDigits = 8),
        'state'         => $faker->word,
        'city'          => $faker->word,
        'address'       => $faker->streetName,
        'number'        => $faker->randomNumber($nbDigits = 4),
        'complement'    => $faker->word
    ];
});