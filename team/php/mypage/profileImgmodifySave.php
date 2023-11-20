<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $youNick = $_POST['modifyProfile'];
    $youPass = $_POST['modifyPass'];
    $myMemberID = $_SESSION['myMemberID'];

     echo "<pre>";
    var_dump($myMemberID);
    echo "</pre>";

    $sql = "SELECT youPass FROM drinkMember WHERE youPass = '$youPass' AND myMemberID = '$myMemberID'";
    $result = $connect->query($sql);

    if($result->num_rows == 0){
    } else {
        $updateSql = "UPDATE drinkMember SET youNick = '$youNick' WHERE myMemberID = '$myMemberID'";
        $connect->query($updateSql);
    }

    if($result) {
        echo "<script>alert('저장이 완료되었습니다.')</script>";
        echo "<script>window.location.href='mypage.php';</script>";
    }

?>