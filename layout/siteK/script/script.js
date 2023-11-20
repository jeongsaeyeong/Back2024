$(function () {
    let currentIndex = 0;
    $(".sliderWrap").append($(".slider").first().clone(true));

    setInterval(function () {
        currentIndex++;
        $(".sliderWrap").animate({ marginTop: -300 * currentIndex + "px" }, 600);

        if (currentIndex == 3) {
            setTimeout(function () {
                $(".sliderWrap").animate({ marginTop: 0 }, 0);
                currentIndex = 0;
            }, 700);
        }
    }, 3000);

    $(".nav > ul > li").mouseover(function () {
        $(".nav > ul > li > ul").stop().fadeIn(400);
        $("#header").addClass("on");
    });
    $(".nav > ul > li").mouseout(function () {
        $(".nav > ul > li > ul").stop().fadeOut(100);
        $("#header").removeClass("on");
    });

});