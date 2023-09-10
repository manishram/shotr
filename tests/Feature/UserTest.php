<?php

namespace Tests\Feature;

use App\Models\Url;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testUserAttributes()
    {
        // Create a new User instance
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Assert that the User instance has the expected attributes
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        
    }

    public function testUserUrlRelationship()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a URL associated with the user
        $url = Url::factory()->create([
            'created_by' => $user->id,
        ]);

        // Assert that the User is associated with the URL
        $this->assertEquals($user->id, $url->created_by);
    }

}
