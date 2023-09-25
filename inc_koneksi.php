<?php
$host = "localhost";
$user = "root";
$pass = '';
$db = 'usermulti';


$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Your Connection is Not Active");
}


?>