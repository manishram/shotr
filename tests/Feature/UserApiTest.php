<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testUserLogout()
{
    $user = User::factory()->create();
    $this->actingAs($user); // Authenticate the user

    $response = $this->post('/logout');

    $response->assertRedirect('/'); // Check if logout redirects to the homepage
    $this->assertGuest(); // Check if the user is no longer authenticated
}
}
