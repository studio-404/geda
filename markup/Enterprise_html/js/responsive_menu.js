$(document).ready(function () {
    $('#slide-nav.navbar .container').append($('<div id="navbar-height-col"></div>'));
    var toggler = '.navbar-toggle';
    var pagewrapper = '#page-content';
    var navigationwrapper = '.navbar-header';
    var menuwidth = '100%'; 
    var slidewidth = '50%';
    var menuneg = '-100%';
    var slideneg = '-50%';
    $("#slide-nav").on("click", toggler, function (e) {
        var selected = $(this).hasClass('slide-active');
        $('#slidemenu').stop().animate({
            right: selected ? menuneg : '0px'
        });
        $('#navbar-height-col').stop().animate({
            right: selected ? slideneg : '0px'
        });
        $(pagewrapper).stop().animate({
            right: selected ? '0px' : slidewidth
        });
        $(navigationwrapper).stop().animate({
            right: selected ? '0px' : slidewidth
        });
        $(this).toggleClass('slide-active', !selected);
        $('#slidemenu').toggleClass('slide-active');
        $('#page-content, .navbar, body, .navbar-header').toggleClass('slide-active');
    });
    var selected = '#slidemenu, #page-content, body, .navbar, .navbar-header';
    $(window).on("resize", function () {
        if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
            $(selected).removeClass('slide-active');
        }
    });
});