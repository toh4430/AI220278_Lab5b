<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Register</h1>
    <form action="register_process.php" method="POST">
        Matric: <input type="text" name="matric" required><br>
        Name: <input type="text" name="name" required><br>
        Password: <input type="password" name="password" required><br>
        Role: 
        <select name="role">
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
