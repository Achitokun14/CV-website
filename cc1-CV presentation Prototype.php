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
		include_once "./COMPS/cc1-header user.php" ;
	} else {
		include_once "./COMPS/cc1-header member.php" ;
	}
    ?>
	<div class="container2">
		<h1>CV Form</h1>
		<h2>Personal Information</h2>
		<div class="fullPack">
			<div class="pack">
				<p class="userInfo">Name: John Doe</p>
				<p class="userInfo">Email: john.doe@gmail.com</p>
				<p class="userInfo">Phone: 555-1234</p>
			</div>
			<div class="image">
				<img src="./IMG/602233.jpg" alt="NotWorking">
			</div>
		</div>

		<h2>Summary</h2>
		<div class="pack">
			<p>A highly motivated and skilled software developer with over 5 years of experience in the industry. Strong expertise in Java, Python, and C++, as well as experience with web development using HTML, CSS, and JavaScript. Excellent problem-solving and communication skills, with a proven track record of delivering high-quality software products on time and within budget.</p>
		</div>

		<h2>Education</h2>
		<ul class="pack">
			<li>Bachelor of Science in Computer Science, XYZ University, 2012-2016</li>
			<li>Master of Science in Software Engineering, ABC University, 2016-2018</li>
		</ul>

		<h2>Experience</h2>
		<div class="pack">
			<h3>Software Developer, ACME Inc., 2018-present</h3>
			<p>Responsibilities:</p>
			<ul>
				<li>Designing, developing, and maintaining software applications using Java, Python, and C++</li>
				<li>Collaborating with cross-functional teams to gather requirements and implement solutions</li>
				<li>Performing code reviews and testing to ensure high-quality software products</li>
				<li>Participating in agile development methodologies such as Scrum and Kanban</li>
			</ul>
			<h3>Web Developer, XYZ Corp., 2016-2018</h3>
			<p>Responsibilities:</p>
			<ul>
				<li>Developing and maintaining web applications using HTML, CSS, and JavaScript</li>
				<li>Designing and implementing responsive layouts and user interfaces</li>
				<li>Optimizing website performance and user experience</li>
				<li>Collaborating with designers and content creators to develop website content</li>
			</ul>
		</div>

		<h2>Skills</h2>
		<div class="skills pack">
			<span class="skill">Java</span>
			<span class="skill">Python</span>
			<span class="skill">C++</span>
			<span class="skill">HTML</span>
			<span class="skill">CSS</span>
			<span class="skill">JavaScript</span>
			<span class="skill">Agile Development</span>
			<span class="skill">Problem Solving</span>
			<span class="skill">Communication</span>
		</div>
	</div>
    <?php
    include_once "./COMPS/cc1-footerforall.php" ;
    ?>
</body>

</html>