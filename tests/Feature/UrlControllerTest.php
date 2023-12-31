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
    use RefreshDatabase;

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
        // Create a URL in the database
        $url = Url::factory()->create(); 

        $response = $this->get(route('url.redirect', ['slug' => $url->slug]));

        // Check for a redirect
        $response->assertStatus(302); 
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
    
    public function testNonDuplicateSlug(){
        
        
        do {
            $user = User::factory()->create();
        } while (Url::where('created_by', $user->id)->exists());

        $this->actingAs($user);

        // Create a record in the database with an auto-generated slug
        $this->post('/store', [
            'destination' => 'https://example.com',
        ]);

        // Create another record in the database with an auto-generated slug
        $this->post('/store', [
            'destination' => 'https://example.com',
        ]);
        
        // Assert that records be added successfully
        $this->assertEquals(2, (Url::where([
            'destination' => 'https://example.com',
            'created_by' => $user->id,
        ])->count()));

        // Get the slug of the first record
        $slug1 = Url::where(['destination' => 'https://example.com',
        'created_by' => $user->id])->orderBy('created_at', 'desc')->skip(1)->first()->slug;

        // Get the slug of the second record
        $slug2 = Url::where(['destination' => 'https://example.com',
        'created_by' => $user->id])->orderBy('created_at', 'desc')->first()->slug;

        // Assert that both records have unique slugs
        $this->assertNotEquals($slug1, $slug2);
            
    }
}
