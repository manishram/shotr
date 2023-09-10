<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function testLandingPage()
    {
        $response = $this->get(route('landing.page'));

        // Assert that the response is successful
        $response->assertStatus(200);

    }
}
