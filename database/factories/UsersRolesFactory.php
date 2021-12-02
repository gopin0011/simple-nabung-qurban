<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\UsersRoles;
use App\Users;
use App\Roles;
use Illuminate\Support\Str;
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

$factory->define(UsersRoles::class, function (Faker $faker) {
    $roles_id = Roles::where('name', 'ROLE_ADMIN')->first();
    $users_id = Users::where('id', 1)->first();

    return [
        'roles_id' => $roles_id,
        'users_id' => $users_id,
        'created_at' => now(),
    ];
});
