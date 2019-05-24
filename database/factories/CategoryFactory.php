<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$name = $faker->unique()->word;
    return [
    	'name'	=>	$name,
    	'slug'	=>	str_slug($name)
    ];
});
