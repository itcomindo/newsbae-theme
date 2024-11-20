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






        //JQuery end above.
    });
});