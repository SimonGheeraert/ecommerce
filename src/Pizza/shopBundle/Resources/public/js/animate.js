$(".hover").hover(function () {
    $(this).children().stop(true, false).animate({
        height: "100px"
    });
}, function () {
    $(this).children().stop(true, false).animate({
        height: "35px"
    });
});