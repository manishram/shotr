<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlApiControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    // Test URL Shortner API

    public function testUrlShortnerApiForValidUrl()
    {
        $testing_endpoint = '/api/v1/shorten-url';

        $request_body_valid_url = ["destination"  => "https://example.com"];

        $response_body_valid_url = $this->json('POST', $testing_endpoint, $request_body_valid_url);

        $response_body_valid_url->assertStatus(200);

        $response_body_valid_url->assertJsonStructure([
            
                "destination",
                "slug",
                "updated_at",
                "created_at",
                "id",
                "shortened_url"
        ]);
    }

    public function testUrlShortnerApiForInvalidUrl()
    {
        $testing_endpoint = '/api/v1/shorten-url';

        $request_body_invalid_url = ["destination"  => "example"];

        $response_body_invalid_url = $this->json('POST', $testing_endpoint, $request_body_invalid_url);

        $response_body_invalid_url->assertStatus(422);

        $response_body_invalid_url->assertJsonStructure(
            ["message",
            "errors" => ["destination"]]
        );
        }

    public function testUrlShortnerApiForEmptyUrl()
    {
        $testing_endpoint = '/api/v1/shorten-url';
        $request_body_empty_url = ["destination"  => ""];

        $request_body_empty_url = $this->json('POST', $testing_endpoint, $request_body_empty_url);

        $request_body_empty_url->assertStatus(422);

        $request_body_empty_url->assertJsonStructure(
            ["message",
            "errors" => ["destination"]]
        );
    }
}
