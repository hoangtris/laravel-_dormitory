<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
    	'id_role' => rand(1,4),
        'name' => $faker->name,
        'gender' => Arr::random(['Nam','Nữ']),
        'date_of_birth' => $faker->dateTimeBetween($startDate = '-40 years', $endDate = '-20 years'),
        'place_of_birth' => Arr::random(['TP. Hồ Chí Minh','Hà Nội','Hải Phòng', 'Nghệ An', 'Thanh Hóa', 'Quảng Bình']),
        'phone' => '0'.rand(11111111,999999999),
        'identity_card_number' => '0'.rand(11111111,99999999),
        'issued_on' => $faker->dateTimeBetween($startDate = '-15 years', $endDate = '-5 years'),
        'issued_at' => Arr::random(['TP. Hồ Chí Minh','Hà Nội','Hải Phòng', 'Nghệ An', 'Thanh Hóa', 'Quảng Bình']),
        'address' => $faker->text(50),
        'avatar' => 'https://placeimg.com/350/350/any?' . rand(1,1000),
        'username' => $faker->username,
        
        'email' => $faker->unique()->safeEmail,

        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
