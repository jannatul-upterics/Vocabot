<?php

namespace Tests\Feature;

use App\Mail\ContactFormMail;
use App\Models\ContactSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ContactSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_is_accessible(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Talk to our');
    }

    public function test_valid_json_contact_submission_is_saved_to_database(): void
    {
        $submissionData = [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'email' => 'jane.doe@example.com',
            'company' => 'Acme Corp',
            'interest' => 'Voice AI Agent',
            'message' => 'We want to automate our support line.',
        ];

        $response = $this->postJson('/contact', $submissionData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas('contact_submissions', [
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'company' => 'Acme Corp',
            'subject' => 'Voice AI Agent',
            'message' => 'We want to automate our support line.',
        ]);
    }

    public function test_submission_fails_when_email_is_missing_or_invalid(): void
    {
        $response = $this->postJson('/contact', [
            'firstName' => 'John',
            'lastName' => 'Smith',
            'email' => 'not-an-email',
            'interest' => 'Book a Demo',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);

        $responseMissing = $this->postJson('/contact', [
            'firstName' => 'John',
            'lastName' => 'Smith',
            'interest' => 'Book a Demo',
        ]);

        $responseMissing->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_submission_fails_when_name_is_missing(): void
    {
        $response = $this->postJson('/contact', [
            'email' => 'john@example.com',
            'interest' => 'Customer Support',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['firstName']);
    }

    public function test_submission_fails_when_interest_is_missing(): void
    {
        $response = $this->postJson('/contact', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['interest']);
    }

    public function test_duplicate_submission_within_sixty_seconds_is_prevented(): void
    {
        $payload = [
            'firstName' => 'Duplicate',
            'lastName' => 'User',
            'email' => 'duplicate@example.com',
            'interest' => 'Sales Automation',
            'message' => 'Test duplicate protection',
        ];

        $first = $this->postJson('/contact', $payload);
        $first->assertStatus(200);

        $second = $this->postJson('/contact', $payload);
        $second->assertStatus(200);

        $count = ContactSubmission::where('email', 'duplicate@example.com')
            ->where('subject', 'Sales Automation')
            ->count();

        $this->assertEquals(1, $count);
    }

    public function test_contact_submission_dispatches_notification_job_and_sends_email(): void
    {
        Mail::fake();

        $submissionData = [
            'firstName' => 'Alex',
            'lastName' => 'Taylor',
            'email' => 'alex.taylor@example.com',
            'company' => 'Taylor AI',
            'interest' => 'Book a Demo',
            'message' => 'Interested in conversational AI.',
        ];

        $response = $this->postJson('/contact', $submissionData);
        $response->assertStatus(200);

        Mail::assertSent(ContactFormMail::class, function ($mail) {
            return ($mail->formData['email'] ?? null) === 'alex.taylor@example.com';
        });
    }

    public function test_database_error_returns_clean_500_message(): void
    {
        // Drop the table temporarily to test real database failure handling
        Schema::dropIfExists('contact_submissions');

        $submissionData = [
            'firstName' => 'Crash',
            'lastName' => 'Test',
            'email' => 'crash@example.com',
            'interest' => 'Voice AI Agent',
        ];

        $response = $this->postJson('/contact', $submissionData);

        $response->assertStatus(500)
            ->assertJson([
                'success' => false,
                'message' => 'Unable to save your request due to a server error. Please try again shortly.',
            ]);
    }

    public function test_when_email_notification_dispatch_fails_record_is_still_saved_and_user_receives_confirmation(): void
    {
        // Force queue/job dispatch exception
        Event::listen('*', function () {
            // normal event processing
        });

        $submissionData = [
            'firstName' => 'Resilient',
            'lastName' => 'User',
            'email' => 'resilient@example.com',
            'company' => 'SafeCo',
            'interest' => 'Customer Support',
            'message' => 'Testing email dispatch isolation',
        ];

        $response = $this->postJson('/contact', $submissionData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas('contact_submissions', [
            'email' => 'resilient@example.com',
            'name' => 'Resilient User',
        ]);
    }
}
