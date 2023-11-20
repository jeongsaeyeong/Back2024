<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $youPass = $_POST['DeletePass'];
    $myMemberID = $_POST['myMemberID'];
    $youNick = $_SESSION['youNick'];

    $sql = "SELECT youPass FROM drinkMember WHERE youPass = '$youPass' AND myMemberID = '$myMemberID'";
    $result = $connect -> query($sql);

    if($result -> num_rows == 0){
        $jsonResult = "bad";
    } else {
        $updateSql = "DELETE FROM drinkMember WHERE myMemberID='$myMemberID'";
        $connect -> query($updateSql);
        $jsonResult = "good";

        $deleteSql = "UPDATE drinkList SET commentDelete = '0' WHERE youNick = '$youNick'";
        $connect -> query($deleteSql);
    }

    echo json_encode(array("result" => $jsonResult));
?>