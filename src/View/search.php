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
        <form method="post" action="">
            <div class="card">
                <div class="row no-gutters mt-2">
                    <div class="col-1"></div>
                    <div class="col-9">
                        <input type="text" class="form-control" name="searchText" placeholder="Search">
                    </div>
                    <!--<input type="hidden" name="action" value="search">-->
                    <button type="submit" name="action" class="col-1 btn btn-primary">Search</button>
                </div>
                <div class="row text-center m-2">
                    <div class="col">
                        <input type="radio" id="name" name="searchCatagory" value="name" checked>
                        <label for="name">Name</label>
                    </div>
                    <div class="col">
                        <input type="radio" id="sign" name="searchCatagory" value="sign">
                        <label for="sign">Astrological sign</label>
                    </div>
                    <div class="col">
                        <input type="radio" id="interest" name="searchCatagory" value="interest">
                        <label for="interest">Interest</label>
                    </div>
                </div>
            </div>
        </form>
        <?php
        require_once "../Controller/console.php";

        if (isset ($_POST)) {
            $searchBy = $_POST["searchCatagory"];
            $searchTerm = $_POST["searchText"];
            $searchQuery = "SELECT * FROM `profile` WHERE ";

            switch ($searchBy) {
                case "name":
                    $searchQuery .= "UPPER(`name`) LIKE UPPER('%$searchTerm%')";
                    //$whereStr = "UPPER(`name`) LIKE UPPER('%$searchTerm%')";
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

                //$searchQuery = "SELECT * FROM `profile` WHERE " . $whereStr;
                console_log($searchQuery);
                $result = mysqli_query($conn, $searchQuery);
                $fetched_profiles = mysqli_fetch_all($result);
                console_log($fetched_profiles);
                foreach ($fetched_profiles as $p) {
                    print_r($p);
                    print "<br>";
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

    </body>

</html>