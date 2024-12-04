<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Lab_5b");

$matric = $_POST['matric'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE matric='$matric'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $row;
        header("Location: dashboard.php");
    } else {
        echo "Invalid password. <a href='login.php'>Try login again</a>";
    }
} else {
    echo "Invalid matric number. <a href='login.php'>Try login again</a>";
}

$conn->close();
?>
