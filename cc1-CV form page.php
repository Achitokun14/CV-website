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
	?>
	<div class="area">
		<div class="container1">
			<h2>CV Form</h2>
			<form action="./cc1-CV data-hundler.php" method="post" enctype="multipart/form-data">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" placeholder="Enter your name" required>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" placeholder="Enter your email" required>

				<label for="phone">Phone:</label>
				<input type="tel" id="phone" name="phone" placeholder="Enter your phone number" pattern="[+]{1}+/d{2,4}+/d{9}" required>

				<label for="address">Address:</label>
				<input type="text" id="address" name="address" placeholder="Enter your address" required>

				<label for="summary">Summary:</label>
				<textarea id="summary" name="summary" placeholder="Enter your personal summary" required></textarea>

				<label for="education">Education: (Every line should end with comma ",")</label>
				<textarea id="education" name="education" placeholder="Enter your education details" required></textarea>

				<label for="experience">Experience: (Every line should end with comma ",")</label>
				<textarea id="experience" name="experience" placeholder="Enter your work experience" required></textarea>

				<label for="skills">Skills: (Please separate each skill by comma ",")</label>
				<textarea id="skills" name="skills" placeholder="Enter your skills" required></textarea>

				<label for="image">Uplaod your personal image</label>
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