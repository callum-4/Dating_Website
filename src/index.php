<html>
<head>
    <title>Astrolove</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Welcome to Astrolove</h1>
                    <p class="card-text">Astrology-Inspired Matchmaking for Everyone</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <p class="card-text">Find Your Celestial Match Today.</p>
                    <p class="card-text">Connecting Star-Crossed Souls: Let Cosmic Compatibility Guide Your Love Journey</p>
                </div>
            </div>
        </div>
 <?php
      include "Controller/console.php";

	try{
        $conn = mysqli_connect("localhost", "callum", "test123","dating website");
        $validation_error = "";
        $getAllQuery = "SELECT * FROM user";
        $result = mysqli_query($conn, $getAllQuery);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        mysqli_free_result($result);
    }catch(Exception $e){
        error_log("Error: ". $e->getMessage());
    } 
	?> 
<div class="col-lg-6">
            <div class="formHolderSignup">
                <h2>Sign Up</h2>
                <form method="post" id="signUp" action="./Controller/formHandler.php">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <input type="hidden" name="action" value="signUp">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="formHolderLogin">
                <h2>Login</h2>
                <form method="post" id="Login" action="./Controller/formHandler.php">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <input type="hidden" name="action" value="Login">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

