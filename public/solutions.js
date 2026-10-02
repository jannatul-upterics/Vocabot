/* =========================================================
   VOCABOT — SOLUTIONS PAGE JS
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  /* =======================================================
     REVEAL ANIMATION
     ======================================================= */

  const revealElements = document.querySelectorAll(".reveal");

  if (revealElements.length) {
    const revealObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.15
      }
    );

    revealElements.forEach((element) => {
      revealObserver.observe(element);
    });
  }


  /* =======================================================
     MOBILE NAVIGATION
     ======================================================= */

  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const navbar = document.getElementById("navbar");

  if (menuToggle && mobileMenu) {

    menuToggle.addEventListener("click", () => {
      menuToggle.classList.toggle("active");
      mobileMenu.classList.toggle("open");

      document.body.classList.toggle(
        "menu-open",
        mobileMenu.classList.contains("open")
      );
    });


    /* Close menu when a link is clicked */

    const mobileLinks = mobileMenu.querySelectorAll("a");

    mobileLinks.forEach((link) => {
      link.addEventListener("click", () => {

        menuToggle.classList.remove("active");
        mobileMenu.classList.remove("open");
        document.body.classList.remove("menu-open");

      });
    });

  }


  /* =======================================================
     NAVBAR SCROLL EFFECT
     ======================================================= */

  if (navbar) {

    const updateNavbar = () => {
      if (window.scrollY > 20) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    };

    window.addEventListener("scroll", updateNavbar, {
      passive: true
    });

    /* Check initial position */
    updateNavbar();

  }


  /* =======================================================
     COPYRIGHT YEAR
     ======================================================= */

  const yearElement = document.getElementById("year");

  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  }

});