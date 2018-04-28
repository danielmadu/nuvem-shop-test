<?php
use Faker\Generator as Faker;

$factory->define(\App\Domains\Superheros\Superhero::class, function (Faker $faker) {
    return [
        'nickname' => $faker->firstName,
        'real_name' => $faker->name,
        'origin_description' => $faker->text(300), // secret
        'superpowers' => $faker->text(100),
        'catch_phrase' => $faker->text(100),
    ];
});
