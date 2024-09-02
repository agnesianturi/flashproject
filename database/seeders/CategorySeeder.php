<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category as CategoryModel;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $categories = [
            ['id' => 1,
            'name' => 'Regional'],

            ['id' => 2,
            'name' => 'Law and Society'],

            ['id' => 3,
            'name' => 'Technology'],

            ['id' => 4,
            'name' => 'Entertainment'],
        ];

        foreach($categories as $c){
            CategoryModel::create($c);
        }

    }
}
