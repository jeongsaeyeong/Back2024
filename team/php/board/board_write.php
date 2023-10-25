<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>취중진담 게시글-쓰기</title>
 
    <!-- meta -->
    <meta name="author" content="취중진담">
    <meta name="description" content="프론트엔드 개발자 포트폴리오 조별과제 사이트입니다.">
    <meta name="keywords" content="웹퍼블리셔,프론트엔드, php, 포트폴리오, 커뮤니티, 술, publisher, css3, html, markup, design">

    <!-- favicon -->
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">

    <!-- fontasome -->
    <script src="https://kit.fontawesome.com/2cf6c5f82a.js" crossorigin="anonymous"></script>

    <!-- css -->
    <link href="../assets/css/reset.css" rel="stylesheet" />
    <link href="../assets/css/fonts.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/common.css" rel="stylesheet" />
    <link href="../assets/css/boardWrite.css"rel="stylesheet">
    <link href="../assets/css/boardWrite.css" rel="stylesheet">

    <!-- js -->
    <script src="../assets/js/scrollEvent.js"></script>
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
                <div class="best_list boxStyle roundCorner shaDow ">
                    <div class="board">
                        <div class="board_form ">
                            <form action="board_wirteSave.php" method="post"  name="blogWriteSave" enctype="multipart/form-data">
                                <legend class="blind"></legend>
                                <div class="form_box">
                                    <div class="board_btn sideBtn">
                                        <h2>신청하고 싶은 술을 말해주세요.</h2>
                                    </div>
                                    <div class="board_text">
                                        <div class="post">
                                            <ul class="link inputStyle mb20">
                                                 <li class="active"><i class="fa-regular fa-image"></i><a href="#">Image</a></li>
                                                <!--    <li class="active"><i class="fa-regular fa-file-lines"></i><a href="#">Post</a></li>
                                                <li><i class="fa-solid fa-video"></i><a href="#"> Video</a></li>
                                                <li><i class="fa-solid fa-link"></i><a href="#">Link</a></li>
                                                <li><i class="fa-solid fa-location-dot"></i><a href="#">Place</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="board_title ">
                                            <label for="boardContents"></label>
                                            <textarea id="boardContents" name="boardContents" cols="50" rows="1"
                                                class="board_input_title inputStyle placeholder"
                                                placeholder="제목을 작성해주세요"></textarea>
                                        </div>
                                        <div class="board_content">
                                            <label for="boardContents"></label>
                                            <textarea id="boardContents" name="boardContents" cols="50" rows="8"
                                                class="board_input_contents inputStyle placeholder"
                                                placeholder="원하는 술을 신청해주세요"></textarea>
                                        </div>
                                        <div class="create">
                                            <button type="submit" class="sideBtn mt50">술 신청하기</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </section>
            <!-- main_contents end -->

            <aside id="side_wrap">
                <div class="search_box side_box roundCorner shaDow">
                    <input type="text" placeholder="취중진담 통합 검색">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <!-- 로그인 함 -->
                <div class="info_box side_box roundCorner shaDow">
                    <div class="login_info">
                        <img src="../assets/img/img500.jpg" alt="유저 이미지">
                        <p>홍길동님 어서오세요.</p>
                        <ul>
                            <li><a href="#">로그아웃</a></li>
                            <li><a href="#">마이페이지</a></li>
                            <li><a href="#">설정</a></li>
                        </ul>
                    </div>
                    <button class="sideBtn">새 글쓰기</button>
                </div>

                <!-- 로그인 안함 -->
                <!-- <div class="info_box side_box roundCorner shaDow">
                    <div class="login_info not_login">
                        <p><i class="fa-solid fa-icons"></i> <br> 회원가입하고 <br> 더 많은 기능을 누리세요</p>
                        <ul>
                            <li><a href="#">회원가입</a></li>
                            <li><a href="#">회원정보 찾기</a></li>
                        </ul>
                    </div>
                    <button class="sideBtn" onclick="location.href='bin.html'">로그인</button>
                </div> -->
            </aside>
            <!-- side_box end -->

        </main>
        <!-- contents_area end -->
    </div>
    <!-- wrapper end -->
</body>

</html>