<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $categories = array(
        'Bacon frankfurter',
        'Strip steak shoulder',
        'Andouille corned beef tail'
    );

    $description = array(
        "Spicy jalapeno tri-tip dolore pork ball tip, chuck labore qui short loin. Ham minim ball tip excepteur",
        "Porchetta rump ad ut labore sint nostrud prosciutto ut consectetur eiusmod excepteur fatback nisi.",
        "Commodo anim kielbasa aliqua pork loin tri-tip flank jerky veniam hamburger picanha eu"
    );
    
    return [
        'name' => $categories[rand(0, count($categories) - 1)],
        'slug' => '',
        'description' => $description[rand(0, count($description) - 1)]
    ];
});
