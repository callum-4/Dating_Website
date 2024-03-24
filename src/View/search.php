<!DOCTYPE html>
<html>
<div class="generalText">
    <!-- This page is a prototype so we have the functionality for the software test
        IDK how we will to get to it from the home page  -->

    <head>
        <title>Search</title>
        <link href='../style.css' rel='stylesheet'>
    </head>

    <body>

        <div class="card">
            <form method="post" action="">
                <div class="row m-0 mt-2">
                    <div class="col-1"></div>
                    <div class="col-9 cols-shrinkable">
                        <input type="text" class="form-control" name="searchText" placeholder="Search" value=<?php echo $_POST["searchText"]; ?>>
                    </div>
                    <button type="submit" name="action" class="col btn btn-primary"
                        style="max-width: 134px">Search</button>
                    <div class="col-1"></div>
                </div>
                <div class="row text-center m-2">
                    <div class="col">
                        <input type="radio" id="name" name="searchCatagory" value="name" <?php echo ($_POST["searchCatagory"] == 'name' || $_POST["searchCatagory"] == null) ? 'checked' : '' ?>>
                        <label for="name">Name</label>
                    </div>
                    <div class="col">
                        <input type="radio" id="sign" name="searchCatagory" value="sign" <?php echo ($_POST["searchCatagory"] == 'sign') ? 'checked' : '' ?>>
                        <label for="sign">Astrological sign</label>
                    </div>
                    <div class="col">
                        <input type="radio" id="interest" name="searchCatagory" value="interest" <?php echo ($_POST["searchCatagory"] == 'interest') ? 'checked' : '' ?>>
                        <label for="interest">Interest</label>
                    </div>
                </div>
            </form>
        </div>
        <div style="row">
            <?php
            require_once "../Controller/console.php";

            if (isset ($_POST)) {
                $searchBy = $_POST["searchCatagory"];
                $searchTerm = $_POST["searchText"];
                $searchQuery = "SELECT * FROM `profile` WHERE ";

                switch ($searchBy) {
                    case "name":
                        $searchQuery .= "UPPER(`name`) LIKE UPPER('%$searchTerm%')";
                        break;
                    case "sign":
                        $sign = signToDates(strtolower($searchTerm));
                        if (!isset ($sign)) {
                            echo "please enter one of the 12 major western zodiacs";
                            return;
                        }
                        $startDate = $sign['start'];
                        $endDate = $sign['end'];

                        $searchQuery .= "DATE_FORMAT(`datetime_of_birth`, '%m-%d') >= '$startDate' AND DATE_FORMAT(`datetime_of_birth`, '%m-%d') <= '$endDate'";
                        break;
                    case "interest":
                        $searchQuery = "SELECT profile.* FROM profile WHERE `id` IN(
                        SELECT profile_interest.profile_id FROM `profile_interest` WHERE `interest` = '$searchTerm')";
                }
                try {
                    $conn = mysqli_connect("localhost", "callum", "test123", "dating website");
                    console_log($searchQuery);
                    $result = mysqli_query($conn, $searchQuery);
                    $fetched_profiles = mysqli_fetch_all($result);
                    console_log($fetched_profiles);
                    foreach ($fetched_profiles as $p) {
                        $name = $p[1];
                        $gender = $p[2];
                        $description = $p[3];
                        echo "
                        <br>
                        <div class='row'>
                            <div class='col-1'></div>
                            <div class='card col-10'>
                                <h2>$name, </h2><h3>$gender</h3><br>
                                <p>$description</p>
                            </div>
                            <div class='col-1'></div>
                        </div>";
                    }
                } catch (Exception $e) {
                    console_log($e->getMessage());
                }
            }

            function signToDates(string $sign)
            {
                $zodiacs = array(
                    'aries' => array('start' => '03-21', 'end' => '04-19'),
                    'taurus' => array('start' => '04-20', 'end' => '05-20'),
                    'gemini' => array('start' => '05-21', 'end' => '06-20'),
                    'cancer' => array('start' => '06-21', 'end' => '07-22'),
                    'leo' => array('start' => '07-23', 'end' => '08-22'),
                    'virgo' => array('start' => '08-23', 'end' => '09-22'),
                    'libra' => array('start' => '09-23', 'end' => '10-22'),
                    'scorpio' => array('start' => '10-23', 'end' => '11-21'),
                    'sagittarius' => array('start' => '11-22', 'end' => '12-21'),
                    'capricorn' => array('start' => '12-22', 'end' => '01-19'),
                    'aquarius' => array('start' => '01-20', 'end' => '02-18'),
                    'pisces' => array('start' => '02-19', 'end' => '03-20')
                );
                return $zodiacs[$sign];
            }
            ?>
        </div>
    </body>

</html>