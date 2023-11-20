<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";


    // 댓글 많은 순
    $boardsql = "SELECT * FROM drinkboard WHERE boardDelete = 1 AND boardCategory = '커뮤니티' ORDER BY boardComment, boardView DESC LIMIT 5";
    $boardComment = $connect -> query($boardsql);

    // 게시글 최신 순
    $boardsql = "SELECT * FROM drinkboard WHERE boardDelete = 1 AND boardCategory = '커뮤니티' ORDER BY boardRegTime ASC LIMIT 5";
    $boardRegtime = $connect -> query($boardsql);

    // 랜덤으로 글 뿌려주기
    $boardsql = "SELECT * FROM drinkboard WHERE boardDelete = 1 AND boardCategory = '커뮤니티' LIMIT 5";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>취중진담</title>

    <!-- meta -->
    <meta name="author" content="취중진담">
    <meta name="description" content="프론트엔드 개발자 포트폴리오 조별과제 사이트입니다.">
    <meta name="keywords" content="웹퍼블리셔,프론트엔드, php, 포트폴리오, 커뮤니티, 술, publisher, css3, html, markup, design">
    
    <!-- favicon -->
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
    
    <!-- swiper / 술 랭킹-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
    <!-- fontasome -->
    <script src="https://kit.fontawesome.com/2cf6c5f82a.js" crossorigin="anonymous"></script>
    
    <!-- css -->
    <link href="../assets/css/reset.css" rel="stylesheet" />
    <link href="../assets/css/fonts.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/common.css" rel="stylesheet" />
    <link href="../assets/css/index.css" rel="stylesheet" />

    <!-- js -->
    <script src="../assets/js/scrollEvent.js"></script>
</head>

<body>
    <div id="wrapper">
                <!-- PC HEADER 840 < window -->
        <header id="header" class="leftHeader shaDow">
            <h1 class="header_logo">
                <a href="../main/main.php">
                    <img src="../assets/img/logo.svg" alt="logo">
                </a>
            </h1>
            <nav class="header_nav" role="navigation" aria-label="main">
                <ul>
                    <li><a href="../main/main.php"><i class="fa-solid fa-house"></i>홈</a></li>
                    <li><a href="../alcohol/alcohol.php"><i class="fa-regular fa-heart"></i> 술 리뷰</a></li>
                    <li><a href="../board/board.php"><i class="fa-regular fa-comments"></i> 자유 게시판</a></li>
                    <li><a href="#"><i class="fa-solid fa-gift"></i> 이벤트</a></li>
                    <li><a href="../mypage/mypage.php"><i class="fa-regular fa-user"></i> 마이페이지</a></li>
                </ul>
            </nav>
        </header>

        <!-- M HEADER 840 > window -->
        <div class="topLogo">
            <h1 class="header_logo">
                <a href="../main/main.php">
                    <img src="../assets/img/logo.svg" alt="logo">
                </a>
            </h1>
        </div>
        <header id="header" class="bottomHeader shaDow">    
            <nav class="header_nav" role="navigation" aria-label="main">
                <ul>
                    <li><a href="../main/main.php" aria-label="술리뷰"><i class="fa-regular fa-heart"></i></a></li>
                    <li><a href="#" aria-label="이벤트"><i class="fa-solid fa-gift"></i></a></li>
                    <li class="active"><a href="#" aria-label="홈"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="../board/board.php" aria-label="자유게시판"><i class="fa-regular fa-comments"></i></a></li>
                    <li><a href="../mypage/mypage.php" aria-label="마이페이지"><i class="fa-regular fa-user"></i></a></li>
                </ul>
            </nav>
        </header>
        <!-- header end -->

        <div class="topLogo">
            <h1 class="header_logo">
                <a href="#">
                    <img src="assets/img/logo.svg" alt="logo">
                </a>
            </h1>
        </div>
        <!-- M HEADER 840 > window -->

        <main id="contents_area">
            <section id="main_contents">

                <?php include "../alcohol/acRank.php"; ?>
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
                <div class="board_date"><?=date('m-d', $board['boardRegTime'])?></div>
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
<?php foreach($boardRegtime as $board){ ?>
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
            <!-- main_contents end -->

            <?php include "../include/sidewrap.php"; ?>
            <!-- header end -->

        </main>
        <!-- contents_area end -->
    </div>
    <!-- wrapper end -->

    <!-- Swiper JS CDN 불러옴 -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../assets/js/swiper.js"></script>
</body>

</html>