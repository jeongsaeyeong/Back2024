<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- meta -->
    <meta name="author" content="취중진담">
    <meta name="description" content="프론트엔드 개발자 포트폴리오 조별과제 사이트입니다.">
    <meta name="keywords" content="웹퍼블리셔,프론트엔드, php, 포트폴리오, 커뮤니티, 술, publisher, css3, html, markup, design">
    
    <!-- favicon -->
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
 
    <!-- fontasome -->
    <script src="https://kit.fontawesome.com/2cf6c5f82a.js" crossorigin="anonymous"></script>
    
    <!-- css -->
    <link href="../assets/css/reset.css" rel="stylesheet" />
    <link href="../assets/css/fonts.css" rel="stylesheet" />
    <link href="../assets/css/login.css" rel="stylesheet" />
    <link href="../assets/css/common.css" rel="stylesheet" />

    <!-- js -->
    <script src="assets/js/scrollEvent.js"></script>

    <title>로그인 페이지</title>
    <style>
    </style>
</head>

<body class="login__body">
    <div id="wrap">
        <main id="login">
            <div class="login__box">
                <div class="left">
                    <img class="cocktail" src="assets/img/cocktail.png" alt="">
                    <img class="coconut" src="assets/img/coconut.png" alt="">
                </div>
                <div class="right">
                    <div class="logo"><a href="">취중진담</a></div>
                    <div class="login_box">
                        <input type="text" name="youID" placeholder="아이디를 입력하세요." class="login_ID" id="youID">
                        <input type="text" name="youPass" placeholder="비밀번호를 입력하세요." class="login_Pass" id="youPass">
                        <div class="check">
                            <label for="agreeCheck1">
                                아이디 저장
                                <input type="checkbox" name="agreeCheck1" id="agreeCheck1">
                                <span class="indicator"></span>
                            </label>
                        </div>
                        <ul class="button__style">
                            <li><a href="login.html">로그인</a></li>
                        </ul>
                        <ul class="login_go">
                            <li><a href="findpass.html">비밀번호 찾기</a></li>
                            <li><a href="join.html">회원가입</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <footer id="footer">
            <p> 알코올은 발암물질로 지나친 음주는 간암, 위암 등을 일으킵니다.<br>
                임신 중 음주는 기형아 출생 위험을 높입니다.</p>
        </footer>
    </div>
</body>

</html>