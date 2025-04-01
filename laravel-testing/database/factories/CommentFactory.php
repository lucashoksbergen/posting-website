<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Checks if users exist, and uses factory to create a new one if they don't
        if (User::count() == 0) {
            User::factory()->create();
        }
        if (Post::count() == 0) {
            Post::factory()->create();
        }

        // gets all existing ids
        $userIDList = User::all()->pluck('id')->toArray();
        $postIDList = Post::all()->pluck('id')->toArray();

        // Assigns the comment a random user_id from existing users
        $userID = $this->faker->randomElement($userIDList);
        $postID = $this->faker->randomElement($postIDList);
        return [
            'content' => fake()->text(),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => $userID,
            'post_id' => $postID,
        ];
    }
}
