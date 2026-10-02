@extends('layouts.app')

@section('title', 'VocaBot - AI Voice Automation Solutions')
@section('description', 'Transform customer experience and scale phone operations effortlessly with Vocabot voice solutions.')

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
          <span></span> Next-Gen Voice Automation
        </div>
        <h1>
          Automate Calls With <span class="gradient-text">Human-Like AI</span>
        </h1>
        <p class="hero-lead">
          Transform customer experience and scale phone operations effortlessly. VocaBot handles outbound sales, inbound support, and smart scheduling 24/7.
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
          <span>99.8% Latency Reduction</span>
        </div>
        <div class="floating-node node-two">
          <i class="fa-solid fa-shield-halved" style="color: #34d399;"></i>
          <span>Enterprise Secure</span>
        </div>
        <div class="floating-node node-three">
          <i class="fa-solid fa-bolt" style="color: #fbbf24;"></i>
          <span>Instant CRM Sync</span>
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
          From lead qualification to customer support, Vocabot handles conversations that keep your business moving.
        </p>
      </div>

      <div class="solution-grid">
        <!-- CARD 1 -->
        <article class="solution-card">
          <div class="card-number">01</div>
          <div class="solution-icon"><span>◉</span></div>
          <h3>Sales & Lead Qualification</h3>
          <p>Automatically engage new leads, ask qualifying questions and identify high-intent prospects.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 2 -->
        <article class="solution-card featured">
          <div class="card-number">02</div>
          <div class="solution-icon"><span>◌</span></div>
          <h3>Customer Support</h3>
          <p>Give customers instant voice assistance for common questions, requests and support workflows.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 3 -->
        <article class="solution-card">
          <div class="card-number">03</div>
          <div class="solution-icon"><span>⌁</span></div>
          <h3>Appointment Scheduling</h3>
          <p>Let AI handle appointment calls, confirmations, rescheduling and reminders automatically.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 4 -->
        <article class="solution-card">
          <div class="card-number">04</div>
          <div class="solution-icon"><span>◈</span></div>
          <h3>Follow-ups & Outreach</h3>
          <p>Keep conversations moving with automated follow-ups that sound natural and personalized.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 5 -->
        <article class="solution-card">
          <div class="card-number">05</div>
          <div class="solution-icon"><span>+</span></div>
          <h3>Operations</h3>
          <p>Automate repetitive voice workflows and reduce the manual effort required from your team.</p>
          <a href="{{ url('/contact') }}">Explore solution <span>↗</span></a>
        </article>

        <!-- CARD 6 -->
        <article class="solution-card">
          <div class="card-number">06</div>
          <div class="solution-icon"><span>∞</span></div>
          <h3>Custom Voice Workflows</h3>
          <p>Build AI-powered conversations around your unique business process and customer journey.</p>
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
          <h3>Connect Systems</h3>
          <p>Integrate your phone lines (Twilio, Retell, Vapi) alongside your CRM or database in minutes.</p>
        </div>

        <div class="workflow-step">
          <span class="step-number">STEP 02</span>
          <h3>Train Voice Agent</h3>
          <p>Upload knowledge base documents, custom scripts, and define conversational boundaries.</p>
        </div>

        <div class="workflow-step">
          <span class="step-number">STEP 03</span>
          <h3>Test & Optimize</h3>
          <p>Simulate calls live in the browser, tweak latency parameters, and refine tone settings.</p>
        </div>

        <div class="workflow-step">
          <span class="step-number">STEP 04</span>
          <h3>Go Live</h3>
          <p>Launch automated inbound and outbound call routing with real-time analytics and monitoring.</p>
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
            Eliminate hold times and missed operational leads. VocaBot delivers continuous availability, lowering operational costs while delivering human-grade performance.
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
            <span>Reduction in Support Costs</span>
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
        <p>Book a live personalized demo today and see how VocaBot streamlines operations for your industry.</p>
        <a href="{{ url('/contact') }}" class="cta-button">Schedule Live Demo</a>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('js/solutions.js') }}"></script>
@endsection
