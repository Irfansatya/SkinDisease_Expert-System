<?php
$reqURI = $_SERVER['REQUEST_URI'];

if (isset($_COOKIE["session"])) {
    $session = $_COOKIE["session"];
    $sessionDecode = json_decode($session, true);
    $roleName = $sessionDecode["role_name"];
    if ($roleName == 'admin' && !str_contains($reqURI, "admin_page.php")) {
        header('location:admin_page.php');
    } else if ($roleName == 'user' && !str_contains($reqURI, "user_page.php")) {
        header('location:user_page.php');
    }
} else {
    if (!str_contains($reqURI, "awal.php") && !str_contains($reqURI, "login.php") && !str_contains($reqURI, "register.php")) {
        header('location:awal.php');
    }
}
?>