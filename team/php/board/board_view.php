<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- meta -->
    <meta name="author" content="취중진담">
    <meta name="description" content="프론트엔드 개발자 포트폴리오 조별과제 사이트입니다.">
    <meta name="keywords" content="웹퍼블리셔,프론트엔드, php, 포트폴리오, 커뮤니티, 술, publisher, css3, html, markup, design">
    
    <!-- favicon -->
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    
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
    <link href="../assets/css/selectOption.css" rel="stylesheet" />
    <link href="../assets/css/board.css" rel="stylesheet">
    <link href="../assets/css/boardView.css" rel="stylesheet" >
    
    <!-- js -->
    <script src="../assets/js/scrollEvent.js"></script>

    <title>취중진담</title>
</head>

<body>
    <div id="wrapper">
        <!-- PC HEADER 840 < window -->
        <?php include "../include/header.php"; ?>

        <!-- M HEADER 840 > window -->
        <?php include "../include/logo.php"; ?>

        <?php include "../include/headerbottom.php"; ?>
        <!-- header end -->

        <main id="contents_area">
            <section id="main_contents">
                <div class="best_list boxStyle roundCorner shaDow mb50">
                    <h4><a href="/">인기 게시글</a><span>HOT</span></h4>

                    <div class="view_wrap">
                        <h5>글 제목</h5>
                        <div class="view_box">
                           
                            <div class="user_info not_user">
                                <p><i class="fa-solid fa-icons"></i></p>
                                <div class="user_info_box">
                                    <p><em> 홍길동님이</em> 쓴 게시글 더보기 ></p>
                                    <ul>
                                        <li><a href="#">좋아요</a></li>
                                        <li><a href="#">댓글</a></li>
                                        <li><a href="#">수정하기</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="back_list"><a href="/">목록으로 돌아가기</a></div>
                        </div>
                    </div>


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
                </div>
                <div class="best_list boxStyle roundCorner shaDow">

                    <h4>인기 게시글 목록보기</h4>

                    <ul class="board_w100">
                        <li>
                            <a href="#">
                                <div class="board_title">
                                    <p>제목이 아주 긴 경우 :: 말줄임표__ 술 땡기는 금요일~ 곱창에 소주 땡기네요.술 땡기는 금요일~ 곱창에 소주 땡기네요.술 땡기는 금요일~
                                        곱창에 소주 땡기네요.</p>
                                </div>
                                <div class="board_reaction">
                                    <p>조회수 <span>999</span></p>
                                    <p>댓글 <span>25</span></p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="board_title">
                                    <p>술 땡기는 금요일~ 곱창에 소주 땡기네요.</p>
                                </div>
                                <div class="board_reaction">
                                    <p>조회수 <span>999</span></p>
                                    <p>댓글 <span>25</span></p>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </section>
            <!-- main_contents end -->

            <aside id="side_wrap">
                <div class="search_box side_box roundCorner shaDow">
                    <input type="text" placeholder="취중진담 통합 검색">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <!-- 로그인 함 -->
                <!-- <div class="info_box side_box roundCorner shaDow">
                    <div class="login_info">
                        <img src="assets/img/img500.jpg" alt="유저 이미지">
                        <p>홍길동님 어서오세요.</p>
                        <ul>
                            <li><a href="#">로그아웃</a></li>
                            <li><a href="#">마이페이지</a></li>
                            <li><a href="#">설정</a></li>
                        </ul>
                    </div>
                    <button class="sideBtn">새 글쓰기</button>
                </div> -->

                <!-- 로그인 안함 -->
                <div class="info_box side_box roundCorner shaDow">
                    <div class="login_info not_login">
                        <p><i class="fa-solid fa-icons"></i> <br> 회원가입하고 <br> 더 많은 기능을 누리세요</p>
                        <ul>
                            <li><a href="#">회원가입</a></li>
                            <li><a href="#">회원정보 찾기</a></li>
                        </ul>
                    </div>
                    <button class="sideBtn" onclick="location.href='bin.html'">로그인</button>
                </div>


            </aside>
            <!-- side_box end -->

        </main>
        <!-- contents_area end -->
    </div>
    <!-- wrapper end -->

    <!-- Swiper JS CDN 불러옴 -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
</body>

</html>