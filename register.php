<?php

@include 'config.php';
@include 'middleware.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];
   $confirmPassword = $_POST['cofirm_password'];
   $role = $_POST['role'];
   $passwordEncrypted = md5($confirmPassword);

   if ($password !== $confirmPassword) {
      $error[] = 'Password and confirm password is not match!';
   }

   $getRoleByID = "SELECT * FROM role WHERE id = '$role'";
   $resGetRoleByID = mysqli_query($conn, $getRoleByID);
   if (mysqli_num_rows($resGetRoleByID) == 0) {
      $error[] = 'Role not found!';
   }


   $getUserByEmail = "SELECT * FROM user WHERE email = '$email'";
   $resGetUserByEmail = mysqli_query($conn, $getUserByEmail);
   if (mysqli_num_rows($resGetUserByEmail) > 0) {
      $error[] = 'User already exist!';
   }


   $insertUser = "INSERT INTO user(name, email, password, role_id) VALUES('$name','$email','$passwordEncrypted','$role')";
   mysqli_query($conn, $insertUser);
   header('location:login.php');
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="stylee.css">

</head>

<body>


    <div class="navbar">
        <a href="awal.php" onclick="goBack()">Kembali</a>
        <img src="css/PictRoomLogo.png" alt="logo">
    </div>


    <div class="form-container">

        <form action="" method="post">
            <h3>register now</h3>
            <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         }
         ?>
            <input type="text" name="name" required placeholder="Enter your name">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cofirm_password" required placeholder="Confirm your password">
            <select name="role" required placeholder="Select your role">
                <option value="2">User</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>

    </div>
    <link rel="stylesheet" href="js/register.js">
</body>

</html>