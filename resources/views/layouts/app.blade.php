<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Vocabot | AI Voice Agents for Every Business')</title>
  <meta name="description" content="@yield('description', 'Vocabot provides AI voice agents that answer calls, book appointments, qualify leads, take orders and automate customer conversations 24/7 across industries.')">
  <meta name="theme-color" content="#070313">

  <link rel="icon" href="{{ asset('images/logo2.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lato:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
