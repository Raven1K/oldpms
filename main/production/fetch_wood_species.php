<?php
// fetch_wood_species.php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the lumber_app_id from the GET parameters
    $lumber_app_id = isset($_GET['lumber_app_id']) ? intval($_GET['lumber_app_id']) : 0;

    if ($lumber_app_id > 0) {
        // Database connection
        require_once "../../processphp/config.php";

        // Prepare the SQL statement
        $stmt = $con->prepare("SELECT id, species, boardfeet, created_at FROM wood_species_endorsement WHERE lumber_app_id = ?");
        if (!$stmt) {
            echo json_encode([
                'success' => false,
                'message' => 'Database query preparation failed: ' . $con->error
            ]);
            exit;
        }

        $stmt->bind_param("i", $lumber_app_id);
        if (!$stmt->execute()) {
            echo json_encode([
                'success' => false,
                'message' => 'Database execution failed: ' . $stmt->error
            ]);
            exit;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'success' => true,
            'data' => $data
        ]);

        $stmt->close();
        $con->close();
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid lumber_app_id.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}
?>
