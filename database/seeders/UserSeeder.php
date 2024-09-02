<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 20; $i++){
            UserModel::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'role' => $faker->randomElement(['Admin', 'User']),
                'password' => Hash::make('123'),
            ]);
        }

    }
}
