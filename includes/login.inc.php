<?php

if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputLogin($username, $pwd) !==false ){
        header("location: ../login.php?error=emptyinput");
        exit();
    }


    loginUser($con, $username, $pwd);
}else{
    headear("location: ../home.php");
    exit();
}
