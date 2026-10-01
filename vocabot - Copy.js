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
    navbar.classList.toggle("scrolled", window.scrollY > 30);
  }

  updateNavbar();
  window.addEventListener("scroll", updateNavbar, { passive: true });


  /* =========================================================
     MOBILE MENU
     ========================================================= */

  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");

  function closeMobileMenu() {
    if (!menuToggle || !mobileMenu) return;

    mobileMenu.classList.remove("open");
    menuToggle.classList.remove("active");
    menuToggle.setAttribute("aria-expanded", "false");
    menuToggle.setAttribute("aria-label", "Open menu");
    document.body.classList.remove("menu-open");
  }

  function openMobileMenu() {
    if (!menuToggle || !mobileMenu) return;

    mobileMenu.classList.add("open");
    menuToggle.classList.add("active");
    menuToggle.setAttribute("aria-expanded", "true");
    menuToggle.setAttribute("aria-label", "Close menu");
    document.body.classList.add("menu-open");
  }

  if (menuToggle && mobileMenu) {

    menuToggle.addEventListener("click", (event) => {
      event.preventDefault();
      event.stopPropagation();

      const isOpen = mobileMenu.classList.contains("open");
      if (isOpen) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });

    const mobileLinks = mobileMenu.querySelectorAll("a");
    mobileLinks.forEach((link) => {
      link.addEventListener("click", () => {
        closeMobileMenu();
      });
    });

    document.addEventListener("click", (event) => {
      if (!mobileMenu.classList.contains("open")) return;

      const clickedInsideMenu = mobileMenu.contains(event.target);
      const clickedToggle = menuToggle.contains(event.target);

      if (!clickedInsideMenu && !clickedToggle) {
        closeMobileMenu();
      }
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape" && mobileMenu.classList.contains("open")) {
        closeMobileMenu();
        menuToggle.focus();
      }
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth > 991) {
        closeMobileMenu();
      }
    });

  } else {
    console.warn("Vocabot mobile menu elements not found:", { menuToggle, mobileMenu });
  }


  /* =========================================================
     SMOOTH INTERNAL LINKS
     ========================================================= */

  const internalLinks = document.querySelectorAll('a[href^="#"]');

  internalLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      const targetId = link.getAttribute("href");
      if (!targetId || targetId === "#") return;

      let target;
      try {
        target = document.querySelector(targetId);
      } catch (error) {
        return;
      }

      if (!target) return;

      event.preventDefault();

      const navbarHeight = navbar ? navbar.offsetHeight : 0;
      const targetPosition = target.getBoundingClientRect().top + window.scrollY - navbarHeight - 15;

      window.scrollTo({
        top: targetPosition,
        behavior: "smooth"
      });
    });
  });


  /* =========================================================
     SCROLL REVEAL
     ========================================================= */

  const revealItems = document.querySelectorAll(".reveal, .solution-card, .workflow-step, .benefit-item");

  if (revealItems.length && "IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        entry.target.classList.add("show");

        if (
          entry.target.classList.contains("solution-card") ||
          entry.target.classList.contains("workflow-step") ||
          entry.target.classList.contains("benefit-item")
        ) {
          entry.target.style.opacity = "1";
          entry.target.style.transform = "translateY(0)";
        }

        obs.unobserve(entry.target);
      });
    }, { threshold: 0.12 });

    revealItems.forEach((item) => {
      if (
        item.classList.contains("solution-card") ||
        item.classList.contains("workflow-step") ||
        item.classList.contains("benefit-item")
      ) {
        item.style.opacity = "0";
        item.style.transform = "translateY(20px)";
        item.style.transition = "opacity 0.6s ease, transform 0.6s ease";
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

  const navLinks = document.querySelectorAll(".desktop-nav a");
  const currentPage = window.location.pathname.split("/").pop().toLowerCase() || "index.html";

  function updateActiveNavigation() {
    if (!navLinks.length) return;

    navLinks.forEach((link) => {
      link.classList.remove("active");
    });

    let pageMatch = false;
    navLinks.forEach((link) => {
      const href = link.getAttribute("href");
      if (!href) return;

      const cleanHref = href.split("#")[0].split("?")[0].toLowerCase();
      if (cleanHref && !href.startsWith("#") && cleanHref === currentPage) {
        link.classList.add("active");
        pageMatch = true;
      }
    });

    if (pageMatch || currentPage !== "index.html") return;

    const sections = document.querySelectorAll("main section[id]");
    if (!sections.length) return;

    let currentSection = "";
    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 160;
      if (window.scrollY >= sectionTop) {
        currentSection = section.id;
      }
    });

    navLinks.forEach((link) => {
      const href = link.getAttribute("href");
      if (href === `#${currentSection}`) {
        link.classList.add("active");
      }
    });
  }

  updateActiveNavigation();
  window.addEventListener("scroll", updateActiveNavigation, { passive: true });


  /* =========================================================
     AUDIO VISUALIZER
     ========================================================= */

  const audio = document.getElementById("demoAudio");
  const visualizer = document.getElementById("audioVisualizer");

  if (audio) {
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


  /* =========================================================
     CONTACT FORM
     ========================================================= */

  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");

  if (form) {
    form.addEventListener("submit", (event) => {
      event.preventDefault();

      const firstName = document.getElementById("firstName")?.value.trim() || "";
      const lastName = document.getElementById("lastName")?.value.trim() || "";
      const email = document.getElementById("email")?.value.trim() || "";
      const company = document.getElementById("company")?.value.trim() || "";
      const interest = document.getElementById("interest")?.value || "";
      const message = document.getElementById("message")?.value.trim() || "";

      if (!firstName || !lastName || !email || !interest) {
        if (status) {
          status.textContent = "Please fill in all required fields.";
          status.style.color = "#ff8a8a";
        }
        return;
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        if (status) {
          status.textContent = "Please enter a valid email address.";
          status.style.color = "#ff8a8a";
        }
        return;
      }

      const fullName = `${firstName} ${lastName}`.trim();
      const subject = encodeURIComponent(`Vocabot enquiry — ${interest}`);
      const body = encodeURIComponent(
`Hi Vocabot,

Name: ${fullName}
Work Email: ${email}
Company: ${company || "Not provided"}
Interested In: ${interest}

Message:
${message || "Not provided"}

Thanks,
${fullName}`
      );

      if (status) {
        status.textContent = "Opening your email application...";
        status.style.color = "#b990ff";
      }

      window.location.href = `mailto:hello@vocabot.ai?subject=${subject}&body=${body}`;
    });
  }

});