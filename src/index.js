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
    });

    $('#searchForm').on('submit', function (e) {
        e.preventDefault();
        let searchQuery = $('#searchValue').val().trim();
        if (searchQuery == "") {
            alert('Please write something to search');
            $('#searchValue').focus();
        } else {
            window.location.replace(`index.php?source=search&query=${searchQuery}`);
        }
    });
});
