<?php

    $serverName ="localhost";
    $dBusername ="root";
    $dBpwd ="";
    $dBName ="loginsystem1";

    $con = mysqli_connect($serverName, $dBusername, $dBpwd, $dBName);

    if(!$con){
        die("Connection Failed: " .mysqli_connect_error());
    }
