<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>My CV prototype</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./CSS/cc1-CV style3.css">
    <link rel="shortcut icon" href="./IMG/LOGO03.ico" type="image/x-icon">


    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        include_once "./COMPS/cc1-header user.php";
    } else {
        include_once "./COMPS/cc1-header member.php";
    }
    //include_once "./HTML/bg-video.html";
    ?>
    <h1 class="master">CYBER CV</h1>
    <div class="parent">
        <div class="packed">
            <h1 class="titel-pack">if you're still trying to find a job... get a better CV first</h1>
            <p class="text-pack">Having a well-crafted CV is essential in today's highly competitive job market. Your CV is essentially your personal marketing tool, and it's the first thing a potential employer will see about you. A strong CV can make the difference between getting an interview and being passed over for another candidate. It's important to highlight your relevant skills, experience, and achievements in a clear and concise manner, so that potential employers can quickly assess your suitability for the job. Additionally, a well-organized and visually appealing CV can also make a good first impression and demonstrate your attention to detail and professionalism. Ultimately, taking the time to create a better CV can increase your chances of securing your desired job and help you stand out from the competition.</p>
            <a href="./cc1-CV form page.php" class="link-pack">Click Here After Login ...</a>
        </div>
        <img src="./IMG/papers.png" alt="not working" class="image-pack">
    </div>

    <?php
    include_once "./COMPS/cc1-footerforall.php";
    ?>
    </body>

</html>