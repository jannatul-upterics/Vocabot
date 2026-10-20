@extends('layouts.app')

@section('title', 'Vocabot Solutions | AI Voice Receptionist for Restaurants')
@section('description', 'Automate restaurant calls, table reservations, and guest inquiries with Vocabot 24/7 AI voice receptionist. Never miss a customer booking.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@@type": "ListItem",
      "position": 2,
      "name": "Solutions",
      "item": "{{ url('/solutions') }}"
    }
  ]
}
</script>
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/solution.css') }}">
@endsection

@section('content')
  <!-- ================= HERO SECTION ================= -->
  <section class="hero">
    <div class="hero-glow glow-one"></div>
    <div class="hero-glow glow-two"></div>

    <div class="container hero-grid">
      <div class="hero-copy reveal">
        <div class="eyebrow">
          <span></span> Specialized Voice Automation
        </div>
        <h1>
          Automate Inbound Calls With <span class="gradient-text">Human-Like AI</span>
        </h1>
        <p class="hero-lead">
          Transform your guest experience and streamline phone operations. Vocabot answers incoming restaurant calls, confirms table reservations, and handles customer inquiries 24/7.
        </p>
        <div class="hero-buttons">
          <a href="{{ url('/contact') }}">Deploy Your Agent<i class="ri-arrow-right-line"></i></a>
          <a href="#use-cases">Explore Use Cases</a>
        </div>
      </div>

      <!-- AI Animated Visual -->
      <div class="ai-visual">
        <div class="orbit orbit-one"></div>
        <div class="orbit orbit-two"></div>
        <div class="orbit orbit-three"></div>

        <!-- Floating UI Nodes -->
        <div class="floating-node node-one">
          <i class="fa-solid fa-phone-volume" style="color: #a78bfa;"></i>
          <span>Instant First-Ring Answer</span>
        </div>
        <div class="floating-node node-two">
          <i class="fa-solid fa-shield-halved" style="color: #34d399;"></i>
          <span>Enterprise Secure</span>
        </div>
        <div class="floating-node node-three">
          <i class="fa-solid fa-bolt" style="color: #fbbf24;"></i>
          <span>Real-Time Calendar Sync</span>
        </div>

        <!-- Core Visual -->
        <div class="ai-core">
          <span class="v-core">V</span>
        </div>

        <!-- Live Call Badge -->
        <div class="live-indicator">
          <span class="live-dot"></span>
          <span>LIVE CALL ACTIVE</span>
        </div>

        <!-- Audio Waveform -->
        <div class="waveform">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= USE CASES ================= -->
  <section class="use-cases" id="use-cases">
    <div class="container">
      <div class="section-heading">
        <div>
          <div class="eyebrow">
            <span></span> BUILT FOR BUSINESS
          </div>
          <h2>
            One voice platform.<br>
            <span>Multiple solutions.</span>
          </h2>
        </div>
        <p>
          From handling guest inquiries to confirming table bookings, Vocabot manages conversations that keep your restaurant running smoothly.
        </p>
      </div>

      <div class="solution-grid">
        <!-- CARD 1 -->
        <article class="solution-card">
          <div class="card-number">01</div>
          <div class="solution-icon"><span>◉</span></div>
          <h3>Guest Call Handling</h3>
          <p>Answers incoming phone calls on the first ring with natural, friendly conversational greetings.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 2 -->
        <article class="solution-card featured">
          <div class="card-number">02</div>
          <div class="solution-icon"><span>◌</span></div>
          <h3>Guest Queries & FAQs</h3>
          <p>Provides instant, reliable answers to common caller questions about hours, directions, menus, and policies.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 3 -->
        <article class="solution-card">
          <div class="card-number">03</div>
          <div class="solution-icon"><span>⌁</span></div>
          <h3>Table Reservations</h3>
          <p>Checks live calendar availability, captures party size and date, and confirms bookings in real time.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 4 -->
        <article class="solution-card">
          <div class="card-number">04</div>
          <div class="solution-icon"><span>◈</span></div>
          <h3>Reservation Management</h3>
          <p>Allows guests to modify or cancel existing bookings quickly over the phone, updating your calendar immediately.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 5 -->
        <article class="solution-card">
          <div class="card-number">05</div>
          <div class="solution-icon"><span>+</span></div>
          <h3>Guest Information Capture</h3>
          <p>Accurately records caller names, phone numbers, special seating preferences, and dietary requirements.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 6 -->
        <article class="solution-card">
          <div class="card-number">06</div>
          <div class="solution-icon"><span>∞</span></div>
          <h3>Restaurant Voice Workflows</h3>
          <p>Follows your specific booking rules, hours of operation, and on-duty staff escalation guidelines.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= WORKFLOW ================= -->
  <section class="workflow" id="workflow">
    <div class="container">
      <div class="workflow-header">
        <div class="eyebrow">
          <span></span> HOW IT WORKS
        </div>
        <h2>
          From first hello <span>to next action.</span>
        </h2>
      </div>

      <div class="workflow-line">
        <div class="workflow-step">
          <span class="step-number">STEP 01</span>
          <h3>Connect Phone Lines</h3>
          <p>Forward your business phone line to Vocabot and connect your table management or calendar system.</p>
        </div>

        <div class="workflow-step">
          <span class="step-number">STEP 02</span>
          <h3>Configure Knowledge & Rules</h3>
          <p>Define your operating hours, menu information, booking rules, and answers to common guest questions.</p>
        </div>

        <div class="workflow-step">
          <span class="step-number">STEP 03</span>
          <h3>Test Voice Agent</h3>
          <p>Preview sample calls live in the browser, tweak conversational flows, and verify booking accuracy.</p>
        </div>

        <div class="workflow-step">
          <span class="step-number">STEP 04</span>
          <h3>Go Live 24/7</h3>
          <p>Launch automated call answering with real-time analytics, booking logs, and seamless staff transfers.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= BENEFITS SECTION ================= -->
  <section class="benefits" id="benefits">
    <div class="container">
      <div class="benefits-layout">
        <div class="benefits-content">
          <div class="eyebrow"><span></span> Quantifiable Impact</div>
          <h2>Scale Operations <span>Without Escalating Costs</span></h2>
          <p>
            Eliminate busy tones and missed guest bookings. Vocabot delivers continuous 24/7 availability, lowering staff strain while delivering consistent, friendly caller service.
          </p>
          <a href="{{ url('/contact') }}" class="benefit-btn">Calculate Your ROI</a>
        </div>

        <div class="benefit-list">
          <div class="benefit-item">
            <strong>100%</strong>
            <span>Calls Answered Instantly</span>
          </div>
          <div class="benefit-item">
            <strong>&lt;500ms</strong>
            <span>Ultra-low Latency Speed</span>
          </div>
          <div class="benefit-item">
            <strong>65%</strong>
            <span>Reduction in Call Load</span>
          </div>
          <div class="benefit-item">
            <strong>24/7</strong>
            <span>Uninterrupted Operations</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FINAL CTA SECTION ================= -->
  <section class="final-cta" id="demo">
    <div class="cta-glow"></div>
    <div class="container">
      <div class="cta-box">
        <div class="eyebrow"><span></span> Ready To Upgrade?</div>
        <h2>Transform Your Business Calls With <span>AI Voice Automation</span></h2>
        <p>Book a live personalized demo today and see how Vocabot streamlines call handling for your business.</p>
        <a href="{{ url('/contact') }}" class="cta-button">Schedule Live Demo</a>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('js/solutions.js') }}"></script>
@endsection
