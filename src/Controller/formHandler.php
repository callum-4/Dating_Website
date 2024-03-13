<?php

// Variable to determine if there is currently a user signed in (not currently in use)
$user_logged;

// Function to check if an email is unique when creating an account
function uniqueEmail($email, $mysqli) {
<<<<<<< Updated upstream
    $stmt = $mysqli->prepare("SELECT Email FROM users WHERE email = ?");
=======

    $stmt = $mysqli->prepare("SELECT email FROM users WHERE email = ?");

>>>>>>> Stashed changes
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num_rows = $stmt->num_rows;
    $stmt->close();
    return $num_rows == 0;
}

// Code to handle form submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];
    try {
        require_once "../index.php";

        if ($action === "signUp") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (uniqueEmail($email, $conn)) {
<<<<<<< Updated upstream
                $query = "INSERT INTO users (Email, Password) VALUES (?,?);";
=======
                $query = "INSERT INTO users (email, password) VALUES (?,?);";
>>>>>>> Stashed changes
                $statement = $conn->prepare($query);
                $statement->execute([$email, $password]);
                /*
                I dont get what this is doing and it workes when commented out
                $IDpushquery = "INSERT INTO profile(Profile_ID) SELECT user_id FROM users WHERE Email ='$email';";
                $IDstatement = $conn->prepare($IDpushquery);
                $IDstatement->execute();
				session_start();
                $_SESSION['email'] = $email;

                $conn = null;
                $statement = null;
                $IDstatement = null;*/
                header("Location: ../View/profile.php");

            } else {
                echo "That email is already in use";
            }
        } else if ($action === "Login") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $query = "SELECT Password FROM users WHERE Email = '$email';";
            $result = mysqli_query($conn, $query);
            $fetched_user = mysqli_fetch_array($result);

            if ($password == $fetched_user["Password"]) {
                echo "Signed in";
                $user_logged = TRUE;
                session_start();
                $_SESSION['email'] = $email;

                header("Location: ../View/loggedIn.php");

                exit();
            } else {
                echo "Incorrect password";
            }
<<<<<<< Updated upstream
=======
            


                }else{
                    $query = "SELECT password FROM users WHERE email = '$email';";
                    $result = mysqli_query($conn, $query);
                    $fetched_user = mysqli_fetch_array($result);

                    if ($password == $fetched_user["password"]) {
                        echo "Signed in";
                        $user_logged = TRUE;
                        session_start();
                        $_SESSION['email'] = $email;

                        header("Location: ../View/loggedIn.php");

                        exit();
                    } else {
                        echo "Incorrect password";
                    }
                }
>>>>>>> Stashed changes
        } else if ($action === "Profile") {
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $preferredSex = $_POST["preferredSex"];
            $age = $_POST["age"];
            $description = $_POST["description"];
            $interests = $_POST["interests"];
			session_start();
            $email = $_SESSION['email'];
<<<<<<< Updated upstream
            $IDpullquery = "SELECT user_id FROM users WHERE Email ='$email';";
=======
            $IDpullquery = "SELECT id FROM users WHERE email ='$email';";
>>>>>>> Stashed changes
            $IDpullstatement = $conn->prepare($IDpullquery);
            $IDpullstatement->execute();
            $result = $IDpullstatement->get_result()->fetch_assoc();
            $ID = $result["user_id"];
			echo $ID;
            $query = "UPDATE profile SET Name=?, Gender=?, Preffered_Sex=?, Age=?, Description=?, Interests=? WHERE Profile_ID=?";
            $statement = $conn->prepare($query);
            $statement->execute([$name, $gender, $preferredSex, $age, $description, $interests, $ID]);

            $conn = null;
            $statement = null;
            $IDstatement = null;
          //  header("Location: ./loggedIn.php");
        } else {
            echo "Invalid action";
        }
    } catch (mysqli_sql_exception $e) {
        die("Post failed." . $e->getMessage());
    }



function getZodiacSign($birthdate) {
    // Convert birthdate to a DateTime object
    $dateTime = new DateTime($birthdate);
    // Extract month and day
    $month = $dateTime->format('n');
    $day = $dateTime->format('j');

    // Zodiac signs and their ranges
    $zodiacSigns = array(
        'Capricorn' => array('start' => '12-22', 'end' => '01-19'),
        'Aquarius' => array('start' => '01-20', 'end' => '02-18'),
        'Pisces' => array('start' => '02-19', 'end' => '03-20'),
        'Aries' => array('start' => '03-21', 'end' => '04-19'),
        'Taurus' => array('start' => '04-20', 'end' => '05-20'),
        'Gemini' => array('start' => '05-21', 'end' => '06-20'),
        'Cancer' => array('start' => '06-21', 'end' => '07-22'),
        'Leo' => array('start' => '07-23', 'end' => '08-22'),
        'Virgo' => array('start' => '08-23', 'end' => '09-22'),
        'Libra' => array('start' => '09-23', 'end' => '10-22'),
        'Scorpio' => array('start' => '10-23', 'end' => '11-21'),
        'Sagittarius' => array('start' => '11-22', 'end' => '12-21')
    );

    // Iterate through each sign and check if the birthday falls within its range
    foreach ($zodiacSigns as $sign => $range) {
        $start = DateTime::createFromFormat('m-d', $range['start']);
        $end = DateTime::createFromFormat('m-d', $range['end']);
        if (($month == $start->format('n') && $day >= $start->format('j')) ||
            ($month == $end->format('n') && $day <= $end->format('j'))) {
            return $sign;
        }
    }
    return null; // Return null if no sign matches
}

}
?>

