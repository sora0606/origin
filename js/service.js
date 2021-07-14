$(function () {
    /*=================================================
    要素のフェード表示
    ===================================================*/
    // スクロール時のイベント
    $(window).scroll(function () {
        $('.line').each(function () {
            let scroll = $(window).scrollTop();
            let target = $(this).offset().top;
            let windowHeight = $(window).height();

            if (scroll > target - windowHeight + 200) {
                $(this).css('opacity', '1');
                $(this).css('transform', 'translateY(0) rotateZ(0)');
            }
        });
    });
});