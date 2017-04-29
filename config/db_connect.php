<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "foods";


$conn = new mysqli($servername, $username, $password, $dbname );
 mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
} 

