$(document).ready(function() {
    console.log("jquery");
});
$("#section-one-nav").click(function() {
    // console.log(window.location.pathname);
    if (window.location.pathname == "/") {
        $("html, body").animate(
            {
                scrollTop: $("#section-one").offset().top
            },
            1000
        );
    } else {
        window.location.href = "/";
    }
});
$("#section-three-nav").click(function() {
    // console.log(window.location.pathname);
    if (window.location.pathname == "/") {
        $("html, body").animate(
            {
                scrollTop: $("#section-three").offset().top
            },
            1000
        );
    } else {
        $(location).attr("href", "/#section-three");
    }
});
$("#section-two-nav").click(function() {
    // console.log(window.location.pathname);
    if (window.location.pathname == "/") {
        $("html, body").animate(
            {
                scrollTop: $("#section-seven").offset().top
            },
            1000
        );
    } else {
        $(location).attr("href", "/#section-seven");
    }
});
