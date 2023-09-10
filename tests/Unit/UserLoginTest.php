<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testUserCanLogin()
    {
        $user = User::factory()->create(); // Create a user for testing

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password', // Replace with the user's password
        ]);

        $response->assertRedirect('/home'); // Change to your post-login redirect
        $this->assertAuthenticatedAs($user);
    }
}
