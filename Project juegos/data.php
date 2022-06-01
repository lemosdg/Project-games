<?php
    $servername = "localhost";
    $database = "mygames";
    $username = "root";
    $password = "abc123.";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
?>