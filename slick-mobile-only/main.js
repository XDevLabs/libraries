mobileOnlySlider(".posts__list", false, true, 767);

function mobileOnlySlider($slidername, $arrows, $dots, $breakpoint) {
    var slider = $($slidername),
        slider_row = slider.data('slide');
    var settings = {
        mobileFirst: true,
        arrows: $arrows,
        dots: $dots,
        rows: slider_row,
        slidesToShow: 1,
        responsive: [
            {
                breakpoint: $breakpoint,
                settings: "unslick"
            }
        ]
    };

    slider.slick(settings);

    $(window).on("resize", function () {
        if ($(window).width() > $breakpoint) {
            return;
        }
        if (!slider.hasClass("slick-initialized")) {
            return slider.slick(settings);
        }
    });
} // Mobile Only Slider