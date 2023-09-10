<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testUserCanLogout()
    {
        $user = User::factory()->create(); // Create a user for testing
        $this->actingAs($user); // Authenticate the user

        $response = $this->post('/logout');

        $response->assertRedirect('/'); // Change to your post-logout redirect
        $this->assertGuest();
    }
}
