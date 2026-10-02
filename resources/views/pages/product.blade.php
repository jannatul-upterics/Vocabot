@extends('layouts.app')

@section('title', 'Vocabot | AI Voice Agent Platform')
@section('description', 'Vocabot turns business calls into completed actions with AI voice agents.')

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
        <section class="marquee-band">
            <div class="marquee">
                <span>ANSWER CALLS</span>
                <b>✦</b>
                <span>BOOK APPOINTMENTS</span>
                <b>✦</b>
                <span>QUALIFY LEADS</span>
                <b>✦</b>
                <span>HANDLE SUPPORT</span>
                <b>✦</b>
                <span>CAPTURE ORDERS</span>
                <b>✦</b>
                <span>ANSWER CALLS</span>
                <b>✦</b>
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
                                <h3>Good morning.</h3>
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
                                        <b>Appointment intent detected</b>
                                        <small>Customer call · 12 sec ago</small>
                                    </div>
                                    <strong>Running</strong>
                                </div>
                                <div class="activity-row">
                                    <i class="dot"></i>
                                    <div>
                                        <b>Lead qualified</b>
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
                                <h4>Appointment booking</h4>
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
                    <div class="eyebrow">ONE AGENT · SIX JOBS</div>
                    <h2>Voice that does <span>more than talk.</span></h2>
                </div>

                <div class="jobs reveal">
                    <article>
                        <b>01</b>
                        <div class="job-icon">◉</div>
                        <h3>24/7 Call Answering</h3>
                        <p>Answer inbound calls instantly and keep conversations moving.</p>
                    </article>
                    <article>
                        <b>02</b>
                        <div class="job-icon">◫</div>
                        <h3>Appointments & Reservations</h3>
                        <p>Book, reschedule and cancel using your configured rules.</p>
                    </article>
                    <article>
                        <b>03</b>
                        <div class="job-icon">⌁</div>
                        <h3>Lead Qualification</h3>
                        <p>Ask the right questions and route qualified opportunities.</p>
                    </article>
                    <article>
                        <b>04</b>
                        <div class="job-icon">◌</div>
                        <h3>Customer Support</h3>
                        <p>Answer common questions and escalate when needed.</p>
                    </article>
                    <article>
                        <b>05</b>
                        <div class="job-icon">▣</div>
                        <h3>Orders & Transactions</h3>
                        <p>Capture structured requests through natural conversations.</p>
                    </article>
                    <article>
                        <b>06</b>
                        <div class="job-icon">文</div>
                        <h3>Multilingual Conversations</h3>
                        <p>Serve customers across languages and markets.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- ================= CONVERSATION ================= -->
        <section id="conversation" class="section conversation">
            <div class="wrap convo-grid">
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
                        <div><small>INTENT</small><b>Appointment</b></div>
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
        <section id="integrations" class="section industries">
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
        </section>

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
                            Setup depends on your workflows, integrations
                            and level of customization. During a demo,
                            we can map the requirements and explain the
                            implementation path.
                        </p>
                    </details>
                    <details>
                        <summary>Can Vocabot automate existing workflows? <b>+</b></summary>
                        <p>
                            Yes. Vocabot can be designed around the processes
                            your team already uses, with implementation based
                            on your specific workflow requirements.
                        </p>
                    </details>
                    <details>
                        <summary>Can calls be handed to a human? <b>+</b></summary>
                        <p>
                            Yes. Workflows can be designed to escalate
                            conversations when human assistance is needed.
                        </p>
                    </details>
                    <details>
                        <summary>Can the agent be customized? <b>+</b></summary>
                        <p>
                            Yes. Conversation behavior, workflow logic and
                            business requirements can be configured around
                            your use case.
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
