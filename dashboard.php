<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
    <th>Matric</th>
    <th>Name</th>
    <th>Level</th>
    <th>Action</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['matric']}</td>
        <td>{$row['name']}</td>
        <td>{$row['role']}</td>
        <td>
            <a href='update.php?matric={$row['matric']}'>Update</a> 
            <a href='delete.php?matric={$row['matric']}'>Delete</a>
        </td>
    </tr>";
}

echo "</table>";
$conn->close();
?>
