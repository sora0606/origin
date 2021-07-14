<!DOCTYPE html>
<html lang="jp">
<style>
.side-bar{
    font-size: 15rem;
    font-family: Didot;
    position: absolute;
    top: 0;
    left: 0;
    transition:all 0.5s;
    will-change: transform;
    height: 5000vh;
}

.side-bar span{
    color: #0e0d20;
    text-shadow: 1px 1px 0 #fff,
                -1px 1px 0 #fff,
                1px -1px 0 #fff,
                -1px -1px 0 #fff;
    text-shadow: 1px 1px 1px #fff,
                -1px 1px 1px #fff,
                1px -1px 1px #fff,
                -1px -1px 1px #fff;
    writing-mode: vertical-rl;
}

@media screen and (max-width:840px) {
    .side-bar{
        font-size: 8rem;
    }
}


</style>
<body>
    <div class="side-bar" data-scroll>
        <span>This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page. This is my self-introduction page.</span>
    </div>
<script>

var ticking = false;

function func() {
    if (!ticking) {
        requestAnimationFrame(function() {
        ticking = false;
        $(window).on('scroll load', function(){
        var bg = $(window).scrollTop();
        $('.side-bar').css({top:bg/-0.95*1});
        });
    });
    }
    ticking = true;
};
    document.addEventListener('scroll', func, {passive: true});
</script>
</body>
</html>