@extends('layouts.app')

@section('title', 'Vocabot | AI Voice Agents for Every Business')
@section('description', 'Vocabot provides AI voice agents that answer calls, book appointments, qualify leads, take orders and automate customer conversations 24/7 across industries.')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/vocabot.css') }}">
@endsection

@section('content')
  <main>
    <!-- ================= HERO ================= -->
    <section class="hero section" id="home">
      <div class="container hero-grid">
        <div class="hero-copy reveal">
          <div class="eyebrow">
            <span class="live-dot"></span>
            AI Voice Agents • Available 24/7
          </div>

          <h1>
            Turn Every Call Into
            <span class="gradient-text">an Opportunity.</span>
          </h1>

          <p class="hero-lead">
            Vocabot is an AI voice agent platform that answers calls,
            books appointments, qualifies leads, takes orders, handles
            customer questions and automates conversations across industries.
          </p>

          <div class="hero-actions">
            <a class="btn btn-primary btn-lg" href="#contact">
              Book a Free Demo <i class="ri-arrow-right-line"></i>
            </a>
            <a class="btn btn-ghost btn-lg" href="#demo">
              <i class="ri-play-circle-line"></i> Listen to AI
            </a>
          </div>

          <div class="hero-proof">
            <div class="proof-icon"><i class="ri-phone-fill"></i></div>
            <div>
              <strong>One AI agent. Every conversation.</strong>
              <span>Inbound calls, automation and handoffs in one place.</span>
            </div>
          </div>
        </div>

        <div class="hero-visual reveal">
          <div class="hero-orbit orbit-a"></div>
          <div class="hero-orbit orbit-b"></div>

          <div class="call-window glass-card">
            <div class="window-top">
              <div class="window-dots"><span></span><span></span><span></span></div>
              <span class="window-title">Vocabot Live Agent</span>
              <span class="status-pill"><i class="ri-checkbox-circle-fill"></i> Live</span>
            </div>

            <div class="call-profile">
              <div class="avatar">V</div>
              <div>
                <strong>Incoming conversation</strong>
                <span>Customer • +1 (555) 018-2040</span>
              </div>
              <div class="call-time">00:42</div>
            </div>

            <div class="conversation">
              <div class="message customer">
                <span>Customer</span>
                “Hi, I need an appointment tomorrow afternoon.”
              </div>
              <div class="message ai">
                <span>Vocabot AI</span>
                “Absolutely. I can check availability and book that for you.”
              </div>
              <div class="message customer">
                <span>Customer</span>
                “Around 3 PM would be perfect.”
              </div>
            </div>

            <div class="agent-status">
              <div class="waveform" aria-hidden="true">
                <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
              </div>
              <span>AI is listening…</span>
              <button aria-label="End call"><i class="ri-phone-fill"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= TRUST STRIP ================= -->
    <section class="trust-strip">
      <div class="container">
        <span>BUILT FOR BUSINESSES THAT DEPEND ON EVERY CALL</span>
        <div class="trust-items">
          <span><i class="ri-phone-line"></i> Call Handling</span>
          <span><i class="ri-calendar-check-line"></i> Booking</span>
          {{-- <span><i class="ri-user-search-line"></i> Lead Qualification</span> --}}
          <span><i class="ri-customer-service-2-line"></i> Support</span>
          <span><i class="ri-global-line"></i> Multilingual</span>
        </div>
      </div>
    </section>

    <!-- ================= PROBLEM ================= -->
    <section class="section problem-section">
      <div class="container">
        <div class="section-heading center reveal">
          <span class="section-label">THE PROBLEM</span>
          <h2>Every missed call can become a <span class="gradient-text">missed opportunity.</span></h2>
          <p>Customers do not always wait. Vocabot makes sure your business can respond when your team is busy, offline or unavailable.</p>
        </div>

        <div class="problem-grid">
          <article class="problem-card glass-card reveal">
            <div class="icon-box"> <i class="ri-phone-line"></i></div>
            <h3>Missed Calls</h3>
            <p>Busy teams cannot answer every inbound call. Vocabot responds instantly.</p>
          </article>

          <article class="problem-card glass-card reveal">
            <div class="icon-box"><i class="ri-time-line"></i></div>
            <h3>After-Hours Demand</h3>
            <p>Keep conversations moving outside normal business hours without adding shifts.</p>
          </article>

          <article class="problem-card glass-card reveal">
            <div class="icon-box"><i class="ri-repeat-2-line"></i></div>
            <h3>Repetitive Questions</h3>
            <p>Let AI handle routine questions so your people can focus on higher-value work.</p>
          </article>

          <article class="problem-card glass-card reveal">
            <div class="icon-box"><i class="ri-user-forbid-line"></i></div>
            <h3>Slow Lead Response</h3>
            <p>Qualify and route inbound opportunities while customer intent is still high.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ================= PRODUCT ================= -->
    <section class="section product-section" id="product">
      <div class="container">
        <div class="section-heading center reveal">
          <span class="section-label">THE VOCABOT PLATFORM</span>
          <h2>One AI voice agent.<br><span class="gradient-text">Endless workflows.</span></h2>
          <p>From the first hello to the final action, Vocabot turns natural conversations into completed business tasks.</p>
        </div>

        <div class="feature-grid">
          <article class="feature-card glass-card reveal">
            <div class="feature-icon"><i class="ri-phone-fill"></i></div>
            <h3>24/7 Call Answering</h3>
            <p>Answer inbound calls instantly and keep customer conversations moving around the clock.</p>
            <a href="{{ url('/product') }}" class="feature-link">Always on <i class="ri-arrow-right-line"></i></a>
          </article>

          <article class="feature-card glass-card reveal">
            <div class="feature-icon"><i class="ri-calendar-check-fill"></i></div>
            <h3>Appointments & Reservations</h3>
            <p>Book, reschedule and cancel appointments or reservations using your configured rules.</p>
            <a href="{{ url('/product') }}" class="feature-link">Automated booking <i class="ri-arrow-right-line"></i></a>
          </article>

          {{--
          <article class="feature-card glass-card reveal">
            <div class="feature-icon"><i class="ri-user-search-fill"></i></div>
            <h3>Lead Qualification</h3>
            <p>Ask the right questions, capture intent and route qualified opportunities to your team.</p>
            <a href="{{ url('/product') }}" class="feature-link">Convert more leads <i class="ri-arrow-right-line"></i></a>
          </article>
          --}}

          <article class="feature-card glass-card reveal">
            <div class="feature-icon"><i class="ri-customer-service-2-fill"></i></div>
            <h3>Customer Support</h3>
            <p>Answer common questions, provide information and escalate complex requests when needed.</p>
            <a href="{{ url('/product') }}" class="feature-link">Smart handoff <i class="ri-arrow-right-line"></i></a>
          </article>

          <article class="feature-card glass-card reveal">
            <div class="feature-icon"><i class="ri-shopping-bag-3-fill"></i></div>
            <h3>Orders & Transactions</h3>
            <p>Capture orders, requests and structured information through natural voice conversations.</p>
            <a href="{{ url('/product') }}" class="feature-link">Conversation to action <i class="ri-arrow-right-line"></i></a>
          </article>

          <article class="feature-card glass-card reveal">
            <div class="feature-icon"><i class="ri-global-fill"></i></div>
            <h3>Multilingual Conversations</h3>
            <p>Serve customers across languages and markets with natural, configurable AI conversations.</p>
            <a href="{{ url('/product') }}" class="feature-link">Global-ready <i class="ri-arrow-right-line"></i></a>
          </article>
        </div>
      </div>
    </section>

    <!-- ================= HOW IT WORKS ================= -->
    <section class="section workflow-section" id="how-it-works">
      <div class="container">
        <div class="section-heading center reveal">
          <span class="section-label">HOW IT WORKS</span>
          <h2>From conversation to <span class="gradient-text">completion.</span></h2>
          <p>Vocabot combines natural voice conversations with workflow automation.</p>
        </div>

        <div class="steps">
          <div class="step reveal">
            <div class="step-number">01</div>
            <div class="step-line"></div>
            <div class="step-icon"><i class="ri-phone-fill"></i></div>
            <h3>Customer Calls</h3>
            <p>A customer contacts your business through your configured phone channel.</p>
          </div>

          <div class="step reveal">
            <div class="step-number">02</div>
            <div class="step-line"></div>
            <div class="step-icon"><i class="ri-sparkling-2-fill"></i></div>
            <h3>AI Understands</h3>
            <p>Vocabot understands intent, context and the information required to help.</p>
          </div>

          <div class="step reveal">
            <div class="step-number">03</div>
            <div class="step-line"></div>
            <div class="step-icon"><i class="ri-flow-chart"></i></div>
            <h3>Workflow Runs</h3>
            <p>The agent connects the conversation to your business rules and systems.</p>
          </div>

          <div class="step reveal">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="ri-checkbox-circle-fill"></i></div>
            <h3>Action Completed</h3>
            <p>Book, qualify, order, answer, update or transfer—without unnecessary manual work.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= AI DEMO ================= -->
    <section class="section demo-section" id="demo">
      <div class="container demo-grid">
        <div class="demo-copy reveal">
          <span class="section-label">LIVE AI DEMO</span>
          <h2>Hear how <span class="gradient-text">Vocabot talks.</span></h2>
          <p>Experience a sample AI conversation and see how a natural voice interaction can become a real business workflow.</p>

          <div class="demo-points">
            <div><i class="ri-checkbox-circle-fill"></i><span>Natural conversational responses</span></div>
            <div><i class="ri-checkbox-circle-fill"></i><span>Context-aware questions and answers</span></div>
            <div><i class="ri-checkbox-circle-fill"></i><span>Workflow automation and human handoff</span></div>
          </div>
        </div>

        <div class="audio-card glass-card reveal">
          <div class="audio-top">
            <div class="audio-avatar"><i class="ri-mic-2-fill"></i></div>
            <div>
              <span>Vocabot AI</span>
              <strong>Voice Assistant Demo</strong>
            </div>
            <span class="live-badge"><i class="ri-radio-button-line"></i> DEMO</span>
          </div>

          <div class="audio-visualizer" id="audioVisualizer" aria-hidden="true">
            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
          </div>

          <audio id="demoAudio" controls preload="metadata">
            <source src="{{ asset('demo.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>

          <div class="audio-caption">
            <span>Sample conversation</span>
            <span>AI Voice Agent</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= SLIDER ================= -->
    <section class="section showcase-section">
      <div class="container showcase-grid">
        <div class="showcase-visual glass-card reveal">
          <div class="screen-top">
            <span>Vocabot Workflow</span>
            <span class="screen-live"><i class="ri-circle-fill"></i> LIVE</span>
          </div>
          <div class="screen-image">
            <img id="showcaseImage" src="{{ asset('images/s1.png') }}" alt="Vocabot workflow demonstration">
          </div>
          <div class="slider-controls">
            <button id="prevSlide" aria-label="Previous slide"><i class="ri-arrow-left-line"></i></button>
            <div class="slider-dots" id="sliderDots"></div>
            <button id="nextSlide" aria-label="Next slide"><i class="ri-arrow-right-line"></i></button>
          </div>
        </div>

        <div class="showcase-copy reveal">
          <span class="section-label">ONE CONVERSATION. MANY OUTCOMES.</span>
          <div class="showcase-slides" id="showcaseSlides">
            <article class="showcase-slide active">
              <span class="slide-tag">01 • ALWAYS ON</span>
              <h2>Never miss the first hello.</h2>
              <p>Your AI agent is ready to answer calls, capture information and start helping customers instantly.</p>
            </article>
            <article class="showcase-slide">
              <span class="slide-tag">02 • SMART UNDERSTANDING</span>
              <h2>Understands what customers mean.</h2>
              <p>Natural conversation helps the agent understand intent instead of relying only on rigid scripts.</p>
            </article>
            <article class="showcase-slide">
              <span class="slide-tag">03 • AUTOMATION</span>
              <h2>Turn words into workflows.</h2>
              <p>Connect conversations to booking, qualification, order-taking, support and other business actions.</p>
            </article>
            <article class="showcase-slide">
              <span class="slide-tag">04 • BUSINESS INTELLIGENCE</span>
              <h2>Make every conversation measurable.</h2>
              <p>Use conversation history and performance insights to understand demand and improve operations.</p>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= SECTORS ================= -->
    <section class="section sectors-section" id="sectors">
      <div class="container">
        <div class="section-heading center reveal">
          <span class="section-label">SOLUTIONS FOR EVERY SECTOR</span>
          <h2>One platform.<br><span class="gradient-text">Every industry.</span></h2>
          <p>Vocabot can be configured around the workflows, terminology and customer journeys of different industries.</p>
        </div>

        <div class="sector-grid">
          <article class="sector-card glass-card reveal"><i class="ri-hospital-line"></i><h3>Healthcare</h3><p>Appointments, patient questions and call routing.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-restaurant-2-line"></i><h3>Restaurants</h3><p>Reservations, orders, FAQs and customer calls.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-building-2-line"></i><h3>Real Estate</h3><p>Lead qualification, property inquiries and follow-ups.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-bank-line"></i><h3>Banking</h3><p>Customer information, routing and service workflows.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-shield-check-line"></i><h3>Insurance</h3><p>Lead intake, policy questions and customer support.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-store-2-line"></i><h3>Retail</h3><p>Product questions, orders and customer assistance.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-hotel-line"></i><h3>Hospitality</h3><p>Bookings, guest requests and service conversations.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-graduation-cap-line"></i><h3>Education</h3><p>Admissions inquiries, scheduling and support.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-truck-line"></i><h3>Logistics</h3><p>Customer updates, scheduling and inbound requests.</p></article>
          <article class="sector-card glass-card reveal"><i class="ri-customer-service-2-line"></i><h3>Professional Services</h3><p>Lead intake, qualification and appointment booking.</p></article>
        </div>
      </div>
    </section>

    <!-- ================= DASHBOARD ================= -->
    <section class="section dashboard-section">
      <div class="container dashboard-grid">
        <div class="dashboard-copy reveal">
          <span class="section-label">CONTROL CENTER</span>
          <h2>See what your AI agent is doing <span class="gradient-text">in real time.</span></h2>
          <p>Monitor conversations, workflows and performance from one central dashboard.</p>

          <div class="check-list">
            <div><i class="ri-checkbox-circle-fill"></i> Live conversation monitoring</div>
            <div><i class="ri-checkbox-circle-fill"></i> Appointment and reservation management</div>
            <div><i class="ri-checkbox-circle-fill"></i> Conversation history</div>
            <div><i class="ri-checkbox-circle-fill"></i> Performance analytics</div>
            <div><i class="ri-checkbox-circle-fill"></i> Human handoff visibility</div>
          </div>

          <a class="btn btn-primary" href="#contact">See Vocabot in Action <i class="ri-arrow-right-line"></i></a>
        </div>

        <div class="dashboard-window glass-card reveal" id="dashboardCard">
          <div class="dashboard-header">
            <div>
              <span>Vocabot Control Center</span>
              <strong>AI Agent Overview</strong>
            </div>
            <span class="status-pill"><i class="ri-checkbox-circle-fill"></i> Operational</span>
          </div>

          <div class="metric-grid">
            <div class="metric"><span>Active Calls</span><strong>12</strong><small><i class="ri-arrow-up-line"></i> Live now</small></div>
            <div class="metric"><span>Bookings</span><strong>38</strong><small><i class="ri-calendar-check-line"></i> Today</small></div>
            <div class="metric"><span>Qualified Leads</span><strong>24</strong><small><i class="ri-user-follow-line"></i> Captured</small></div>
            <div class="metric"><span>Tasks Completed</span><strong>96%</strong><small><i class="ri-checkbox-circle-line"></i> Automated</small></div>
          </div>

          <div class="activity">
            <div class="activity-title"><strong>Live Activity</strong><span>Updated now</span></div>
            <div class="activity-row"><span class="activity-icon"><i class="ri-calendar-check-fill"></i></span><div><strong>Appointment booked</strong><span>Customer requested 3:00 PM</span></div><time>now</time></div>
            <div class="activity-row"><span class="activity-icon"><i class="ri-user-add-fill"></i></span><div><strong>Lead qualified</strong><span>High-intent customer captured</span></div><time>2m</time></div>
            <div class="activity-row"><span class="activity-icon"><i class="ri-phone-fill"></i></span><div><strong>Call transferred</strong><span>Complex request routed to staff</span></div><time>5m</time></div>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= INTEGRATIONS ================= -->
    <section class="section integrations-section" id="integrations">
      <div class="container">
        <div class="section-heading center reveal">
          <span class="section-label">INTEGRATIONS</span>
          <h2>Works with your <span class="gradient-text">existing workflow.</span></h2>
          <p>Connect Vocabot to the systems your business already uses. Replace the example labels below with your confirmed integrations.</p>
        </div>

        <div class="integration-grid">
          <div class="integration-card glass-card reveal"><i class="ri-calendar-line"></i><span>Calendars</span></div>
          <div class="integration-card glass-card reveal"><i class="ri-database-2-line"></i><span>CRM</span></div>
          <div class="integration-card glass-card reveal"><i class="ri-shopping-cart-line"></i><span>Commerce</span></div>
          <div class="integration-card glass-card reveal"><i class="ri-phone-line"></i><span>Telephony</span></div>
          <div class="integration-card glass-card reveal"><i class="ri-flow-chart"></i><span>Automation</span></div>
          <div class="integration-card glass-card reveal"><i class="ri-bar-chart-2-line"></i><span>Analytics</span></div>
        </div>
      </div>
    </section>

    <!-- ================= ROI ================= -->
    <section class="section roi-section">
      <div class="container roi-card glass-card reveal">
        <div class="roi-copy">
          <span class="section-label">BUSINESS IMPACT</span>
          <h2>What could faster call response mean for your business?</h2>
          <p>Use this simple estimator to explore the potential value of conversations that are currently missed. This is an estimate, not a guaranteed result.</p>
        </div>

        <div class="roi-calculator">
          <label>
            Average value per conversion
            <div class="input-wrap"><span>₹</span><input id="dealValue" type="number" min="0" value="1500"></div>
          </label>

          <label>
            Missed opportunities per day
            <div class="input-wrap"><i class="ri-phone-off-line"></i><input id="missedCalls" type="number" min="0" value="5"></div>
          </label>

          <label>
            Working days per month
            <div class="input-wrap"><i class="ri-calendar-line"></i><input id="workingDays" type="number" min="1" value="26"></div>
          </label>

          <div class="roi-result">
            <span>Estimated monthly opportunity</span>
            <strong id="roiValue">₹1,95,000</strong>
            <small>Based on the assumptions above.</small>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= FAQ ================= -->
    <section class="section faq-section" id="faq">
      <div class="container faq-grid">
        <div class="section-heading reveal">
          <span class="section-label">FAQ</span>
          <h2>Questions, <span class="gradient-text">answered.</span></h2>
          <p>Everything you need to know before seeing Vocabot in action.</p>
        </div>

        <div class="faq-list reveal">
          <article class="faq-item active">
            <button class="faq-question"><span>What can Vocabot do?</span><i class="ri-add-line"></i></button>
            <div class="faq-answer"><p>Vocabot can answer calls, understand customer intent, book appointments or reservations, qualify leads, capture orders or information, answer configured FAQs and transfer calls to people when needed.</p></div>
          </article>

          <article class="faq-item">
            <button class="faq-question"><span>Which industries can use Vocabot?</span><i class="ri-add-line"></i></button>
            <div class="faq-answer"><p>Vocabot is designed as a configurable platform rather than a restaurant-only product. It can support healthcare, hospitality, restaurants, real estate, banking, insurance, retail, education, logistics, professional services and other call-driven businesses.</p></div>
          </article>

          <article class="faq-item">
            <button class="faq-question"><span>Can Vocabot transfer a call to a human?</span><i class="ri-add-line"></i></button>
            <div class="faq-answer"><p>Yes. Human handoff can be included for complex requests, sensitive situations or cases that require a member of your team.</p></div>
          </article>

          <article class="faq-item">
            <button class="faq-question"><span>Can it connect to our existing systems?</span><i class="ri-add-line"></i></button>
            <div class="faq-answer"><p>Yes, integrations can be configured around your workflow. The exact systems supported should be confirmed and listed on your final integrations page.</p></div>
          </article>

          <article class="faq-item">
            <button class="faq-question"><span>Does it work outside business hours?</span><i class="ri-add-line"></i></button>
            <div class="faq-answer"><p>Yes. The platform is designed for continuous availability so customer conversations do not have to stop when your team is offline.</p></div>
          </article>

          <article class="faq-item">
            <button class="faq-question"><span>How long does setup take?</span><i class="ri-add-line"></i></button>
            <div class="faq-answer"><p>Setup time depends on the workflows, integrations and level of customization required. Avoid promising a fixed setup time until your implementation process is finalized.</p></div>
          </article>
        </div>
      </div>
    </section>

    <!-- ================= CONTACT ================= -->
    <section class="section contact-section" id="contact">
      <div class="container contact-card glass-card">
        <div class="contact-copy reveal">
          <span class="section-label">READY TO AUTOMATE?</span>
          <h2>Let's build your <span class="gradient-text">AI voice workflow.</span></h2>
          <p>Tell us about your business and the calls you want to automate. We'll show you where Vocabot can fit into your workflow.</p>

          <div class="contact-details">
            <a href="mailto:hello@vocabot.ai"><i class="ri-mail-fill"></i> hello@vocabot.ai</a>
            <a href="tel:+919876543210"><i class="ri-phone-fill"></i> +91 98765 43210</a>
          </div>
        </div>

        <form class="contact-form reveal" id="contactForm">
          <div class="form-row">
            <label>Full Name<input type="text" name="name" placeholder="Your name" required></label>
            <label>Work Email<input type="email" name="email" placeholder="you@company.com" required></label>
          </div>
          <div class="form-row">
            <label>Company<input type="text" name="company" placeholder="Company name"></label>
            <label>Industry<select name="industry">
              <option value="">Select industry</option>
              <option>Healthcare</option>
              <option>Restaurants</option>
              <option>Real Estate</option>
              <option>Banking</option>
              <option>Insurance</option>
              <option>Retail</option>
              <option>Hospitality</option>
              <option>Education</option>
              <option>Logistics</option>
              <option>Professional Services</option>
              <option>Other</option>
            </select></label>
          </div>
          <label>What would you like to automate?
            <textarea name="message" rows="4" placeholder="Tell us about your calls, bookings, leads or support workflow..."></textarea>
          </label>
          <button class="btn btn-primary btn-lg" type="submit">Request a Demo <i class="ri-arrow-right-line"></i></button>
          <p class="form-note" id="formNote">This demo form is front-end only. Connect it to your backend/form service before launch.</p>
        </form>
      </div>
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/vocabot.js') }}"></script>
@endsection
