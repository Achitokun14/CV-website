
<?php
$server = "localhost";
$user = "root";
$psw = "";
$database = "all_users";

// to prevent XSS bugs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = mysqli_connect($server, $user, $psw, $database);

    // to prevent SQL injections
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (empty($username) || empty($password)) {
        // redirect to the login page
        header("location:cc1-login page.php?login=empty");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $username) || !preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=\|?.,]*$/", $password)) {
            // redirect to the login page
            header("location:cc1-login page.php?login=charError");
            exit();
        } else {
            $query =  "select * FROM users WHERE username='$username' and passwords=MD5('$password')";
            $nrow = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($nrow);

            if ($row) {
                // TESTING USERS :
                if ($row['username'] == $username || $row['passwords'] == md5($password)) {
                    // redirect to the CV form 
                    session_start();
                    $_SESSION['user_id'] = $row['users_id'];
                    header("location:cc1-CV form page.php?login=success");
                }
                else {
                    // resirect to the login page
                    header("location:cc1-login page.php?login=Error");
                    //echo '<script> window.alert("wrong username or password ...please retry") </script>';
                }
            } else {
                // redirect to the login page
                header("location:cc1-login page.php?login=DbError");
            }
            exit();
        }
    }
    mysqli_close($connect);
}


/* ::::to add:

+++ check if username & emeil is compatible
+++ gard the usre's session

+++ use special statement for the db.reauest :


$query =  "select * FROM users WHERE username='$username' and passwords=MD5('$password')";
$preSTMT = mysqli_stmt_init($connect);
if (!mysqli_stmt_prepare($preSTMT, $query)) {
    header("location:cc1-login page.php?login==STMTError");
    exit();
}
$hash = password_hash($password, PASSWORD_DEFAULT);

$result = mysqli_stmt_bind_param($preSTMT, "ss" , $username, $hash);

if ($row = mysqli_fetch_assoc($result)) {
    echo $row;
    return $row;
}
else {
    $result = false;
    return $result;
}
mysqli_stmt_close($preSTMT);
*/

?>