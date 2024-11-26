jQuery(function () {
    // Move Search to Nav


    //adsBeforeTopbar Start.
    function adsBeforeTopbar() {
        var $screenWidth = jQuery(window).width();
        if ($screenWidth < 541) {
            setTimeout(function () {
                jQuery('#adsbfh540').addClass('active');
            }, 1500);
            jQuery('#adsbfh540 .ads-close').on('click', function () {
                jQuery('#adsbfh540').removeClass('active').addClass('inactive');
            });
        }
    }
    adsBeforeTopbar();
    //adsBeforeTopbar End.

    // Debounce function
    function debounce(func, wait) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                func.apply(context, args);
            }, wait);
        };
    }

    // Make Body Overflow Hidden
    function makeBodyOverflowHidden() {
        jQuery('body').addClass('no-scroll');
        setTimeout(function () {
            jQuery('body').removeClass('no-scroll');
        }, 1000);
    }

    // OffCanvas Menu
    function offCanvasMenu() {
        var $toggle = jQuery('.bars.toggle');
        var $menu = jQuery('nav#header-menu-nav');
        var $bar = jQuery('.bar');

        $toggle.on('click', function (e) {
            e.stopPropagation();
            $menu.toggleClass('active');
            $bar.toggleClass('active');

            if ($menu.hasClass('active')) {
                if (!$menu.find('.closer').length) {
                    $menu.append('<div class="closer">X</div>');
                }
            } else {
                jQuery('.closer').remove();
            }
        });

        jQuery(document).on('click', function () {
            $menu.removeClass('active');
            $bar.removeClass('active');
            jQuery('.closer').remove();
        });

        jQuery(document).on('click', '.closer', function (e) {
            e.stopPropagation();
            $menu.removeClass('active');
            $bar.removeClass('active');
            jQuery(this).remove();
        });
    }

    // Inisialisasi semua fungsi
    makeBodyOverflowHidden();
    offCanvasMenu();

    // Optimasi resize
    // jQuery(window).resize(debounce(moveSearchToNav, 200));
});
