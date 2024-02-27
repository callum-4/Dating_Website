<?php

// Variable to determine if there is currently a user signed in (not currently in use)
$user_logged;

// Function to check if an email is unique when creating an account
function uniqueEmail($email, $mysqli) {
    $stmt = $mysqli->prepare("SELECT Email FROM users WHERE email = ?");
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
                $query = "INSERT INTO users (Email, Password) VALUES (?,?);";
                $statement = $conn->prepare($query);
                $statement->execute([$email, $password]);
                
                
                $IDpushquery = "INSERT INTO profile(Profile_ID) SELECT user_id FROM users WHERE Email ='$email';";
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
                if(str_contains($email, "@admin.com")){
                $query = "SELECT Password FROM admin WHERE Email = '$email';";
                $result = mysqli_query($conn, $query);
                $fetched_user = mysqli_fetch_array($result);

                if ($password == $fetched_user["Password"]) {
                    echo "Signed in";
                    $user_logged = TRUE;
                    session_start();
                    $_SESSION['email'] = $email;

                    header("Location: ../View/adminConsole.php");

                    exit();
                }else {
                   echo "Incorrect password";
            }
            


                }else{
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
                }
        } else if ($action === "Profile") {
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $preferredSex = $_POST["preferredSex"];
            $description = $_POST["description"];
            $dateOfBirth = $_POST["dateOfBirth"];
            $interests = $_POST["interests"];
            //break interests up into an array
            $interestUntrimmed =  preg_split("/\,/", $interests);
            $interestsTrimmed;
            for($i=0; $i < count($interestUntrimmed); $i++){
                $interestsTrimmed[$i] = trim($interestUntrimmed[$i], " \n\r\t\v\x00,");
            }

			session_start();
            $email = $_SESSION['email'];
            $IDpullquery = "SELECT user_id FROM users WHERE Email ='$email';";
            $IDpullstatement = $conn->prepare($IDpullquery);
            $IDpullstatement->execute();
            $result = $IDpullstatement->get_result()->fetch_assoc();
            $ID = $result["user_id"];
            //create the profile
            $query = "UPDATE profile SET Name=?, Gender=?, Description=?,  Date_of_Birth=? WHERE Profile_ID=?";
            $statement = $conn->prepare($query);
            $statement->execute([$name, $gender, $description, $dateOfBirth, $ID]);

            //create the profiles intrests
            $interestsQuery = 'INSERT INTO `profile_interests` (`Profile_ID`, `interest`) VALUES ';
            $query_parts;
            for($x=0; $x<count($interestsTrimmed); $x++){
                $query_parts[] = "('" . $ID . "', '" . $interestsTrimmed[$x] . "')";
            }
            $interestsQuery .= implode(',', $query_parts);
            $interestsStatement = $conn->prepare($interestsQuery);
            $interestsStatement->execute();
            
            //create seeking for profile
            $seeking_query = "INSERT INTO `seeking` (`Profile_ID`, `Gender`) VALUES ('$ID','$preferredSex')";
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
        die("Post failed." . $e->getMessage());
    }
}
?>
</div>

