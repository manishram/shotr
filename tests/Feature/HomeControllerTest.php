<?php

namespace Tests\Feature;

use App\Models\Url;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    
    public function testHomePage()
    {
        // Create a user
        $user = User::factory()->create();

        // Create some URLs associated with the user
        $myUrls = Url::factory()->count(3)->create([
            'created_by' => $user->id,
        ]);

        // Create some latest URLs
        $latestUrls = Url::factory()->count(5)->create();

        // Authenticate the user
        $this->actingAs($user);

        // Call the getUrls method
        $response = $this->get(route('home'));
        
        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the view contains the latest URLs
        // $response->assertViewHas('latestUrls', $latestUrls);
        
        // Assert that the view contains user's URLs
        // $response->assertViewHas('myUrls', $myUrls);
    }
}