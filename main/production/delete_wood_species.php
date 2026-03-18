<?php
// delete_wood_species.php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID from the POST data
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        // Database connection
        require_once "../../processphp/config.php";

        // Prepare the DELETE statement
        $stmt = $con->prepare("DELETE FROM wood_species_endorsement WHERE id = ?");
        if (!$stmt) {
            echo json_encode([
                'success' => false,
                'message' => 'Database query preparation failed: ' . $con->error
            ]);
            exit;
        }

        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Species deleted successfully.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to delete species: ' . $stmt->error
            ]);
        }

        $stmt->close();
        $con->close();
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid species ID.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}
?>
