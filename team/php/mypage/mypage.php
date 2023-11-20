<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_SESSION['myMemberID'])){
        $myMemberID = $_SESSION['myMemberID'];
    } else {
        Header("Location: ../main/main.php");
    }

    // 내 정보 가져오기
    $memberSql = "SELECT * FROM drinkMember WHERE myMemberID = '$myMemberID'";
    $memberResult = $connect -> query($memberSql);
    $memberInfo = $memberResult -> fetch_array(MYSQLI_ASSOC);

    // 내가 쓴 글 정보 가져오기
    $boardSql = "SELECT * FROM drinkboard WHERE boardId = '$boardId' ORDER BY boardRegTime DESC LIMIT 5";
    $boardResult = $connect -> query($boardSql);
    $boardInfo = $boardResult -> fetch_array(MYSQLI_ASSOC);
    
    // 일기장 정보 가져오기 

    $today = date("Y-m-d"); // 오늘 날짜 (날짜만 포함)

    // 오늘 날짜 가져오기

    $dateSql = "SELECT drinkboard.*, drinkMember.youName
                FROM drinkboard
                INNER JOIN drinkMember ON drinkboard.boardAuthor = drinkMember.youName
                WHERE drinkboard.boardCategory = '일기장'
                ORDER BY drinkboard.boardRegTime DESC LIMIT 1";

    $dateResult = $connect -> query($dateSql);
    $dateInfo = $dateResult -> fetch_array(MYSQLI_ASSOC);

    $dateboard =date('Y-m-d', $dateInfo['boardRegTime']);


    $diarySql = "SELECT drinkboard.*, drinkMember.youName
                FROM drinkboard
                INNER JOIN drinkMember ON drinkboard.boardAuthor = drinkMember.youName
                WHERE drinkboard.boardCategory = '일기장'
                AND '$dateboard'='$today'
                ORDER BY drinkboard.boardRegTime DESC LIMIT 1";

    $diaryResult = $connect -> query($diarySql);
    $diaryInfo = $diaryResult -> fetch_array(MYSQLI_ASSOC);
    
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
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">

    <!-- fontasome -->
    <script src="https://kit.fontawesome.com/2cf6c5f82a.js" crossorigin="anonymous"></script>

    <!-- css -->
    <link href="../assets/css/reset.css" rel="stylesheet" />
    <link href="../assets/css/fonts.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/mypage.css" rel="stylesheet" />
    <link href="../assets/css/common.css" rel="stylesheet" />
    <link href="../assets/css/popup.css" rel="stylesheet" />

    <!-- js -->
    <script src="assets/js/scrollEvent.js"></script>
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

                <div class="best_list boxStyle roundCorner shaDow">
                    <div class="tab-menu">
                        <button class="tab-button activity" onclick="openTab('mypage_main')">마이페이지</button>
                        <button class="tab-button" onclick="openTab('mypage_diary')">일기</button>
                        <button class="tab-button" onclick="openTab('mypage_activity')">내 활동</button>
                        <button class="tab-button right" onclick="openTab('mypage_review')">리뷰</button>
                    </div>

                    <div id="mypage_main" class="tab-content">
                        <div class="main_box">
                            <div class="header_img"><img src="../assets/img/mypage_header.jpg" alt=""></div>
                            <div class="profile_box">
                                <div class="profile_img"><img src="../assets/profile/<?=$memberInfo['youImgFile']?>" alt=""></div>
                                <div class="profile_text">
                                    <div class="youNick"><h2><?=$memberInfo['youNick']?></h2></div>
                                    <div class="youId"><span><?=$memberInfo['youId']?></span></div>
                                    <div class="youemail"><span><?=$memberInfo['youEmail']?></span></div>
                                </div>
                                <div class="profile_modify">
                                    <ul>
                                        <li><a href="profilemodify.php">프로필 수정하기</a></li>
                                    </ul>
                                    <ul>
                                        <li><button id="not_join">회원탈퇴</button></li>
                                    </ul>
                                    <ul>
                                        <li><a href="passmodify.php">비밀번호 수정</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="mypage_diary" class="tab-content">
                        <div class="today_diary">
                            <h2><?= $today ?></h2>
<?php if ($diaryResult->num_rows == 0) { ?>
    <div class="diary_text">
        <p>오늘 일기를 작성하지 않았습니다.</p>
    </div>
<?php } else if ($diaryInfo['boardImgFile']) { ?>   
    <div class="today_photo">
        <img src="../assets/board/<?=$diaryInfo['boardImgFile']?>" alt="">
    </div>
    <div class="today_write">
        <span>
            <?=$diaryInfo['boardContents']?>
        </span>
    </div>
<?php } else { ?>
    <div class="today_write center">
        <span>
            <?=$diaryInfo['boardContents']?>
        </span>
    </div>
<?php } ?>                         
                        </div>
                        <a href="../board/board_write.php" class="wirte_button"><span>글쓰기</span></a>
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

                    <div id="mypage_activity" class="tab-content mypage_activity">
                        <div>
                            <div class="my_board">
                                <h2>내 게시글</h2>
                                <div class="my_board_table">
                                    <table>
                                        <colgroup>
                                            <col style="width: 100%;">
                                        </colgroup>
<?php
    $boardId = $_GET['boardId'];
    echo $boardId;

    $sql = "SELECT drinkboard.*, drinkMember.youName
            FROM drinkboard
            INNER JOIN drinkMember ON drinkboard.boardAuthor = drinkMember.youName
            WHERE boardCategory='커뮤니티' AND boardDelete='1'AND myMemberID = '$myMemberID'
            ORDER BY drinkboard.boardRegTime
            LIMIT 7";
    $connect->query($sql);
    $result = $connect->query($sql);

    if ($result) {
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr><td><a href='../board/board_view.php?boardId=".$info['boardId']. "'>" . $info['boardTitle'] . "</a></td></tr>";
        }
    } else {
        echo "아무것도 없습니다";
    }
?>
                                    </table>
                                </div>
                                <div class="board_page_option">
                                    <div class="board_pages">
                                        <ul class="pages_list">
                                            <li class="first"><a href="#">&lt;&lt;</a></li>
                                            <li class="prev"><a href="#">&lt;</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li class="next"><a href="#">></a></li>
                                            <li class="last"><a href="#">>></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="my_board">
                                <h2>내 댓글</h2>
                                <div class="my_comment_table">
                                    <table>
                                        <colgroup>
                                            <col style="width: 100%;">
                                        </colgroup>
<?php
    $boardId = $_GET['boardId'];

    $sql = "SELECT drinkreview.*, drinkMember.youName
            FROM drinkreview
            INNER JOIN drinkMember ON drinkreview.reviewName = drinkMember.youNick
            WHERE reviewDelete='1'
            ORDER BY drinkreview.regTime";

    $connect->query($sql);
    $result = $connect->query($sql);

    if ($result) {
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr><td><a href='../board/board_view.php?boardId=".$info['boardId']. "'>" . $info['reviewMsg'] . "</a></td></tr>";
        }
    } else {
        echo "아무것도 없습니다";
    }
?>
                                    </table>
                                </div>
                                <div class="board_page_option">
                                    <div class="board_pages">
                                        <ul class="pages_list">
                                            <li class="first"><a href="#">&lt;&lt;</a></li>
                                            <li class="prev"><a href="#">&lt;</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li class="next"><a href="#">></a></li>
                                            <li class="last"><a href="#">>></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="mypage_review" class="tab-content">
                        <div class="my_review">
                            <div class="my_review_table">
                                <table>
                                    <colgroup>
                                        <col style="width: 20%;">
                                        <col style="width: 20%;">
                                        <col style="width: 50%;">
                                        <col style="width: 10%;">
                                    </colgroup>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>review</th>
                                        <th>Date</th>
                                    </tr>
<?php
    $youNick = $memberInfo['youNick'];

    $sql = "SELECT acListComment.*, drinkList.*
            FROM acListComment
            INNER JOIN drinkList ON acListComment.acId = drinkList.acId
            WHERE youNick = '$youNick'
            ORDER BY acListComment.regTime";
        
    $result = $connect->query($sql);

    if ($result) {
        while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr>
                    <td><img src='" . $info['acImgPath'] . "' alt=''></td>
                    <td><a href='../alcohol/alcohol_page.php?acId=" . $info['acId'] . "'>" . $info['acName'] . "</a></td>
                    <td class='text'>" . $info['commentMsg'] . "</td>
                    <td>" . date('m-d', $info['regTime']) . "</td>
                </tr>";
        }
    } else {
    }
?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- main_contents end -->

            <?php include "../include/sidewrap.php"; ?>
            <!-- side_box end -->

            <div id="popupDelete" class="none">
                <div class="comment__delete">
                    <h4>회원탈퇴</h4>
                    <label for="commentPass" class="blind">비밀번호</label>
                    <input type="password" id="DeletePass" name="DeletePass" placeholder="비밀번호">
                    <p>* 가입했던 비밀번호를 입력해주세요!</p>
                    <div class="btn">
                        <button id="commentDeleteCancel">취소</button>
                        <button id="commentDeleteButton">삭제</button>
                    </div>
                </div>
            </div>
            <!-- popUp-->

        </main>
        <!-- contents_area end -->
    </div>
    <!-- wrapper end -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script>
        function openTab(tabId) {
            var tabContents = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }

            document.getElementById(tabId).style.display = "block";
        }
        openTab('mypage_main');

        // 회원 탈퇴 버튼
        $("#not_join").click(function () {
            $("#popupDelete").removeClass("none");
        });

        // 회원탈퇴 취소 버튼
        $("#commentDeleteCancel").click(function () {
            $("#popupDelete").addClass("none");
        });

        // // 회원탈퇴 수락 버튼
        // $("#commentDeleteButton").click(function () {
        //     if ($("#DeletePass").val() == "") {
        //         alert("비밀 번호를 작성해주세요.");
        //         $("#DeletePass").focus();
        //     } else {
        //         $.ajax({
        //             url: "not_joinSave.php",
        //             method: "POST",
        //             dataType: "json",
        //             data: {
        //                 "DeletePass": $("#DeletePass").val(),
        //                 "myMemberID": <?=$myMemberID?>,
        //             },
        //             success: function (data) {
        //                 console.log(data);
        //                 if (data.result == "bad") {
        //                     alert("비밀번호가 일치하지 않습니다.");
        //                 } else {
        //                     alert("댓글이 수정되었습니다.")
        //                 }
        //                 window.location.href = '../main/main.php';
        //             },
        //             error: function (request, status, error) {
        //                 console.log("request" + request);
        //                 console.log("status" + status);
        //                 console.log("error" + error);
        //             }
        //         })
        //     }
        // });
    </script>
</body>

</html>