<?php

use Faker\Generator as Faker;

$factory->define(App\Film::class, function (Faker $faker) {
    $genres = array();
    for ($i = 0; $i < $faker->numberBetween(1, 5); $i++) {
        $genres[] = $faker->word(1);
    }
    $name = substr($faker->sentence(2), 0, -1);
    $slug = str_slug($name, '-');
    return [
        'name' => $name,
        'slug' => $slug,
        'description' => $faker->paragraph(6),
        'release_date' => $faker->dateTimeBetween('-5 years'),
        'rating' => $faker->numberBetween(1, 5),
        'ticket_price' => $faker->randomNumber(3),
        'country' => $faker->country,
        'genre' => implode(',', $faker->shuffleArray($genres)),
        'photo' => $faker->imageUrl()
    ];
});
