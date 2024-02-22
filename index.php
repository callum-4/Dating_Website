<html>
<head>
    <title>Dating or sumn idk</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>
<?php
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags)
        {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

	try{
        $conn = mysqli_connect("localhost", "callum", "test123", "dating website");
        $validation_error = "";
        $getAllQuery = "SELECT * FROM users";
        $result = mysqli_query($conn, $getAllQuery);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        mysqli_free_result($result);
    }catch(Exception $e){
        console_log("Error: ". $e->getMessage());
    }
	?>
<div class="home">
<div class="formHolder" >
    <br>
    <form method="post" id="signUp" action="formHandler.php">
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
    
    <br>

    <form method ="post" id="Login" action="formHandler.php">
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
</div>
</body>
</html>
