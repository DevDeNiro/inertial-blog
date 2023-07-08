<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'user_id' => User::all()->random()->id,

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            $posts = Post::factory()->count(3)->create();
            foreach ($posts as $post) {
                $category->posts()->attach($post);
            }
        });
    }
}
