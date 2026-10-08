<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabot Contact Form Submission</title>
    <style>
        body { font-family: 'Plus Jakarta Sans', Arial, Helvetica, sans-serif; background-color: #070313; color: #e2e8f0; margin: 0; padding: 24px; -webkit-font-smoothing: antialiased; }
        .wrapper { max-width: 600px; margin: 0 auto; background-color: #120b24; border: 1px solid rgba(167, 139, 250, 0.2); border-radius: 12px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .header { background: linear-gradient(135deg, #1e1338 0%, #120b24 100%); padding: 28px; border-bottom: 1px solid rgba(167, 139, 250, 0.2); text-align: left; }
        .brand { font-size: 20px; font-weight: 800; color: #ffffff; letter-spacing: 0.5px; }
        .brand span { color: #a78bfa; }
        .header-title { font-size: 18px; font-weight: 700; color: #b990ff; margin-top: 10px; margin-bottom: 0; }
        .body-content { padding: 28px; }
        .field-group { margin-bottom: 20px; }
        .field-label { font-size: 12px; font-weight: 700; color: #a78bfa; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 6px; display: block; }
        .field-value { font-size: 15px; color: #ffffff; background-color: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08); padding: 12px 16px; border-radius: 8px; word-break: break-word; line-height: 1.6; }
        .field-value a { color: #818cf8; text-decoration: none; font-weight: 600; }
        .footer { background-color: #0b0618; padding: 20px 28px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.06); font-size: 12px; color: #94a3b8; }
        .footer-highlight { color: #a78bfa; font-weight: 600; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="brand"><span>Voca</span>bot</div>
            <h2 class="header-title">New Contact Form Submission</h2>
        </div>

        <div class="body-content">
            <div class="field-group">
                <span class="field-label">Customer Name</span>
                <div class="field-value"><strong>{{ $customerName }}</strong></div>
            </div>

            <div class="field-group">
                <span class="field-label">Email Address</span>
                <div class="field-value">
                    <a href="mailto:{{ $customerEmail }}">{{ $customerEmail }}</a>
                </div>
            </div>

            @if(!empty($customerPhone))
            <div class="field-group">
                <span class="field-label">Phone Number</span>
                <div class="field-value"><a href="tel:{{ $customerPhone }}">{{ $customerPhone }}</a></div>
            </div>
            @endif

            @if(!empty($company))
            <div class="field-group">
                <span class="field-label">Company</span>
                <div class="field-value">{{ $company }}</div>
            </div>
            @endif

            @if(!empty($subjectText))
            <div class="field-group">
                <span class="field-label">Subject / Interested In</span>
                <div class="field-value">{{ $subjectText }}</div>
            </div>
            @endif

            @if(!empty($messageText))
            <div class="field-group">
                <span class="field-label">Message</span>
                <div class="field-value">{!! nl2br(e($messageText)) !!}</div>
            </div>
            @endif
        </div>

        <div class="footer">
            Delivered to <span class="footer-highlight">jemma.a@vocabots.com</span> via Vocabot AI Voice Platform.
        </div>
    </div>
</body>
</html>
