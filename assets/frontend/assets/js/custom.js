var stickyNav = $('.main-nav').offset().top;
$(window).bind('scroll', function () {
    if ($(window).scrollTop() > stickyNav) {
        $('.main-nav').addClass('fixed-nav');
    } else {
        $('.main-nav').removeClass('fixed-nav');
    }
});
/* page loder js */
$(window).on('load', function () {
    $(".loader").fadeOut("slow");
});
