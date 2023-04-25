<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>My CV</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="./CSS/cc1-CV style2.css">
	<link rel="shortcut icon" href="./IMG/LOGO03.ico" type="image/x-icon">

	<?php
	include_once "./COMPS/cc1-conn.php";
	session_start();

	if (isset($_SESSION['user_id'])) {
		include_once "./COMPS/cc1-header user.php";
	} else {
		header("location:cc1-login page.php?error=notamember");
		exit();
	}

	$user_id = $_SESSION['user_id'];
	//$user_id = "7";
	$query = "SELECT cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id FROM cv WHERE users_id = '$user_id' ORDER BY cv_id DESC LIMIT 1";
	$result = mysqli_query($connect, $query);

	$row = mysqli_fetch_assoc($result);

	$picture_id = $row['picture_id'];
	//$picture_id = "1";
	$query1 = "SELECT pic_name,pic_file,pic_type FROM Picture WHERE picture_id ='$picture_id'";
	$result1 = mysqli_query($connect, $query1);
	$row1 = mysqli_fetch_assoc($result1);

	$imageName = $row1['pic_name'];
	$imageType = $row1['pic_type'];
	$imageData = $row1['pic_file'];
	?>
	<div class="area2">
		<div class="container2">
			<h1>CV Form</h1>
			<h2>Personal Information</h2>
			<div class="fullPack">
				<div class="pack">
					<p class="userInfo">Name: <?php echo $row['cv_name'] ?></p>
					<p class="userInfo">Email: <?php echo $row['cv_email'] ?></p>
					<p class="userInfo">Phone: <?php echo $row['cv_phone'] ?></p>
					<p class="userInfo">Address: <?php echo $row['cv_adr'] ?></p>
				</div>
				<div class="image">
					<?php echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '">'; ?>
				</div>
			</div>
			<!-- add a string spliter -->
			<h2>Summary</h2>
			<div class="pack">
				<p><?php echo $row['summary'] ?></p>
			</div>

			<h2>Education</h2>
			<ul class="pack">
				<li><?php echo $row['education'] ?></li>
			</ul>

			<h2>Experience</h2>
			<div class="pack">
				<p><?php echo $row['experience'] ?></p>
			</div>

			<h2>Skills</h2>
			<div class="skills pack">
				<?php
				$skills = $row['skills'];
				$skill_array = explode(",", $skills);
				foreach ($skill_array as $skill) {
					echo "<span class=\"skill\">" . trim($skill) . "</span>";
				}
				?>
			</div>
		</div>
		<!-- add links -->
		<form action="#" method="post" id="operations">
			<input type="submit" value="Download PDF" name="download-pdf" id="download-pdf">
			<input type="submit" value="Save CV" name="save-cv" id="save-cv">
		</form>
	</div>
	<?php
	include_once "./COMPS/cc1-footerforall.php";
	mysqli_close($connect);
	?>
	</body>

</html>