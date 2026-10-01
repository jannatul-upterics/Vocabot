
/* =========================================================
   VOCABOT — POLICY PAGE JS
   NAVBAR + MOBILE MENU + SCROLL REVEAL + ACTIVE SECTIONS
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    /* ================= ELEMENTS ================= */

    const navbar = document.getElementById("navbar");
    const menuToggle = document.getElementById("menuToggle");
    const mobileMenu = document.getElementById("mobileMenu");

    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    const policySections = document.querySelectorAll(".policy-card");


    /* ================= NAVBAR SCROLL ================= */

    const updateNavbar = () => {
        if (!navbar) return;

        navbar.classList.toggle(
            "scrolled",
            window.scrollY > 30
        );
    };

    updateNavbar();

    window.addEventListener(
        "scroll",
        updateNavbar,
        { passive: true }
    );


    /* ================= MOBILE MENU ================= */

    const closeMobileMenu = () => {

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

        document.body.classList.remove("menu-open");
    };


    const openMobileMenu = () => {

        if (!mobileMenu || !menuToggle) return;

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
    };


    if (menuToggle && mobileMenu) {

        menuToggle.addEventListener("click", () => {

            const isOpen =
                mobileMenu.classList.contains("open");

            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }

        });


        /* Close menu after clicking a link */

        const mobileLinks =
            mobileMenu.querySelectorAll("a");

        mobileLinks.forEach((link) => {

            link.addEventListener(
                "click",
                closeMobileMenu
            );

        });


        /* Close menu with Escape */

        document.addEventListener(
            "keydown",
            (event) => {

                if (event.key === "Escape") {
                    closeMobileMenu();
                }

            }
        );


        /* Close menu when resizing to desktop */

        window.addEventListener(
            "resize",
            () => {

                if (
                    window.innerWidth > 900 &&
                    mobileMenu.classList.contains("open")
                ) {
                    closeMobileMenu();
                }

            }
        );
    }


    /* ================= SCROLL REVEAL ================= */

    const revealElements =
        document.querySelectorAll(".reveal");


    if ("IntersectionObserver" in window) {

        const revealObserver =
            new IntersectionObserver(
                (entries, observer) => {

                    entries.forEach((entry) => {

                        if (!entry.isIntersecting) {
                            return;
                        }

                        entry.target.classList.add("visible");

                        observer.unobserve(
                            entry.target
                        );

                    });

                },
                {
                    threshold: 0.12,
                    rootMargin: "0px 0px -50px 0px"
                }
            );


        revealElements.forEach((element) => {
            revealObserver.observe(element);
        });

    } else {

        revealElements.forEach((element) => {
            element.classList.add("visible");
        });

    }


    /* ================= ACTIVE POLICY SECTION ================= */

    if (
        "IntersectionObserver" in window &&
        policySections.length &&
        sidebarLinks.length
    ) {

        const sectionObserver =
            new IntersectionObserver(
                (entries) => {

                    entries.forEach((entry) => {

                        if (!entry.isIntersecting) {
                            return;
                        }

                        const sectionId =
                            entry.target.getAttribute("id");

                        sidebarLinks.forEach((link) => {

                            const target =
                                link.getAttribute("href");

                            link.classList.toggle(
                                "active",
                                target === `#${sectionId}`
                            );

                        });

                    });

                },
                {
                    root: null,
                    rootMargin: "-20% 0px -65% 0px",
                    threshold: 0
                }
            );


        policySections.forEach((section) => {
            sectionObserver.observe(section);
        });
    }


    /* ================= POLICY TAB LINKS ================= */

    const policyTabs =
        document.querySelectorAll(".policy-tabs a");


    policyTabs.forEach((tab) => {

        tab.addEventListener(
            "click",
            (event) => {

                const href =
                    tab.getAttribute("href");

                if (!href || !href.startsWith("#")) {
                    return;
                }

                const target =
                    document.querySelector(href);

                if (!target) {
                    return;
                }

                event.preventDefault();

                const navbarHeight =
                    navbar
                        ? navbar.offsetHeight
                        : 76;

                const targetPosition =
                    target.getBoundingClientRect().top +
                    window.scrollY -
                    navbarHeight -
                    20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });

            }
        );

    });


    /* ================= HASH ON PAGE LOAD ================= */

    const initialHash =
        window.location.hash;

    if (initialHash) {

        const target =
            document.querySelector(initialHash);

        if (target) {

            window.setTimeout(() => {

                const navbarHeight =
                    navbar
                        ? navbar.offsetHeight
                        : 76;

                const targetPosition =
                    target.getBoundingClientRect().top +
                    window.scrollY -
                    navbarHeight -
                    20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });

            }, 150);
        }
    }

});
