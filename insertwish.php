<?php
session_start(); // Start the session to check if the user is logged in

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.html'); // Redirect to login if not authenticated
    exit();
}

// Database connection
$pdo = new PDO("mysql:host=yourhost;dbname=yourdb", "username", "password");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];

    // Insert the wish into the database
    $stmt = $pdo->prepare("INSERT INTO wishes (title, description, url) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $url]);

    echo "Wish added successfully!";
    // Optionally, redirect back to the wish form or a confirmation page
    // header('Location: insertwish.html');
}
?>
