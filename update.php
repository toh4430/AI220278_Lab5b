
<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$matric = $_GET['matric'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";
    $conn->query($sql);
    header("Location: dashboard.php");
}

$sql = "SELECT * FROM users WHERE matric='$matric'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<form method="POST">
    Matric: <input type="text" name="matric" value="<?php echo $row['matric']; ?>" readonly><br>
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    Role: <input type="text" name="role" value="<?php echo $row['role']; ?>"><br>
    <button type="submit">Update</button> <a href="dashboard.php">Cancel</a>
</form>
