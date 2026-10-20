<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_all_public_pages_return_successful_response(): void
    {
        $routes = ['/product', '/how-it-works', '/solutions', '/integrations', '/contact', '/policy'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_duplicate_routes_redirect_permanently(): void
    {
        $this->get('/vocabot')->assertStatus(301)->assertRedirect('/');
        $this->get('/sectors')->assertStatus(301)->assertRedirect('/solutions');
        $this->get('/policies')->assertStatus(301)->assertRedirect('/policy');
    }
}
