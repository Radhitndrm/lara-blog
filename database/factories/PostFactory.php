<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     * 
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence(mt_rand(3,5)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5,30)))
            ->map(fn($p) => "<p>$p</p>")
            ->implode(''),
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,3)
        ];
    }
}
