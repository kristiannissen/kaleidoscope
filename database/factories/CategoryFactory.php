<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $categories = array(
        'Bacon frankfurter',
        'Strip steak shoulder',
        'Andouille corned beef tail'
    );
    
    return [
        'name' => $categories[rand(0, count($categories) - 1)],
        'slug' => ''
    ];
});
