<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@tasks.com";
        $admin->password = Hash::make("admin");
        $admin->status = User::STATUS_ACTIVE;
        $admin->role_id = Role::ROLE_ADMIN;

        $user = new User();
        $user->name = "Adrian Coto";
        $user->email = "adrcoto@yahoo.com";
        $user->password = Hash::make("orange123");
        $user->status = User::STATUS_ACTIVE;
        $user->role_id = Role::ROLE_USER;

        $admin->save();
        $user->save();

    }
}
