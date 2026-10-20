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

  <!-- Open Graph / Social Sharing -->
  <meta property="og:site_name" content="Vocabot">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:title" content="@yield('title', 'Vocabot | 24/7 AI Voice Receptionist for Business')">
  <meta property="og:description" content="@yield('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.')">
  <meta property="og:url" content="@yield('canonical', url()->current())">
  <meta property="og:image" content="{{ asset('images/logo2.png') }}">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('title', 'Vocabot | 24/7 AI Voice Receptionist for Business')">
  <meta name="twitter:description" content="@yield('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.')">
  <meta name="twitter:image" content="{{ asset('images/logo2.png') }}">

  <meta name="theme-color" content="#070313">

  <link rel="icon" href="{{ asset('images/logo2.png') }}?v={{ filemtime(public_path('images/logo2.png')) }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lato:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
          "url": "{{ asset('images/logo2.png') }}"
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

  @yield('scripts')
</body>
</html>
