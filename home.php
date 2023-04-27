<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css"> 
    <title>Home page</title>
</head>
<body>
    <?php
    if(isset($_SESSION["useruid"])){
        echo" <p> Hello ". $_SESSION["username"].", Welcome to my WEBSITE! </p><br>";
        echo "<div class = 'logout'><a href='includes/logout.inc.php'>Log Out</a></div>";
    }

    ?>
</body>
</html>