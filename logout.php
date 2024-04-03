<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();

if (isset($_COOKIE["session"])) {
    setcookie("session", "", time() - 3600);
}
header('location:login.php');
?>