<!-- ================= FOOTER ================= -->
<footer class="footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <a class="brand logo" href="{{ url('/') }}">
        <img src="{{ asset('images/logo2.png') }}" alt="Vocabot logo">
        <span><b>Voca</b>bot</span>
      </a>
      <p>AI voice agents that turn conversations into completed business workflows.</p>
      <div class="socials">
        <a href="#" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
        <a href="#" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
        <a href="#" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
      </div>
    </div>

    <div class="footer-col">
      <h3>Product</h3>
      <a href="{{ url('/product') }}">Features</a>
      <a href="{{ url('/how-it-works') }}">How It Works</a>
      <a href="{{ url('/#demo') }}">AI Demo</a>
      <a href="{{ url('/integrations') }}">Integrations</a>
    </div>

    {{--
    <div class="footer-col">
      <h3>Solutions</h3>
      <a href="{{ url('/solutions') }}">Healthcare</a>
      <a href="{{ url('/solutions') }}">Restaurants</a>
      <a href="{{ url('/solutions') }}">Real Estate</a>
      <a href="{{ url('/solutions') }}">Professional Services</a>
    </div>
    --}}

    <div class="footer-col">
      <h3>Company</h3>
      <a href="{{ url('/#faq') }}">FAQ</a>
      <a href="{{ url('/contact') }}">Contact</a>
      <a href="{{ url('/policy') }}">Privacy Policy</a>
      <a href="{{ url('/policy') }}">Terms of Service</a>
    </div>
  </div>

  <div class="container footer-bottom">
    <span>© <span id="year">{{ date('Y') }}</span> Vocabot. All rights reserved.</span>
    <span>AI voice automation for modern businesses.</span>
  </div>
</footer>
