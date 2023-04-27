
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>CV Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./CSS/cc1-CV style2.css">
	<link rel="shortcut icon" href="./IMG/LOGO03.ico" type="image/x-icon">


	<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		include_once "./COMPS/cc1-header user.php";
	} else {
		header("location:cc1-login page.php?error=notamember");
		exit();
	}

    include_once("./COMPS/cc1-conn.php");
    $user_id = $_SESSION['user_id'];
    $cv_id = $_GET['cv_id'];
    $query = "SELECT cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id FROM cv WHERE users_id = '$user_id' and cv_id = '$cv_id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    $picture_id = $row['picture_id'];
    $_SESSION['picture_id'] = $picture_id;
    $_SESSION['cv_id'] = $cv_id;

	?>
	<div class="area">
		<div class="container1">
			<h2>CV Form</h2>
			<form action="./cc1-CV mode-hundler.php" method="post" enctype="multipart/form-data">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $row['cv_name']; ?>" required>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $row['cv_email']; ?>" required>

				<label for="phone">Phone:</label>
				<input type="tel" id="phone" name="phone" placeholder="Enter your phone number" pattern="[+]{1}+/d{2,4}+/d{9}" value="<?php echo $row['cv_phone']; ?>" required>

				<label for="address">Address:</label>
				<input type="text" id="address" name="address" placeholder="Enter your address" value="<?php echo $row['cv_adr']; ?>" required>

				<label for="summary">Summary:</label>
				<textarea id="summary" name="summary" placeholder="Enter your personal summary" required><?php echo $row['summary']; ?></textarea>

				<label for="education">Education: (Every line should end with comma ",")</label>
				<textarea id="education" name="education" placeholder="Enter your education details" required><?php echo $row['education']; ?></textarea>

				<label for="experience">Experience: (Every line should end with comma ",")</label>
				<textarea id="experience" name="experience" placeholder="Enter your work experience" required><?php echo $row['experience']; ?></textarea>

				<label for="skills">Skills: (Please separate each skill by comma ",")</label>
				<textarea id="skills" name="skills" placeholder="Enter your skills" required><?php echo $row['skills']; ?></textarea>

				<label for="image">Uplaod your personal image (if not let it emplty)</label>
				<input type="file" name="image" id="image-file">

				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>
	<?php
	include_once "./COMPS/cc1-footerforall.php";
	?>
	</body>

</html>