<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>Student Sign Up</title>
    <style>
        p{
            color:white;
            font-size: 20px;
            font-family: "Courier New", Courier, monospace;
            
        }
        </style>
</head>
<body>
    <div class="container glowing">
        <div class ="login-title">
           <h1> Register Here</h1><br>
        </div>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p> Fill in all fields! </p>";
            }
            else if($_GET["error"] == "invalid_username"){
                echo "<p> Choose a proper username!!</p>";
            }
            else if($_GET["error"] == "invalid_password"){
                echo "<p> Password doesn't match! </p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<p> Username already taken!</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<p> Something went wrong, try again!</p>";
            }
            else if($_GET["error"] == "none"){
                echo "<p> Congratulation you have already Sign Up!</p>"; 
            } 
        }
    ?>
        <div class="login">
           <form action= "includes/signup.inc.php" autocomplete="off" method="POST"><br>
           <label>Username </label> <br>  
           <input type="text" placeholder="Enter a Username" name="username" required auto> <br>
           <label>Password </label><br> 
           <input type="password" placeholder="Enter your password" name="password" required> <br>	
           <label>Confirm Password </label> <br> 
           <input type="password" placeholder="Enter your password" name="confirmpass" required> <br>
           <button type="submit" name="submitted">Sign Up</button><br> <br>
           <a href="login.php">Log in</a>
        </form>
        </div>
</div>
    
</body>
</html>
