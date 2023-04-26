<?php

include_once("./COMPS/cc1-conn.php");
session_start();

$user_id = $_SESSION['user_id'];
$cv_id = $_GET['cv_id'];
$query = "DELETE FROM cv WHERE users_id = '$user_id' AND cv_id = '$cv_id'";

$del = mysqli_query($connect, $query);

if ($del) {
    header("Location:cc1-CV mycollection.php?form=deletSuccess");
    exit();
} else {
    header("Location:cc1-CV mycollection.php?form=deletError");
    exit();
}