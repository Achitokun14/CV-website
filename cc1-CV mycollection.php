<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>My CV prototype</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="./CSS/cc1-CV style2.css">
	<link rel="shortcut icon" href="./IMG/LOGO03.ico" type="image/x-icon">

	>
	<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		include_once "./COMPS/cc1-header user.php";
	} else {
		include_once "./COMPS/cc1-header member.php";
	}
	?>
	<div class="container3">
		<div class="container">
			<table class="table" role="table">
				<caption>Your personal CVs :</caption>
				<thead>
					<tr class="head-row">
						<th class="head-cell">Name</th>
						<th class="head-cell">Email</th>
						<th class="head-cell">Summary</th>
						<th class="head-cell">Creation Time</th>
						<th class="head-cell">PDF</th>
						<th class="head-cell">Modify</th>
						<th class="head-cell">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include_once "./COMPS/cc1-conn.php";
					$user_id = $_SESSION['user_id'];
					$query = "SELECT cv_id,cv_name,cv_email,summary,fill_stamp FROM cv WHERE users_id = '$user_id' ORDER BY fill_stamp DESC";
					$result = mysqli_query($connect, $query);


					
					if ($nrow = mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
						//print_r($row);
					?>
							<tr class="data-row">
								<td class="data-cell"><?php echo $row['cv_name']; ?></td>
								<td class="data-cell"><?php echo $row['cv_email']; ?></td>
								<td class="data-cell"><?php echo $row['summary']; ?></td>
								<td class="data-cell"><?php echo $row['fill_stamp']; ?></td>
								<td class="data-cell"><a href="<?php echo "./cc1-Download form.php?cv_id=" . $row['cv_id']; ?>">Download <?php echo $row['cv_id']; ?></a></td>
								<td class="data-cell"><a href="<?php echo "./cc1-Modify form.php?cv_id=" . $row['cv_id']; ?>">Edit</a></td>
								<td class="data-cell"><a href="<?php echo "./cc1-Delete form.php?cv_id=" . $row['cv_id']; ?>">Delete</a></td>
							</tr>
					<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
	include_once "./COMPS/cc1-footerforall.php";
	mysqli_close($connect);
	?>
	</body>

</html>