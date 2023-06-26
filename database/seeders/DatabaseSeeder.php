<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $tags = \App\Models\Tag::factory(20)->create();

        $articles = \App\Models\Article::factory(30)->create();

        //collections
        $tags_id = $tags->pluck('id');
        // $a = $tags_id->all();
        // var_dump($a);
        // die();

        $articles->each(function($article) use ($tags_id) {
            $article->tags()->attach($tags_id->random(1));

            \App\Models\Comment::factory(3)->create([
                'article_id' => $article->id
            ]);

            \App\Models\State::factory(1)->create([
                'article_id' => $article->id
            ]);
        });
    }
}
