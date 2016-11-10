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
$factory->define(App\Fan::class, function (Faker\Generator $faker) {
    return [
        'user_id'       => function () {
            return factory(App\User::class)->create()->id;
        },
        'club_id'   => 1,
        'name'      => $faker->name,
        'cpf'       => $faker->randomNumber($nbDigits = 6).$faker->randomNumber($nbDigits = 5),
        'sex'       => $faker->boolean,
        'birthday' => $faker->dateTimeThisCentury($max = 'now')->format('d/m/Y'),
    ];
});