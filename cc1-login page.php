<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="./CSS/cc1-CV style.css">
	<link rel="shortcut icon" href="./IMG/LOGO03.ico" type="image/x-icon">

	<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		header("location:cc1-index.php");
		exit();
	} else {
		include_once "./COMPS/cc1-auth header.php" ;
	}
	?>
	<div class="area">
		<div class="container">
			<h2>Login</h2>
			<form action="./cc1-verify user.php" method="post">
				<div class="form-group">
					<input type="text" name="username" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<input type="submit" value="Login">
				</div>
				<p>Don't have an account? <a href="./cc1-sign-up page.php">Sign up</a></p>
			</form>
		</div>
	</div>
	<?php
    include_once "./COMPS/cc1-footerforall.php" ;
    ?>
</body>
</html>
