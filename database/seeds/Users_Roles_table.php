<?php

use Illuminate\Database\Seeder;
use App\UsersRoles;

class Users_Roles_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsersRoles::class, 1)->create();
    }
}
