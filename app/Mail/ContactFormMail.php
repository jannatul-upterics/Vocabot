<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $formData;
    public string $customerName;
    public string $customerEmail;
    public ?string $customerPhone;
    public ?string $company;
    public ?string $subjectText;
    public ?string $messageText;

    public function __construct(array $data)
    {
        $this->formData = $data;

        // Extract normalized fields from camelCase, spaced, or snake_case input keys
        $this->customerEmail = trim(
            $data['email'] ?? $data['Work Email'] ?? $data['work_email'] ?? $data['Email'] ?? ''
        );

        $nameCandidate = trim(
            $data['name'] ?? $data['Full Name'] ?? $data['full_name'] ?? 
            trim(($data['firstName'] ?? $data['First Name'] ?? '') . ' ' . ($data['lastName'] ?? $data['Last Name'] ?? ''))
        );
        $this->customerName = !empty($nameCandidate) ? $nameCandidate : ($this->customerEmail ?: 'Valued Customer');

        $phoneCandidate = trim(
            $data['phone'] ?? $data['Phone'] ?? $data['phoneNumber'] ?? $data['Phone Number'] ?? $data['mobile'] ?? ''
        );
        $this->customerPhone = (!empty($phoneCandidate) && strtolower($phoneCandidate) !== 'not provided') ? $phoneCandidate : null;

        $companyCandidate = trim(
            $data['company'] ?? $data['Company'] ?? ''
        );
        $this->company = (!empty($companyCandidate) && strtolower($companyCandidate) !== 'not provided') ? $companyCandidate : null;

        $subjectCandidate = trim(
            $data['subject'] ?? $data['Subject'] ?? $data['interest'] ?? $data['Interested In'] ?? $data['industry'] ?? $data['Industry'] ?? ''
        );
        $this->subjectText = !empty($subjectCandidate) ? $subjectCandidate : null;

        $messageCandidate = trim(
            $data['message'] ?? $data['Message'] ?? ''
        );
        $this->messageText = (!empty($messageCandidate) && strtolower($messageCandidate) !== 'not provided') ? $messageCandidate : null;
    }

    public function envelope(): Envelope
    {
        $subject = 'Vocabot Contact Form Submission - ' . $this->customerName;

        $replyEmail = filter_var($this->customerEmail, FILTER_VALIDATE_EMAIL) ? $this->customerEmail : config('mail.from.address');

        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name', 'Vocabot')),
            replyTo: [new Address($replyEmail, $this->customerName)],
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            text: 'emails.contact_plain',
            with: [
                'customerName'  => $this->customerName,
                'customerEmail' => $this->customerEmail,
                'customerPhone' => $this->customerPhone,
                'company'       => $this->company,
                'subjectText'   => $this->subjectText,
                'messageText'   => $this->messageText,
                'formData'      => $this->formData,
            ],
        );
    }
}
