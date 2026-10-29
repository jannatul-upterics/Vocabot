@extends('layouts.app')

@section('title', 'Contact Vocabot | Request an AI Voice Demo')
@section('description', 'Get in touch with the Vocabot team to request a personalized demo, discuss pricing, or explore custom AI voice automation for your business.')

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
      "name": "Contact",
      "item": "{{ url('/contact') }}"
    }
  ]
}
</script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/aacontact.css') }}?v={{ filemtime(public_path('css/aacontact.css')) }}">
@endsection

@section('content')
<main>
    <!-- ================= HERO ================= -->
    <section class="contact-hero" id="home">
        <div class="hero-glow"></div>
        <div class="container hero-content reveal">
            <span class="eyebrow"><span></span>GET IN TOUCH</span>
            <h1>
                Let's build better
                <span>conversations.</span>
            </h1>
            <p>
                Have a question, want to see Vocabot in action, or ready to
                transform your customer conversations? We'd love to hear
                from you.
            </p>
        </div>
    </section>

    <!-- ================= CONTACT SECTION ================= -->
    <section class="contact-section" id="contact">
        <div class="container contact-grid">
            <!-- Contact Information -->
            <div class="contact-info reveal">
                <div class="section-label">CONTACT US</div>
                <h2>Talk to our <span>team.</span></h2>
                <p class="info-description">
                    Tell us a little about your business and what you're
                    looking to achieve. Our team will get back to you
                    shortly.
                </p>

                <!-- Email -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="ri-mail-line"></i>
                    </div>
                    <div>
                        <span>Email</span>
                        <a href="mailto:hello@vocabot.ai">hello@vocabot.ai</a>
                    </div>
                </div>

                <!-- Support -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="ri-customer-service-2-line"></i>
                    </div>
                    <div>
                        <span>Support</span>
                        <p>Our team is here to help you.</p>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="ri-time-line"></i>
                    </div>
                    <div>
                        <span>Business Hours</span>
                        <p>
                            Monday – Friday<br>
                            9:00 AM – 6:00 PM
                        </p>
                    </div>
                </div>

                <!-- Contact Note -->
                <div class="contact-note">
                    <strong>Ready to see Vocabot in action?</strong>
                    <p>
                        Book a personalized demo and discover how AI voice
                        agents can work for your business.
                    </p>
                </div>
            </div>

            <!-- ================= CONTACT FORM ================= -->
            <div class="contact-form-wrapper reveal" id="contact-form">
                <div class="form-header">
                    <span>START A CONVERSATION</span>
                    <h3>Tell us about your needs.</h3>
                </div>

                <form id="contactForm" novalidate action="{{ url('/contact') }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="Your first name" autocomplete="given-name" required>
                        <div class="error-message" id="error-firstName"></div>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" placeholder="Your last name" autocomplete="family-name" required>
                        <div class="error-message" id="error-lastName"></div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Work Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@company.com" autocomplete="email" required>
                        <div class="error-message" id="error-email"></div>
                    </div>

                    <!-- Company -->
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Your company name" autocomplete="organization">
                        <div class="error-message" id="error-company"></div>
                    </div>

                    <!-- Interest -->
                    <div class="form-group">
                        <label for="interest">What can we help with?</label>
                        <select id="interest" name="interest" required>
                            <option value="" disabled {{ old('interest') ? '' : 'selected' }}>Select an option</option>
                            <option value="Book a Demo" {{ old('interest') == 'Book a Demo' ? 'selected' : '' }}>Book a Demo</option>
                            <option value="Voice AI Agent" {{ old('interest') == 'Voice AI Agent' ? 'selected' : '' }}>Voice AI Agent</option>
                            <option value="Customer Support" {{ old('interest') == 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
                            <option value="Sales Automation" {{ old('interest') == 'Sales Automation' ? 'selected' : '' }}>Sales Automation</option>
                            <option value="Integrations" {{ old('interest') == 'Integrations' ? 'selected' : '' }}>Integrations</option>
                            <option value="Other" {{ old('interest') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <div class="error-message" id="error-interest">@error('interest') {{ $message }} @enderror</div>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us about your requirements..." required>{{ old('message') }}</textarea>
                        <div class="error-message" id="error-message">@error('message') {{ $message }} @enderror</div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        Send Message <span>&rarr;</span>
                    </button>

                    <!-- Form Status -->
                    <p class="form-status" id="formStatus" role="status" aria-live="polite">
                        @if(session('success'))
                            <span class="success">{{ session('success') }}</span>
                        @elseif($errors->any())
                            <span class="error">{{ $errors->first() }}</span>
                        @endif
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- ================= DEMO CTA ================= -->
    <section class="contact-cta" id="demo">
        <div class="container">
            <div class="cta-box reveal">
                <div>
                    <span class="eyebrow">READY WHEN YOU ARE</span>
                    <h2>Give your business <span>a voice.</span></h2>
                    <p>
                        See how Vocabot can automate conversations,
                        improve customer experience, and help your team
                        scale.
                    </p>
                </div>
                <a href="#contact" class="cta-btn">Book a Demo →</a>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/contact.js') }}?v={{ filemtime(public_path('js/contact.js')) }}"></script>
@endsection
