<?php

namespace App\Jobs;

use App\Mail\ContactFormMail;
use App\Models\ContactSubmission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendContactNotificationJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     */
    public int $tries = 3;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var array<int, int>
     */
    public array $backoff = [10, 30, 60];

    /**
     * Create a new job instance.
     */
    public function __construct(
        public ContactSubmission $submission,
        public array $rawFormData = []
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $recipientEmail = config('mail.contact_recipient.address');

        if (empty($recipientEmail) || ! filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
            Log::warning('Contact notification email skipped: invalid or missing recipient email address.');

            return;
        }

        $mailData = array_merge($this->rawFormData, [
            'name' => $this->submission->name,
            'email' => $this->submission->email,
            'phone' => $this->submission->phone,
            'company' => $this->submission->company,
            'subject' => $this->submission->subject,
            'interest' => $this->submission->subject,
            'message' => $this->submission->message,
        ]);

        $submittedAt = $this->submission->created_at
            ? $this->submission->created_at->toDayDateTimeString()
            : now()->toDayDateTimeString();

        Mail::to($recipientEmail)->send(new ContactFormMail($mailData, $submittedAt));
    }

    /**
     * Handle a job failure.
     */
    public function failed(?Throwable $exception): void
    {
        Log::error('Contact notification email delivery failed for submission #'.$this->submission->id.': '.($exception ? $exception->getMessage() : 'Unknown error'));
    }
}
