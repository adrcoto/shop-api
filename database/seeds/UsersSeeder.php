<?php

use App\Role;
use App\User;
use Faker as fk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


/**
 * Class UsersSeeder
 */
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

        $admin->save();

        $faker = fk\Factory::create();

        $PASSWORD = 'sms';

        $this->addUser("Adrian Coto", "adrcoto@yahoo.com", $PASSWORD);
        $this->addUser("Gidu Liviu", "liviu18@gmail.com", $PASSWORD);
        $this->addUser("Tuta mihai", "tuta_mihai14@yahoo.com", $PASSWORD);
        $this->addUser("Brabete Florin", "florin18@yahoo.com", $PASSWORD);
        $this->addUser("Lica Andrei", "lica_valentin@yahoo.com", $PASSWORD);
        $this->addUser("Dinca Mihai", "Mihai_Parkour@yahoo.com", $PASSWORD);

        for ($i = 0; $i <= 25; $i++)
            $this->addUser($faker->name, $faker->email, $PASSWORD);

    }

    public function addUser($name, $email, $password){
        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->status = User::STATUS_ACTIVE;
        $user->role_id = Role::ROLE_USER;

        $user->save();
    }
}
