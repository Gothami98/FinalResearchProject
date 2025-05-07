<?php
$servername = "localhost";
$username = "root"; // Default username for MySQL
$password = "Root@1234"; // Default password for MySQL
$dbname = "path_bloomers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
