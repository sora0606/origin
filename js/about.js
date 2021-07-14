$(function () {
    /*=================================================
    スクロール時の画像フェード表示
    ===================================================*/
    // スクロール時のイベント
    $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        let target = $(".profile-area").offset().top;
        let windowHeight = $(window).height();

        if (scroll > target - windowHeight + 200) {
            $(".fadein").css('opacity', '1');
            $(".fadein").css('transform', 'translateY(-10%) translateX(-25%)');
        }
    });

    /*=================================================
    スクロール時のmainvisualサイズ
    ===================================================*/
    $(window).scroll(function () {
        if ($(window).scrollTop()) {
            $(".mainvisual").css("width", "85%");
        } else {
            $(".mainvisual").css("width", "100%");
        }
    });

    /*=================================================
    スクロール時のフェードイン
    ===================================================*/
    // スクロール時のイベント
    $(window).scroll(function () {
        $('.story').each(function () {
            let scroll = $(window).scrollTop();
            let target = $(this).offset().top;
            let windowHeight = $(window).height();

            if (scroll > target - windowHeight + 200) {
                $(this).css('opacity', '1');
                $(this).css('transform', 'translateY(0)');
            }
        });
    });

    $(window).scroll(function () {

        $(function () {
            var countElm = $('.count'),
                countSpeed = 5;

            countElm.each(function () {
                var self = $(this),
                    countMax = self.attr('data-num'),
                    thisCount = self.text(),
                    countTimer;

                function timer() {
                    countTimer = setInterval(function () {
                        var countNext = thisCount++;
                        self.text(countNext);

                        if (countNext == countMax) {
                            clearInterval(countTimer);
                        }
                    }, countSpeed);
                }
                timer();
            });

        });

    });
});