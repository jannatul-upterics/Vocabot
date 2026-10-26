<!-- ================= NAVBAR ================= -->
<header class="navbar" id="navbar">
  <div class="container nav-inner">
    <a class="brand logo" href="<?php echo e(url('/')); ?>" aria-label="Vocabot home">
      <img src="<?php echo e(asset('images/logo2.png')); ?>?v=<?php echo e(filemtime(public_path('images/logo2.png'))); ?>" alt="Vocabot AI Voice Receptionist Logo" width="36" height="36">
      <span><b>Voca</b>bot</span>
    </a>

    <nav class="desktop-nav" aria-label="Main navigation">
      <a href="<?php echo e(url('/')); ?>" class="<?php echo e(Request::is('/') || Request::is('vocabot') ? 'active' : ''); ?>">Home</a>
      <a href="<?php echo e(url('/product')); ?>" class="<?php echo e(Request::is('product') ? 'active' : ''); ?>">Product</a>
      <a href="<?php echo e(url('/how-it-works')); ?>" class="<?php echo e(Request::is('how-it-works') ? 'active' : ''); ?>">How It Works</a>
      <a href="<?php echo e(url('/solutions')); ?>" class="<?php echo e(Request::is('solutions') ? 'active' : ''); ?>">Solutions</a>
      <a href="<?php echo e(url('/integrations')); ?>" class="<?php echo e(Request::is('integrations') ? 'active' : ''); ?>">Integrations</a>
      <a href="<?php echo e(url('/contact')); ?>" class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>">Contact</a>
    </nav>

    <a class="btn btn-primary nav-btn" href="<?php echo e(Request::is('/') ? '#contact' : url('/contact')); ?>">Book a Demo</a>

    <!-- Mobile Menu Button -->
    <button type="button" id="menuToggle" class="menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <!-- MOBILE MENU -->
  <div class="mobile-menu" id="mobileMenu">
    <a href="<?php echo e(url('/')); ?>" class="<?php echo e(Request::is('/') || Request::is('vocabot') ? 'active' : ''); ?>">Home</a>
    <a href="<?php echo e(url('/product')); ?>" class="<?php echo e(Request::is('product') ? 'active' : ''); ?>">Product</a>
    <a href="<?php echo e(url('/how-it-works')); ?>" class="<?php echo e(Request::is('how-it-works') ? 'active' : ''); ?>">How It Works</a>
    <a href="<?php echo e(url('/solutions')); ?>" class="<?php echo e(Request::is('solutions') ? 'active' : ''); ?>">Solutions</a>
    <a href="<?php echo e(url('/integrations')); ?>" class="<?php echo e(Request::is('integrations') ? 'active' : ''); ?>">Integrations</a>
    <a href="<?php echo e(url('/contact')); ?>" class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>">Contact</a>
    <a href="<?php echo e(url('/policy')); ?>" class="<?php echo e(Request::is('policy') || Request::is('policies') ? 'active' : ''); ?>">Policies</a>
    <a href="<?php echo e(Request::is('/') ? '#contact' : url('/contact')); ?>" class="mobile-demo">Book a Demo</a>
  </div>
</header>
<?php /**PATH D:\Sellyco Promotions\Vocabot\resources\views/layouts/header.blade.php ENDPATH**/ ?>