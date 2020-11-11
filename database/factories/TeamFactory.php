<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        //
        'Nama' => $faker->name,
        'Kode' => $faker->name,
        'Foto' => $faker->name,
        'Sosmed' => $faker->name,
    ];
});
