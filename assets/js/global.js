jQuery(function () {
    // Move Search to Nav
    function moveSearchToNav() {
        var $screenWidth = jQuery(window).width();
        var $search = jQuery('#topbar .mid');
        var $nav = jQuery('#header-menu nav');
        var $items = jQuery('#topbar .items');
        var $left = $items.find('.left');
        var $right = $items.find('.right');

        if ($search.length && $nav.length && $items.length) {
            if ($screenWidth < 769) {
                $search.prependTo($nav);
                $search.addClass('in-nav');
            } else {
                if ($left.length && $right.length) {
                    $search.insertAfter($left);
                } else {
                    $search.appendTo($items);
                }
                $search.removeClass('in-nav');
            }
        }
    }

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
        var $menu = jQuery('nav.header-menu');
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
    moveSearchToNav();
    makeBodyOverflowHidden();
    offCanvasMenu();

    // Optimasi resize
    jQuery(window).resize(debounce(moveSearchToNav, 200));
});
