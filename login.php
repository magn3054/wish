<?php
session_start(); // Start a session to track the login state

// Database connection
$pdo = new PDO("mysql:host=mysql20.unoeuro.com;dbname=mdamsgaard_dk_db", "mdamsgaard_dk", "password_hash");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the entered password against the stored hash
        if (password_verify($password, $user['password_hash'])) {
            // Store session data and redirect to the insert wish page
            $_SESSION['username'] = $username;
            header('Location: insertwish.html'); // Redirect to the insert wish site
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
