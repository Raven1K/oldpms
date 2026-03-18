<?php
// Define the target directory and file name

$file_name = $_POST['file_name'];

$lumber_ap_show_applicationform = $file_name ; // Replace with your specific file name
$target_dir = "../processphp/clientupload/uploads/";
$target_file = $target_dir . $lumber_ap_show_applicationform;

// Check if the upload directory exists
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

// Process the uploaded file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['file']['tmp_name'];

        // Move the uploaded file to the target location, overwriting if it exists
        if (move_uploaded_file($uploadedFile, $target_file)) {
            echo json_encode([
                'success' => true,
                'message' => 'File uploaded and updated successfully!'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to upload the file.'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No file was uploaded or an error occurred.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}
?>
