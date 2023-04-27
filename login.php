<?php
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" type="text/css" href="css/login.css">
<title> Student Login Page </title>  
<style>
        p{
            color:white;
            font-size: 20px;
        }
</style>
</head>   
<body>
   <div class="container glowing">
         <div class ="login-title">
            <h1> Student Login<br>Form </h1>
         </div>
         <div class="login">
            <form action="includes/login.inc.php" autocomplete="off" method="POST"><br><br>
            <label>Username </label><br> 
            <input type="text" placeholder="Enter a Username" name="username" required auto> <br>
            <label>Password </label> <br>
            <input type="password" placeholder="Enter a password" name="password" required auto> <br>	
            <button type="submit" name=" submit">Log in</button> <br><br>
				<a href="signup.php">Sign Up</a>
            </form>
         </div>
         <?php
         if(isset($_GET["error"])){
             if($_GET["error"] == "emptyinput"){
                 echo "<p> Fill in all fields! </p>";
             }
             else if($_GET["error"] == "wronglogin"){
                 echo "<p> Incorrect login information!!</p>";
             }
         }
         ?>
   </div>
</body>     
</html>
