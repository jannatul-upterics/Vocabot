<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo $__env->yieldContent('title', 'Vocabot | 24/7 AI Voice Receptionist for Business'); ?></title>
  <meta name="description" content="<?php echo $__env->yieldContent('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.'); ?>">
  <meta name="robots" content="<?php echo $__env->yieldContent('robots', 'index, follow, max-image-preview:large'); ?>">
  <link rel="canonical" href="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">

  <!-- Author & General Meta -->
  <meta name="author" content="Vocabot">

  <!-- Open Graph / Facebook / Instagram / LinkedIn -->
  <meta property="og:site_name" content="Vocabot">
  <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
  <meta property="og:locale" content="en_US">
  <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Vocabot | 24/7 AI Voice Receptionist for Business'); ?>">
  <meta property="og:description" content="<?php echo $__env->yieldContent('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.'); ?>">
  <meta property="og:url" content="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">
  <meta property="og:image" content="<?php echo e(asset('images/logo2.png')); ?>">
  <meta property="og:image:secure_url" content="<?php echo e(asset('images/logo2.png')); ?>">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Vocabot - 24/7 AI Voice Receptionist for Business">

  <!-- X (Twitter) Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="<?php echo $__env->yieldContent('twitter_site', '@vocabot'); ?>">
  <meta name="twitter:creator" content="<?php echo $__env->yieldContent('twitter_creator', '@vocabot'); ?>">
  <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'Vocabot | 24/7 AI Voice Receptionist for Business'); ?>">
  <meta name="twitter:description" content="<?php echo $__env->yieldContent('description', 'Vocabot is a 24/7 AI voice receptionist that answers customer calls, manages reservations and bookings, answers FAQs, and streamlines business workflows.'); ?>">
  <meta name="twitter:image" content="<?php echo e(asset('images/logo2.png')); ?>">
  <meta name="twitter:image:alt" content="Vocabot - 24/7 AI Voice Receptionist for Business">
  <meta name="twitter:domain" content="<?php echo e(parse_url(url('/'), PHP_URL_HOST) ?? 'vocabot.ai'); ?>">
  <meta name="twitter:url" content="<?php echo $__env->yieldContent('canonical', url()->current()); ?>">

  <meta name="theme-color" content="#070313">

  <link rel="icon" href="<?php echo e(asset('images/logo2.png')); ?>?v=<?php echo e(filemtime(public_path('images/logo2.png'))); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lato:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Global Structured Data: Organization & WebSite -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "<?php echo e(url('/')); ?>#organization",
        "name": "Vocabot",
        "url": "<?php echo e(url('/')); ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo e(asset('images/logo2.png')); ?>"
        },
        "email": "hello@vocabot.ai",
        "description": "Vocabot provides 24/7 AI voice receptionists for business call answering, reservations, and customer workflows."
      },
      {
        "@type": "WebSite",
        "@id": "<?php echo e(url('/')); ?>#website",
        "url": "<?php echo e(url('/')); ?>",
        "name": "Vocabot",
        "publisher": {
          "@id": "<?php echo e(url('/')); ?>#organization"
        }
      }
    ]
  }
  </script>

  <?php echo $__env->yieldContent('schema'); ?>
  <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
  <div class="page-glow glow-one"></div>
  <div class="page-glow glow-two"></div>
  <div class="grid-overlay"></div>

  <!-- Shared Header -->
  <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <!-- Page Content -->
  <?php echo $__env->yieldContent('content'); ?>

  <!-- Shared Footer -->
  <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Sellyco Promotions\Vocabot\resources\views/layouts/app.blade.php ENDPATH**/ ?>