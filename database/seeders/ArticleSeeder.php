<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;

class ArticleSeeder extends Seeder
{

    protected function seedData(): array {
        // 
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/private/data/article_seeder_data.json');

        $articles = json_decode(
            file_get_contents($path),
            true
        );

        foreach ($articles as $article) {
            Article::publish(
                user_id: $article['user_id'],
                title: $article['title'],
                subtitle: $article['subtitle'],
                content: $article['content'],
                img: $article['img'],
            );
        //besok RUNNINg seeder
        }
    }
}
