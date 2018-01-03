<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'A Student User';
        $role_student->save();

        $role_administrator = new Role();
        $role_administrator->name = 'admin';
        $role_administrator->description = 'A Admin User';
        $role_administrator->save();
    }
}
