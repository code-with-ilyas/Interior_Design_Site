/**
 * Home Page Section Anchor Navigation
 * Handles smooth scrolling to sections on home page and redirects from other pages
 */

document.addEventListener('DOMContentLoaded', function() {
    // Get all anchor links that point to home page sections
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            // Skip if it's just "#" or doesn't start with "#"
            if (href === '#' || !href.startsWith('#')) {
                return;
            }

            // Get the anchor target (remove the #)
            const targetId = href.substring(1);

            // Check if we're on the home page (check for common home page identifiers)
            const isHomePage = document.querySelector('#hero-sec') !== null;

            if (isHomePage) {
                // We're on the home page, scroll to the section
                e.preventDefault();

                // Find the target element
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // Smooth scroll to the target element
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Update URL without page reload
                    history.pushState(null, null, href);
                }
            } else {
                // We're on another page, redirect to home page with anchor
                e.preventDefault();

                // Redirect to home page with the anchor
                window.location.href = '/' + href;
            }
        });
    });

    // Handle direct URL access with hash (when someone visits /#section-name directly)
    if (window.location.hash) {
        const isHomePage = document.querySelector('#hero-sec') !== null;

        if (isHomePage) {
            // We're on home page with hash, scroll to section
            setTimeout(() => {
                const targetElement = document.getElementById(window.location.hash.substring(1));
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 100); // Small delay to ensure page is fully loaded
        }
    }
});

// Also handle hash changes after page load (for SPA-like behavior)
window.addEventListener('hashchange', function() {
    if (window.location.hash) {
        const targetElement = document.getElementById(window.location.hash.substring(1));
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
});
