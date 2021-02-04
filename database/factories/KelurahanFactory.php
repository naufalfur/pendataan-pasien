<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Kelurahan::class, function (Faker $faker) {
    return [
        //
        'nama_kelurahan' => $faker->words(3, true),
        'nama_kecamatan' => $faker->words(3, true),
        'nama_kota' => $faker->words(3, true)
    ];
});
