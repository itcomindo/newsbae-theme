jQuery(function () {

    // Content Player Start.
    function nbtContentPlayer() {
        var $isFlk = jQuery('#the-player').attr('data-flk');
        if ('true' === $isFlk) {
            console.log('Slider Run');
            jQuery('#thumbs').flickity({
                cellAlign: 'left',
                contain: true,
                wrapAround: true,
            });
        }
    }
    nbtContentPlayer();
    // Content Player End.

});