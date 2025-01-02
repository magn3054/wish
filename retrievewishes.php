<?php
// Load configuration
$config = include(__DIR__ . '/config.php');

// Database connection using PDO
try {
    $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']}";
    $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all wishes from the database
    $stmt = $pdo->query("SELECT navn, str, farve, url FROM wishes");

    if ($stmt) {
        $wishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($wishes);
    } else {
        echo json_encode(['error' => 'Error fetching wishes.']);
    }

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
?>
