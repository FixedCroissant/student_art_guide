<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Find roles.
      $role_student = Role::where('name', 'student')->first();
      $role_administrator  = Role::where('name', 'admin')->first();

      //Create Student User.
      $student = new User();
      $student->name = 'Employee Name';
      $student->email = 'employee@example.com';
      $student->password = bcrypt('password');
      $student->save();

      //Assign Role.
      $student->roles()->attach($role_student);

      //Create Admin
      $admin = new User();
      $admin->name = 'Admin Name';
      $admin->email = 'admin@example.com';
      $admin->password = bcrypt('password');
      $admin->save();

      //Assign Role.
      $admin->roles()->attach($role_administrator);
    }
}
