<?php

if(isset($_POST["submitted"])){
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $confirmPwd = $_POST["confirmpass"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputSignup($username, $pwd, $confirmPwd) !==false ){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if(invalidUname($username) !== false ){
        header("location: ../signup.php?error=invalid_username");
        exit();
    }
    if(pwdMatch($pwd, $confirmPwd) !== false ){
        header("location: ../signup.php?error=invalid_password");
        exit();
    }
    if(usernameExists($con, $username) !== false ){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    
    createUser($con, $username, $pwd);
}
else{
    header("location: ../signup.php");
    exit();
        
}