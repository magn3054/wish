<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password']; // Get the password from user input.
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        echo "Hashed Password: " . $hashedPassword;
    } else {
        echo "Please enter a password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Hasher</title>
</head>
<body>
    <form method="POST" action="">
        <label for="password">Enter Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Hash Password</button>
    </form>
</body>
</html>
