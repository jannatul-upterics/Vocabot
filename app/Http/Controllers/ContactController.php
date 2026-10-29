<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmissionRequest;
use App\Mail\ContactFormMail;
use App\Models\ContactSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    /**
     * Display the Contact Us page.
     */
    public function index(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle incoming contact form submission.
     */
    public function submit(ContactSubmissionRequest $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validated();

        $fullName = trim(
            $validated['name'] ??
            trim(($validated['firstName'] ?? '').' '.($validated['lastName'] ?? ''))
        );

        $email = trim($validated['email']);
        $company = ! empty($validated['company']) ? trim($validated['company']) : null;
        $subject = ! empty($validated['interest']) ? trim($validated['interest']) : null;
        $phone = ! empty($validated['phone']) ? trim($validated['phone']) : null;
        $message = ! empty($validated['message']) ? trim($validated['message']) : null;

        $emailSent = true;

        try {
            // Prevent duplicate submissions within the last 60 seconds
            $existing = ContactSubmission::where('email', $email)
                ->where('subject', $subject)
                ->where('created_at', '>=', now()->subSeconds(60))
                ->first();

            $submission = $existing;

            if (! $submission) {
                $submission = ContactSubmission::create([
                    'name' => $fullName,
                    'email' => $email,
                    'phone' => $phone,
                    'company' => $company,
                    'subject' => $subject,
                    'message' => $message,
                ]);

                // Send notification email synchronously with error handling
                try {
                    Mail::to(config('mail.contact_recipient.address'))
                        ->send(new ContactFormMail($request->all(), now()->setTimezone('Asia/Kolkata')->format('d F Y, h:i A').' IST'));
                    $emailSent = true;
                } catch (Throwable $e) {
                    $emailSent = false;
                    Log::error('Failed to send contact notification email for submission #'.$submission->id.': '.$e->getMessage());
                }
            }
        } catch (Throwable $dbError) {
            Log::error('Database error saving contact submission: '.$dbError->getMessage());

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unable to save your request due to a server error. Please try again shortly.',
                ], 500);
            }

            return redirect()->back()->withInput()->withErrors([
                'database' => 'Unable to save your request due to a server error. Please try again shortly.',
            ]);
        }

        $successMessage = $emailSent
            ? 'Your message has been submitted successfully, and the notification email was sent.'
            : 'Your message has been received, but the notification email could not be sent. Please try again later.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'email_dispatched' => $emailSent,
                'message' => $successMessage,
            ], 200);
        }

        return redirect()->back()->with('success', $successMessage);
    }
}
