<?php

@include 'config.php';
@include 'middleware.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $getUserByEmail = "SELECT 
    u.id as user_id, 
    u.name as user_name, 
    u.email as user_email, 
    u.password as user_password, 
    u.role_id as user_role_id, 
    r.id as role_id, 
    r.name as role_name
    FROM user as u JOIN role as r on r.id = u.role_id WHERE email = '$email'";
    $resGetUserByEmail = mysqli_query($conn, $getUserByEmail);
    if (mysqli_num_rows($resGetUserByEmail) == 0) {
        $error[] = 'Incorrect email or password!';
    }

    $user = mysqli_fetch_object($resGetUserByEmail);

    $userEmail = $user->user_email;
    if ($email !== $userEmail) {
        $error[] = 'Incorrect email or password!';
    }

    $userPassword = $user->user_password;
    if ($password !== $userPassword) {
        $error[] = 'Incorrect email or password!';
    }
    unset($user->user_password);

    if (empty($error)) {
        $userEncode = json_encode($user);
        $_SESSION['session'] = $userEncode;
        setcookie("session", $userEncode);

        $roleName = $user->role_name;
        if ($roleName == 'admin') {
            header('location:admin_page.php');
        } else if ($roleName == 'user') {
            header('location:user_page.php');
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="stylee.css">
</head>

<body>

    <div class="navbar">
        <a href="awal.php" onclick="goBack()">Kembali</a>
        <img src="css/PictRoomLogo.png" alt="logo">
    </div>

    <div class="form-container">
        <form action="" method="post">
            <h3>Login Now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>
            <input type="email" name="email" required placeholder="Enter your email" required>
            <input type="password" name="password" required placeholder="Enter your password" required>
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </div>

    <link rel="stylesheet" href="js/login.js">


</body>

</html>