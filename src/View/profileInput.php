<html>
<head>
    <title>Set up your profile!</title>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
    <div class="buttonHolder">  
    <div class="generalText">
    Time to set up your profile!
    
    <form method="post" id="profile" action="../Controller/formHandler.php">
        <input type="text" name="name" placeholder="Name">
        <br>
        <br>
        <div class="generalText">
            Please choose your gender:
            <br>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <br>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <br>
            <br>
            Please choose what type of profiles you would like to see:
            <br>
            <input type="radio" id="women" name="preferredSex" value="Women">
            <label for="women">Women</label>
            <br>
            <input type="radio" id="men" name="preferredSex" value="Men">
            <label for="men">Men</label>
            <br>
            <input type="radio" id="noPreference" name="preferredSex" value="No preference">
            <label for="noPreference">No preference</label>
            <br>
            <br>
        </div>    
        <label for="dateOfBirth">Date of birth:</label>
        <br>
        <input type="date" name="dateOfBirth" >
        <br>
        
        <textarea name="description" placeholder="Description"></textarea>
        <br>
        
        <textarea name="interests" placeholder="Interests"></textarea>
        <br>
        <input type="hidden" name="action" value="Profile">
        
        <input class="submitButton" type="submit" value="Submit">
</div>
        
        
    </form>
</body>
</html>