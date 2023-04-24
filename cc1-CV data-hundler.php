
<?php
include_once "./COMPS/cc1-conn.php";
session_start();

// to prevent XSS bugs
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // to prevent SQL injections
    $Name = mysqli_real_escape_string($connect, $_POST['name']);
    $Email = mysqli_real_escape_string($connect, $_POST['email']);
    $Phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $Address = mysqli_real_escape_string($connect, $_POST['address']);
    $Summary = mysqli_real_escape_string($connect, $_POST['summary']);
    $Education = mysqli_real_escape_string($connect, $_POST['education']);
    $Experience = mysqli_real_escape_string($connect, $_POST['experience']);
    $Skills = mysqli_real_escape_string($connect, $_POST['skills']);

    $PicName = basename($_FILES['image']['name']);
    $PictureLoc = $_FILES['image']['tmp_name'];
    $PicExtension = pathinfo($PicName, PATHINFO_EXTENSION);
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');



    if (
        empty($Name) || empty($Email) || empty($Phone) || empty($Address) || empty($Summary) || empty($Education) || empty($Experience) || empty($Skills) || empty($_FILES["image"]["name"])
    ) {
        // redirect to the form page
        header("Location:cc1-CV form page.php?form=empty");
        exit();
    } else {/*
        if (!preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Name) ||
        !preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Phone) ||
        !preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Address) ||
        !preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Summary) ||
        !preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Education) ||
        !preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Experience) ||
        !preg_match("/^[a-zA-Z0-9_.,;:!?@#$%&*()\-+={}[\]\/\|<>\s]*$/", $Skills)) {
            // redirect to the form page
            header("Location:cc1-CV form page.php?form=charError");
            exit();
        } else {*/
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            // redirect to the form page
            header("Location:cc1-CV form page.php?form=emailError");
            exit();
        } else {
            if (in_array($PicExtension, $allowedExtensions)) {

                //$PicLocation = 'Users_Picture/' . $PicName;
                //move_uploaded_file($PictureLoc, $PicLocation);
                $user_id = $_SESSION['user_id']; // user id
                $PicData = addslashes(file_get_contents($PictureLoc));
                $PicType = $_FILES['image']['type'];


                $query1 = "INSERT INTO Picture(pic_name,pic_file,pic_type) VALUES ('$PicName','$PicData','$PicType')";
                $nrow1 = mysqli_query($connect, $query1);
                // picture id
                $PicId = mysqli_insert_id($connect);
                $_SESSION['pic_id'] = $PicId;
                //$PicId = 2;

                $query = "INSERT INTO cv(cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id,users_id) VALUES ('$Name','$Email','$Phone','$Address','$Summary','$Education','$Experience','$Skills','$PicId','$user_id')";

                $nrow = mysqli_query($connect, $query);
                $CV_id = mysqli_insert_id($connect);
                $_SESSION['cv_id'] = $CV_id;


                if ($nrow && $nrow1) {
                    // redirect to the presentation page
                    header("Location:cc1-CV presentation page.php?form=success");
                    exit();
                } else {
                    // redirect to the form page
                    header("Location:cc1-CV form page.php?form=DbError");
                    exit();
                    /*echo $PicId;
                    echo "<br>";
                    echo var_dump($nrow1);
                    echo "<br>";
                    echo $user_id;
                    echo "<br>";
                    echo var_dump($nrow);
                    echo "<br>";
                    echo $PicType;
                    echo "<br>";
                    echo $PicLocation;
                    echo "<br>";
                    echo $PicExtension;
                    echo "<br>";
                    echo $Name;
                    echo "<br>";
                    echo $Email;
                    echo "<br>";
                    echo $Phone;
                    echo "<br>";
                    echo $Address;
                    echo "<br>";
                    echo $Summary;
                    echo "<br>";
                    echo $Education;
                    echo "<br>";
                    echo $Skills;
                    echo "<br>";*/
                }
            } else {
                // redirect to the form page
                header("Location:cc1-CV form page.php?form=picError");
                exit();
            }
        }
        //}
    }
    mysqli_close($connect);
}


/* ::::to add:
HTML,CSS,JS,PHP,SQL
+++ using session_regenerate_id() to prevent session fixation attacks
+++ gard the user's session
+++ add error hundler file :
    // Validate the input data
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $name)) {
        $errors[] = "Name contains invalid characters";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9+#]*$/", $phone)) {
        $errors[] = "Phone number contains invalid characters";
    }

    if (empty($address)) {
        $errors[] = "Address is required";
    } elseif (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $address)) {
        $errors[] = "Address contains invalid characters";
    }

    if (empty($summary)) {
        $errors[] = "Summary is required";
    } elseif (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $summary)) {
        $errors[] = "Summary contains invalid characters";
    }

    if (empty($education)) {
        $errors[] = "Education is required";
    } elseif (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $education)) {
        $errors[] = "Education contains invalid characters";
    }

    if (empty($experience)) {
        $errors[] = "Experience is required";
    } elseif (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $experience)) {
        $errors[] = "Experience contains invalid characters";
    }

    if (empty($skills)) {
        $errors[] = "Skills are required";
    } elseif (!preg_match("/^[a-zA-Z0-9+-_$#@!%^&*=|?.]*$/", $skills)) {
        $errors
+++ use special statement for the db.reauest :
*/