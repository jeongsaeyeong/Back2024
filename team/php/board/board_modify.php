<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 보드 아이디 
    if(isset($_GET['boardId'])){
        $boardId = $_GET['boardId'];
    } else {
        Header("Location: board.php");
    }

    // View 증가 
    $visitedKey = 'board_visited_' . $boardId;
    if (!isset($_SESSION[$visitedKey])) {
        $updateViewSql = "UPDATE drinkboard SET boardView = boardView + 1 WHERE boardId = '$boardId'";
        $connect->query($updateViewSql);
        $_SESSION[$visitedKey] = true;
    }

    // 블로그 정보 가져오기
    $boardSql = "SELECT * FROM drinkboard WHERE boardId = '$boardId'";
    $boardResult = $connect -> query($boardSql);
    $boardInfo = $boardResult -> fetch_array(MYSQLI_ASSOC);
?>
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
                    <div class="board_form">
                        <form action="board_modifySave.php" name="board_modifySave" method="post" enctype="multipart/form-data">
                            <legend class="blind"></legend>
                            <div class="form_box">
                                <div class="board_title">
                                    <h2>신청하고 싶은 술을 작성해주세요.</h2>
                                </div>
                                <div class="board_text">
                                    <div class="board_cate">
                                        <select name="boardCategory" id="boardCategory">
                                            <option value="커뮤니티">커뮤니티</option>
                                            <option value="술신청">술 신청</option>
                                            <option value="일기장">일기장</option>
                                        </select>
                                    </div>
                                    <div class="board_post">
                                        <label for="boardFile" class="blind link inputStyle mb20"></label>
                                        <input type="file" id="boardFile" name="boardFile" class="fa-regular input_img">
                                        <p>jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.</p>
                                    </div>
                                    <div class="board_title">
                                        <label for="boardTitle"></label>
                                        <textarea type="text" id="boardTitle" name="boardTitle" cols="50" rows="1" class="board_input_title inputStyle placeholder" placeholder="변경할 제목을 작성해주세요"><?= $boardInfo['boardTitle'] ?></textarea>
                                    </div>
                                    <div class="board_item">
                                        <div class="board_contents">
                                            <label for="boardContents"></label>
                                            <textarea type="text" id="boardContents" name="boardContents" cols="50" rows="1" class="board_input_contents inputStyle placeholder" placeholder="내용을 작성해주세요."><?= $boardInfo['boardContents'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="create">
                                        <button type="submit" class="sideBtn mt50" id="ModifyButton">수정하기</button>
                                        <button type="submit" class="sideBtn mt50" id="ModifyCancle">취소하기</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>
        <!-- main_contents end -->

        <?php include "../include/sidewrap.php"; ?>
        <!-- side_box end -->

    </main>
    <!-- contents_area end -->
</div>
<!-- wrapper end -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/ko.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#boardContents'), {
            language: 'ko' 
        })
        .catch(error => {
            console.error(error);
        });

    // 수정 취소 버튼 --> 취소
    $("#ModifyCancle").click(function(e){
        if (confirm("정말 수정을 취소하시겠습니까?")) {
            e.preventDefault(); // 폼 제출을 중지합니다.
            window.location.href = "board.php";
        } else {

        }
    })

</script>
</body>

</html>
