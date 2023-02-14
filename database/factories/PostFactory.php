<?php

namespace Database\Factories;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $title = $this->faker->words(6, true);
        return [
            'user_id' => 1,
            'title' => $title,
            'subtitle' => $this->faker->words(4, true),
            'meta_desc' => $this->faker->sentence(15),
            'seo_keywords' => $this->faker->words(3, true),
            'content' => $this->faker->sentence(150),
            'posted_at' => now(),
            'is_published' => (bool) random_int(0,1),
            'slug' => str::slug($title),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
