<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $youNick = $_POST['modifyProfile'];
    $youPass = $_POST['modifyPass'];
    $myMemberID = $_SESSION['myMemberID'];

    $youImgFile = $_FILES['youImgFile'];
    $youImgSize = $_FILES['youImgFile']['size'];
    $youImgType = $_FILES['youImgFile']['type'];
    $youImgName = $_FILES['youImgFile']['name'];
    $youImgTmp = $_FILES['youImgFile']['tmp_name'];

    $sql = "SELECT youPass FROM drinkMember WHERE youPass = '$youPass' AND myMemberID = '$myMemberID'";
    $result = $connect->query($sql);

    if ($result->num_rows == 0) {
        // 오류 처리
    } else {
    
        if($youNick != "" || $youImgFile != ""){
    
            if ($youNick != "") {
                $updateSql = "UPDATE drinkMember SET youNick = '$youNick' WHERE myMemberID = '$myMemberID'";
                $connect->query($updateSql);
            }
    
            if ($youImgFile != "") {
                $fileTypeExtension = explode("/", $youImgType);
                $fileType = $fileTypeExtension[0]; // image
                $fileExtension = $fileTypeExtension[1];  // jpeg
    
                if ($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp") {
                    $youImgDir = "../assets/profile/";
                    $youImgName = "Img_" . time() . rand(1, 99999) . "." . $fileExtension;
    
                    if (!file_exists($youImgDir)) {
                        mkdir($youImgDir, 0755, true);
                    }
    
                    if (move_uploaded_file($youImgTmp, $youImgDir . $youImgName)) {
                        $updateSql = "UPDATE drinkMember SET youImgFile = '$youImgName' WHERE myMemberID = '$myMemberID'";
                        $connect->query($updateSql);
                        echo "<script>alert('저장이 완료되었습니다.')</script>";
                    } else {
                        echo "<script>alert('이미지 업로드 중 오류가 발생했습니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                }
            }
        } else {
            echo "변경사항이 없습니다.";
           
        }
        
    }  echo "<script>window.location.href='mypage.php';</script>";
?>