<?php

function emptyInputSignup($username, $pwd, $confirmPwd){
    $result;
if(empty($username) || empty($pwd) || empty($confirmPwd)){
    $result = true;
}else{
        $result = false;
    }
    return $result;
}


function invalidUname($username){
    $result;
    if(preg_match("/^_-*$/" ,$username)){
        $result = true;
    }else{
            $result = false;
        }
        return $result;
    
}
function pwdMatch($pwd, $confirmPwd){
    $result;
    if($pwd !== $confirmPwd){
        $result = true;
    }else{
            $result = false;
        }
        return $result;
    
}

function usernameExists($con, $username){
    $sql = "SELECT * FROM users WHERE userName = ?;";
    //prepaired statement to more secure the server
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($con, $username, $pwd){
    $sql = "INSERT INTO users (userName, userPwd) VALUES(?, ?);";
    //prepaired statement to more secure the server
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit(); 
}
// lOG IN FUNCTION

function emptyInputLogin($username, $pwd){
    $result;
if(empty($username) || empty($pwd)){
    $result = true;
}else{
        $result = false;
    }
    return $result;
}

function loginUser($con, $username, $pwd){
    $uidExists = usernameExists($con, $username);

        if($uidExists === true){
            header("location: ../home.php");
            exit();
        }
    
        $pwdHashed = $uidExists["userPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if($checkPwd === false ){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["useruid"] = $uidExists["usersId"];
            $_SESSION["username"] = $uidExists["userName"];
            $_SESSION["password"] = $uidExists["userPwd"];
            header("location: ../home.php");
            exit();
        }

}
