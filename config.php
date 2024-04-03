<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "website_uas_db";

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
