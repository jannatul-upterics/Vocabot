<!-- ================= FOOTER ================= -->
<footer class="footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <a class="brand logo" href="<?php echo e(url('/')); ?>">
        <img src="<?php echo e(asset('images/logo2.png')); ?>?v=<?php echo e(filemtime(public_path('images/logo2.png'))); ?>" alt="Vocabot AI Voice Receptionist Logo" width="36" height="36">
        <span><b>Voca</b>bot</span>
      </a>
      <p>24/7 AI voice receptionist that answers customer calls, manages reservations, and turns conversations into completed workflows.</p>
      <div class="socials">
        <a href="<?php echo e(url('/contact')); ?>" aria-label="Contact Vocabot on LinkedIn"><i class="ri-linkedin-fill"></i></a>
        <a href="<?php echo e(url('/contact')); ?>" aria-label="Contact Vocabot on Instagram"><i class="ri-instagram-line"></i></a>
        <a href="<?php echo e(url('/contact')); ?>" aria-label="Contact Vocabot on Facebook"><i class="ri-facebook-fill"></i></a>
      </div>
    </div>

    <div class="footer-col">
      <h3>Product</h3>
      <a href="<?php echo e(url('/product')); ?>">Overview</a>
      <a href="<?php echo e(url('/how-it-works')); ?>">How It Works</a>
      <a href="<?php echo e(url('/#demo')); ?>">AI Voice Demo</a>
      <a href="<?php echo e(url('/integrations')); ?>">Integrations</a>
    </div>

    <div class="footer-col">
      <h3>Solutions</h3>
      <a href="<?php echo e(url('/solutions')); ?>">Restaurant Calls</a>
      <a href="<?php echo e(url('/solutions#use-cases')); ?>">Table Reservations</a>
      <a href="<?php echo e(url('/solutions#workflow')); ?>">Voice Workflows</a>
      <a href="<?php echo e(url('/solutions#benefits')); ?>">Impact & ROI</a>
    </div>

    <div class="footer-col">
      <h3>Company</h3>
      <a href="<?php echo e(url('/#faq')); ?>">FAQ</a>
      <a href="<?php echo e(url('/contact')); ?>">Contact</a>
      <a href="<?php echo e(url('/policy#privacy')); ?>">Privacy Policy</a>
      <a href="<?php echo e(url('/policy#terms')); ?>">Terms of Service</a>
    </div>
  </div>

  <div class="container footer-bottom">
    <span>© <span id="year"><?php echo e(date('Y')); ?></span> Vocabot. All rights reserved.</span>
    <span>AI voice automation for modern businesses.</span>
  </div>
</footer>
<?php /**PATH D:\Sellyco Promotions\Vocabot\resources\views/layouts/footer.blade.php ENDPATH**/ ?>