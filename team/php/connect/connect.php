<?php
    $host = "localhost";
    $user = "ooooo0516";
    $pw = "Kr6494613!";
    $db = "ooooo0516";
    
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");

    // if ($connect->connect_errno) {
    //     echo "DATABASE Connect False";
    // } else {
    //     echo "DATABASE Connect True";
    // }
?>