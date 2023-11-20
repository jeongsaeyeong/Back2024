<?php 
    if(isset($_SESSION['myMemberID'])){
        $myMemberID = $_SESSION['myMemberID'];
    } else {
        Header("Location: ../main/main.php");
    }

    // 내 정보 가져오기
    $memberSql = "SELECT * FROM drinkMember WHERE myMemberID = '$myMemberID'";
    $memberResult = $connect -> query($memberSql);
    $memberInfo = $memberResult -> fetch_array(MYSQLI_ASSOC);
?>

<aside id="side_wrap">
    <div class="search_box side_box roundCorner shaDow">
        <form action="../board/board_search.php" method="POST">
            <input type="text" name="side_search" placeholder="취중진담 통합 검색" id="side_search">
            <button type="submit" id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="right">
        <?php if(isset($_SESSION['myMemberID'])){ ?>
            <div class="info_box side_box roundCorner shaDow">
                <div class="login_info">
                    <a href="../mypage/mypage.php"><img src="../assets/profile/<?=$memberInfo['youImgFile']?>" alt="유저 이미지"></a>
                    <p><?=$_SESSION['youName']?>님 어서오세요.</p>
                    <ul>
                        <li><a href="../login/logout.php">로그아웃</a></li>
                        <li><a href="../mypage/mypage.php">마이페이지</a></li>
                    </ul>
                </div>
                <button class="sideBtn"><a href="../board/board_write.php">새 글쓰기</a></button>
            </div> 
        <?php } else { ?>
            <div class="info_box side_box roundCorner shaDow">
                <div class="login_info not_login">
                    <p><i class="fa-solid fa-icons"></i> <br> 회원가입하고 <br> 더 많은 기능을 누리세요</p>
                    <ul>
                        <li><a href="../join/join.php">회원가입</a></li>
                        <li><a href="#">회원정보 찾기</a></li>
                    </ul>
                </div>
                <button class="sideBtn" onclick="location.href='../login/login.php'">로그인</button>
            </div>
        <?php } ?>
    </div>
</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $("#searchBtn").click(function () {
        if ($("#side_search").val() == "") {
            alert("검색어를 입력해주세요!");
            $("#side_search").focus();
        }
    })
</script>