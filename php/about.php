<!DOCTYPE html>
<html lang="jp">
<head>
<?php include_once("../common/head.php"); ?>

    <link rel="stylesheet" href="../css/about.css">

    <script src="../js/about.js"></script>
</head>
<body>
    <?php include_once("../common/header.php"); ?>
    <div class="mainvisual">
        <h1 class="page-title">About</h1>
        <a href="#">Scroll</a>
    </div>
    <div id="particles-js">
        <main class="about">
            <div id="profile">
                <h3 class="content-title">Profile</h3>
                <div class="profile-area">
                    <div class="profile-name">
                        <img src="../img/profile.jpeg" alt="" class="fadein">
                        <h4 class="profile-english">shimada sora</h4>
                        <h4 class="profile-japanese">島田 大空</h4>
                    </div>
                    <div class="profile-skill">
                        <ul class="skill">
                            <h4 class="content-sub-title">-skill-</h4>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>PHP</li>
                            <li>JavaScript</li>
                            <li>MySQL</li>
                            <li>Bootstrap</li>
                            <li>Adobe XD</li>
                            <li>WordPress</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="history">
                <h3 class="content-title">History</h3>
                <section class="story story-0">
                    <h4 class="count" data-num="2002">1750</h4>
                    <p class="memory">兵庫で生まれ、<br>広島で育つ。</p>
                </section>
                <section class="story story-1">
                    <h4 class="count" data-num="2020">1500</h4>
                    <p class="memory">県内で一人暮らしを<br>始める。</p>
                </section>
                <section class="story story-2">
                    <h4 class="count" data-num="2021">1250</h4>
                    <p class="memory">県内の高校を卒業。<br>プログラミングスクールTECH I.S.で生徒として入校し、入校から2ヶ月で初案件を獲得。</p>
                </section>
            </div>
            <?php include_once("../common/footer.php"); ?>
        </main>
        <?php include_once("../common/about-sidebar.php"); ?>
    </div>
</body>
</html>