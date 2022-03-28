<?php
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "bohiba";

    if(!$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)){
        die("Failed to connect");
    }
?>