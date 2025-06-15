<?php
require_once 'db_connect.php';

// SQL to create table
$sql = "CREATE TABLE activity_marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    activity_number INT,
    marks INT,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table activity_marks created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
