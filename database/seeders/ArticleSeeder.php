<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Article as ArticleModel;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 10; $i++){
            ArticleModel::create([
                'user_id' => $faker->numberBetween(1, 20),
                'category_id' => $faker->numberBetween(1, 4),
                'title' => $faker->title(),
                'image' => 'images/'.$faker->numberBetween(1,2).'.jpg',
                'description' => $faker->text(),
            ]);
        }

    }
}
