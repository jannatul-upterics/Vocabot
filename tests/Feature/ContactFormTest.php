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
        $response->assertSee('novalidate', false);
        $response->assertSee('jquery', false);
        $response->assertSee('id="submitBtn"', false);
        $response->assertDontSee('id="submitBtn" disabled', false);
        $response->assertSee('id="error-firstName"', false);
        $response->assertSee('id="error-lastName"', false);
        $response->assertSee('id="error-email"', false);
        $response->assertSee('id="error-phone"', false);
        $response->assertSee('id="error-interest"', false);
        $response->assertSee('id="error-message"', false);
        $response->assertSee('id="formStatus"', false);
        $response->assertSee('js/contact.js', false);
    }

    public function test_homepage_renders_with_contact_form_and_error_containers(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="contactForm"', false);
        $response->assertSee('novalidate', false);
        $response->assertSee('jquery.validate', false);
        $response->assertSee('id="submitBtn"', false);
        $response->assertDontSee('id="submitBtn" disabled', false);
        $response->assertSee('id="error-name"', false);
        $response->assertSee('id="error-email"', false);
        $response->assertSee('id="error-phone"', false);
        $response->assertSee('id="error-message"', false);
        $response->assertSee('id="formStatus"', false);
        $response->assertSee('js/vocabot.js', false);
    }

    public function test_homepage_form_submits_successfully_with_name_field(): void
    {
        $response = $this->postJson(route('contact.submit'), [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'phone' => '+1 555 123 4567',
            'interest' => 'Homepage Demo Request',
            'message' => 'Please automate our customer care desk.',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);
        $this->assertDatabaseHas('contact_submissions', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'phone' => '+1 555 123 4567',
            'subject' => 'Homepage Demo Request',
            'message' => 'Please automate our customer care desk.',
        ]);
    }

    public function test_submits_successfully_with_valid_data(): void
    {
        $response = $this->postJson(route('contact.submit'), [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '(555) 123-4567',
            'interest' => 'Book a Demo',
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
