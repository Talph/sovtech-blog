<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SinglePostPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_single_post_page_reachable()
    {
        $post = Post::first();
        $response = $this->get('/posts/' . $post->slug);

        $response->assertStatus(200);
    }
}
