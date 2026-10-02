@extends('layouts.app')

@section('title', 'Integrations | Vocabot AI Voice Agent')
@section('description', 'Connect Vocabot AI Voice Agent with your CRM, communication, calendar, automation and business tools.')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/integrations.css') }}">
@endsection

@section('content')
  <main>
    <!-- =========================
         HERO SECTION
    ========================== -->
    <section class="hero">
        <div class="container hero-grid">

            <!-- Left Column: Content -->
            <div class="hero-copy reveal">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    POWERFUL INTEGRATIONS
                </div>

                <h1>
                    Connect Vocabot to
                    <span class="gradient-text">Your Business Stack.</span>
                </h1>

                <p class="hero-lead">
                    Bring your AI voice agent into the tools you already use.
                    Connect calls, leads, appointments, customers and conversations
                    across your entire business workflow.
                </p>

                <div class="hero-buttons">
                    <a href="#integrations" class="primary-btn">
                        Explore Integrations
                       <i class="ri-arrow-right-line"></i>
                    </a>

                    <a href="{{ url('/contact') }}" class="secondary-btn">
                        Talk to Our Team
                    </a>
                </div>
            </div>

            <!-- Right Column: Integration Network -->
            <div class="integration-network">
                <div class="network-orbit orbit-1"></div>
                <div class="network-orbit orbit-2"></div>

                <div class="connection connection-1"></div>
                <div class="connection connection-2"></div>
                <div class="connection connection-3"></div>
                <div class="connection connection-4"></div>
                <div class="connection connection-5"></div>
                <div class="connection connection-6"></div>

                <div class="network-node node-crm">
                    <i class="fa-solid fa-users"></i>
                    <span>CRM</span>
                </div>

                <div class="network-node node-calendar">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Calendar</span>
                </div>

                <div class="network-node node-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>Calls</span>
                </div>

                <div class="network-node node-chat">
                    <i class="fa-solid fa-comments"></i>
                    <span>Chat</span>
                </div>

                <div class="network-node node-auto">
                    <i class="fa-solid fa-bolt"></i>
                    <span>Automation</span>
                </div>

                <div class="network-node node-api">
                    <i class="fa-solid fa-code"></i>
                    <span>API</span>
                </div>

                <div class="vocabot-core">
                    <div class="core-ring"></div>
                    <div class="core-inner">
                        <img src="{{ asset('images/logo2.png') }}" alt="Vocabot">
                    </div>
                    <strong>Vocabot</strong>
                    <small>AI Voice Agent</small>
                </div>
            </div>

        </div>
    </section>

    <!-- =========================
         STACK STRIP
    ========================== -->
    <section class="stack-strip">
        <div class="stack-item">
            <span class="stack-icon">◈</span>
            CRM
        </div>

        <div class="stack-line"></div>

        <div class="stack-item">
            <span class="stack-icon">◷</span>
            CALENDAR
        </div>

        <div class="stack-line"></div>

        <div class="stack-item">
            <span class="stack-icon">⌁</span>
            TELEPHONY
        </div>

        <div class="stack-line"></div>

        <div class="stack-item">
            <span class="stack-icon">⚡</span>
            AUTOMATION
        </div>

        <div class="stack-line"></div>

        <div class="stack-item">
            <span class="stack-icon">◉</span>
            API
        </div>
    </section>

    <!-- =========================
         INTEGRATIONS
    ========================== -->
    <section class="integrations-section" id="integrations">

        <div class="section-heading">
            <div class="section-label">
                <span></span>
                CONNECT YOUR TOOLS
            </div>

            <h2>
                Everything your AI agent
                <span>needs to work smarter.</span>
            </h2>

            <p>
                Connect Vocabot with the systems that power your business
                and turn every conversation into an actionable workflow.
            </p>
        </div>

        <!-- Search + Filter -->
        <div class="integration-controls">
            <div class="search-box">
                <span class="search-icon">⌕</span>
                <input
                    type="text"
                    id="integrationSearch"
                    placeholder="Search integrations..."
                    aria-label="Search integrations">
            </div>

            <div class="filter-buttons" id="filterButtons">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="crm">CRM</button>
                <button class="filter-btn" data-filter="calendar">Calendar</button>
                <button class="filter-btn" data-filter="communication">Communication</button>
                <button class="filter-btn" data-filter="automation">Automation</button>
            </div>
        </div>

        <!-- Integration Grid -->
        <div class="integration-grid" id="integrationGrid">

            <!-- CRM -->
            <article class="integration-card" data-category="crm" data-name="salesforce crm">
                <div class="integration-top">
                    <div class="integration-logo salesforce-logo">SF</div>
                    <span class="integration-type">CRM</span>
                </div>
                <h3>Salesforce</h3>
                <p>Capture and update customer information automatically after every conversation.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="crm" data-name="hubspot crm">
                <div class="integration-top">
                    <div class="integration-logo hubspot-logo">HS</div>
                    <span class="integration-type">CRM</span>
                </div>
                <h3>HubSpot</h3>
                <p>Send leads, caller details and conversation outcomes directly into your CRM.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="crm" data-name="zoho crm">
                <div class="integration-top">
                    <div class="integration-logo zoho-logo">ZO</div>
                    <span class="integration-type">CRM</span>
                </div>
                <h3>Zoho CRM</h3>
                <p>Keep customer records organized while Vocabot handles conversations and lead capture.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <!-- CALENDAR -->
            <article class="integration-card" data-category="calendar" data-name="google calendar">
                <div class="integration-top">
                    <div class="integration-logo google-logo">GC</div>
                    <span class="integration-type">CALENDAR</span>
                </div>
                <h3>Google Calendar</h3>
                <p>Let Vocabot check availability and help customers schedule appointments during calls.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="calendar" data-name="calendly calendar booking">
                <div class="integration-top">
                    <div class="integration-logo calendly-logo">CA</div>
                    <span class="integration-type">BOOKING</span>
                </div>
                <h3>Calendly</h3>
                <p>Turn conversations into scheduled meetings without forcing customers through complicated booking flows.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="calendar" data-name="booking appointment">
                <div class="integration-top">
                    <div class="integration-logo booking-logo">BK</div>
                    <span class="integration-type">BOOKING</span>
                </div>
                <h3>Booking Systems</h3>
                <p>Connect your existing appointment or reservation workflow to Vocabot.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <!-- COMMUNICATION -->
            <article class="integration-card" data-category="communication" data-name="twilio telephony voice">
                <div class="integration-top">
                    <div class="integration-logo twilio-logo">TW</div>
                    <span class="integration-type">VOICE</span>
                </div>
                <h3>Telephony</h3>
                <p>Connect your business phone infrastructure and route calls to your AI voice agent.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="communication" data-name="slack communication">
                <div class="integration-top">
                    <div class="integration-logo slack-logo">SL</div>
                    <span class="integration-type">TEAM</span>
                </div>
                <h3>Slack</h3>
                <p>Send call summaries, lead notifications and important updates directly to your team.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="communication" data-name="microsoft teams">
                <div class="integration-top">
                    <div class="integration-logo teams-logo">MT</div>
                    <span class="integration-type">TEAM</span>
                </div>
                <h3>Microsoft Teams</h3>
                <p>Keep your team informed with automated conversation summaries and notifications.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <!-- AUTOMATION -->
            <article class="integration-card" data-category="automation" data-name="zapier automation">
                <div class="integration-top">
                    <div class="integration-logo zapier-logo">ZP</div>
                    <span class="integration-type">AUTOMATION</span>
                </div>
                <h3>Zapier</h3>
                <p>Build automated workflows between Vocabot and the applications your team already uses.</p>
                <a href="#api" class="integration-link">Connect workflow <span>→</span></a>
            </article>

            <article class="integration-card" data-category="automation" data-name="webhooks automation">
                <div class="integration-top">
                    <div class="integration-logo webhook-logo">WH</div>
                    <span class="integration-type">DEVELOPER</span>
                </div>
                <h3>Webhooks</h3>
                <p>Trigger your own workflows whenever important voice events happen.</p>
                <a href="#api" class="integration-link">Configure <span>→</span></a>
            </article>

            <article class="integration-card" data-category="automation" data-name="api developer integration">
                <div class="integration-top">
                    <div class="integration-logo api-logo">API</div>
                    <span class="integration-type">DEVELOPER</span>
                </div>
                <h3>Vocabot API</h3>
                <p>Build custom integrations and connect Vocabot directly to your own business applications.</p>
                <a href="#api" class="integration-link">Explore API <span>→</span></a>
            </article>

        </div>

        <!-- No Results -->
        <div class="no-results" id="noResults">
            <div class="no-results-icon">⌕</div>
            <h3>No integrations found</h3>
            <p>Try another search term or category.</p>
        </div>

    </section>

    <!-- =========================
         API SECTION
    ========================== -->
    <section class="api-section" id="api">

        <div class="api-card">

            <div class="api-content">

                <div class="section-label">
                    <span></span>
                    CUSTOM CONNECTIONS
                </div>

                <h2>
                    Your stack.
                    <span>Your rules.</span>
                </h2>

                <p>
                    Don't see the exact tool you need? Use Vocabot APIs
                    and webhooks to connect your own systems, databases
                    and internal applications.
                </p>

                <div class="api-features">
                    <div>
                        <span class="check">✓</span>
                        REST API support
                    </div>

                    <div>
                        <span class="check">✓</span>
                        Webhook events
                    </div>

                    <div>
                        <span class="check">✓</span>
                        Custom workflows
                    </div>

                    <div>
                        <span class="check">✓</span>
                        Developer-friendly architecture
                    </div>
                </div>

                <a href="{{ url('/contact') }}" class="primary-btn">
                    Talk to Our Team
                    <span>→</span>
                </a>

            </div>

            <!-- Code Window -->
            <div class="code-window">
                <div class="code-header">
                    <div class="window-dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <span>webhook.json</span>
                </div>

                <div class="code-body">
<pre><code>{
  <span class="code-key">"event"</span>: <span class="code-string">"call.completed"</span>,
  <span class="code-key">"caller"</span>: {
    <span class="code-key">"name"</span>: <span class="code-string">"John Smith"</span>,
    <span class="code-key">"phone"</span>: <span class="code-string">"+1 555 000 0000"</span>
  },
  <span class="code-key">"intent"</span>: <span class="code-string">"appointment"</span>,
  <span class="code-key">"status"</span>: <span class="code-string">"completed"</span>
}</code></pre>
                </div>
            </div>

        </div>

    </section>

    <!-- =========================
         HOW IT WORKS
    ========================== -->
    <section class="workflow-section">

        <div class="section-heading">
            <div class="section-label">
                <span></span>
                HOW IT WORKS
            </div>

            <h2>
                From conversation
                <span>to action.</span>
            </h2>

            <p>
                Vocabot connects the voice conversation to the systems
                your business relies on.
            </p>
        </div>

        <div class="workflow-grid">
            <div class="workflow-card">
                <div class="workflow-number">01</div>
                <div class="workflow-icon">☎</div>
                <h3>Customer Calls</h3>
                <p>A customer calls your business and Vocabot answers instantly.</p>
            </div>

            <div class="workflow-arrow">→</div>

            <div class="workflow-card">
                <div class="workflow-number">02</div>
                <div class="workflow-icon">✦</div>
                <h3>Vocabot Understands</h3>
                <p>The AI understands the customer's request and responds naturally.</p>
            </div>

            <div class="workflow-arrow">→</div>

            <div class="workflow-card">
                <div class="workflow-number">03</div>
                <div class="workflow-icon">◈</div>
                <h3>Data Syncs</h3>
                <p>Relevant information is sent to your connected business tools.</p>
            </div>

            <div class="workflow-arrow">→</div>

            <div class="workflow-card">
                <div class="workflow-number">04</div>
                <div class="workflow-icon">✓</div>
                <h3>Action Happens</h3>
                <p>An appointment, lead, notification or workflow is completed automatically.</p>
            </div>
        </div>

    </section>

    <!-- =========================
         CTA
    ========================== -->
    <section class="cta-section">
        <div class="cta-card">
            <div class="cta-glow"></div>

            <div class="cta-content">
                <div class="cta-label">
                    <span></span>
                    READY TO CONNECT?
                </div>

                <h2>
                    Make every call
                    <span>work harder.</span>
                </h2>

                <p>
                    Connect Vocabot with your existing tools and create
                    a smarter customer communication workflow.
                </p>

                <div class="cta-buttons">
                    <a href="{{ url('/contact') }}" class="primary-btn">
                        Book a Demo
                        <span>→</span>
                    </a>

                    <a href="#integrations" class="secondary-btn">
                        Explore Integrations
                    </a>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/integrations.js') }}"></script>
@endsection
