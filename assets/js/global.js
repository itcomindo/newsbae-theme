window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.

        // make body overflow hidden start.
        function makeBodyOverflowHidden() {
            jQuery('body').addClass('no-scroll');
            setTimeout(function () {
                jQuery('body').removeClass('no-scroll');
            }, 1000);
        }
        makeBodyOverflowHidden();
        // make body overflow hidden end.

        // OffCanvasMenu Start.
        function offCanvasMenu() {
            var $toggle = jQuery('.bars.toggle');
            var $menu = jQuery('nav.header-menu');
            var $bar = jQuery('.bar');

            $toggle.on('click', function (e) {
                e.stopPropagation();
                $menu.toggleClass('active');
                $bar.toggleClass('active');

                if ($menu.hasClass('active')) {
                    setTimeout(function () {
                        if (!$menu.find('.closer').length) { // Pastikan hanya ada satu .closer
                            $menu.append('<div class="closer">X</div>');
                        }
                    }, 800); // Delay 300ms
                } else {
                    jQuery('.closer').remove();
                }
            });

            // Klik di mana saja untuk menutup menu
            jQuery(document).on('click', function () {
                $menu.removeClass('active');
                $bar.removeClass('active');
                jQuery('.closer').remove();
            });

            // Klik pada .closer untuk menutup menu
            jQuery(document).on('click', '.closer', function () {
                $menu.removeClass('active');
                $bar.removeClass('active');
                jQuery(this).remove();
            });
        }

        offCanvasMenu();

        // OffCanvasMenu End.






        //JQuery end above.
    });
});