<?php

namespace App\Console\Commands;

use App\Mail\ContactFormMail;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Throwable;

#[Signature('vocabot:test-smtp')]
#[Description('Test SMTP connection and send a test ContactFormMail notification')]
class TestMailCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $recipient = config('mail.contact_recipient.address');
        $from = config('mail.from.address');
        $host = config('mail.mailers.smtp.host');
        $port = config('mail.mailers.smtp.port');

        $this->info('Testing SMTP configuration...');
        $this->line("Host: {$host}:{$port}");
        $this->line("From: {$from}");
        $this->line("Recipient: {$recipient}");

        $sampleData = [
            'name' => 'Vocabot Test Visitor',
            'email' => 'visitor.test@example.com',
            'phone' => '+1 (555) 019-2834',
            'company' => 'Vocabot Diagnostics Ltd',
            'subject' => 'Voice AI Agent Evaluation',
            'message' => 'This is a test notification confirming that SMTP email delivery is functioning properly.',
        ];

        try {
            Mail::to($recipient)->send(new ContactFormMail($sampleData, now()->toDayDateTimeString()));
            $this->info("SUCCESS: Email delivered successfully to {$recipient}!");

            return 0;
        } catch (Throwable $e) {
            $this->error('FAILURE: Unable to deliver email via SMTP: '.$e->getMessage());

            return 1;
        }
    }
}
