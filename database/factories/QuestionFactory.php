<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Question;
use Faker\Generator as Faker;
use App\Category;
use App\User;

$factory->define(Question::class, function (Faker $faker) {
	$title = $faker->unique()->sentence;
    return [
        'title'			=>	$title,
        'slug'			=>	str_slug($title),
        'content'		=>	$faker->text,
        'category_id'	=>	function(){ return Category::all()->random(); },
        'user_id'		=>	function(){ return User::all()->random(); }
    ];
});
