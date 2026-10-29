<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders_with_active_submit_button_and_error_containers(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('id="contactForm"', false);
        $response->assertSee('id="submitBtn"', false);
        $response->assertDontSee('id="submitBtn" disabled', false);
        $response->assertSee('id="error-firstName"', false);
        $response->assertSee('id="error-lastName"', false);
        $response->assertSee('id="error-email"', false);
        $response->assertSee('id="error-company"', false);
        $response->assertSee('id="error-interest"', false);
        $response->assertSee('id="error-message"', false);
        $response->assertSee('id="formStatus"', false);
        $response->assertSee('js/contact.js', false);
    }

    public function test_submits_successfully_with_valid_data(): void
    {
        $response = $this->postJson(route('contact.submit'), [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@example.com',
            'company' => 'Acme Corp',
            'interest' => 'Book a Demo',
            'phone' => '+1234567890',
            'message' => 'I would like a demo.',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);
        $this->assertDatabaseHas('contact_submissions', [
            'email' => 'john@example.com',
            'subject' => 'Book a Demo',
        ]);
    }

    public function test_validates_required_fields_and_formats(): void
    {
        $response = $this->postJson(route('contact.submit'), []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'interest', 'message']);

        // Invalid email
        $response = $this->postJson(route('contact.submit'), [
            'email' => 'invalid-email',
            'interest' => 'Book a Demo',
            'message' => 'Test',
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);

        // Phone format (should fail regex)
        $response = $this->postJson(route('contact.submit'), [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@example.com',
            'interest' => 'Book a Demo',
            'message' => 'Test',
            'phone' => 'abc123',
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['phone']);
    }
}
