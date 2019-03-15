<?php

use App\BlogEntry;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(BlogEntry::class, function (Faker $faker) {
    return [
        'title' => 'Ground round biltong bacon pastrami',
        'content' => 'Bresaola cow chicken burgdoggen',
        'online' => true,
    ];
});
