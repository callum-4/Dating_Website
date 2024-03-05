<html>
    <div class="generalText">
        <?php
        session_start();
        $email = $_SESSION['email'];
        $_SESSION['birthInfo'] = [//sample data TO BE REMOVED
            'year'  => 2000,
            'month' => 11,
            'day' => 22,
            'time' => '11:11',
            'longitude' => 151.2,
            'latitude' => -33.87
        ];
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