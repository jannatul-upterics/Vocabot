/* =========================================================
   VOCABOT — PAGE JAVASCRIPT
   Navbar + Mobile Menu + Smooth Scroll
   + Scroll Reveal + Active Navigation
   + Audio Visualizer + Contact Form
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  /* =========================================================
     NAVBAR
     ========================================================= */

  const navbar = document.getElementById("navbar");

  function updateNavbar() {

    if (!navbar) return;

    navbar.classList.toggle(
      "scrolled",
      window.scrollY > 30
    );
  }

  updateNavbar();

  window.addEventListener(
    "scroll",
    updateNavbar,
    { passive: true }
  );


  /* =========================================================
     MOBILE MENU
     ========================================================= */

  const menuToggle =
    document.getElementById("menuToggle");

  const mobileMenu =
    document.getElementById("mobileMenu");


  function closeMobileMenu() {

    if (!menuToggle || !mobileMenu) return;

    mobileMenu.classList.remove("open");

    menuToggle.classList.remove("active");

    menuToggle.setAttribute(
      "aria-expanded",
      "false"
    );

    menuToggle.setAttribute(
      "aria-label",
      "Open menu"
    );

    document.body.classList.remove("menu-open");
  }


  function openMobileMenu() {

    if (!menuToggle || !mobileMenu) return;

    mobileMenu.classList.add("open");

    menuToggle.classList.add("active");

    menuToggle.setAttribute(
      "aria-expanded",
      "true"
    );

    menuToggle.setAttribute(
      "aria-label",
      "Close menu"
    );

    document.body.classList.add("menu-open");
  }


  if (menuToggle && mobileMenu) {

    /* =======================================================
       TOGGLE MOBILE MENU
       ======================================================= */

    menuToggle.addEventListener("click", (event) => {

      event.preventDefault();
      event.stopPropagation();

      const isOpen =
        mobileMenu.classList.contains("open");

      if (isOpen) {

        closeMobileMenu();

      } else {

        openMobileMenu();

      }

    });


    /* =======================================================
       CLOSE WHEN MOBILE LINK IS CLICKED
       ======================================================= */

    const mobileLinks =
      mobileMenu.querySelectorAll("a");

    mobileLinks.forEach((link) => {

      link.addEventListener("click", () => {

        closeMobileMenu();

      });

    });


    /* =======================================================
       CLOSE WHEN CLICKING OUTSIDE
       ======================================================= */

    document.addEventListener("click", (event) => {

      if (
        !mobileMenu.classList.contains("open")
      ) {
        return;
      }

      const clickedInsideMenu =
        mobileMenu.contains(event.target);

      const clickedToggle =
        menuToggle.contains(event.target);

      if (
        !clickedInsideMenu &&
        !clickedToggle
      ) {

        closeMobileMenu();

      }

    });


    /* =======================================================
       CLOSE WITH ESCAPE KEY
       ======================================================= */

    document.addEventListener("keydown", (event) => {

      if (
        event.key === "Escape" &&
        mobileMenu.classList.contains("open")
      ) {

        closeMobileMenu();

        menuToggle.focus();

      }

    });


    /* =======================================================
       CLOSE WHEN SCREEN BECOMES DESKTOP
       ======================================================= */

    window.addEventListener("resize", () => {

      if (window.innerWidth > 900) {

        closeMobileMenu();

      }

    });

  } else {

    console.warn(
      "Vocabot mobile menu elements not found:",
      {
        menuToggle,
        mobileMenu
      }
    );

  }


  /* =========================================================
     SMOOTH INTERNAL LINKS
     ========================================================= */

  const internalLinks =
    document.querySelectorAll('a[href^="#"]');


  internalLinks.forEach((link) => {

    link.addEventListener("click", (event) => {

      const targetId =
        link.getAttribute("href");

      if (
        !targetId ||
        targetId === "#"
      ) {
        return;
      }


      let target;

      try {

        target =
          document.querySelector(targetId);

      } catch (error) {

        return;

      }


      if (!target) return;


      event.preventDefault();


      const navbarHeight =
        navbar
          ? navbar.offsetHeight
          : 0;


      const targetPosition =
        target.getBoundingClientRect().top +
        window.scrollY -
        navbarHeight -
        15;


      window.scrollTo({
        top: targetPosition,
        behavior: "smooth"
      });

    });

  });


  /* =========================================================
     SCROLL REVEAL
     ========================================================= */

  const revealItems =
    document.querySelectorAll(
      ".reveal, .solution-card, .workflow-step, .benefit-item"
    );


  if (
    revealItems.length &&
    "IntersectionObserver" in window
  ) {

    const observer =
      new IntersectionObserver(
        (entries, obs) => {

          entries.forEach((entry) => {

            if (!entry.isIntersecting) {
              return;
            }


            entry.target.classList.add("show");


            /*
             * For solution/workflow/benefit cards
             * that don't have their own .show CSS.
             */

            if (
              entry.target.classList.contains(
                "solution-card"
              ) ||
              entry.target.classList.contains(
                "workflow-step"
              ) ||
              entry.target.classList.contains(
                "benefit-item"
              )
            ) {

              entry.target.style.opacity = "1";

              entry.target.style.transform =
                "translateY(0)";

            }


            obs.unobserve(entry.target);

          });

        },
        {
          threshold: 0.12
        }
      );


    revealItems.forEach((item) => {

      /*
       * Only set inline animation styles for
       * solution/workflow/benefit cards.
       */

      if (
        item.classList.contains("solution-card") ||
        item.classList.contains("workflow-step") ||
        item.classList.contains("benefit-item")
      ) {

        item.style.opacity = "0";

        item.style.transform =
          "translateY(20px)";

        item.style.transition =
          "opacity 0.6s ease, transform 0.6s ease";

      }


      observer.observe(item);

    });

  } else {

    revealItems.forEach((item) => {

      item.classList.add("show");

    });

  }


  /* =========================================================
     ACTIVE DESKTOP NAVIGATION
     ========================================================= */
const navLinks = document.querySelectorAll(".desktop-nav a"); const currentPage = window.location.pathname .split("/") .pop() .toLowerCase() || "index.html"; function updateActiveNavigation() { if (!navLinks.length) return; /* Remove active class first */ navLinks.forEach((link) => { link.classList.remove("active"); }); /* ------------------------------------------------- Current HTML page ------------------------------------------------- */ let pageMatch = false; navLinks.forEach((link) => { const href = link.getAttribute("href"); if (!href) return; const cleanHref = href.split("#")[0] .split("?")[0] .toLowerCase(); if ( cleanHref && !href.startsWith("#") && cleanHref === currentPage ) { link.classList.add("active"); pageMatch = true; } }); /* ------------------------------------------------- Homepage section navigation ------------------------------------------------- */ if ( pageMatch || currentPage !== "index.html" ) { return; } const sections = document.querySelectorAll( "main section[id]" ); if (!sections.length) return; let currentSection = ""; sections.forEach((section) => { const sectionTop = section.offsetTop - 160; if ( window.scrollY >= sectionTop ) { currentSection = section.id; } }); navLinks.forEach((link) => { const href = link.getAttribute("href"); if ( href === `#${currentSection}` ) { link.classList.add("active"); } }); } updateActiveNavigation(); window.addEventListener( "scroll", updateActiveNavigation, { passive: true } );


  /* =========================================================
     AUDIO VISUALIZER
     ========================================================= */

  const audio =
    document.getElementById("demoAudio");


  const visualizer =
    document.getElementById(
      "audioVisualizer"
    );


  if (audio) {

    audio.addEventListener(
      "play",
      () => {

        visualizer?.classList.add(
          "playing"
        );

      }
    );


    audio.addEventListener(
      "pause",
      () => {

        visualizer?.classList.remove(
          "playing"
        );

      }
    );


    audio.addEventListener(
      "ended",
      () => {

        visualizer?.classList.remove(
          "playing"
        );

      }
    );

  }


  /* =========================================================
     CONTACT FORM
     ========================================================= */

  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");
  const submitBtn = document.getElementById("submitBtn") || form?.querySelector('button[type="submit"]');

  // Ensure submit button is enabled on page load
  if (submitBtn) {
    submitBtn.disabled = false;
  }

  if (form) {
    const originalBtnHtml = submitBtn ? submitBtn.innerHTML : 'Send Message <span>&rarr;</span>';

    const clearFieldErrors = () => {
      const errorDivs = form.querySelectorAll(".error-message");
      errorDivs.forEach((div) => {
        div.textContent = "";
      });
    };

    const clearStatus = () => {
      if (status) {
        status.textContent = "";
        status.className = "form-status";
        status.style.color = "";
      }
    };

    const setLoading = (isLoading) => {
      if (!submitBtn) return;
      if (isLoading) {
        submitBtn.disabled = true;
        submitBtn.style.opacity = "0.7";
        submitBtn.style.cursor = "not-allowed";
        submitBtn.innerHTML = '<i class="ri-loader-4-line ri-spin" style="margin-right: 8px;"></i> Sending...';
        if (status) {
          status.textContent = "Sending your message...";
          status.className = "form-status";
          status.style.color = "#b990ff";
        }
      } else {
        submitBtn.disabled = false;
        submitBtn.style.opacity = "1";
        submitBtn.style.cursor = "pointer";
        submitBtn.innerHTML = originalBtnHtml;
      }
    };

    // Clear individual field error on input or change
    form.querySelectorAll("input, textarea, select").forEach((element) => {
      const clearFieldError = () => {
        const errDiv = document.getElementById("error-" + element.name);
        if (errDiv) {
          errDiv.textContent = "";
        }
      };
      element.addEventListener("input", clearFieldError);
      element.addEventListener("change", clearFieldError);
    });

    form.addEventListener("submit", (event) => {
      event.preventDefault();
      clearFieldErrors();
      clearStatus();
      setLoading(true);

      const firstName = document.getElementById("firstName")?.value?.trim() || "";
      const lastName = document.getElementById("lastName")?.value?.trim() || "";
      const email = document.getElementById("email")?.value?.trim() || "";
      const company = document.getElementById("company")?.value?.trim() || "";
      const interest = document.getElementById("interest")?.value || "";
      const message = document.getElementById("message")?.value?.trim() || "";

      const csrfToken =
        document.querySelector('meta[name="csrf-token"]')?.content ||
        form.querySelector('input[name="_token"]')?.value ||
        "";

      const payload = {
        firstName,
        lastName,
        email,
        company,
        interest,
        message,
        _token: csrfToken,
      };

      fetch(form.action || "/contact", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(payload),
      })
        .then(async (response) => {
          let data = {};
          try {
            data = await response.json();
          } catch (e) {
            data = {};
          }
          return { ok: response.ok, status: response.status, data };
        })
        .then(({ ok, status: statusCode, data }) => {
          if (ok && data.success !== false) {
            // Reset form first before setting success status
            form.reset();
            clearFieldErrors();

            const selectEl = document.getElementById("interest");
            if (selectEl) {
              selectEl.selectedIndex = 0;
            }

            // Display success message
            if (status) {
              status.textContent = data.message || "Thank you! Your message has been received successfully.";
              status.className = "form-status success";
              status.style.color = "#4cd964";
              status.scrollIntoView({ behavior: "smooth", block: "nearest" });
            }
          } else if (statusCode === 422) {
            // Validation errors
            const errors = data.errors || {};
            Object.entries(errors).forEach(([field, msgs]) => {
              const errDiv = document.getElementById("error-" + field);
              if (errDiv) {
                errDiv.textContent = msgs[0] || "";
              }
            });

            if (status) {
              status.textContent = data.message || "Please correct the errors above and try again.";
              status.className = "form-status error";
              status.style.color = "#ff8a8a";
            }
          } else if (statusCode === 419) {
            // CSRF session expiration
            if (status) {
              status.textContent = "Your session has expired. Please refresh the page and try again.";
              status.className = "form-status error";
              status.style.color = "#ff8a8a";
            }
          } else if (statusCode >= 500) {
            // Server error
            if (status) {
              status.textContent = data.message || "A database or server error occurred. Please try again shortly.";
              status.className = "form-status error";
              status.style.color = "#ff8a8a";
            }
          } else {
            // Other error
            if (status) {
              status.textContent = data.message || "An unexpected error occurred. Please try again.";
              status.className = "form-status error";
              status.style.color = "#ff8a8a";
            }
          }
        })
        .catch((error) => {
          console.error("Form submission network error:", error);
          if (status) {
            status.textContent = "Network error. Please check your connection and try again.";
            status.className = "form-status error";
            status.style.color = "#ff8a8a";
          }
        })
        .finally(() => {
          setLoading(false);
        });
    });
  }

});