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

====================================================
Sent via Vocabot Website
Delivered to: Jemma.a@vocabots.com
====================================================
