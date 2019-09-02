<?php

use Click\Elemental\Models\Element;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

/** @var Factory $factory */

$factory->define(Element::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid
    ];
});
