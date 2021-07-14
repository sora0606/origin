$(function () {
    /*=================================================
    mainvisualのフェード表示
    ===================================================*/

    setTimeout(function () {
        $(".mainvisual").fadeIn(1000);
    }, 0);
    setTimeout(function () {
        $(".mainvisual").css("transition" , "all .5s");
    }, 1000);

    /*=================================================
    要素のフェード表示
    ===================================================*/
    // スクロール時のイベント
    $(window).scroll(function(){
        $('.work').each(function(){
            let scroll = $(window).scrollTop();
            let target = $(this).offset().top;
            let windowHeight = $(window).height();

            if(scroll > target - windowHeight+200){
                $(this).css('opacity' , '1');
                $(this).css('transform' , 'translateY(0)');
            }
        });

    });
});