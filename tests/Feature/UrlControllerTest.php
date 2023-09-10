<?php

namespace Tests\Feature;

use App\Models\Url;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UrlControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // use RefreshDatabase;
    
    public function testStoreUrl()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/store', [
            'destination' => 'https://example.com',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('urls', [
            'destination' => 'https://example.com',
            'created_by' => $user->id,
        ]);
        
        $response->assertSessionHas('success');
    }

    // Test redirecting to a valid URL
    public function testRedirectUrl()
    {
        $url = Url::factory()->create(); // Create a URL in the database

        $response = $this->get(route('url.redirect', ['slug' => $url->slug]));

        $response->assertStatus(302); // Check for a redirect
    }

    // Test deleting a URL
    public function testDeleteUrl()
    {

    // Create a user and a URL associated with that user
    $user = User::factory()->create();
    $url = Url::factory()->create(['created_by' => $user->id]);

    // Authenticate the user
    $this->actingAs($user);

    // Attempt to delete the URL
    $response = $this->get(route('url.delete', ['id' => $url->id]));

    // Check for a redirect
    $response->assertStatus(302);

    // Check if the URL has been deleted from the database
    $this->assertDatabaseMissing('urls', ['id' => $url->id]);
    }
    public function testNonExistingSlug(){
        // Define a non-existing slug
        $nonExistingSlug = 'non-existing-slug';

        // Make a GET request to the URL redirect route with the non-existing slug
        $response = $this->get(route('url.redirect', ['slug' => $nonExistingSlug]));

        // Assert that the response has a 404 status code
        $response->assertStatus(404);
    }
}
