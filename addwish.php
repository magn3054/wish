<?php
// add_wish.php

// Get the JSON file path
$jsonFilePath = 'wishes.json';

// Get the input data from the AJAX request
$input = json_decode(file_get_contents('php://input'), true);

// Check if required fields are present
if (isset($input['item'], $input['size'], $input['color'], $input['brand'])) {
    // Load existing data from wishes.json
    $wishData = json_decode(file_get_contents($jsonFilePath), true);

    // Append the new item
    $wishData[] = [
        'item' => $input['item'],
        'size' => $input['size'],
        'color' => $input['color'],
        'brand' => $input['brand'],
        'comments' => $input['comments'] ?? ''
    ];

    // Save updated data back to wishes.json
    file_put_contents($jsonFilePath, json_encode($wishData, JSON_PRETTY_PRINT));

    // Return success response
    echo json_encode(["status" => "success", "message" => "Item added successfully."]);
} else {
    // Return error response if required fields are missing
    echo json_encode(["status" => "error", "message" => "Invalid input."]);
}
?>
