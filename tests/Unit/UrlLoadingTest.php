<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiDocTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function testLandingPageLoading()
    {
        $response = $this->get(route('landing.page'));
        $response->assertStatus(200);

    }

    public function testApiDocPageIsLoading()
    {
        $response = $this->get('/api-doc');

        $response->assertStatus(200);
    }
    public function testLoginPageIsLoading()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function testRegisterPageIsLoading()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    public function testPasswordResetPageIsLoading()
    {
        $response = $this->get('/password/reset');

        $response->assertStatus(200);
    }

    
}
