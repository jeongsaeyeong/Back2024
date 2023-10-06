<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>

    <!-- CSS  -->
    <?php include "../include/head.php" ?>
    <!-- skip -->
</head>

<body  class="gray">
    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" role="main">
        <div class="intro__inner container">
            <div class="intro__img">
                <img srcset="../assets/img/intro-1-min.jpg 1x,
                ../assets/img/intro-1@2-min.jpg 2x,
                ../assets/img/intro-1@3-min.jpg 3x" alt="">
            </div>
            <div class="intro__text">
            <?php
                include "../connect/connect.php";

                $youEmail = $_POST['youEmail'];
                $youName = $_POST['youName'];
                $youPass = $_POST['youPass'];
                $youPassC = $_POST['youPassC'];
                $youPhone = $_POST['youPhone'];
                $regTime = time();

                // echo $youEmail, $youName, $youPass, $youPassC, $youPhone, $regTime;

                // 메시지 출력
                function msg($alert){
                    echo "<p>$alert</p>";
                }

                // 이메일 유효성 검사
                $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);

                if($check_mail == false){
                    msg("이메일 형식이 잘못되었습니다. 다시 시도해주세요.");
                    exit;
                }

                // 이름 유효성 검사
                $check_name = preg_match("/^[가-힣]{3,5}$/u", $youName);

                if($check_name == false){
                    msg("이름은 한글만 가능합니다. 또는 3~5글자만 가능합니다.");
                    exit;
                }

                //휴대폰 번호 유효성 검사
                $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

                if($check_number == false){
                    msg("번호가 정확하지 않습니다. 올바른 번호(000-0000-0000) 형식으로 작성해주세요.");
                    exit;
                }

                // 비밀번호 유효성 검사 
                if($youPass !== $youPassC){
                    msg("비밀번호가 일치하지 않습니다. 다시 시도해주세요.");
                    exit;
                }

                // 이메일 중복 검사 
                $isEmailCheck = false;

                $sql = "SELECT youEmail FROM members WHERE youEmail = '$youEmail'";
                $result = $connect -> query($sql); 

                if($result){
                    $count = $result -> num_rows;

                    if($count == 0){
                        $isEmailCheck = true;
                    } else {
                        msg("이미 회원가입 하셨습니다. 로그인을 해주세요.");
                        exit;
                    }
                } else {
                    mag("에러가 발생하였습니다1. 관리자에게 문의바랍니다.");
                    exit;
                }

                $isPhoneCheck = false;

                $sql = "SELECT youPhone FROM members WHERE youPhone = '$youPhone'";
                $result = $connect -> query($sql);

                if($result){
                    $count = $result -> num_rows;

                    if($count == 0){
                        $isPhoneCheck = true;
                    } else {
                        msg("이미 회원가입 하셨습니다. 로그인을 해주세요.");
                        exit;
                    }
                } else {
                    mag("에러가 발생하였습니다2. 관리자에게 문의바랍니다.");
                    exit;
                }

                // 회원가입 

                if( $isEmailCheck == true && $isPhoneCheck == true ){                   
                    $sql = "INSERT INTO members(youEmail, youName, youPass, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";
                    $result = $connect -> query($sql);

                    if($result){
                        msg("회원가입을 축하합니다. 로그인 해주세요.");
                    } else {
                        msg("에러가 발생하였습니다.3 관리자에게 문의바랍니다.");
                        exit;
                    }
                } else {
                    msg("이미 회원가입 하셨습니다. 다시 시도해주세요.");
                }
            ?>
            </div>
            <div class="intro__btn">
                <a href="../main/main.php">메인으로</a>
                <a href="../main/main.php">로그인</a>
            </div>
        </div>
    </main>

        <!-- footer -->
</body>
</html>