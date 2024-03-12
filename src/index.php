<html>
<head>
    <title>Astrolove</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>
<div class="box-container">
        <div class="box">
            <h1>Astrology-Inspired Matchmaking for Everyone</h1>
        </div>
        
        <div class="box2">
            <p>Find Your Celestial Match Today.</p>
            <p>Connecting Star-Crossed Souls: Let Cosmic Compatibility Guide Your Love Journey</p>
        </div>
    </div>
 <?php
	try{
        $conn = mysqli_connect("localhost", "callum", "test123","dating website");
        $validation_error = "";
        $getAllQuery = "SELECT * FROM users";
        $result = mysqli_query($conn, $getAllQuery);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        mysqli_free_result($result);
    }catch(Exception $e){
        error_log("Error: ". $e->getMessage());
    } 
	?> 
<div class="formHolderSignUp" >
    <br>
    <form method="post" id="signUp" action="./Controller/formHandler.php">
    <div class="generalText">
    Sign up:
    </div>
    <input type="email" name="email" placeholder="Email">
    <br>
    <input type="password" name="password" placeholder="Password">
    <input type="hidden" name="action" value="signUp">
    <br>
    <input type="submit" value="Submit">
    </form>
</div>

    <div class="formHolderLogin" >

    <form method ="post" id="Login" action="./Controller/formHandler.php">
    <div class="generalText">
    Login:
    </div>
    <input type="email" name="email" placeholder="Email">
    <br>
    <input type="password" name="password" placeholder="Password">
    <input type="hidden" name="action" value="Login">
    <br>
    <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
