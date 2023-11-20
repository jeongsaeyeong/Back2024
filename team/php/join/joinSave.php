<?php
    include "../connect/connect.php";

    $youId = $_POST['youId'];
    $youPass = $_POST['youPass'];
    $youPassre = $_POST['youPassre'];
    $youName = $_POST['youName'];
    $youNick = $_POST['youNick'];
    $youEmail = $_POST['youEmail'];
    $youBirth = $_POST['youBirth'];
    $youAddress = mysqli_real_escape_string($connect, $_POST['youAddress1']."*".$_POST['youAddress2']."*".$_POST['youAddress3']);
    $regTime = time();

    $sql = "INSERT INTO drinkMember(youId, youPass, youName, youNick, youEmail, youBirth, youAddress, youImgFile, regTime) VALUES('$youId', '$youPass', '$youName', '$youNick', '$youEmail', '$youBirth', 'profile.png', '$regTime')";
    $result = $connect -> query($sql);

?>