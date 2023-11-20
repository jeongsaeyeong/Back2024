$(function(){
    let currentIndex = 0;
    $(".sliderWrap").append($(".slider").first().clone(true)); 

    setInterval(function(){
        currentIndex++;
        $(".sliderWrap").animate({marginTop: -300 * currentIndex + "px"}, 600);
        
        if(currentIndex == 3){
            setTimeout(function(){
                $(".sliderWrap").animate({marginTop:0}, 0);
                currentIndex = 0;
            }, 700);           
               
        }
    }, 3000);

    /// 메뉴 
    $(".nav > ul > li").mouseover(function(){
        $(this).find(".submenu").stop().slideDown(200);
    });
    $(".nav > ul > li").mouseout(function(){
        $(this).find(".submenu").stop().slideUp(200);
    });

    // 팝업
    $(".popup-btn").click(function(){
        $(".popup-view").show();
    });
    $(".popup-close").click(function(){
        $(".popup-view").hide();
    });
});