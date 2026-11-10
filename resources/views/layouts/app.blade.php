@php
  $logoPath = $themeSettings['logo'] ?? 'images/logo2.webp';
  $logoUrl = str_starts_with($logoPath, 'http') ? $logoPath : asset($logoPath);
  $primaryColor = $themeSettings['primary_color'] ?? '#7c3aed';
  $accentColor = $themeSettings['accent_color'] ?? '#a855f7';
  $backgroundColor = $themeSettings['background_color'] ?? '#070313';
  $textColor = $themeSettings['text_color'] ?? '#ffffff';
  $fontFamily = $themeSettings['font_family'] ?? 'Plus Jakarta Sans';
  $buttonStyle = $themeSettings['button_style'] ?? 'pill';
  $layoutMode = $themeSettings['layout_mode'] ?? 'boxed';
  $navbarStyle = $themeSettings['navbar_style'] ?? 'sticky';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Vocabot | 24/7 AI Voice Receptionist for Business')</title>
  <meta name="description" content="@yield('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.')">
  <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large')">
  <link rel="canonical" href="@yield('canonical', url()->current())">

  <!-- Author & General Meta -->
  <meta name="author" content="Vocabot">

  <!-- Open Graph / Facebook / Instagram / LinkedIn -->
  <meta property="og:site_name" content="Vocabot">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:locale" content="en_US">
  <meta property="og:title" content="@yield('title', 'Vocabot | 24/7 AI Voice Receptionist for Business')">
  <meta property="og:description" content="@yield('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.')">
  <meta property="og:url" content="@yield('canonical', url()->current())">
  <meta property="og:image" content="{{ $logoUrl }}">
  <meta property="og:image:secure_url" content="{{ $logoUrl }}">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Vocabot - 24/7 AI Voice Receptionist for Business">

  <!-- X (Twitter) Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@yield('twitter_site', '@vocabot')">
  <meta name="twitter:creator" content="@yield('twitter_creator', '@vocabot')">
  <meta name="twitter:title" content="@yield('title', 'Vocabot | 24/7 AI Voice Receptionist for Business')">
  <meta name="twitter:description" content="@yield('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.')">
  <meta name="twitter:image" content="{{ $logoUrl }}">
  <meta name="twitter:image:alt" content="Vocabot - 24/7 AI Voice Receptionist for Business">
  <meta name="twitter:domain" content="{{ parse_url(url('/'), PHP_URL_HOST) ?? 'vocabot.ai' }}">
  <meta name="twitter:url" content="@yield('canonical', url()->current())">

  <meta name="theme-color" content="{{ $backgroundColor }}">

  <link rel="icon" href="{{ $logoUrl }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lato:wght@300;400;500;600;700;800;900@if(!empty($fontFamily) && !in_array($fontFamily, ['Plus Jakarta Sans', 'Lato']))&family={{ str_replace(' ', '+', $fontFamily) }}:wght@400;500;600;700@endif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Global Structured Data: Organization & WebSite -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@graph": [
      {
        "@@type": "Organization",
        "@@id": "{{ url('/') }}#organization",
        "name": "Vocabot",
        "url": "{{ url('/') }}",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ asset($themeSettings['logo'] ?? 'images/logo2.webp') }}"
        },
        "email": "hello@vocabot.ai",
        "description": "Vocabot provides 24/7 AI voice receptionists for business call answering, reservations, and customer workflows."
      },
      {
        "@@type": "WebSite",
        "@@id": "{{ url('/') }}#website",
        "url": "{{ url('/') }}",
        "name": "Vocabot",
        "publisher": {
          "@@id": "{{ url('/') }}#organization"
        }
      }
    ]
  }
  </script>

  @yield('schema')
  @yield('styles')
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}?v={{ filemtime(public_path('css/footer.css')) }}">

  <!-- Theme Settings Managed by CodeBaseHub -->
  <style id="codebasehub-theme-settings">
    :root {
      @if (!empty($backgroundColor))
        --bg: {{ $backgroundColor }};
        --bg-2: {{ $backgroundColor }};
      @endif
      @if (!empty($primaryColor))
        --purple: {{ $primaryColor }};
        --purple-dark: {{ $primaryColor }};
      @endif
      @if (!empty($accentColor))
        --magenta: {{ $accentColor }};
        --violet: {{ $accentColor }};
        --lavender: {{ $accentColor }};
        --border: {{ $accentColor }}33;
      @endif
      @if (!empty($primaryColor) && !empty($accentColor))
        --gradient: linear-gradient(135deg, {{ $primaryColor }} 0%, {{ $accentColor }} 100%);
      @endif
      @if (!empty($textColor))
        --text: {{ $textColor }};
      @endif
      @if (!empty($fontFamily))
        --font-family-theme: '{{ $fontFamily }}', 'Plus Jakarta Sans', sans-serif;
      @endif
      @if (!empty($layoutMode))
        @if ($layoutMode === 'narrow')
          --container: 960px;
        @elseif ($layoutMode === 'fluid')
          --container: 95%;
        @else
          --container: 1180px;
        @endif
      @endif
    }

    {{-- Body & Background Styling --}}
    @if (!empty($backgroundColor))
      html, body {
        background-color: {{ $backgroundColor }} !important;
        @if (strtolower($backgroundColor) !== '#070313')
          background: {{ $backgroundColor }} !important;
        @endif
      }
    @endif

    {{-- Glowing background balls follow theme primary & accent colors --}}
    @if (!empty($primaryColor))
      .page-glow.glow-two {
        background: {{ $primaryColor }} !important;
      }
    @endif
    @if (!empty($accentColor))
      .page-glow.glow-one {
        background: {{ $accentColor }} !important;
      }
    @endif

    {{-- Typography overrides --}}
    @if (!empty($fontFamily))
      body, h1, h2, h3, h4, h5, h6, .btn, .primary-btn, .secondary-btn, .cta-btn, .submit-btn, .navbar, .desktop-nav, .mobile-menu, .nav-btn, input, select, textarea {
        font-family: var(--font-family-theme, 'Plus Jakarta Sans', sans-serif) !important;
      }
    @endif

    {{-- Text Color overrides --}}
    @if (!empty($textColor))
      body, h1, h2, h3, h4, h5, h6, .brand span {
        color: {{ $textColor }};
      }
    @endif

    {{-- Button border radius across all Vocabot buttons --}}
    @if (!empty($buttonStyle))
      @php
        $radius = match($buttonStyle) {
          'pill' => '999px',
          'rounded' => '8px',
          'square' => '0px',
          default => '999px',
        };
        $cardRadius = match($buttonStyle) {
          'pill' => '22px',
          'rounded' => '14px',
          'square' => '6px',
          default => '22px',
        };
        $inputRadius = match($buttonStyle) {
          'pill' => '14px',
          'rounded' => '8px',
          'square' => '4px',
          default => '14px',
        };
      @endphp
      .btn, .primary-btn, .secondary-btn, .cta-btn, .submit-btn, .nav-btn, .filter-btn, .btn-ghost, .mobile-demo {
        border-radius: {{ $radius }} !important;
      }
      .glass-card, .problem-card, .feature-card, .sector-card, .integration-card, .audio-card, .roi-card, .contact-card, .step-card, .solution-card {
        border-radius: {{ $cardRadius }} !important;
      }
      input, select, textarea, .input-wrap {
        border-radius: {{ $inputRadius }} !important;
      }
    @endif

    {{-- Primary & Secondary Buttons matching CodeBaseHub Theme Preview --}}
    @if (!empty($primaryColor) && !empty($accentColor))
      .btn-primary, .primary-btn, .submit-btn, .cta-btn, .nav-btn, .mobile-demo {
        background: linear-gradient(135deg, {{ $primaryColor }} 0%, {{ $accentColor }} 100%) !important;
        color: #fff !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        box-shadow: 0 10px 25px {{ $primaryColor }}35 !important;
      }
      .btn-primary:hover, .primary-btn:hover, .submit-btn:hover, .cta-btn:hover, .nav-btn:hover, .mobile-demo:hover {
        box-shadow: 0 14px 32px {{ $primaryColor }}55 !important;
        transform: translateY(-1px);
      }
      .btn-ghost, .secondary-btn {
        background: transparent !important;
        color: {{ $textColor }} !important;
        border: 1px solid {{ $accentColor }} !important;
      }
      .btn-ghost:hover, .secondary-btn:hover {
        background: {{ $accentColor }}20 !important;
        border-color: {{ $accentColor }} !important;
        color: #fff !important;
      }
    @endif

    {{-- Accent highlights matching CodeBaseHub Theme Preview --}}
    @if (!empty($accentColor))
      .status-pill {
        background: {{ $accentColor }}25 !important;
        color: {{ $accentColor }} !important;
        border: 1px solid {{ $accentColor }}50 !important;
      }
      .eyebrow {
        background: {{ $accentColor }}15 !important;
        border-color: {{ $accentColor }}40 !important;
        color: {{ $textColor }} !important;
      }
      .live-dot {
        background: {{ $accentColor }} !important;
        box-shadow: 0 0 10px {{ $accentColor }} !important;
      }
      .waveform i {
        background: {{ $accentColor }} !important;
      }
      .brand b, .footer-brand .brand b {
        color: {{ $accentColor }} !important;
      }
      .desktop-nav a.active::after, .desktop-nav a:hover::after,
      .mobile-menu a.active::after, .mobile-menu a:hover::after {
        background: {{ $accentColor }} !important;
        box-shadow: 0 0 8px {{ $accentColor }}80 !important;
      }
      .filter-btn.active {
        background: {{ $accentColor }} !important;
        color: #fff !important;
        border-color: {{ $accentColor }} !important;
      }
    @endif

    {{-- Cards, Borders and Shadows --}}
    @if (!empty($accentColor))
      .glass-card, .problem-card, .feature-card, .sector-card, .integration-card, .audio-card, .roi-card, .contact-card, .solution-card {
        border-color: {{ $accentColor }}25 !important;
      }
      .glass-card:hover, .problem-card:hover, .feature-card:hover, .sector-card:hover, .integration-card:hover, .solution-card:hover {
        border-color: {{ $accentColor }}80 !important;
        box-shadow: 0 16px 40px {{ $primaryColor ?? '#7c3aed' }}25 !important;
      }
    @endif

    {{-- Form input focus states --}}
    @if (!empty($accentColor))
      input:focus, textarea:focus, select:focus, .input-wrap:focus-within {
        border-color: {{ $accentColor }} !important;
        box-shadow: 0 0 0 3px {{ $accentColor }}25 !important;
        outline: none !important;
      }
    @endif

    {{-- Footer Styling matching theme background and accents --}}
    @if (!empty($backgroundColor))
      .footer {
        background: {{ $backgroundColor }} !important;
        border-top: 1px solid {{ $accentColor ?? '#a855f7' }}25 !important;
      }
      .footer .footer-brand p, .footer .footer-col a {
        color: {{ $textColor ?? '#ffffff' }}aa !important;
      }
      .footer .footer-col h3, .footer .footer-brand .brand {
        color: {{ $textColor ?? '#ffffff' }} !important;
      }
      .footer .footer-col a:hover {
        color: {{ $accentColor ?? '#a855f7' }} !important;
      }
      .footer .socials a {
        color: {{ $accentColor ?? '#a855f7' }} !important;
        border-color: {{ $accentColor ?? '#a855f7' }}40 !important;
      }
      .footer .socials a:hover {
        background: linear-gradient(135deg, {{ $primaryColor ?? '#7c3aed' }} 0%, {{ $accentColor ?? '#a855f7' }} 100%) !important;
        color: #fff !important;
        border-color: transparent !important;
      }
    @endif

    {{-- Mobile Menu --}}
    @if (!empty($backgroundColor))
      .mobile-menu {
        background: {{ $backgroundColor }}f5 !important;
        border: 1px solid {{ $accentColor ?? '#a855f7' }}40 !important;
        backdrop-filter: blur(20px) !important;
        -webkit-backdrop-filter: blur(20px) !important;
      }
      .mobile-menu a {
        color: {{ $textColor ?? '#ffffff' }}cc !important;
      }
      .mobile-menu a:hover, .mobile-menu a.active {
        color: {{ $textColor ?? '#ffffff' }} !important;
        background: {{ $accentColor ?? '#a855f7' }}20 !important;
      }
    @endif

    {{-- Layout Mode container width --}}
    @if (!empty($layoutMode) && $layoutMode === 'fluid')
      .container {
        width: 95% !important;
        max-width: 100% !important;
      }
    @endif

    {{-- Navbar Style overrides --}}
    @if (!empty($navbarStyle))
      @if ($navbarStyle === 'standard')
        .navbar {
          position: relative !important;
          top: auto !important;
        }
      @elseif ($navbarStyle === 'transparent')
        .navbar {
          background: transparent !important;
          backdrop-filter: none !important;
          -webkit-backdrop-filter: none !important;
          border-bottom: none !important;
        }
        .navbar.scrolled {
          background: rgba(7, 3, 19, 0.85) !important;
          backdrop-filter: blur(18px) !important;
        }
      @elseif ($navbarStyle === 'sticky')
        .navbar {
          position: sticky !important;
          top: 0 !important;
        }
      @endif
    @endif

    {{-- Custom CSS if provided by administrator --}}
    @if (!empty($themeSettings['custom_css']))
      {!! $themeSettings['custom_css'] !!}
    @endif
  </style>
</head>

<body>
  <div class="page-glow glow-one"></div>
  <div class="page-glow glow-two"></div>
  <div class="grid-overlay"></div>

  <!-- Shared Header -->
  @include('layouts.header')

  <!-- Page Content -->
  @yield('content')

  <!-- Shared Footer -->
  @include('layouts.footer')

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')</script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script>window.jQuery && window.jQuery.fn && window.jQuery.fn.validate || document.write('<script src="{{ asset('js/jquery.validate.min.js') }}"><\/script>')</script>
  @yield('scripts')
</body>
</html>

