<?php
include "../connect/connect.php";

$type = $_POST['type'];
$jsonReslut = "bad";

// 아이디
if ($type == "isIdCheck") {
    $youId = $connect->real_escape_string(trim($_POST['youId']));
    $sql = "SELECT youId FROM drinkMember WHERE youId ='{$youId}'";
}

// 이메일
if ($type == "isEmailCheck") {
    $youEmail = $connect->real_escape_string(trim($_POST['youEmail']));
    $sql = "SELECT youEmail FROM drinkMember WHERE youEmail ='{$youEmail}'";
}

// 닉네임
if ($type == "isNickCheck") {
    $youNick = $connect->real_escape_string(trim($_POST['youNick']));
    $sql = "SELECT youNick FROM drinkMember WHERE youNick ='{$youNick}'";
}

$result = $connect->query($sql);
if ($result->num_rows == 0) {
    $jsonResult = "good";
}

echo json_encode(array("result" => $jsonResult));
?>