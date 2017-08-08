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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title'     => $faker->unique()->sentence,
        'subtitle'  => $faker->sentence,
        'price'     => $faker->randomFloat(2,5,500),
        'author_id' => $faker->numberBetween(1,45)
     ];
});


$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name'    => $faker->unique()->name,
        'birth_date' =>  date('Y-m-d',$faker->dateTime->getTimestamp()),
        'gender'    => $faker->boolean ? 'M' : 'F'
    ];
});