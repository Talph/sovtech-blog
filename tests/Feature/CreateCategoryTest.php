<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_category()
    {
        $response = $this->post('/api/categories',[
            'name' => $this->faker->word,
            'description' => $this->faker->sentence(10),
        ]);

        $response->assertStatus(200);
    }
}
