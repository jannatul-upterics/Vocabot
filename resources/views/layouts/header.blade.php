<!-- ================= NAVBAR ================= -->
<header class="navbar" id="navbar">
  <div class="container nav-inner">
    <a class="brand logo" href="{{ url('/') }}" aria-label="Vocabot home">
      <img src="{{ asset('images/logo2.png') }}" alt="Vocabot logo">
      <span><b>Voca</b>bot</span>
    </a>

    <nav class="desktop-nav" aria-label="Main navigation">
      <a href="{{ url('/') }}" class="{{ Request::is('/') || Request::is('vocabot') ? 'active' : '' }}">Home</a>
      <a href="{{ url('/product') }}" class="{{ Request::is('product') ? 'active' : '' }}">Product</a>
      <a href="{{ url('/how-it-works') }}" class="{{ Request::is('how-it-works') ? 'active' : '' }}">How It Works</a>
      <a href="{{ url('/solutions') }}" class="{{ Request::is('solutions') ? 'active' : '' }}">Solutions</a>
      <!--<a href="{{ url('/integrations') }}" class="{{ Request::is('integrations') ? 'active' : '' }}">Integrations</a>-->
      <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a>
      <!--<a href="{{ url('/policy') }}" class="{{ Request::is('policy') || Request::is('policies') ? 'active' : '' }}">Policies</a>-->
    </nav>

    <a class="btn btn-primary nav-btn" href="{{ Request::is('/') ? '#contact' : url('/contact') }}">Book a Demo</a>

    <!-- Mobile Menu Button -->
    <button type="button" id="menuToggle" class="menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <!-- MOBILE MENU -->
  <div class="mobile-menu" id="mobileMenu">
    <a href="{{ url('/') }}" class="{{ Request::is('/') || Request::is('vocabot') ? 'active' : '' }}">Home</a>
    <a href="{{ url('/product') }}" class="{{ Request::is('product') ? 'active' : '' }}">Product</a>
    <a href="{{ url('/how-it-works') }}" class="{{ Request::is('how-it-works') ? 'active' : '' }}">How It Works</a>
    <a href="{{ url('/solutions') }}" class="{{ Request::is('solutions') ? 'active' : '' }}">Solutions</a>
    <a href="{{ url('/integrations') }}" class="{{ Request::is('integrations') ? 'active' : '' }}">Integrations</a>
    <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a>
    <a href="{{ url('/policy') }}" class="{{ Request::is('policy') || Request::is('policies') ? 'active' : '' }}">Policies</a>
    <a href="{{ Request::is('/') ? '#contact' : url('/contact') }}" class="mobile-demo">Book a Demo</a>
  </div>
</header>
