<?php
    $hostname = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $dbname = "stockmicro";

    $conn = new mysqli($hostname,$username,$password,$dbname);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>