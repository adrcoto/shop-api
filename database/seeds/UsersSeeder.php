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
        $admin->phone = "0727576572";
        $admin->password = Hash::make("sms123");
        $admin->status = User::STATUS_ACTIVE;
        $admin->role_id = Role::ROLE_ADMIN;

        $admin->save();

        $faker = fk\Factory::create();



        $this->addUser("Adrian Coto", "adrcoto@yahoo.com", $faker->phoneNumber, 'adrcoto@yahoo.com');
        $this->addUser("Gidu Liviu", "liviu18@gmail.com", $faker->phoneNumber, 'liviu18@gmail.com');
        $this->addUser("Tuta mihai", "tuta_mihai14@yahoo.com", $faker->phoneNumber, 'tuta_mihai14@yahoo.com');
        $this->addUser("Brabete Florin", "florin18@yahoo.com", $faker->phoneNumber,'florin18@yahoo.com');
        $this->addUser("Lica Andrei", "lica_valentin@yahoo.com", $faker->phoneNumber, 'lica_valentin@yahoo.com');
        $this->addUser("Dinca Mihai", "Mihai_Parkour@yahoo.com", $faker->phoneNumber, 'Mihai_Parkour@yahoo.com');

        for ($i = 0; $i <= 25; $i++)
            $this->addUser($faker->name, $faker->email, $faker->phoneNumber, 'orange123');

    }

    public function addUser($name, $email, $phone, $password){
        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->phone = substr($phone, 0, 10);
        $user->password = Hash::make($password);
        $user->status = User::STATUS_ACTIVE;
        $user->role_id = Role::ROLE_USER;

        $user->save();
    }
}
