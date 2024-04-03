<?php

@include 'config.php';
@include 'middleware.php';

if (isset($_COOKIE["session"])) {
    $session = $_COOKIE["session"];
    $sessionDecode = json_decode($session, true);

    $userId = $sessionDecode["user_id"];
    $imageId = $_POST["image_id"];


    if (isset($_POST['submit'])) {
        $insertLike = "INSERT INTO likes(image_id, user_id) VALUES('$imageId','$userId')";
        mysqli_query($conn, $insertLike);
    }
}
mysqli_close($conn);
?>