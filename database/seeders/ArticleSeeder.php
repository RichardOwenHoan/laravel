<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Test Article 1',
            'description' => 'Test Article 1 Description',
            'user_id' => 1,
        ]);

        Article::create([
            'title' => 'Test Article 2',
            'description' => 'Test Article 2 Description',
            'user_id' => 2,
        ]);

        Article::create([
            'title' => 'Test Article 3',
            'description' => 'Test Article 3 Description',
            'user_id' => 3,
        ]);

        Article::create([
            'title' => 'Test Article 4',
            'description' => 'Test Article 4 Description',
            'user_id' => 1,
        ]);

        Article::create([
            'title' => 'Test Article 5',
            'description' => 'Test Article 5 Description',
            'user_id' => 2,
        ]);
    }
}
