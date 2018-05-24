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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    $tempname = $faker->name;
    return [
        'name' => $tempname,
        'slug' => $tempname,
    ];
});

$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    $tempname = $faker->name;
    return [
        'name' => $tempname,
        'slug' => $tempname,
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Canada',
        'slug' => 'canada',
        'country_code' => 'ca'
    ];
});

$factory->define(App\Province::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Manitoba',
        'slug' => 'manitoba',
        'province_code' => 'mb',
        'country_id' => 1
    ];
});

$factory->define(App\SchoolDivision::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Pembina Trails School Division',
        'slug' => 'pembina-trails-school-division',
        'address' => '181 Henlow Bay',
        'city' => 'Winnipeg',
        'province_id' => 1,
        'country_id' => 1,
        'postal_code' => 'R3Y 1M7'
    ];
});

$factory->define(App\School::class, function (Faker\Generator $faker) {
    return [
        'school_division_id' => 1,
        'name' => 'Ryerson Elementary',
        'slug' => 'ryerson-elementary',
        'address' => '10 Ryerson Ave',
        'city' => 'Winnipeg',
        'province_id' => 1,
        'country_id' => 1,
        'postal_code' => 'R3T 3P9',
        'start_time_school' => $faker->dateTime('2014-02-25 08:35:00'),
        'start_time_lunch' => $faker->dateTime('2014-02-25 12:00:00'),
        'end_time_lunch' => $faker->dateTime('2014-02-25 13:00:00'),
        'end_time_school' => $faker->dateTime('2014-02-25 15:20:00'),
    ];
});
$factory->define(App\SchoolTeacher::class, function (Faker\Generator $faker) {
    return [
        'school_id' => 1,
        'user_id' => 1,
        'parking_stall' => '5C',
        'classroom' => '5C',
        'grade' => 7,
    ];
});
$factory->define(App\SubstituteTeacher::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'address' => '16 Somewhere Ave',
        'city' => 'Winnipeg',
        'province_id' => 3,
        'country_id' => 1,
        'postal_code' => 'R3T 3P9',
        'phone' => '204-555-9999'
    ];
});