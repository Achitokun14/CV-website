
<?php
$server = "localhost";
$user = "root";
$psw = "";
$database = "all_users";
$connect = mysqli_connect($server, $user, $psw, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// to prevent XSS bugs
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // to prevent SQL injections
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);



    if (empty($username) || empty($email) || empty($password)) {
        // redirect to the sign-up page
        header("location:cc1-sign-up page.php?signup=empty");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $username) || !preg_match("/^[a-zA-Z0-9+-_@&.]*$/", $email) || !preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=\|?.,]*$/", $password)) {
            // redirect to the sign-up page
            header("location:cc1-sign-up page.php?signup=charError");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // redirect to the sign-up page
                header("location:cc1-sign-up page.php?signup=emailError");
                exit();
            } else {
                $query = "INSERT INTO users(username, email, passwords) VALUES ('$username', '$email', MD5('$password'))";
                $nrow = mysqli_query($connect, $query);

                if ($nrow) {
                    // redirect to the login page
                    header("location:cc1-login page.php?signup=success");
                } else {
                    // redirect to the sign-up page
                    header("location:cc1-sign-up page.php?signup=DbError");
                }
                exit();
            }
        }
    }
    mysqli_close($connect);
}

/* ::::to add:

+++ add password double check
+++ check if username & emeil is already used

+++ use special statement for the db.reauest :

$query = "INSERT INTO users(username, email, passwords) VALUES ('$username', '$email', MD5('$password'))";

$preSTMT = mysqli_stmt_init($connect);
if (!mysqli_stmt_prepare($preSTMT, $query)) {
    header("location:cc1-login page.php?login==STMTError");
    exit();
}
$hash = password_hash($password, PASSWORD_DEFAULT);

$result = mysqli_stmt_bind_param($preSTMT, "ss" , $username, $email, $hash);
mysqli_stmt_execute($preSTMT);
mysqli_close($preSTMT);
header("location:cc1-sign up page,php?signup=none");
exit();

*/
?>