<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    $boardsql = "SELECT * FROM drinkboard WHERE boardDelete = 1 AND boardCategory = '커뮤니티' ORDER BY boardId DESC";
    $boardInfo = $connect -> query($boardsql);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <?php
    include "../include/head.php";
    ?>
    
    <!-- meta -->
    <meta name="author" content="취중진담">
    <meta name="description" content="프론트엔드 개발자 포트폴리오 조별과제 사이트입니다.">
    <meta name="keywords" content="웹퍼블리셔,프론트엔드, php, 포트폴리오, 커뮤니티, 술, publisher, css3, html, markup, design">
    
    <!-- swiper / 술 랭킹-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- css -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/index.css" rel="stylesheet" />
    <link href="../assets/css/selectOption.css" rel="stylesheet" />
    <link href="../assets/css/board.css" rel="stylesheet">

    <!-- js -->
    <script src="../assets/js/selectOption.js"></script>
</head>

<body>
    <div id="wrapper">

        <?php include "../include/header.php"; ?>
        <!-- PC HEADER 840 < window -->

        <?php include "../include/logo.php"; ?>
        <!-- M HEADER 840 > window -->

        <?php include "../include/headerbottom.php"; ?>
        <!-- header end -->

        <main id="contents_area">
            <section id="main_contents">
                <div class="best_list boxStyle roundCorner shaDow">
                    <h4>인기 게시글 <span>HOT</span></h4>
                    <ul class="board_w100">
<?php foreach($boardInfo as $board){ ?>
    <li>
        <a href="board_view.php?boardId=<?=$board['boardId']?>">
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
                    <div class="board_page_option">
                        <div class="board_pages">
                            <ul class="pages_list">
                                <li class="first"><a href="#">&lt;&lt;</a></li>
                                <li class="prev"><a href="#">&lt;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li class="next"><a href="#">></a></li>
                                <li class="last"><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <form action="board_search.php" method="POST" class="search_form">
                        <div class="selectBox2"><i class="fa-solid fa-angle-down"></i>
                            <div class="label">게시글</div>
                            <li class="optionList">
                                <option class="optionItem" value="제목만">제목만</option>
                                <option class="optionItem" value="작성자">작성자</option>
                            </li>
                        </div>
                        <div class="board_search_form">
                            <div class="board_search_option">
                                <div id="search_input" class="board_search_box ">
                                    <label for="search" class="hidden" style="display: none;">검색창</label>
                                    <input type="text" id="side_search" name="side_search" placeholder="검색어를 입력해주세요"
                                        autocomplete="off" class="im">
                                    <button type="sumbit" id="search_Btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
            </section>
            <!-- main_contents end -->

            <?php include "../include/sidewrap.php"; ?>
            <!-- side_box end -->

        </main>
        <!-- contents_area end -->
    </div>
    <!-- wrapper end -->

    <!-- Swiper JS CDN 불러옴 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../assets/js/swiper.js"></script>

    <script>
        $("#search_Btn").click(function () {
            if ($("#side_search").val() == "") {
                $("#side_search").focus();
            }
        })

    </script>
    <!-- <script>
        function change() {
            let newValue = "새로운 값";
            let option = document.querySelector('.optionItem[value="제목만"]');
            option.value = newValue;
            let form = document.querySelector('.search_form');
            form.submit();
        }
    </script> -->
</body>

</html>