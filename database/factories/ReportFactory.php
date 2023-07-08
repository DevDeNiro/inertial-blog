<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'comment_id' => Comment::all()->random()->id,
            'reason' => $this->faker->paragraph,
        ];
    }

    public function forComment($comment_id): Factory
    {
        return $this->state(function (array $attributes) use ($comment_id) {
            return [
                'comment_id' => $comment_id,
            ];
        });
    }
}
