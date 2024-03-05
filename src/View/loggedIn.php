<html>
    <div class="generalText">
        <?php
        session_start();
        $email = $_SESSION['email'];
        ?>
        <head>
            <title>You've been logged in!</title> 
            <link href='../style.css' rel='stylesheet'> 
        </head>
        <body id="loggedBody">
            <div class="loggedPage">
                <h1>Welcome <?=$email;?></h1>
        </div>
        <?php include "birthChart.php"?>
        </body>
    </div>
</html>