<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youId = mysqli_real_escape_string($connect, $_POST['youId']);
    $youName = mysqli_real_escape_string($connect, $_POST['youName']);
    $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);
    $youPass = mysqli_real_escape_string($connect, $_POST['youPass']);
    $youPhone = mysqli_real_escape_string($connect, $_POST['youPhone']);
    $youRegTime = time();

    $sql = "INSERT INTO myMembers(youId, youName, youEmail, youPass, youPhone, youRegTime) VALUES ('$youId', '$youName', '$youEmail', '$youPass', '$youPhone', $youRegTime)";
    $connect -> query($sql);

    // 데이터 베이스 연결 닫기
    mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
            <div class="intro__img">
                <img srcset="../assets/img/intro-2.jpg 1x,
                ../assets/img/intro-2@2.jpg 2x,
                ../assets/img/intro-2@3.jpg 3x" alt="">
            </div>
            <div class="intro__text">
                The Masterpiece<br>
                고전의 미학
            </div>
        </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
</body>
</html>