<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'screenshots/'; // Directory to save screenshots
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
        }

        $filePath = $uploadDir . basename($_FILES['screenshot']['name']);
        if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $filePath)) {
            echo 'File saved to: ' . $filePath;
        } else {
            http_response_code(500);
            echo 'Failed to save the file.';
        }
    } else {
        http_response_code(400);
        echo 'No file uploaded or upload error occurred.';
    }
} else {
    http_response_code(405);
    echo 'Invalid request method.';
}
?>
