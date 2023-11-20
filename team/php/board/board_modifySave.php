<?php
include "../connect/connect.php";
include "../connect/session.php";

$boardsql = "SELECT * FROM drinkboard WHERE boardDelete = 1 AND boardCategory = '커뮤니티' ORDER BY boardId DESC";
$result = $connect->query($boardsql);

if ($result) {
    $boardInfo = $result->fetch_assoc();
    if ($boardInfo) {
        $boardId = $boardInfo['boardId'];
        // 원래 이미지
        $boardImg = $boardInfo['boardImgFile'];
    }
}

$memberId = $_SESSION['myMemberID'];
$boardAuthor = $_SESSION['youName'];
$boardCategory = $_POST['boardCategory'];
$boardTitle = $_POST['boardTitle'];
$boardContents = $_POST['boardContents'];

$boardFile = $_FILES['boardFile'];
$boardImgSize = $_FILES['boardFile']['size'];
$boardImgType = $_FILES['boardFile']['type'];
$boardImgName = $_FILES['boardFile']['name'];
$boardImgTmp = $_FILES['boardFile']['tmp_name'];

if ($memberId) {
    if ($boardCategory != "" || $boardTitle != "" || $boardContents != "" || $boardFile != 4) {

        $sql = "UPDATE drinkboard 
                SET boardCategory = '{$boardCategory}', 
                    boardTitle = '{$boardTitle}', 
                    boardContents = '{$boardContents}'  
                WHERE boardId = '{$boardId}'";

        $result = $connect->query($sql);

        if ($boardFile['error'] != 4) {

            // 파일이 업로드되었을 때만 실행
            $fileTypeExtension = explode("/", $boardImgType);
            $fileType = $fileTypeExtension[0];
            $fileExtension = $fileTypeExtension[1];

            if ($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp") {
                $boardImgDir = "../assets/board/";
                $boardImgName = "Img_" . time() . rand(1, 99999) . "." . $fileExtension;

                if (!file_exists($boardImgDir)) {
                    mkdir($boardImgDir, 0755, true);
                }

                if (move_uploaded_file($boardImgTmp, $boardImgDir . $boardImgName)) {
                    $updateSql = "UPDATE drinkboard 
                                SET boardImgFile = '$boardImgName' 
                                WHERE boardId = '{$boardId}'";
                    $connect->query($updateSql);
                } else {
                    echo "<script>alert('이미지 업로드 중 오류가 발생했습니다.')</script>";
                }
            } else {
                echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
            }
        }
        echo "<script>window.location.href='board.php';</script>";
    } else {
        echo "변경사항이 없습니다.";
    }
}
?>