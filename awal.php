<?php
@include 'config.php';
@include 'middleware.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login/Register Page</title>
    <link rel="stylesheet" type="text/css" href="awa.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php" onclick="goBack()">Kembali</a>
        <img src="css/PictRoomLogo.png" alt="logo">
    </div>


    <div class="container">
        <img class="logo" src="css/PictRoomLogo.png" alt="Logo">
        <h1>Selamat datang di PictRoom</h1>

        <h2>Pilihan:</h2>
        <ul>
            <li><a href="login.php" class="btn">Login</a></li>
            <li><a href="register.php" class="btn">Register</a></li>
        </ul>
    </div>
    <script src="js/script.js"></script>
</body>

</html>