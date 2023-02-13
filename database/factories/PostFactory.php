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
        $title = rtrim($this->faker->sentence(random_int(5,10)), '.');
        $slug = str::slug($title);
        $postBody = collect($this->faker->paragraphs(random_int(3,7), true))
            ->map(static fn($item) => $item)->toArray();

        $postBody = implode($postBody);

        return [
            'title' => $title,
            'slug' => $slug,
            'post_body' => $postBody,
            'sub_title' => $title,
            'short_description' => trim($postBody, 65),
            'met_desc' => trim($postBody, 65),
            'posted_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'is_published' => (bool) random_int(0,1),
        ];
    }

}
