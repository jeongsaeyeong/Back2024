<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE boardlikes (";
    $sql .= "likeId int(10) unsigned auto_increment,";
    $sql .= "myMemberID int(100) unsigned NOT NULL,";
    $sql .= "boardId int(10) NOT NULL,";
    $sql .= "likeRegTime int(40) NOT NULL,";
    $sql .= "likeDelete int(10) DEFAULT 1,";
    $sql .= "PRIMARY KEY (likeId)";
    $sql .= ") charset=utf8";

    $connect -> query($sql);
?>