/* =========================================================
   VOCABOT — INTEGRATIONS PAGE JAVASCRIPT
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    /* =====================================================
       DOM ELEMENTS
    ===================================================== */
    const navbar = document.getElementById("navbar") || document.querySelector(".navbar");
    const menuToggle = document.getElementById("menuToggle") || document.querySelector(".menu-toggle");
    const mobileMenu = document.getElementById("mobileMenu") || document.querySelector(".mobile-menu");

    const searchInput = document.querySelector(".search-box input");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const integrationCards = document.querySelectorAll(".integration-card");
    const noResults = document.querySelector(".no-results");

    /* =====================================================
       NAVBAR SCROLL EFFECT
    ===================================================== */
    let isTicking = false;

    const handleNavbarScroll = () => {
        if (!navbar) return;
        navbar.classList.toggle("scrolled", window.scrollY > 30);
        isTicking = false;
    };

    window.addEventListener("scroll", () => {
        if (!isTicking) {
            window.requestAnimationFrame(handleNavbarScroll);
            isTicking = true;
        }
    }, { passive: true });

    handleNavbarScroll();

    /* =====================================================
       MOBILE MENU CONTROLLER
    ===================================================== */
    if (menuToggle && mobileMenu) {

        const closeMobileMenu = () => {
            menuToggle.classList.remove("active");
            mobileMenu.classList.remove("open");
            document.body.classList.remove("menu-open");
            menuToggle.setAttribute("aria-expanded", "false");
        };

        const openMobileMenu = () => {
            menuToggle.classList.add("active");
            mobileMenu.classList.add("open");
            document.body.classList.add("menu-open");
            menuToggle.setAttribute("aria-expanded", "true");
        };

        menuToggle.addEventListener("click", (e) => {
            e.stopPropagation();
            const isOpen = mobileMenu.classList.contains("open");
            isOpen ? closeMobileMenu() : openMobileMenu();
        });

        /* Close menu after clicking any inner links */
        mobileMenu.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", closeMobileMenu);
        });

        /* Close menu when clicking outside */
        document.addEventListener("click", event => {
            if (
                mobileMenu.classList.contains("open") &&
                !mobileMenu.contains(event.target) &&
                !menuToggle.contains(event.target)
            ) {
                closeMobileMenu();
            }
        });

        /* Close menu with Escape key */
        document.addEventListener("keydown", event => {
            if (event.key === "Escape" && mobileMenu.classList.contains("open")) {
                closeMobileMenu();
            }
        });

        /* Viewport Breakpoint Matcher (Enforces state reset across 900px threshold) */
        const desktopBreakpoint = window.matchMedia("(min-width: 901px)");

        const handleBreakpointChange = (e) => {
            if (e.matches) {
                closeMobileMenu();
            }
        };

        /* Listen for media query boundary crossings */
        if (desktopBreakpoint.addEventListener) {
            desktopBreakpoint.addEventListener("change", handleBreakpointChange);
        } else {
            desktopBreakpoint.addListener(handleBreakpointChange); // Fallback for older browsers
        }
        
        handleBreakpointChange(desktopBreakpoint);
    }

    /* =====================================================
       INTEGRATION FILTER & SEARCH SYSTEM
    ===================================================== */
    let activeFilter = "all";

    const normalizeText = value => (value || "").toLowerCase().trim();

    const filterIntegrations = () => {
        const searchTerm = normalizeText(searchInput ? searchInput.value : "");
        let visibleCount = 0;

        integrationCards.forEach(card => {
            const category = normalizeText(card.dataset.category || card.querySelector(".integration-type")?.textContent);
            const cardTitle = normalizeText(card.querySelector("h3")?.textContent);
            const cardDescription = normalizeText(card.querySelector("p")?.textContent);

            const matchesCategory = activeFilter === "all" || category.includes(activeFilter);
            const matchesSearch = !searchTerm || cardTitle.includes(searchTerm) || cardDescription.includes(searchTerm);

            if (matchesCategory && matchesSearch) {
                card.classList.remove("hidden");
                visibleCount++;
            } else {
                card.classList.add("hidden");
            }
        });

        /* Toggle No Results Display */
        if (noResults) {
            noResults.classList.toggle("show", visibleCount === 0);
        }
    };

    /* Filter Buttons Listener */
    filterButtons.forEach(button => {
        button.addEventListener("click", () => {
            filterButtons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");

            activeFilter = normalizeText(button.dataset.filter || "all");
            filterIntegrations();
        });
    });

    /* Search Input Listener */
    if (searchInput) {
        searchInput.addEventListener("input", filterIntegrations);
    }

    /* =====================================================
       REVEAL ON SCROLL (Observer)
    ===================================================== */
    const revealElements = document.querySelectorAll(".reveal");

    if ("IntersectionObserver" in window) {
        const revealObserver = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show", "visible");
                        revealObserver.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.12,
                rootMargin: "0px 0px -40px 0px"
            }
        );

        revealElements.forEach(element => revealObserver.observe(element));
    } else {
        revealElements.forEach(element => element.classList.add("show", "visible"));
    }

    /* Stagger Integration Cards Animation Delays */
    integrationCards.forEach((card, index) => {
        card.style.transitionDelay = `${Math.min(index * 0.04, 0.3)}s`;
    });

/* =========================================================
   ACTIVE DESKTOP NAVIGATION
   ========================================================= */
const navLinks = document.querySelectorAll(".desktop-nav a");
const currentPage = window.location.pathname.split("/").pop().toLowerCase() || "index.html";

function updateActiveNavigation() {
    if (!navLinks.length) return;

    navLinks.forEach(link => link.classList.remove("active"));

    navLinks.forEach(link => {
        const href = link.getAttribute("href");
        if (!href) return;
        const cleanHref = href.split("#")[0].split("?")[0].toLowerCase();

        if (cleanHref && !href.startsWith("#") && cleanHref === currentPage) {
            link.classList.add("active");
        }
    });
}

updateActiveNavigation();



    /* =====================================================
       SMOOTH ANCHOR SCROLLING
    ===================================================== */
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", event => {
            const targetId = link.getAttribute("href");

            if (!targetId || targetId === "#" || targetId.length < 2) return;

            const target = document.querySelector(targetId);
            if (!target) return;

            event.preventDefault();

            const navbarHeight = navbar ? navbar.offsetHeight : 0;
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight - 15;

            window.scrollTo({
                top: targetPosition,
                behavior: "smooth"
            });
        });
    });

    /* Initialize filter check on load */
    filterIntegrations();
});