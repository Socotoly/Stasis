<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'end_date' => \Carbon\Carbon::now()->addMonth()->toDateString()
    ];
});

$factory->define(App\TaskList::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'parent_id' => function(){
            return factory("App\Department")->create()->id;
        },
        'parent_type' => "App\Department",
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'task_list_id' => function(){
            return factory('App\TaskList')->create()->id;
        },
        'title' => $faker->sentence,
        'description' => $faker->text
    ];
});

$factory->define(App\TagItem::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});