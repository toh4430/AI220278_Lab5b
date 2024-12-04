<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$matric = $_GET['matric'];

$sql = "DELETE FROM users WHERE matric='$matric'";
$conn->query($sql);

header("Location: dashboard.php");
?>
