

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



    if (
        empty($Name) || empty($Email) || empty($Phone) || empty($Address) || empty($Summary) || empty($Education) || empty($Experience) || empty($Skills)
    ) {
        // redirect to the form page
        header("Location:cc1-CV mycollection.php?form=empty");
        exit();
    } else {
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            // redirect to the form page
            header("Location:cc1-CV mycollection.php?form=emailError");
            exit();
        } else {

            $user_id = $_SESSION['user_id']; // user id
            $cv_id = $_SESSION['cv_id'];

            if (empty($_FILES["image"]["name"]) && isset($_SESSION['picture_id'])) {
                $PicId = $_SESSION['picture_id'];
            } else {
                $PicName = basename($_FILES['image']['name']);
                $PictureLoc = $_FILES['image']['tmp_name'];
                $PicExtension = pathinfo($PicName, PATHINFO_EXTENSION);
                $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array($PicExtension, $allowedExtensions)) {

                    $PicData = addslashes(file_get_contents($PictureLoc));
                    $PicType = $_FILES['image']['type'];


                    $query1 = "INSERT INTO Picture(pic_name,pic_file,pic_type) VALUES ('$PicName','$PicData','$PicType')";
                    $nrow1 = mysqli_query($connect, $query1);
                    // picture id
                    $PicId = mysqli_insert_id($connect);
                } else {
                    // redirect to the form page
                    header("Location:cc1-CV mycollection.php?form=picError");
                    exit();
                }
            }
            $_SESSION['pic_id'] = $PicId;
            //$PicId = 2;

            $query = "UPDATE cv SET cv_name='$Name', cv_email='$Email', cv_phone='$Phone', cv_adr='$Address', summary='$Summary', education='$Education', experience='$Experience', skills='$Skills', picture_id='$PicId' WHERE users_id='$user_id' AND cv_id='$cv_id'";

            $nrow = mysqli_query($connect, $query);


            if (($nrow && isset($_SESSION['picture_id'])) || ($nrow && $nrow1)) {
                // redirect to the presentation page
                header("Location:cc1-CV presentation page.php?form=success");
                exit();
            } else {
                // redirect to the form page
                header("Location:cc1-CV mycollection.php?form=DbError");
                exit();
            }
        }
        //}
    }
    mysqli_close($connect);
}
