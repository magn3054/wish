<?php
session_start(); // Start a session to track the login state

// Load configuration
$config = include(__DIR__ . '/config.php');

// Database connection using PDO
try {
    $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']}";
    $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the stored hash from config.php
    $storedHash = $config['site_pass_hash'];

    // Verify the username and password
    if ($username === 'magn3054' && password_verify($password, $storedHash)) {
        // Store session data and redirect to the insert wish page
        $_SESSION['username'] = $username;
        header('Location: insertwish.html'); // Redirect to insertwish.html.
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
