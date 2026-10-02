/* =========================================================
   VOCABOT — PAGE JAVASCRIPT
   Navbar + Mobile Menu + Active Navigation
   + FAQ + Conversation Demo + Smooth Scroll + Reveal
========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    /* =====================================================
       NAVBAR SCROLL EFFECT
    ====================================================== */

    const navbar = document.getElementById("navbar");
    const menuToggle = document.getElementById("menuToggle");
    const mobileMenu = document.getElementById("mobileMenu");

    if (navbar) {
        const updateNavbar = () => {
            navbar.classList.toggle("scrolled", window.scrollY > 30);
        };

        updateNavbar();
        window.addEventListener("scroll", updateNavbar, { passive: true });
    }

    /* =====================================================
       MOBILE MENU
    ====================================================== */

    if (menuToggle && mobileMenu) {
        const openMenu = () => {
            mobileMenu.classList.add("open");
            menuToggle.classList.add("active");
            menuToggle.setAttribute("aria-expanded", "true");
            menuToggle.setAttribute("aria-label", "Close menu");
            document.body.classList.add("menu-open");
        };

        const closeMenu = () => {
            mobileMenu.classList.remove("open");
            menuToggle.classList.remove("active");
            menuToggle.setAttribute("aria-expanded", "false");
            menuToggle.setAttribute("aria-label", "Open menu");
            document.body.classList.remove("menu-open");
        };

        menuToggle.addEventListener("click", (event) => {
            event.preventDefault();
            event.stopPropagation();
            if (mobileMenu.classList.contains("open")) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        mobileMenu.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", () => closeMenu());
        });

        document.addEventListener("click", (event) => {
            if (!mobileMenu.classList.contains("open")) return;
            if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
                closeMenu();
            }
        });

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && mobileMenu.classList.contains("open")) {
                closeMenu();
                menuToggle.focus();
            }
        });

        window.addEventListener("resize", () => {
            if (window.innerWidth > 900) {
                closeMenu();
            }
        });
    }

    /* =====================================================
       ACTIVE NAVIGATION LINK
    ====================================================== */

    const currentPage = window.location.pathname.split("/").pop().toLowerCase();
    const desktopLinks = document.querySelectorAll(".desktop-nav a");

    desktopLinks.forEach((link) => {
        const href = link.getAttribute("href");
        if (!href || href.startsWith("#")) return;

        const linkPage = href.split("/").pop().toLowerCase();
        if (linkPage === currentPage || (currentPage === "" && linkPage === "index.html")) {
            link.classList.add("active");
        }
    });

    /* =====================================================
       FAQ ACCORDION
    ====================================================== */

    const faqItems = document.querySelectorAll(".faq details");

    faqItems.forEach((item) => {
        item.addEventListener("toggle", () => {
            if (!item.open) return;
            faqItems.forEach((otherItem) => {
                if (otherItem !== item) {
                    otherItem.removeAttribute("open");
                }
            });
        });
    });

    /* =====================================================
       PLAY CONVERSATION BUTTON
    ====================================================== */

    const playDemo = document.getElementById("playDemo");

    if (playDemo) {
        const playIcon = playDemo.querySelector(".play-icon");
        const playText = playDemo.querySelector(".play-text");
        let isPlaying = false;

        playDemo.addEventListener("click", () => {
            isPlaying = !isPlaying;

            if (isPlaying) {
                if (playIcon) playIcon.textContent = "❚❚";
                if (playText) playText.textContent = "Pause conversation";
                playDemo.classList.add("playing");
            } else {
                if (playIcon) playIcon.textContent = "▶";
                if (playText) playText.textContent = "Play conversation";
                playDemo.classList.remove("playing");
            }
        });
    }

    /* =====================================================
       SMOOTH SCROLL
    ====================================================== */

    document.querySelectorAll('a[href^="#"]').forEach((link) => {
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

    /* =====================================================
       SCROLL REVEAL ANIMATIONS
    ====================================================== */

    const reveals = document.querySelectorAll(".reveal");

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1 }
        );

        reveals.forEach((el) => observer.observe(el));
    } else {
        reveals.forEach((el) => el.classList.add("show"));
    }

    /* =====================================================
       DYNAMIC YEAR
    ====================================================== */

    const yearEl = document.getElementById("year");
    if (yearEl) {
        yearEl.textContent = new Date().getFullYear();
    }
});