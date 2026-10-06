/* =========================================================
   VOCABOT — MAIN JAVASCRIPT
   Handles Navbar, Mobile Menu, Showcase Slider, FAQ Accordion,
   ROI Calculator, Scroll Reveal, and Smooth Scrolling.
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  // Initialize all modular components
  initNavbarScroll();
  initMobileMenu();
  initShowcaseSlider();
  initFaqAccordion();
  initRoiCalculator();
  initScrollReveal();
  initAudioPlayer();
});

/* =========================================================
   1. NAVBAR SCROLL EFFECT
   ========================================================= */
function initNavbarScroll() {
  const navbar = document.querySelector(".navbar");
  if (!navbar) return;

  const handleScroll = () => {
    if (window.scrollY > 20) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  };

  window.addEventListener("scroll", handleScroll, { passive: true });
  handleScroll(); // Initial check
}

/* =========================================================
   2. MOBILE MENU & HAMBURGER TOGGLE
   ========================================================= */
function initMobileMenu() {
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.querySelector(".mobile-menu");
  const body = document.body;

  if (!menuToggle || !mobileMenu) return;

  const openMenu = () => {
    menuToggle.classList.add("active");
    mobileMenu.classList.add("open");
    body.classList.add("menu-open");
    menuToggle.setAttribute("aria-expanded", "true");
  };

  const closeMenu = () => {
    menuToggle.classList.remove("active");
    mobileMenu.classList.remove("open");
    body.classList.remove("menu-open");
    menuToggle.setAttribute("aria-expanded", "false");
  };

  const toggleMenu = () => {
    const isOpen = mobileMenu.classList.contains("open");
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  };

  menuToggle.addEventListener("click", (e) => {
    e.stopPropagation();
    toggleMenu();
  });

  // Close menu when clicking on any mobile navigation link
  const mobileNavLinks = mobileMenu.querySelectorAll("a");
  mobileNavLinks.forEach((link) => {
    link.addEventListener("click", closeMenu);
  });

  // Close menu when clicking outside of navbar/menu
  document.addEventListener("click", (e) => {
    if (
      mobileMenu.classList.contains("open") &&
      !mobileMenu.contains(e.target) &&
      !menuToggle.contains(e.target)
    ) {
      closeMenu();
    }
  });

  // Close mobile menu automatically on screen resize beyond 991px breakpoint
  window.addEventListener("resize", () => {
    if (window.innerWidth > 991 && mobileMenu.classList.contains("open")) {
      closeMenu();
    }
  });
}

/* =========================================================
   3. SHOWCASE SLIDER
   ========================================================= */




function initShowcaseSlider() {
  const showcaseImage = document.getElementById("showcaseImage");
  const showcaseSlides = document.querySelectorAll(".showcase-slide");
  const sliderDots = document.getElementById("sliderDots");
  const prevSlide = document.getElementById("prevSlide");
  const nextSlide = document.getElementById("nextSlide");

  /* -----------------------------------------
     Check Required Elements
     ----------------------------------------- */

  if (
    !showcaseImage ||
    !showcaseSlides.length ||
    !sliderDots ||
    !prevSlide ||
    !nextSlide
  ) {
    return;
  }

  /* -----------------------------------------
     Slider Images
     ----------------------------------------- */

  const initialSrc = showcaseImage.getAttribute("src") || "";
  const pathPrefix = initialSrc.includes("images/") ? "images/" : "";

  const slides = [
    {
      image: pathPrefix + "s1.png",
      alt: "Vocabot AI 24/7 automated call receptionist - Always On"
    },
    {
      image: pathPrefix + "s2.png",
      alt: "Vocabot AI understanding caller intent - Smart NLU"
    },
    {
      image: pathPrefix + "s3.png",
      alt: "Vocabot automated workflow execution and booking confirmation"
    },
    {
      image: pathPrefix + "s4.png",
      alt: "Vocabot conversation history and business analytics"
    }
  ];

  let currentIndex = 0;
  let isAnimating = false;

  /* -----------------------------------------
     Create Slider Dots
     ----------------------------------------- */

  slides.forEach((_, index) => {
    const dot = document.createElement("button");

    dot.type = "button";
    dot.setAttribute(
      "aria-label",
      `Go to slide ${index + 1}`
    );

    if (index === 0) {
      dot.classList.add("active");
      dot.setAttribute("aria-current", "true");
    }

    dot.addEventListener("click", () => {
      goToSlide(index);
    });

    sliderDots.appendChild(dot);
  });

  const dots = sliderDots.querySelectorAll("button");

  /* -----------------------------------------
     Update Slider
     ----------------------------------------- */

  function updateSlider(index) {
    currentIndex = index;
    const target = slides[currentIndex];
    if (!target) return;

    showcaseImage.alt = target.alt;

    const setVisible = () => {
      showcaseImage.style.opacity = "1";
    };

    showcaseImage.onload = setVisible;
    showcaseImage.onerror = setVisible;

    const currentImageSrc = showcaseImage.getAttribute("src") || "";
    const isDifferent = !currentImageSrc.endsWith(target.image);

    if (isDifferent) {
      showcaseImage.style.opacity = "0";
      setTimeout(() => {
        showcaseImage.src = target.image;
        if (showcaseImage.complete) {
          setVisible();
        }
      }, 150);
    } else {
      setVisible();
    }

    /* -----------------------------------------
       Update Text Content
       ----------------------------------------- */

    showcaseSlides.forEach((slide, slideIndex) => {
      slide.classList.toggle(
        "active",
        slideIndex === currentIndex
      );
    });

    /* -----------------------------------------
       Update Dots
       ----------------------------------------- */

    dots.forEach((dot, dotIndex) => {
      const isActive = dotIndex === currentIndex;

      dot.classList.toggle("active", isActive);

      if (isActive) {
        dot.setAttribute("aria-current", "true");
      } else {
        dot.removeAttribute("aria-current");
      }
    });
  }

  /* -----------------------------------------
     Go To Slide
     ----------------------------------------- */

  function goToSlide(index) {
    if (isAnimating) return;

    isAnimating = true;

    /* Loop backward */
    if (index < 0) {
      index = slides.length - 1;
    }

    /* Loop forward */
    if (index >= slides.length) {
      index = 0;
    }

    updateSlider(index);

    setTimeout(() => {
      isAnimating = false;
    }, 450);
  }

  /* -----------------------------------------
     Previous Button
     ----------------------------------------- */

  prevSlide.addEventListener("click", () => {
    goToSlide(currentIndex - 1);
  });

  /* -----------------------------------------
     Next Button
     ----------------------------------------- */

  nextSlide.addEventListener("click", () => {
    goToSlide(currentIndex + 1);
  });

  /* -----------------------------------------
     Keyboard Navigation
     ----------------------------------------- */

  document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft") {
      goToSlide(currentIndex - 1);
    }

    if (event.key === "ArrowRight") {
      goToSlide(currentIndex + 1);
    }
  });

  /* -----------------------------------------
     Initial Slide
     ----------------------------------------- */

  updateSlider(0);
}
/* =========================================================
   4. FAQ ACCORDION
   ========================================================= */
function initFaqAccordion() {
  const faqItems = document.querySelectorAll(".faq-item");
  if (!faqItems.length) return;

  faqItems.forEach((item) => {
    const questionBtn = item.querySelector(".faq-question");
    if (!questionBtn) return;

    questionBtn.addEventListener("click", () => {
      const isActive = item.classList.contains("active");

      // Close all other active FAQ items
      faqItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.classList.remove("active");
        }
      });

      // Toggle current item
      item.classList.toggle("active", !isActive);
    });
  });
}

/* =========================================================
   5. ROI CALCULATOR
   ========================================================= */
function initRoiCalculator() {
  const dealValueInput = document.getElementById("dealValue");
  const missedCallsInput = document.getElementById("missedCalls");
  const workingDaysInput = document.getElementById("workingDays");
  const roiValueDisplay = document.getElementById("roiValue");

  if (
    !dealValueInput ||
    !missedCallsInput ||
    !workingDaysInput ||
    !roiValueDisplay
  ) {
    return;
  }

  const calculateROI = () => {
    const dealValue = Math.max(
      0,
      parseFloat(dealValueInput.value) || 0
    );

    const missedCalls = Math.max(
      0,
      parseFloat(missedCallsInput.value) || 0
    );

    const workingDays = Math.max(
      1,
      parseFloat(workingDaysInput.value) || 1
    );

    /*
     * Estimated monthly opportunity
     *
     * Average value per conversion
     * × Missed opportunities per day
     * × Working days per month
     */

    const monthlyOpportunity =
      dealValue * missedCalls * workingDays;

    roiValueDisplay.textContent =
      `₹${Math.round(monthlyOpportunity).toLocaleString("en-IN")}`;
  };

  // Recalculate when any input changes
  dealValueInput.addEventListener("input", calculateROI);
  missedCallsInput.addEventListener("input", calculateROI);
  workingDaysInput.addEventListener("input", calculateROI);

  // Initial calculation
  calculateROI();
}

/* =========================================================
   6. SCROLL REVEAL ANIMATIONS
   ========================================================= */
function initScrollReveal() {
  const revealElements = document.querySelectorAll(".reveal");
  if (!revealElements.length) return;

  const observerOptions = {
    root: null,
    threshold: 0.15,
    rootMargin: "0px 0px -40px 0px"
  };

  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        observer.unobserve(entry.target); // Reveal once
      }
    });
  }, observerOptions);

  revealElements.forEach((el) => revealObserver.observe(el));
}

/* =========================================================
   7. AUDIO PLAYER & VISUALIZER
   ========================================================= */
function initAudioPlayer() {
  const audio = document.getElementById("demoAudio");
  const visualizer = document.getElementById("audioVisualizer");

  if (!audio) return;

  audio.addEventListener("play", () => {
    visualizer?.classList.add("playing");
  });

  audio.addEventListener("pause", () => {
    visualizer?.classList.remove("playing");
  });

  audio.addEventListener("ended", () => {
    visualizer?.classList.remove("playing");
  });
}