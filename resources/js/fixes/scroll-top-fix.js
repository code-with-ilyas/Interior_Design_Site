// Fix for "Cannot read properties of null (reading 'getTotalLength')" error
document.addEventListener('DOMContentLoaded', function() {
    // Check if the scroll-top element and its path exist before attempting to manipulate them
    const scrollTopElement = document.querySelector('.scroll-top');
    const scrollPathElement = document.querySelector('.scroll-top path');

    if (scrollTopElement && scrollPathElement && typeof jQuery !== 'undefined') {
        // Only run the scroll-top animation code if elements exist
        const path = scrollPathElement;
        const pathLength = path.getTotalLength();

        // Set up the dash array and offset
        path.style.transition = path.style.WebkitTransition = 'none';
        path.style.strokeDasharray = pathLength + ' ' + pathLength;
        path.style.strokeDashoffset = pathLength;

        // Trigger layout to ensure the offset is applied
        path.getBoundingClientRect();

        // Reset transition
        path.style.transition = path.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

        // Define the scroll handler function
        const handleScroll = function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const draw = pathLength - (scrollTop * pathLength / docHeight);
            path.style.strokeDashoffset = draw;
        };

        // Initial call
        handleScroll();

        // Attach scroll event listener
        window.addEventListener('scroll', handleScroll);

        // jQuery scroll handler for showing/hiding the button
        jQuery(window).on('scroll', function() {
            jQuery(this).scrollTop() > 50
                ? jQuery(scrollTopElement).addClass('show')
                : jQuery(scrollTopElement).removeClass('show');
        });

        // Click handler for scroll to top
        jQuery(scrollTopElement).on('click', function(e) {
            e.preventDefault();
            jQuery('html, body').animate({ scrollTop: 0 }, 750);
            return false;
        });
    } else {
        // If elements don't exist, set up a basic scroll-to-top functionality without the fancy animation
        if (scrollTopElement && typeof jQuery !== 'undefined') {
            jQuery(window).on('scroll', function() {
                jQuery(this).scrollTop() > 50
                    ? jQuery(scrollTopElement).addClass('show')
                    : jQuery(scrollTopElement).removeClass('show');
            });

            jQuery(scrollTopElement).on('click', function(e) {
                e.preventDefault();
                jQuery('html, body').animate({ scrollTop: 0 }, 750);
                return false;
            });
        }
    }
});
