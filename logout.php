<?php
    include_once("function/helper.php");

    session_start();

    unset($_SESSION['email']);
    unset($_SESSION['level']);

    header("location:".BASE_URL."login.php?notice=logout-sukses");
?>