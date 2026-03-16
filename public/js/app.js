document.addEventListener('DOMContentLoaded', function () {
    const html = document.documentElement;
    const navToggle = document.querySelector('[data-nav-toggle]');
    const navMenu = document.querySelector('[data-nav-menu]');
    const themeToggles = document.querySelectorAll('[data-theme-toggle]');
    const dropdowns = document.querySelectorAll('[data-dropdown]');

    const savedTheme = localStorage.getItem('theme');

    if (savedTheme === 'dark') {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }

    themeToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            html.classList.toggle('dark');

            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    });

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function () {
            navMenu.classList.toggle('is-open');
        });
    }

    dropdowns.forEach(function (dropdown) {
        const toggle = dropdown.querySelector('[data-dropdown-toggle]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');

        if (!toggle || !menu) {
            return;
        }

        toggle.addEventListener('click', function (event) {
            event.stopPropagation();

            dropdowns.forEach(function (otherDropdown) {
                if (otherDropdown !== dropdown) {
                    const otherMenu = otherDropdown.querySelector('[data-dropdown-menu]');
                    const otherToggle = otherDropdown.querySelector('[data-dropdown-toggle]');

                    if (otherMenu) {
                        otherMenu.classList.remove('is-open');
                    }

                    if (otherToggle) {
                        otherToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });

            const isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    });

    document.addEventListener('click', function () {
        dropdowns.forEach(function (dropdown) {
            const menu = dropdown.querySelector('[data-dropdown-menu]');
            const toggle = dropdown.querySelector('[data-dropdown-toggle]');

            if (menu) {
                menu.classList.remove('is-open');
            }

            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    });
});
