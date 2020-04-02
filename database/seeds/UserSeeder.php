<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 3; $i++) {
        $newUser = new User;
        $newUser->name = $faker->name;
        $newUser->email = $faker->email;
        $newUser->password = hash::make("esempio");
        $newUser->save();
      }
    }
}
