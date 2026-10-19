====================================================
VOCABOT CONTACT FORM SUBMISSION
====================================================

Customer Name: {{ $customerName }}
Email Address: {{ $customerEmail }}
@if(!empty($customerPhone))
Phone Number:  {{ $customerPhone }}
@endif
@if(!empty($company))
Company:       {{ $company }}
@endif
@if(!empty($subjectText))
Subject / Interest: {{ $subjectText }}
@endif

----------------------------------------------------
MESSAGE:
----------------------------------------------------
{{ $messageText ?? 'No message provided.' }}

Submission Date & Time: {{ $submittedAt }}

====================================================
Sent via Vocabot Website
Delivered to: {{ config('mail.contact_recipient.address') }}
====================================================
