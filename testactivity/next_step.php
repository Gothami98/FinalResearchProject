<?php
session_start();
include '../db_connect.php'; // Adjust path if needed

if (!isset($_SESSION['user_id'])) {
    // Not logged in, redirect to login or home
    header('Location: ../login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare('SELECT score FROM users WHERE id = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($score);
$stmt->fetch();
$stmt->close();

if ($score < 5) {
    header('Location: syllabus_intermediate.php');
    exit;
} else {
    header('Location: syllabus_advanced.php');
    exit;
}
?>