<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// фасад
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory`s corresponding model
     *
     * @var string
     */
    // protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6, true);
        $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0, -1);
        return [
            'title' => $title,
            'body' => $this->faker->paragraph(100, true),
            'slug' => $slug,
            'img' => 'https://via.placeholder.com/300x250?text=300x250+MPU',
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
            'published_at' => Carbon::now(),
        ];
    }
}
