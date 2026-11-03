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


        /* Scroll to the Journey section (the four-step how-it-works content) */

        const journeySection =
          document.getElementById(
            "how-it-works-steps"
          );


        if (journeySection) {

          const navbarHeight =
            navbar
              ? navbar.offsetHeight
              : 76;

          const targetPosition =
            journeySection
              .getBoundingClientRect()
              .top +
            window.scrollY -
            navbarHeight -
            16;

          window.scrollTo({
            top: targetPosition,
            behavior: "smooth"
          });

        }


        /* Trigger Live Conversation Demo Replay */
        if (typeof window.replayLiveConversation === "function") {
          window.replayLiveConversation();
        }


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
     LIVE CONVERSATION ANIMATION (PHONE CARD)
  ========================================================= */

  const phoneCard =
    document.getElementById("phoneCard") ||
    document.querySelector(".phone-card");

  /* ---------------------------------------------------------
     ACTUAL LOCAL-TIME CLOCK (not a call-duration counter)
     Displays the visitor's real current time in 12-hour format.
     Updates every minute. Never reset by replay.
  --------------------------------------------------------- */
  const callTimeEl = document.getElementById("callTime");

  const renderLocalTime = () => {
    if (!callTimeEl) return;
    const now = new Date();
    const h = now.getHours();
    const m = now.getMinutes();
    const ampm = h >= 12 ? "PM" : "AM";
    const h12 = h % 12 || 12;
    const mm = String(m).padStart(2, "0");
    callTimeEl.textContent = `${String(h12).padStart(2, "0")}:${mm} ${ampm}`;
  };

  // Render immediately then refresh every 60 s
  renderLocalTime();
  setInterval(renderLocalTime, 60000);

  /* ---------------------------------------------------------
     UPCOMING FRIDAY DATE  (computed once per page load)
  --------------------------------------------------------- */
  const getUpcomingFriday = () => {
    const today = new Date();
    const day = today.getDay(); // 0=Sun … 6=Sat
    const daysUntilFriday = ((5 - day + 7) % 7) || 7; // if today IS Friday, use next Friday
    const friday = new Date(today);
    friday.setDate(today.getDate() + daysUntilFriday);
    const monthNames = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];
    return `Friday, ${monthNames[friday.getMonth()]} ${friday.getDate()}`;
  };

  const upcomingFridayLabel = getUpcomingFriday(); // e.g. "Friday, November 7"
  const appointmentTime = "3:00 PM";
  const fullApptLabel = `${upcomingFridayLabel} at ${appointmentTime}`;

  /* ---------------------------------------------------------
     CONVERSATION ELEMENTS
  --------------------------------------------------------- */
  const convoReplayBtn = document.getElementById("convoReplayBtn");
  const phoneBody      = document.getElementById("phoneBody");
  const callActionMsg  = document.getElementById("callActionMsg");
  const actionCheck    = document.getElementById("actionCheck");
  const workflowLabel  = document.getElementById("workflowLabel");
  const workflowStatus = document.getElementById("workflowStatus");

  const msg4TextEl = document.getElementById("msg4Text");
  const msg6TextEl = document.getElementById("msg6Text");
  const msg8TextEl = document.getElementById("msg8Text");

  const systemFlowNodes =
    document.querySelectorAll(".system-flow .flow-node");

  // Inject dynamic date/time into the relevant messages
  if (msg4TextEl) {
    msg4TextEl.textContent =
      `Certainly. Let me check the availability for ${upcomingFridayLabel} at ${appointmentTime}.`;
  }
  if (msg6TextEl) {
    msg6TextEl.textContent =
      `I found an available slot at ${appointmentTime} on ${upcomingFridayLabel}. Would you like me to reschedule your appointment to that time?`;
  }
  if (msg8TextEl) {
    msg8TextEl.textContent =
      `Your appointment has been successfully rescheduled to ${fullApptLabel}. Is there anything else I can help you with?`;
  }

  /* ---------------------------------------------------------
     ANIMATION ENGINE
  --------------------------------------------------------- */
  if (phoneCard && phoneBody && callActionMsg) {

    let isAnimating = false;
    const timeouts = [];

    const clearAllTimeouts = () => {
      while (timeouts.length > 0) {
        clearTimeout(timeouts.pop());
      }
    };

    const scheduleStep = (fn, delay) => {
      const id = setTimeout(fn, delay);
      timeouts.push(id);
    };

    /* Update the four flow nodes in the sidebar */
    const updateFlowNodes = (activeIndex) => {
      if (!systemFlowNodes || !systemFlowNodes.length) return;
      systemFlowNodes.forEach((node, idx) => {
        node.classList.toggle("active", idx === activeIndex);
      });
    };

    /* Scroll the phone body so the newest message is in view */
    const scrollToBottom = () => {
      if (phoneBody) {
        phoneBody.scrollTop = phoneBody.scrollHeight;
        requestAnimationFrame(() => {
          if (phoneBody) {
            phoneBody.scrollTop = phoneBody.scrollHeight;
          }
        });
      }
    };

    /* Show a single message element */
    const showMsg = (id, afterDelay) => {
      scheduleStep(() => {
        const el = document.getElementById(id);
        if (el) {
          el.classList.add("is-visible");
          scrollToBottom();
        }
      }, afterDelay);
    };

    /* Hide a thinking indicator */
    const hideMsg = (id, afterDelay) => {
      scheduleStep(() => {
        const el = document.getElementById(id);
        if (el) el.classList.remove("is-visible");
      }, afterDelay);
    };

    /* Update workflow badge (label + status text) */
    const setWorkflow = (label, status, delay) => {
      scheduleStep(() => {
        if (workflowLabel) workflowLabel.textContent = label;
        if (workflowStatus) workflowStatus.textContent = status;
      }, delay);
    };

    /* Reset everything to pre-animation state */
    const resetSequence = () => {
      clearAllTimeouts();
      isAnimating = false;

      // Hide all convo messages
      const allMsgs = phoneBody
        ? phoneBody.querySelectorAll(".convo-msg")
        : [];
      allMsgs.forEach((el) => el.classList.remove("is-visible"));

      // Hide workflow badge and check
      callActionMsg.classList.remove("is-visible");
      if (actionCheck) actionCheck.classList.remove("is-visible");

      // Reset workflow text
      if (workflowLabel) workflowLabel.textContent = "WORKFLOW STATUS";
      if (workflowStatus) workflowStatus.textContent = "Request received";

      // Reset flow nodes to first step
      updateFlowNodes(0);

      // Scroll body back to top
      if (phoneBody) phoneBody.scrollTop = 0;
    };

    /* Run the full sequential conversation */
    const playSequence = () => {
      resetSequence();
      isAnimating = true;
      phoneCard.classList.add("js-animated");

      // Reduced-motion: reveal everything immediately
      if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        const allMsgs = phoneBody
          ? phoneBody.querySelectorAll(".convo-msg")
          : [];
        allMsgs.forEach((el) => el.classList.add("is-visible"));
        callActionMsg.classList.add("is-visible");
        if (actionCheck) actionCheck.classList.add("is-visible");
        if (workflowLabel) workflowLabel.textContent = "ACTION TRIGGERED";
        if (workflowStatus) workflowStatus.textContent = `Rescheduled · ${fullApptLabel}`;
        updateFlowNodes(3);
        isAnimating = false;
        return;
      }

      // ── Timing plan ──────────────────────────────────────────
      // t=0       call starts, workflow badge appears (stage 1)
      // t=700     msg1 (customer: move appointment)
      // t=2200    msg2 (vocabot: what time?)
      // t=4000    msg3 (customer: 3 PM)
      // t=5200    thinking1 shown → workflow stage 2
      // t=6600    thinking1 hidden, msg4 shown (checking avail.)
      // t=8000    msg5 (customer: sure)
      // t=9200    thinking2 shown → workflow stage 3
      // t=11000   thinking2 hidden, msg6 shown (slot found, confirm?)
      // t=12600   msg7 (customer: yes)
      // t=13800   thinking3 shown → workflow stage 4-5
      // t=15800   thinking3 hidden, msg8 shown (confirmed!)
      // t=16600   checkmark + workflow stage 6 (completed)
      // ─────────────────────────────────────────────────────────

      // t=0: workflow badge visible (stage 1 – request received)
      scheduleStep(() => {
        callActionMsg.classList.add("is-visible");
        if (workflowLabel) workflowLabel.textContent = "WORKFLOW STATUS";
        if (workflowStatus) workflowStatus.textContent = "Request received";
        updateFlowNodes(0);
      }, 0);

      // t=700: Customer: "I want to move my appointment to Friday."
      showMsg("msg1", 700);
      scheduleStep(() => updateFlowNodes(0), 700);

      // t=2200: Vocabot: "Of course. What time on Friday?"
      showMsg("msg2", 2200);
      scheduleStep(() => {
        if (workflowStatus) workflowStatus.textContent = "Waiting for preferred time";
        updateFlowNodes(1);
      }, 2200);

      // t=4000: Customer: "Around 3 PM."
      showMsg("msg3", 4000);

      // t=5200: thinking1 + stage 3 (checking availability)
      showMsg("thinking1", 5200);
      setWorkflow("WORKFLOW STATUS", "Checking availability", 5200);
      scheduleStep(() => updateFlowNodes(1), 5200);

      // t=6600: hide thinking1, show msg4 (checking avail. message)
      hideMsg("thinking1", 6600);
      showMsg("msg4", 6700);
      scheduleStep(() => {
        if (workflowStatus) workflowStatus.textContent = "Awaiting customer confirmation";
        updateFlowNodes(2);
      }, 6700);

      // t=8000: Customer: "Sure, please check."
      showMsg("msg5", 8000);

      // t=9200: thinking2 + stage 3 (still checking)
      showMsg("thinking2", 9200);
      setWorkflow("WORKFLOW STATUS", "Checking availability", 9200);

      // t=11000: hide thinking2, msg6 (slot found, confirm?)
      hideMsg("thinking2", 11000);
      showMsg("msg6", 11100);
      setWorkflow("WORKFLOW STATUS", "Awaiting customer confirmation", 11100);
      scheduleStep(() => updateFlowNodes(2), 11100);

      // t=12600: Customer: "Yes, please go ahead."
      showMsg("msg7", 12600);

      // t=13800: thinking3 + stage 4-5 (rescheduling)
      showMsg("thinking3", 13800);
      setWorkflow("WORKFLOW STATUS", "Rescheduling appointment", 13800);
      scheduleStep(() => updateFlowNodes(2), 13800);

      // t=15800: hide thinking3, msg8 (success confirmation)
      hideMsg("thinking3", 15800);
      showMsg("msg8", 15900);
      scheduleStep(() => {
        if (workflowLabel) workflowLabel.textContent = "ACTION TRIGGERED";
        if (workflowStatus) workflowStatus.textContent = `Rescheduled · ${fullApptLabel}`;
        updateFlowNodes(3);
      }, 15900);

      // t=16800: checkmark appears – workflow completed
      scheduleStep(() => {
        if (actionCheck) actionCheck.classList.add("is-visible");
        isAnimating = false;
      }, 16800);
    };

    // Replay button
    if (convoReplayBtn) {
      convoReplayBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        playSequence();
      });
    }

    // Expose globally for the "See how it works" hero button
    window.replayLiveConversation = playSequence;
    window.resetLiveConversation  = resetSequence;

    // Auto-trigger when the card enters the viewport
    let hasStarted = false;
    if ("IntersectionObserver" in window) {
      const convoObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting && !hasStarted) {
              hasStarted = true;
              playSequence();
              convoObserver.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.2 }
      );
      convoObserver.observe(phoneCard);
    } else {
      playSequence();
    }
  }


  /* =========================================================
     INITIAL PAGE STATE
  ========================================================= */

  document.documentElement.classList.add(
    "js-enabled"
  );


});