window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("backtop").style.opacity = "1";
    } else {
        document.getElementById("backtop").style.opacity = "0";
    }
}
function topFunction(){
    window.scrollTo({top: 0, behavior: 'smooth'});
}

$(document).ready(function () {
    $(".menu-mobile").click(function(){
        console.log(123);
        $(".nav-menu").slideToggle();
        $(".nav-menu").toggleClass("open");
    });

    $(".menu-add").click(function(){
        // $(this).closest('li').find('.sub-menu').toggleClass("open");
        $(this).closest('li').find('.sub-menu').slideToggle();
    });
});