<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goodbye</title>
</head>

<body>

    <?php

    session_start();
    if (!sleep(5)) {
    ?>
        <div id="goodby">
            <a href="./index.php"><img src="./IMG/870049.gif" alt="notworking"></a>
        </div>
        <style>
            body {
                background-color: teal;
            }

            #goodby {
                background-color: Transparent;
                height: 100%;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                background-image: url(../IMG/870049.gif);
                background-repeat: no-repeat;
                background-size: cover;
            }

            a {
                width: inherit;
                height: inherit;
            }

            img {
                width: inherit;
                height: inherit;
            }
        </style>



    <?php
    } else {
        session_destroy();
        header("location:index.php");
        //header("location:cc1-login page.php");
    }
    ?>
</body>

</html>