<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sekndes_db";

session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>