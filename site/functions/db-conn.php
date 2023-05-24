<?php
// conection file to connect web portal to database 

$servername = "localhost"; // your host
$username1 = "irokoinx_root";// database username
$password = "Irokolifestyle123$"; // database password
$database="irokoinx_db"; // database name

// Create connection
$conn = new mysqli($servername, $username1, $password, $database);

// Check connection or produce error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>