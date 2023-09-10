<?php

namespace Tests\Feature;

use App\Models\Url;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

    public function testUrlAttributes()
    {
        // Create a new URL instance
        $url = Url::factory()->create([
            'destination' => 'https://example.com',
            'slug' => 'abc123',
            'views' => 10,
        ]);

        // Assert that the URL instance has the expected attributes
        $this->assertEquals('https://example.com', $url->destination);
        $this->assertEquals('abc123', $url->slug);
        $this->assertEquals(10, $url->views);
    }

    public function testUrlUserRelationship()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a URL associated with the user
        $url = Url::factory()->create([
            'created_by' => $user->id,
        ]);

        // Assert that the URL is associated with the user
        $this->assertEquals($user->id, $url->created_by);
    }
}
