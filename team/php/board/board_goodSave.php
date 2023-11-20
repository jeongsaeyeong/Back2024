<?php 
    include "../connect/connect.php";

    $boardId = $_POST['boardId'];
    $myMemberID = $_POST['myMemberID'];
    $regTime = time();
    
    // 중복 "좋아요" 확인
    $checklikeSql = "SELECT * FROM boardlikes WHERE myMemberID = '$myMemberID' AND boardId = '$boardId'";
    $result = $connect->query($checklikeSql);
    
    if ($result->num_rows == 0) {
        $updateboardlikesql = "UPDATE drinkboard SET boardLike = boardLike + 1 WHERE boardId = '$boardId'";
        $connect->query($updateboardlikesql);
    
        $insertlikesql = "INSERT INTO boardlikes (myMemberID, boardId, likeRegTime) VALUES ('$myMemberID', '$boardId', '$regTime')";
        $connect->query($insertlikesql);
    
        echo json_encode(array("info" => $boardId));
    } else {
        $row = $result->fetch_assoc();
        if($row['likeDelete'] == 1) {
            $updatelikesql = "UPDATE boardlikes SET likeDelete = 0 WHERE boardId = '$boardId' AND myMemberID = '$myMemberID'";
            $connect->query($updatelikesql);

            $updateboardlikesql = "UPDATE drinkboard SET boardLike = boardLike - 1 WHERE boardId = '$boardId'";
            $connect->query($updateboardlikesql);   

        } else {
            $updatelikesql = "UPDATE boardlikes SET likeDelete = 1 WHERE boardId = '$boardId' AND myMemberID = '$myMemberID'";
            $connect->query($updatelikesql);

            $updateboardlikesql = "UPDATE drinkboard SET boardLike = boardLike + 1 WHERE boardId = '$boardId'";
            $connect->query($updateboardlikesql);   
        }
    
        echo json_encode(array("info" => "already liked"));
    }
?>