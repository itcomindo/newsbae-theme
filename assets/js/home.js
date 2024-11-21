window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.

        //Flickity slider Sticky Post Start.
        function flickitySliderStickyPost() {
            var flkty = new Flickity('#flk', {
                cellAlign: 'center',
                contain: true,
                wrapAround: true,
                prevNextButtons: false,
                pageDots: false,
                autoPlay: 5000,
            });
        }
        flickitySliderStickyPost();
        //Flickity slider Sticky Post End.

        // Newsticker Start.
        function newsTicker1() {
            var $carousel = jQuery('#newstickeritems');
            var scrollSpeed = 1;
            var scrollPos = 0;
            $carousel.append($carousel.html());

            function smoothScroll() {
                scrollPos += scrollSpeed;
                if (scrollPos >= $carousel[0].scrollWidth / 2) {
                    scrollPos = 0;
                }
                $carousel.scrollLeft(scrollPos);
                requestAnimationFrame(smoothScroll);
            }

            smoothScroll();
        }

        function newsTicker() {
            var $carousel = jQuery('#newstickeritems');
            var scrollSpeed = 1;
            var scrollPos = 0;
            var isPaused = false;

            $carousel.append($carousel.html());

            function smoothScroll() {
                if (!isPaused) {
                    scrollPos += scrollSpeed;
                    if (scrollPos >= $carousel[0].scrollWidth / 2) {
                        scrollPos = 0;
                    }
                    $carousel.scrollLeft(scrollPos);
                }
                requestAnimationFrame(smoothScroll);
            }

            $carousel.on('mouseenter', 'li', function () {
                isPaused = true;
                jQuery(this).addClass('paused');
            });

            $carousel.on('mouseleave', 'li', function () {
                isPaused = false;
                jQuery(this).removeClass('paused');
            });

            smoothScroll();
        }
        newsTicker();




        newsTicker();
        // Newsticker End.






        //JQuery end above.
    });
});