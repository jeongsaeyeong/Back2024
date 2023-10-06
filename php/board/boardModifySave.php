<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardID = $_POST['boardID']; // 게시글 번호 
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $memberID = $_SESSION['memberID'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    
    if($_POST['boardID']){
        $boardID02 = "SELECT boardID FROM board WHERE memberID = {$memberID}";
        echo $boardID02;
    }
    $sql = "UPDATE board SET boardTitle='{$boardTitle}' WHERE boardID = '{$_POST['boardID']}'";
    $connect -> query($sql);
?>