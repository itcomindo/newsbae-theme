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
        // Newsticker End.

        // newsTab start.
        function newsTab() { }
        var $trigger = jQuery('.triggers .trigger');

        jQuery($trigger).on('click', function () {
            var $this = jQuery(this).attr('data-cat');
            jQuery('.triggers .trigger').removeClass('active');
            jQuery(this).addClass('active');
            console.log($this);

            // Content. find same value of data-cat in elemen .group, then add class active. And remove class active from other element.

            jQuery('.group').removeClass('active');

            jQuery('.group').each(function () {
                if (jQuery(this).attr('data-cat') == $this) {
                    jQuery(this).addClass('active');
                }
            });



        });


        newsTab();
        // newsTab end.






        //JQuery end above.
    });
});