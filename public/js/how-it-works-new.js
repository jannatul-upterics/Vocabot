/* =========================================================
   VOCABOT — HOW IT WORKS
   COMPLETE JAVASCRIPT
   Navbar + Mobile Menu + Active Navigation
   + Smooth Scroll + Scroll Reveal
   + Demo Animation + Audio + Contact Form
========================================================= */

document.addEventListener("DOMContentLoaded", () => {


  /* =========================================================
     NAVBAR
  ========================================================= */

  const navbar =
    document.getElementById("navbar");

  const menuToggle =
    document.getElementById("menuToggle");

  const mobileMenu =
    document.getElementById("mobileMenu");


  /* ---------------------------------------------------------
     NAVBAR SCROLL EFFECT
  --------------------------------------------------------- */

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

  function openMobileMenu() {

    if (!mobileMenu || !menuToggle) return;


    mobileMenu.classList.add("open");

    /*
     * Important:
     * Keep the toggle appearance controlled by CSS.
     * Do NOT replace the HTML/icon.
     */

    menuToggle.classList.add("active");


    menuToggle.setAttribute(
      "aria-expanded",
      "true"
    );


    menuToggle.setAttribute(
      "aria-label",
      "Close menu"
    );


    document.body.classList.add(
      "menu-open"
    );

  }


  function closeMobileMenu() {

    if (!mobileMenu || !menuToggle) return;


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


    document.body.classList.remove(
      "menu-open"
    );

  }


  if (menuToggle && mobileMenu) {


    /* =======================================================
       TOGGLE MOBILE MENU
    ======================================================= */

    menuToggle.addEventListener(
      "click",
      (event) => {

        event.preventDefault();

        event.stopPropagation();


        const isOpen =
          mobileMenu.classList.contains(
            "open"
          );


        if (isOpen) {

          closeMobileMenu();

        } else {

          openMobileMenu();

        }

      }
    );


    /* =======================================================
       CLOSE WHEN MOBILE LINK IS CLICKED
    ======================================================= */

    mobileMenu
      .querySelectorAll("a")
      .forEach((link) => {

        link.addEventListener(
          "click",
          () => {

            closeMobileMenu();

          }
        );

      });


    /* =======================================================
       CLOSE WHEN CLICKING OUTSIDE
    ======================================================= */

    document.addEventListener(
      "click",
      (event) => {

        if (
          !mobileMenu.classList.contains(
            "open"
          )
        ) {
          return;
        }


        const clickedInsideMenu =
          mobileMenu.contains(
            event.target
          );


        const clickedToggle =
          menuToggle.contains(
            event.target
          );


        if (
          !clickedInsideMenu &&
          !clickedToggle
        ) {

          closeMobileMenu();

        }

      }
    );


    /* =======================================================
       CLOSE WITH ESCAPE
    ======================================================= */

    document.addEventListener(
      "keydown",
      (event) => {

        if (
          event.key === "Escape" &&
          mobileMenu.classList.contains(
            "open"
          )
        ) {

          closeMobileMenu();

          menuToggle.focus();

        }

      }
    );


    /* =======================================================
       CLOSE WHEN SWITCHING TO DESKTOP
    ======================================================= */

    window.addEventListener(
      "resize",
      () => {

        if (window.innerWidth > 950) {

          closeMobileMenu();

        }

      }
    );

  }


  /* =========================================================
     ACTIVE NAVIGATION
  ========================================================= */

  const desktopLinks =
    document.querySelectorAll(
      ".desktop-nav a"
    );


  const sections =
    document.querySelectorAll(
      "section[id]"
    );


  function updateActiveNav() {

    if (
      !desktopLinks.length ||
      !sections.length
    ) {
      return;
    }


    let current = "";


    const scrollPosition =
      window.scrollY + 180;


    sections.forEach(
      (section) => {

        const sectionTop =
          section.offsetTop;


        const sectionHeight =
          section.offsetHeight;


        if (
          scrollPosition >= sectionTop &&
          scrollPosition <
            sectionTop + sectionHeight
        ) {

          current =
            section.id;

        }

      }
    );


    desktopLinks.forEach(
      (link) => {

        const href =
          link.getAttribute("href");


        if (
          !href ||
          !href.startsWith("#")
        ) {
          return;
        }


        const target =
          href.substring(1);


        link.classList.toggle(
          "active",
          target === current
        );

      }
    );

  }


  window.addEventListener(
    "scroll",
    updateActiveNav,
    { passive: true }
  );


  window.addEventListener(
    "resize",
    updateActiveNav
  );


  updateActiveNav();


  /* =========================================================
     SMOOTH SCROLL
  ========================================================= */

  document
    .querySelectorAll('a[href^="#"]')
    .forEach((link) => {

      link.addEventListener(
        "click",
        (event) => {

          const href =
            link.getAttribute("href");


          if (
            !href ||
            href === "#"
          ) {
            return;
          }


          let target;


          try {

            target =
              document.querySelector(
                href
              );

          } catch (error) {

            return;

          }


          if (!target) {
            return;
          }


          event.preventDefault();


          const navbarHeight =
            navbar
              ? navbar.offsetHeight
              : 0;


          const targetPosition =
            target.getBoundingClientRect()
              .top +
            window.scrollY -
            navbarHeight -
            15;


          window.scrollTo({
            top: targetPosition,
            behavior: "smooth"
          });

        }
      );

    });


  /* =========================================================
     SCROLL REVEAL
  ========================================================= */

  const revealElements =
    document.querySelectorAll(
      ".reveal"
    );


  if (
    revealElements.length &&
    "IntersectionObserver" in window
  ) {


    const revealObserver =
      new IntersectionObserver(
        (entries, observer) => {

          entries.forEach(
            (entry) => {

              if (
                !entry.isIntersecting
              ) {
                return;
              }


              entry.target.classList.add(
                "visible"
              );


              observer.unobserve(
                entry.target
              );

            }
          );

        },
        {
          threshold: 0.12
        }
      );


    revealElements.forEach(
      (element) => {

        revealObserver.observe(
          element
        );

      }
    );


  } else {


    revealElements.forEach(
      (element) => {

        element.classList.add(
          "visible"
        );

      }
    );

  }


  /* =========================================================
     DEMO BUTTON
  ========================================================= */

  const playDemo =
    document.getElementById(
      "playDemo"
    );


  const voiceStatus =
    document.getElementById(
      "voiceStatus"
    );


  const wave =
    document.getElementById(
      "wave"
    );


  let demoTimeout = null;


  if (playDemo) {


    playDemo.addEventListener(
      "click",
      () => {


        /* Clear previous timer */

        if (demoTimeout) {

          clearTimeout(
            demoTimeout
          );

        }


        /* Active state */

        if (voiceStatus) {

          voiceStatus.textContent =
            "AI VOICE ACTIVE";

        }


        if (wave) {

          wave.classList.add(
            "playing"
          );

        }


        playDemo.classList.add(
          "playing"
        );


        /* Reset after 5 seconds */

        demoTimeout =
          setTimeout(
            () => {


              if (voiceStatus) {

                voiceStatus.textContent =
                  "LIVE AI";

              }


              if (wave) {

                wave.classList.remove(
                  "playing"
                );

              }


              playDemo.classList.remove(
                "playing"
              );


            },
            5000
          );

      }
    );

  }


  /* =========================================================
     AUDIO DEMO
  ========================================================= */

  const demoAudio =
    document.getElementById(
      "demoAudio"
    );


  const audioVisualizer =
    document.getElementById(
      "audioVisualizer"
    );


  if (demoAudio) {


    demoAudio.addEventListener(
      "play",
      () => {

        if (audioVisualizer) {

          audioVisualizer.classList.add(
            "active"
          );

        }

      }
    );


    demoAudio.addEventListener(
      "pause",
      () => {

        if (audioVisualizer) {

          audioVisualizer.classList.remove(
            "active"
          );

        }

      }
    );


    demoAudio.addEventListener(
      "ended",
      () => {

        if (audioVisualizer) {

          audioVisualizer.classList.remove(
            "active"
          );

        }

      }
    );

  }


  /* =========================================================
     CONTACT FORM
  ========================================================= */

  const contactForm =
    document.getElementById(
      "contactForm"
    );


  const formStatus =
    document.getElementById(
      "formStatus"
    );


  if (contactForm) {


    contactForm.addEventListener(
      "submit",
      (event) => {

        event.preventDefault();


        /* -----------------------------------------------------
           GET FORM VALUES
        ----------------------------------------------------- */

        const firstName =
          document
            .getElementById(
              "firstName"
            )
            ?.value
            .trim() || "";


        const lastName =
          document
            .getElementById(
              "lastName"
            )
            ?.value
            .trim() || "";


        const email =
          document
            .getElementById(
              "email"
            )
            ?.value
            .trim() || "";


        const company =
          document
            .getElementById(
              "company"
            )
            ?.value
            .trim() || "";


        const interest =
          document
            .getElementById(
              "interest"
            )
            ?.value
            .trim() || "";


        const message =
          document
            .getElementById(
              "message"
            )
            ?.value
            .trim() || "";


        /* -----------------------------------------------------
           EMAIL VALIDATION
        ----------------------------------------------------- */

        const emailPattern =
          /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


        /* -----------------------------------------------------
           REQUIRED FIELDS
        ----------------------------------------------------- */

        if (
          !firstName ||
          !lastName ||
          !email ||
          !company ||
          !interest ||
          !message
        ) {


          if (formStatus) {

            formStatus.textContent =
              "Please fill in all required fields.";


            formStatus.style.color =
              "#ff8a8a";

          }


          return;

        }


        /* -----------------------------------------------------
           VALID EMAIL
        ----------------------------------------------------- */

        if (
          !emailPattern.test(email)
        ) {


          if (formStatus) {

            formStatus.textContent =
              "Please enter a valid email address.";


            formStatus.style.color =
              "#ff8a8a";

          }


          return;

        }


        /* -----------------------------------------------------
           SUBMIT FORM DATA TO EMAIL
        ----------------------------------------------------- */

        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Send Message <span>→</span>';

        if (formStatus) {
          formStatus.textContent = "Sending your message...";
          formStatus.style.color = "#b990ff";
        }

        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.style.opacity = "0.7";
        }

        const formData = {
          "First Name": firstName,
          "Last Name": lastName,
          "Full Name": `${firstName} ${lastName}`.trim(),
          "Work Email": email,
          "Company": company || "Not provided",
          "Interested In": interest,
          "Message": message || "Not provided",
          "_subject": `Vocabot Contact Form Submission - ${interest}`,
          "_captcha": "false"
        };

        fetch("https://formsubmit.co/ajax/jannatul@upterics.com", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
          },
          body: JSON.stringify(formData)
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            }
            throw new Error(`HTTP error! status: ${response.status}`);
          })
          .then((data) => {
            if (formStatus) {
              formStatus.textContent = "Thank you! Your message has been sent successfully.";
              formStatus.style.color = "#4cd964";
            }
            contactForm.reset();
          })
          .catch((error) => {
            console.error("Form submission error:", error);
            if (formStatus) {
              formStatus.textContent = "Failed to send message. Please try again later.";
              formStatus.style.color = "#ff8a8a";
            }
          })
          .finally(() => {
            if (submitBtn) {
              submitBtn.disabled = false;
              submitBtn.style.opacity = "1";
              submitBtn.innerHTML = originalBtnText;
            }
          });

      }
    );

  }


  /* =========================================================
     BUTTON HOVER / INTERACTION
  ========================================================= */

  document
    .querySelectorAll(
      ".btn, button"
    )
    .forEach(
      (button) => {


        button.addEventListener(
          "mousedown",
          () => {

            button.classList.add(
              "pressed"
            );

          }
        );


        button.addEventListener(
          "mouseup",
          () => {

            button.classList.remove(
              "pressed"
            );

          }
        );


        button.addEventListener(
          "mouseleave",
          () => {

            button.classList.remove(
              "pressed"
            );

          }
        );


      }
    );


  /* =========================================================
     INITIAL PAGE STATE
  ========================================================= */

  document.documentElement.classList.add(
    "js-enabled"
  );


});