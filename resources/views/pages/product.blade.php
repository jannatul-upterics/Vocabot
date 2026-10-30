@extends('layouts.app')

@section('title', 'Vocabot Platform | AI Voice Receptionist & Automation Engine')
@section('description', 'Explore the Vocabot voice agent platform: 24/7 inbound call answering, automated reservation booking, conversational FAQ support, and staff handoff.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
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
          "name": "Product",
          "item": "{{ url('/product') }}"
        }
      ]
    },
    {
      "@@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How long does setup take?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Setup typically takes a few days depending on your specific booking rules, hours, FAQs, and phone integration. During your demo, our team will review your workflow and outline the implementation steps."
          }
        },
        {
          "@type": "Question",
          "name": "Can Vocabot automate existing reservation workflows?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Vocabot connects to your existing calendar, reservation tool, or CRM via webhooks and APIs to check availability and log bookings in real time."
          }
        },
        {
          "@type": "Question",
          "name": "Can calls be handed off to a live team member?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. You can define custom escalation rules so that urgent requests, complex inquiries, or VIP callers are transferred directly to your staff."
          }
        },
        {
          "@type": "Question",
          "name": "Can the agent conversation style be customized?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Greeting scripts, tone of voice, terminology, and specific business answers are fully configured to reflect your brand."
          }
        }
      ]
    }
  ]
}
</script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
    <main>
        <!-- ================= HERO ================= -->
        <section class="hero" id="home">
            <div class="container hero-grid">
                <div class="hero-copy reveal">
                    <div class="eyebrow"><span></span> AI VOICE AGENTS • AVAILABLE 24/7</div>

                    <h1>
                        Power Your
                        <br>
                        Business
                        <span class="gradient-text">With Intelligent Voice.</span>
                    </h1>

                    <p class="hero-lead">
                        Vocabot answers, understands and takes action across
                        your business — from the first hello to the final workflow.
                    </p>

                    <div class="hero-actions">
                        <a class="btn btn-primary btn-lg" href="{{ url('/contact') }}">
                            Book a Free Demo <i class="ri-arrow-right-line"></i>
                        </a>

                        <a class="btn btn-ghost btn-lg" href="#demo">
                            See AI in action
                            <span>↓</span>
                        </a>
                    </div>

                    <div class="micro-proof">
                        <span>●</span>
                        Natural conversations connected to real business workflows.
                    </div>
                </div>

                <!-- Phone / AI Conversation Stage -->
                <div class="phone-stage">
                    <div class="ring r1" aria-hidden="true"></div>
                    <div class="ring r2" aria-hidden="true"></div>

                    <div class="call-card">
                        <header class="call-top">
                            <div class="status-badge"></div>
                        </header>

                        <div class="thinking" aria-live="polite">
                            <span class="dot" aria-hidden="true"></span>
                            <span class="dot" aria-hidden="true"></span>
                            <span class="dot" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= MARQUEE ================= -->
        <section class="marquee-band" aria-hidden="true">
            <div class="marquee-track">
                <!-- First set -->
                <div class="marquee-set" aria-hidden="true">
                    <span>ANSWER CALLS</span>
                    <b>✦</b>
                    <span>UNDERSTAND REQUESTS</span>
                    <b>✦</b>
                    <span>CHECK AVAILABILITY</span>
                    <b>✦</b>
                    <span>MANAGE BOOKINGS</span>
                    <b>✦</b>
                    <span>ANSWER QUESTIONS</span>
                    <b>✦</b>
                    <span>HANDLE CANCELLATIONS</span>
                    <b>✦</b>
                </div>
                <!-- Duplicate for seamless loop -->
                <div class="marquee-set" aria-hidden="true">
                    <span>ANSWER CALLS</span>
                    <b>✦</b>
                    <span>UNDERSTAND REQUESTS</span>
                    <b>✦</b>
                    <span>CHECK AVAILABILITY</span>
                    <b>✦</b>
                    <span>MANAGE BOOKINGS</span>
                    <b>✦</b>
                    <span>ANSWER QUESTIONS</span>
                    <b>✦</b>
                    <span>HANDLE CANCELLATIONS</span>
                    <b>✦</b>
                </div>
            </div>
        </section>

        <!-- ================= PRODUCT COMMAND CENTER ================= -->
        <section id="product" class="section command">
            <div class="wrap">
                <div class="section-head left reveal">
                    <div class="eyebrow">THE PRODUCT</div>
                    <h2>Your AI <span>command center.</span></h2>
                    <p>
                        See what your voice agent understands, what it is doing
                        and where each conversation ends up.
                    </p>
                </div>

                <div class="dashboard reveal">
                    <aside>
                        <div class="side-logo">V<span>·</span>BOT</div>
                        <div class="side-item active">◉ <span>Overview</span></div>
                        <div class="side-item">◌ <span>Live Calls</span></div>
                        <div class="side-item">◇ <span>Workflows</span></div>
                        <div class="side-item">□ <span>Conversations</span></div>
                        <div class="side-item">⚙ <span>Settings</span></div>

                        <div class="side-user">
                            <div>V</div>
                            <span>
                                Vocabot Agent
                                <small>AI Voice Agent</small>
                            </span>
                        </div>
                    </aside>

                    <div class="dash-main">
                        <div class="dash-header">
                            <div>
                                <small>OVERVIEW</small>
                                <strong class="dash-greeting" style="display:block; font-size: 1.25rem; font-weight: 700;">Good morning.</strong>
                            </div>
                            <span class="status-pill">● Agent active</span>
                        </div>

                        <div class="metrics">
                            <div>
                                <small>LIVE CONVERSATIONS</small>
                                <strong>12</strong>
                                <span>Right now</span>
                            </div>
                            <div>
                                <small>WORKFLOWS RUNNING</small>
                                <strong>08</strong>
                                <span>In progress</span>
                            </div>
                            <div>
                                <small>ACTIONS COMPLETED</small>
                                <strong>24</strong>
                                <span>This session</span>
                            </div>
                        </div>

                        <div class="dash-grid">
                            <div class="activity">
                                <div class="box-title">
                                    <b>Live activity</b>
                                    <span>View all →</span>
                                </div>
                                <div class="activity-row">
                                    <i class="dot"></i>
                                    <div>
                                        <b>Reservation Intent Detected</b>
                                        <small>Customer call · 12 sec ago</small>
                                    </div>
                                    <strong>Running</strong>
                                </div>
                                <div class="activity-row">
                                    <i class="dot"></i>
                                    <div>
                                        <b>Calls Handled</b>
                                        <small>Customer call · 31 sec ago</small>
                                    </div>
                                    <strong>Completed</strong>
                                </div>
                                <div class="activity-row">
                                    <i class="dot"></i>
                                    <div>
                                        <b>Support question answered</b>
                                        <small>Customer call · 48 sec ago</small>
                                    </div>
                                    <strong>Completed</strong>
                                </div>
                            </div>

                            <div class="intent">
                                <div class="box-title">
                                    <b>Current intent</b>
                                    <span>LIVE</span>
                                </div>
                                <div class="intent-ring">
                                    <strong>92%</strong>
                                    <small>confidence</small>
                                </div>
                                <strong class="intent-title" style="display:block; font-size: 1.15rem; font-weight: 700; margin-bottom: 6px;">Table Reservation</strong>
                                <p>
                                    AI is checking configured availability
                                    and preparing the next action.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= JOBS ================= -->
        <section id="solutions" class="section dark">
            <div class="wrap">
                <div class="center-head reveal">
                    <div class="eyebrow">ONE AGENT · MANY JOBS</div>
                    <h2>Voice that does <span>more than talk.</span></h2>
                </div>

                <div class="jobs reveal">
                    <article>
                        <b>01</b>
                        <div class="job-icon">◉</div>
                        <h3>24/7 Call Answering</h3>
                        <p>Answer inbound calls instantly on the first ring and keep conversations moving.</p>
                    </article>
                    <article>
                        <b>02</b>
                        <div class="job-icon">◫</div>
                        <h3>Reservations & Booking</h3>
                        <p>Book, reschedule, or cancel reservations based on your real-time availability rules.</p>
                    </article>
                    <article>
                        <b>03</b>
                        <div class="job-icon">◌</div>
                        <h3>Guest FAQs & Support</h3>
                        <p>Answer recurring questions about hours, directions, menus, and policies instantly.</p>
                    </article>
                    <article>
                        <b>04</b>
                        <div class="job-icon">↗</div>
                        <h3>Live Staff Handoff</h3>
                        <p>Route complex inquiries, VIP customers, or sensitive calls directly to your team.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- ================= CONVERSATION ================= -->
        <section id="conversation" class="section conversation">
            <div class="wrap convo-grid" id="demo">
                <div class="convo-copy reveal">
                    <div class="eyebrow">WATCH AI WORK</div>
                    <h2>Conversation goes in.<br><span>Action comes out.</span></h2>
                    <p>
                        Vocabot connects what customers say to what
                        your business needs to do next.
                    </p>

                    <div class="flow-list">
                        <div><b>01</b><span>Capture intent</span><i>→</i></div>
                        <div><b>02</b><span>Understand context</span><i>→</i></div>
                        <div><b>03</b><span>Run workflow</span><i>→</i></div>
                        <div><b>04</b><span>Complete action</span><i>✓</i></div>
                    </div>
                </div>

                <div class="transcript reveal">
                    <div class="trans-head">
                        <span>LIVE CONVERSATION</span>
                        <strong>● PLAYING</strong>
                    </div>

                    <div class="wave">
                        <i></i><i></i><i></i><i></i><i></i>
                        <i></i><i></i><i></i><i></i><i></i>
                        <i></i><i></i><i></i><i></i><i></i>
                    </div>

                    <div class="line">
                        <small>CUSTOMER</small>
                        <p>“Can I book something for Friday afternoon?”</p>
                    </div>

                    <div class="line ai-line">
                        <small>VOCABOT</small>
                        <p>“Of course. I'll check Friday afternoon availability for you.”</p>
                    </div>

                    <div class="analysis">
                        <div><small>INTENT</small><b>Reservation</b></div>
                        <div><small>ACTION</small><b>Check availability</b></div>
                        <div><small>STATUS</small><b class="live-text">Processing…</b></div>
                    </div>

                    <button class="play" id="playDemo" type="button">
                        <span class="play-icon">▶</span>
                        <span class="play-text">Play conversation</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- ================= WORKFLOW ================= -->
        <section id="how-it-works" class="section workflow-section">
            <div class="wrap">
                <div class="center-head reveal">
                    <div class="eyebrow">WORKFLOW ENGINE</div>
                    <h2>Built around how your <span>business works.</span></h2>
                    <p>
                        From a simple answer to a multi-step workflow,
                        Vocabot can turn conversations into configured actions.
                    </p>
                </div>

                <div class="workflow-map reveal">
                    <div class="node customer-node">
                        <small>01</small>
                        <b>Customer Call</b>
                        <span>“I need an appointment.”</span>
                    </div>
                    <div class="connector">→</div>
                    <div class="node">
                        <small>02</small>
                        <b>AI Understands</b>
                        <span>Intent · Context · Details</span>
                    </div>
                    <div class="connector">→</div>
                    <div class="node">
                        <small>03</small>
                        <b>Workflow Runs</b>
                        <span>Rules · Systems · Actions</span>
                    </div>
                    <div class="connector">→</div>
                    <div class="node outcome">
                        <small>04</small>
                        <b>Action Completed</b>
                        <span>Booking · Lead · Answer</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= INDUSTRIES ================= -->
        <!--<section id="integrations" class="section industries">
            <div class="wrap">
                <div class="center-head reveal">
                    <div class="eyebrow">BUILT FOR BUSINESS</div>
                    <h2>One platform. <span>Many conversations.</span></h2>
                </div>

                <div class="industry-grid reveal">
                    <span>Healthcare</span>
                    <span>Restaurants</span>
                    <span>Real Estate</span>
                    <span>Banking</span>
                    <span>Insurance</span>
                    <span>Retail</span>
                    <span>Hospitality</span>
                    <span>Education</span>
                    <span>Logistics</span>
                    <span>Professional Services</span>
                </div>
            </div>
        </section>-->

        <!-- ================= BUSINESS VALUE ================= -->
        <section class="section value">
            <div class="wrap value-grid">
                <div class="reveal">
                    <div class="eyebrow">BUSINESS VALUE</div>
                    <h2>What is one missed call <span>worth?</span></h2>
                    <p>
                        Every unanswered or delayed conversation can become
                        a missed opportunity. Vocabot helps your team respond
                        immediately and move routine conversations forward.
                    </p>
                </div>

                <div class="value-list reveal">
                    <div><span>✓</span>Respond immediately</div>
                    <div><span>✓</span>Capture customer intent</div>
                    <div><span>✓</span>Automate repetitive conversations</div>
                    <div><span>✓</span>Complete configured actions</div>
                    <div><span>✓</span>Escalate when human help is needed</div>
                </div>
            </div>
        </section>

        <!-- ================= FAQ ================= -->
        <section id="faq" class="section faq">
            <div class="wrap faq-grid">
                <div class="reveal">
                    <div class="eyebrow">FAQ</div>
                    <h2>Questions,<br><span>answered.</span></h2>
                </div>

                <div class="reveal">
                    <details open>
                        <summary>How long does setup take? <b>+</b></summary>
                        <p>
                            Setup typically takes a few days depending on your specific booking rules, hours, FAQs, and phone integration. During your demo, our team will review your workflow and outline the implementation steps.
                        </p>
                    </details>
                    <details>
                        <summary>Can Vocabot automate existing reservation workflows? <b>+</b></summary>
                        <p>
                            Yes. Vocabot connects to your existing calendar, reservation tool, or CRM via webhooks and APIs to check availability and log bookings in real time.
                        </p>
                    </details>
                    <details>
                        <summary>Can calls be handed off to a live team member? <b>+</b></summary>
                        <p>
                            Yes. You can define custom escalation rules so that urgent requests, complex inquiries, or VIP callers are transferred directly to your staff.
                        </p>
                    </details>
                    <details>
                        <summary>Can the agent conversation style be customized? <b>+</b></summary>
                        <p>
                            Yes. Greeting scripts, tone of voice, terminology, and specific business answers are fully configured to reflect your brand.
                        </p>
                    </details>
                </div>
            </div>
        </section>

        <!-- ================= FINAL CTA ================= -->
        <section id="contact" class="final">
            <div class="wrap final-card reveal">
                <div class="eyebrow">GET STARTED</div>
                <h2>Your next call could already be <span>automated.</span></h2>
                <p>See how a Vocabot AI voice workflow could fit your business.</p>
                <a class="btn" href="{{ url('/contact') }}">
                    Book a Free Demo <b>→</b>
                </a>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/product.js') }}"></script>
@endsection
