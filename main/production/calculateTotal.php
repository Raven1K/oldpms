<?php
// Read and decode the JSON data received from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

// Check if 'checkboxes' key exists in the received data
if (isset($data['checkboxes'])) {
    // Array of checkbox values received from the client
    $checkboxValues = $data['checkboxes'];

    // Calculate the total from the received checkbox values
    $total = 0;
    foreach ($checkboxValues as $value) {
        $total += floatval($value); // Ensure values are treated as float
    }

    // Prepare JSON response with the calculated total
    $response = ['total' => $total];

    // Set the appropriate headers for JSON response
    header('Content-Type: application/json');
    http_response_code(200); // OK status

    // Send JSON response back to the client
    echo json_encode($response);
} else {
    // If 'checkboxes' key is not found in the received data
    http_response_code(400); // Bad request status
    echo json_encode(['error' => 'Invalid data']);
}
?>
