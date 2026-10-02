@extends('layouts.app')

@section('title', 'How It Works | Vocabot')
@section('description', 'Vocabot listens, understands, responds, and connects each conversation to the next business action — automatically.')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/how-it-works-new.css') }}">
@endsection

@section('content')
<main>
  <!-- HERO -->
  <section class="hero" id="home">
    <div class="hero-glow glow-one"></div>
    <div class="hero-glow glow-two"></div>

    <div class="container hero-grid">
       <div class="hero-copy reveal">
        <div class="eyebrow"><span></span> HOW VOCABOT WORKS</div>
        <h1>
          A voice agent that
          <span>turns conversations into action.</span>
        </h1>
        <p>
          Vocabot listens, understands, responds, and connects each
          conversation to the next business action — automatically.
        </p>

        <div class="hero-actions">
          <a href="{{ url('/contact') }}" class="primary-btn">Book a Demo <i class="ri-arrow-right-line"></i></a>
          <button class="secondary-btn" id="playDemo">
            <span class="play-icon">▶</span> See how it works
          </button>
        </div>

        <div class="hero-proof">
          <span>●</span> Natural conversations
          <span>●</span> Business-ready workflows
          <span>●</span> Human handoff when needed
        </div>
      </div>

      <!-- AI VISUAL -->
      <div class="voice-visual">
        <div class="orbit orbit-one"></div>
        <div class="orbit orbit-two"></div>
        <div class="orbit orbit-three"></div>

        <div class="voice-ring">
          <div class="voice-core">
            <div class="core-mark">V</div>
            <div class="core-label">VOCABOT</div>
            <div class="wave" id="wave">
              <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
            </div>
            <small id="voiceStatus">READY TO TALK</small>
          </div>
        </div>

        <div class="floating-pill pill-one">Listening</div>
        <div class="floating-pill pill-two">Understanding</div>
        <div class="floating-pill pill-three">Taking action</div>
      </div>
    </div>
  </section>

  <!-- JOURNEY -->
  <section class="journey" id="product">
    <div class="container">
      <div class="section-intro">
        <div>
          <div class="eyebrow"><span></span> THE JOURNEY</div>
          <h2>One conversation.<br><span>Four intelligent moves.</span></h2>
        </div>
        <p>
          Behind every natural Vocabot conversation is a simple flow:
          understand the customer, make the right decision, and move the
          business forward.
        </p>
      </div>

      <div class="journey-line"></div>

      <div class="journey-steps">

        <article class="journey-step">
          <div class="step-number">01</div>
          <div class="step-icon">◉</div>
          <div class="step-content">
            <span class="step-tag">LISTEN</span>
            <h3>Hear what the customer means.</h3>
            <p>
              Vocabot captures the conversation and identifies the
              customer's intent without forcing them through rigid menus.
            </p>
          </div>
          <div class="step-mini">
            <span>Customer</span>
            <strong>“I need to change my appointment.”</strong>
          </div>
        </article>

        <article class="journey-step">
          <div class="step-number">02</div>
          <div class="step-icon">✦</div>
          <div class="step-content">
            <span class="step-tag">UNDERSTAND</span>
            <h3>Know what needs to happen next.</h3>
            <p>
              The agent uses your instructions, business knowledge, and
              conversation context to decide the appropriate response.
            </p>
          </div>
          <div class="step-mini">
            <span>Vocabot</span>
            <strong>Intent identified: Reschedule</strong>
          </div>
        </article>

        <article class="journey-step">
          <div class="step-number">03</div>
          <div class="step-icon">↗</div>
          <div class="step-content">
            <span class="step-tag">ACT</span>
            <h3>Turn the conversation into action.</h3>
            <p>
              Vocabot follows your workflow to collect information,
              trigger an action, schedule an appointment, or route the call.
            </p>
          </div>
          <div class="step-mini">
            <span>Workflow</span>
            <strong>Appointment → Update → Confirm</strong>
          </div>
        </article>

        <article class="journey-step">
          <div class="step-number">04</div>
          <div class="step-icon">✓</div>
          <div class="step-content">
            <span class="step-tag">IMPROVE</span>
            <h3>Learn from every interaction.</h3>
            <p>
              Conversation insights help your team understand what customers
              are asking and where the experience can become better.
            </p>
          </div>
          <div class="step-mini">
            <span>Result</span>
            <strong>Conversation resolved ✓</strong>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- CONVERSATION -->
  <section class="conversation-section" id="demo">
    <div class="container conversation-grid">

      <div class="conversation-copy">
        <div class="eyebrow"><span></span> SEE IT IN ACTION</div>
        <h2>It sounds like a conversation.<br><span>It works like a system.</span></h2>
        <p>
          Vocabot keeps the interaction natural for the customer while
          connecting the conversation to the processes behind your business.
        </p>

        <div class="system-flow">
          <div class="flow-node active"><span>01</span> Voice</div>
          <div class="flow-arrow">→</div>
          <div class="flow-node"><span>02</span> AI</div>
          <div class="flow-arrow">→</div>
          <div class="flow-node"><span>03</span> Workflow</div>
          <div class="flow-arrow">→</div>
          <div class="flow-node"><span>04</span> Result</div>
        </div>
      </div>

      <div class="phone-card">
        <div class="phone-top">
          <span class="phone-dot"></span>
          LIVE CALL
          <span class="call-time">01:24</span>
        </div>

        <div class="caller">
          <div class="avatar">C</div>
          <div>
            <small>Customer</small>
            <p>I want to move my appointment to Friday.</p>
          </div>
        </div>

        <div class="ai-reply">
          <div class="avatar ai-avatar">V</div>
          <div>
            <small>Vocabot</small>
            <p>Of course. I can help with that. What time on Friday works best for you?</p>
          </div>
        </div>

        <div class="thinking">
          <span></span><span></span><span></span>
          <b>Vocabot is processing</b>
        </div>

        <div class="call-action">
          <div>
            <small>ACTION TRIGGERED</small>
            <strong>Appointment workflow</strong>
          </div>
          <span class="check">✓</span>
        </div>
      </div>

    </div>
  </section>

  <!-- CONNECTION MAP -->
  <section class="connection-section">
    <div class="container">
      <div class="section-heading center">
        <div class="eyebrow"><span></span> CONNECTED BY DESIGN</div>
        <h2>Your AI agent fits<br><span>into your existing stack.</span></h2>
        <p>
          Vocabot can sit between the customer and the systems your team
          already uses, helping conversations flow into real business actions.
        </p>
      </div>

      <div class="connection-map">
        <div class="map-node customer-node">
          <div class="map-icon">☎</div>
          <strong>Customer</strong>
          <small>Starts a conversation</small>
        </div>

        <div class="map-line left-line"></div>

        <div class="map-node vocabot-node">
          <div class="map-icon large">V</div>
          <strong>Vocabot</strong>
          <small>Understands & responds</small>
          <div class="pulse"></div>
        </div>

        <div class="map-line right-line"></div>

        <div class="map-stack">
          <div class="stack-node"><span>CRM</span><b>↗</b></div>
          <div class="stack-node"><span>Calendar</span><b>↗</b></div>
          <div class="stack-node"><span>Support</span><b>↗</b></div>
        </div>
      </div>
    </div>
  </section>

  <!-- BENEFITS -->
  <section class="benefits">
    <div class="container">
      <div class="benefit-grid">
        <div>
          <div class="eyebrow"><span></span> WHY IT MATTERS</div>
          <h2>Less waiting.<br><span>More doing.</span></h2>
          <p>
            The goal isn't simply to automate a call. It's to create a
            faster, more useful customer experience while reducing repetitive
            work for your team.
          </p>
        </div>

        <div class="benefit-cards">
          <div class="benefit-card"><strong>24/7</strong><span>Customer availability</span></div>
          <div class="benefit-card"><strong>01</strong><span>Consistent voice experience</span></div>
          <div class="benefit-card"><strong>∞</strong><span>Scalable conversations</span></div>
          <div class="benefit-card"><strong>↗</strong><span>Action-oriented workflows</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section" id="contact">
    <div class="container">
      <div class="cta-box">
        <div class="cta-glow"></div>
        <div>
          <div class="eyebrow"><span></span> READY TO TALK?</div>
          <h2>Let's put your<br><span>conversations to work.</span></h2>
          <p>See what a Vocabot voice agent could do for your business.</p>
        </div>
        <a href="{{ url('/contact') }}" class="primary-btn">Book a Demo <span>→</span></a>
      </div>
    </div>
  </section>
</main>
@endsection

@section('scripts')
  <script src="{{ asset('js/how-it-works-new.js') }}" defer></script>
@endsection
