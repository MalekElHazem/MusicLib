<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "musiclib";

    // Create connection
    //$conn = new mysqli($servername, $username, $password, $dbname);
    $conn = new mysqli("localhost","root","","musiclib");


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
