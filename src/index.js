require('jquery');
require('bootstrap');

require('./login');
require('./users');
require('./category');
require('./post');

$(document).ready(function () {


    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
    $("#sidebar-links a").each(function () {
        if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
            $(this).addClass("active");
    })

    $('#search').click(function () {
        $('.nav-link').addClass('hide-item');
        $('.search-form').addClass('active');
        $('.close').addClass('active');
        $('#search').hide();
    });
    $('.close').click(function () {
        $('.nav-link').removeClass('hide-item');
        $('.search-form').removeClass('active');
        $('.close').removeClass('active');
        $('#search').show();
    });
});
