<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessControlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testAuthenticatedUserCanAccessProtectedRoute()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Authenticate the user

        $response = $this->get('/home'); // Replace with your protected route URL

        $response->assertStatus(200); // Check if the user can access the protected route
    }

    public function testGuestCannotAccessProtectedRoute()
    {
        $response = $this->get('/home'); // Replace with your protected route URL

        $response->assertRedirect('/login'); // Change to your login route
    }
}
