
<?php
header('Content-Type: text/html; charset=utf-8');
// Deployment Connection
// $server = "localhost";
// $user = "root";
// $password = "";
// $database = "dbquran";

// Heroku Deployment
$server = "remotemysql.com";
$user = "NINsC6rhHd";
$password = "3OypXumtTR";
$database = "NINsC6rhHd";
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error(($koneksi)));
