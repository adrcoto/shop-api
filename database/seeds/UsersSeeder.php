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


        $this->addUser("Adrian Coto", "adrcoto@yahoo.com", '0727576572', 'adrcoto@yahoo.com');
        $this->addUser("Gidu Liviu", "liviu18@gmail.com", $this->generateNumber(), 'liviu18@gmail.com');
        $this->addUser("Tuta mihai", "tuta_mihai14@yahoo.com", $this->generateNumber(), 'tuta_mihai14@yahoo.com');
        $this->addUser("Brabete Florin", "florin18@yahoo.com", $this->generateNumber(), 'florin18@yahoo.com');
        $this->addUser("Lica Andrei", "lica_valentin@yahoo.com", $this->generateNumber(), 'lica_valentin@yahoo.com');
        $this->addUser("Dinca Mihai", "Mihai_Parkour@yahoo.com", $this->generateNumber(), 'Mihai_Parkour@yahoo.com');

        for ($i = 0; $i <= 25; $i++)
            $this->addUser($faker->name, $faker->email, $this->generateNumber(), 'orange123');

    }

    public function generateNumber()
    {
        $third = array('2', '3', '4', '5', '6', '7', '8');
        $possible = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $number = '07';

        $fromThird = array_rand($third, 1);

        $number .= $third[$fromThird];

        $fromPossible = array_rand($possible, 7);

        foreach ($fromPossible as $picked)
            $number .= $possible[$picked];

        return $number;
    }

    public function addUser($name, $email, $phone, $password)
    {
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
