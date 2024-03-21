<?php
require "../Model/Profile.php";

// Variable to determine if there is currently a user signed in (not currently in use)
$user_logged;

// Function to check if an email is unique when creating an account
function uniqueEmail($email, $mysqli)
{

    $stmt = $mysqli->prepare("SELECT email FROM user WHERE email = ?");

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
                $query = "INSERT INTO user (email, password) VALUES (?,?);";
                $statement = $conn->prepare($query);
                $statement->execute([$email, $password]);


                $IDpushquery = "INSERT INTO profile(id) SELECT id FROM user WHERE email ='$email';";
                $IDstatement = $conn->prepare($IDpushquery);
                $IDstatement->execute();
                session_start();
                $_SESSION['email'] = $email;

                $conn = null;
                $statement = null;
                $IDstatement = null;
                header("Location: ../View/profileInput.php");

            } else {
                echo "That email is already in use";
            }

        } else if ($action === "Login") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $query = "SELECT user.password, profile.banned_until
                FROM user
                LEFT JOIN profile
                ON user.id=profile.id
                WHERE user.email='$email'";
            $result = mysqli_query($conn, $query);
            $fetched_user = mysqli_fetch_assoc($result);

            if ($password == $fetched_user["password"]) {
                session_start();
                if (str_contains($email, "@astrolove.admin.com")) {
                    $user_logged = TRUE;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $fetched_user["id"];
                    header("Location: ../View/adminConsole.php");
                    exit();
                } else {
                    $now = new DateTime();
                    $bannedUntil = $fetched_user["banned_until"];
                    if ($now >= (new DateTime($bannedUntil)) || $bannedUntil == null) {
                        $user_logged = TRUE;
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $fetched_user["id"];
                        header("Location: ../View/loggedIn.php");
                        exit();
                    } else {
                        echo "This account has been banned until $bannedUntil";
                    }
                }
            } else {
                echo "Incorrect password";
            }
        } else if ($action === "Profile") {
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $preferredSex = $_POST["preferredSex"];
            $description = $_POST["description"];
            $dateOfBirth = $_POST["dateOfBirth"];
            $interests = $_POST["interests"];
            //break interests up into an array

            session_start();
            $email = $_SESSION['email'];
            $IDpullquery = "SELECT id FROM user WHERE email ='$email';";
            $IDpullstatement = $conn->prepare($IDpullquery);
            $IDpullstatement->execute();
            $result = $IDpullstatement->get_result()->fetch_assoc();
            $ID = $result["id"];

            //create the profile
            $profile = new Profile($ID, $email, $gender, $name, $dateOfBirth, $description, $interests, $dateOfBirth);

            $_SESSION['profile'] = $profile;
            echo $profile->getUpdateProfileInDBQuery();
            $statement = $conn->prepare($profile->getUpdateProfileInDBQuery());
            $statement->execute();

            //create the profiles intrests
            $interestsStatement = $conn->prepare($profile->getInsertIntrestsQuery());
            $interestsStatement->execute();

            //create seeking for profile
            $seeking_query = "INSERT INTO `seeking` (`id`, `gender`) VALUES ('$ID','$preferredSex')";
            echo $seeking_query;
            $seekingStatement = $conn->prepare($seeking_query);
            $seekingStatement->execute();

            $conn = null;
            $statement = null;
            $IDstatement = null;
            header("Location: ../View/loggedIn.php");
        } else {
            echo "Invalid action";
        }
    } catch (mysqli_sql_exception $e) {
        die ("Post failed." . $e->getMessage());
    }
}
?>
</div>