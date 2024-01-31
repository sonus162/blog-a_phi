$(document).ready(function () {
    $('.home-slide').slick({
        infinity:true,
        arrows: false,
    });

    $('.card-blogs').slick({
        infinity:true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<div class="slick-prev"><i class="bx bx-chevron-left"></i></div>',
        nextArrow: '<div class="slick-next"><i class="bx bx-chevron-right"></i></div>',
        responsive: [
            {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
                }
            }
        ]
    });
});