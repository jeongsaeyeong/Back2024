<?php
include "../connect/connect.php";
include "../connect/session.php";

// 댓글이랑 조회수 많은 순
$boardsql = "SELECT * FROM drinkBoard WHERE boardDelete = 1 AND boardCategory = '자유게시판' ORDER BY boardComment, boardView DESC LIMIT 5";
$boardComment = $connect -> query($boardsql);

// 게시글 최신 순
$boardsql = "SELECT * FROM drinkBoard WHERE boardDelete = 1 AND boardCategory = '자유게시판' ORDER BY regTime DESC LIMIT 5";
$boardregTime = $connect -> query($boardsql);

// 랜덤으로 글 뿌려주기
$boardsql = "SELECT * FROM drinkBoard WHERE boardDelete = 1 AND boardCategory = '자유게시판' LIMIT 5";
$result = $connect -> query($boardsql);
$boardAll = array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $boardAll[] = $row;
    }
    shuffle($boardAll);
} else {
    echo "쿼리 실행 중 오류 발생: " . $connect->error;
}
$connect->close();

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <?php include "../include/head.php" ?>

    <!-- 개별 css -->
    <link href="../assets/css/ranking.css" rel="stylesheet" />

    <!-- swiper / 술 랭킹-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

</head>

<body>
    <div id="wrapper">

        <?php include "../include/header.php" ?>
        <!-- header -->

        <main id="contents_area">
            <section id="main_contents">

                <!-- 랭킹 슬라이드 -->
                <div class="ranking_list boxStyle roundCorner shaDow">
                    <h4>이번주 인기 주류 <span>TOP10</span></h4>
                    <div class="alcohol_list">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <span class="rankedIn">1</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (1).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span class="rankedIn">2</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (2).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span class="rankedIn">3</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (3).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>4</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (4).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>5</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (5).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>6</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (1).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>7</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (2).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>8</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (3).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>9</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (4).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <span>10</span>
                                    <a href="alcohol_page.html">
                                        <img src="../assets/img/card (5).gif" alt="alcohol">
                                        <div class="title_hover">
                                            <p>진로 이즈백</p>
                                            <span>하이트</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ranking_list -->

                <div class="best_list boxStyle roundCorner shaDow">
                    <h4>인기 게시글 <span>HOT</span></h4>
                    <ul class="board_w100">
                        <?php foreach($boardComment as $board){ ?>
                            <li>
                                <a href="../board/board_view.php?boardId=<?=$board['boardId']?>">
                                    <div class="board_info">
                                        <div class="board_title textCut"><?=$board['boardTitle']?></div>
                                        <div class="board_author textCut"><?=$board['boardAuthor']?></div>
                                        <div class="board_date"><?=date('m-d', $board['regTime'])?></div>
                                        <div class="board_view"><span><?=$board['boardView']?></span></div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="best_list boxStyle roundCorner shaDow">
                    <h4>최신 게시글 <span>NEW</span></h4>
                    <ul class="board_w100">
                    <?php foreach($boardregTime as $board){ ?>
                        <li>
                            <a href="../board/board_view.php?boardId=<?=$board['boardId']?>">
                                <div class="board_info">
                                    <div class="board_title textCut"><?=$board['boardTitle']?></div>
                                    <div class="board_author textCut"><?=$board['boardAuthor']?></div>
                                    <div class="board_date"><?=date('m-d', $board['regTime'])?></div>
                                    <div class="board_view"><span><?=$board['boardView']?></span></div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>

                <div class="best_list boxStyle roundCorner shaDow">
                    <h4>추천 게시글 <span>Pick!</span></h4>
                    <ul class="board_w100">
                    <?php foreach($boardAll as $board){ ?>
                        <li>
                            <a href="../board/board_view.php?boardId=<?=$board['boardId']?>">
                                <div class="board_info">
                                    <div class="board_title textCut"><?=$board['boardTitle']?></div>
                                    <div class="board_author textCut"><?=$board['boardAuthor']?></div>
                                    <div class="board_date"><?=date('m-d', $board['boardRegTime'])?></div>
                                    <div class="board_view"><span><?=$board['boardView']?></span></div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                
            </section>
            <!-- main_contents end -->

            <?php include "../include/aside.php" ?>
            <!-- side_box end -->

        </main>
        <!-- contents_area end -->

    </div>
    <!-- wrapper end -->

    <!-- Swiper 술 랭킹 불러옴 -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../assets/js/swiper.js"></script>
</body>

</html>