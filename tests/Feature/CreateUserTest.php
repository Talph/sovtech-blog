<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_user()
    {
        Session::start();

        $response = $this->post('/register',[
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'password' => 'password',
            'password_confirmation' => 'password',
            'email' => $this->faker->safeEmail(),
            'email_verified' => now(),
            'remember_token' => Str::random(10),
            '_token' => csrf_token()
        ]);

        $response->assertStatus(302);
    }
}
