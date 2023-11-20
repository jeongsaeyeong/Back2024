<?php
if (!isset($_SESSION['myMemberId'])) {
    echo "<script>alert('로그인 해주세요.');</script>";
    echo '<script>window.location.href = "../login/login.php";</script>';
}
;
?>