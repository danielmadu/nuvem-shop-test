<?php
use Faker\Generator as Faker;

$factory->define(\App\Domains\Superheros\SuperheroesImage::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl(),
        'superhero_id' => random_int(1, 3000),
    ];
});
