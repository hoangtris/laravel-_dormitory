<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;


$factory->define(Room::class, function (Faker $faker) {
    return [
        //
        'id_type' => rand(1,6),
        'id_area' => rand(1,5),
        'capacity' => rand(1,8),
        'price' => Arr::random([500000,750000,800000,850000,980000,1000000,1150000,1200000,1350000,1570000,2000000,2500000,3000000,3500000,3750000,4200000,4800000]),

        'duration' => 30,
        
        'wc'=>rand(1,3),
        'security'=>$faker->text(30),
        'convenient'=>$faker->text(30),

        'image'=>'https://placeimg.com/350/350/any?' . rand(1, 1000),

        'short_description' => $faker->text(100),
        'long_description' => $faker->paragraph,
        'note'=>$faker->paragraph,
    ];
});
