$(document).ready(function () {
    $('.home-slide').slick({
        infinity:true,
        arrows: true,
        prevArrow: '<div class="slick-prev"><i class="bx bx-chevron-left"></i></div>',
        nextArrow: '<div class="slick-next"><i class="bx bx-chevron-right"></i></div>',
        centerMode: true,
        centerPadding: '120px',
        slidesToShow: 1,
        responsive: [
            {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
            },
            {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
            }
        ]
    });
});
