<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => Post::STATUS_PUBLISHED,
            'thumbnail' => 'https://picsum.photos/640/480/?random',
            'smallThumbnail' => 'https://picsum.photos/320/240/?random',
            'slug' => $this->faker->slug,
            'published_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'vues_count' => $this->faker->numberBetween(0, 1000),
            'user_id' => User::all()->random()->id,
        ];
    }
}
