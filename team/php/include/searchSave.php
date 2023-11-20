<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 검색한 결과 불러오기

    $search = $_POST['search'];

    echo "<pre>";
    var_dump($search);
    echo "</pre>";

    $titleSql = "SELECT * FROM drinkboard WHERE boardTitle LIKE '%$search%' AND boardCategory='커뮤니티'";
    $titleInfo = $connect -> query($titleSql);
?>