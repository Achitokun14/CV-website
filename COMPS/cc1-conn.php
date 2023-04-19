<?php
$server = "localhost";
$user = "root";
$psw = "";
$database = "all_users";
$connect = mysqli_connect($server, $user, $psw, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}