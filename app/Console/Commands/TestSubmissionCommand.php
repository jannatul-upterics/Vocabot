<?php

namespace App\Console\Commands;

use App\Jobs\SendContactNotificationJob;
use App\Models\ContactSubmission;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('vocabot:test-submission {--email= : Email address to test with}')]
#[Description('Test full submission cycle: MySQL persistence and SMTP notification dispatch')]
class TestSubmissionCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $testEmail = $this->option('email') ?: 'e2e.tester@example.com';

        $this->info('Creating contact submission in MySQL database...');

        $submission = ContactSubmission::create([
            'name' => 'Vocabot E2E Verification User',
            'email' => $testEmail,
            'phone' => '+1 (555) 789-0123',
            'company' => 'Vocabot Test Systems',
            'subject' => 'Voice AI Agent',
            'message' => 'End-to-end verification of MySQL persistence and SMTP notification delivery.',
        ]);

        $this->info("Record created with ID: {$submission->id}");
        $this->line("Name: {$submission->name}");
        $this->line("Email: {$submission->email}");
        $this->line("Subject: {$submission->subject}");
        $this->line("Created at: {$submission->created_at}");

        $count = ContactSubmission::count();
        $this->line("Total records in MySQL contact_submissions table: {$count}");

        $this->info('Dispatching email notification job directly...');
        $job = new SendContactNotificationJob($submission);
        $job->handle();

        $this->info('SUCCESS: Full end-to-end submission verified!');

        return 0;
    }
}
