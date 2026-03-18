<?php
// process_wood_species.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: application/json'); // Set header for JSON response

    $lumber_app_id = isset($_POST['lumber_app_id']) ? intval($_POST['lumber_app_id']) : 0;
    $endorsement_id = isset($_POST['endorsement_id']) ? intval($_POST['endorsement_id']) : 0;
    $falcata = isset($_POST['falcata']) ? floatval($_POST['falcata']) : 0;
    $mahogany = isset($_POST['mahogany']) ? floatval($_POST['mahogany']) : 0;
    $gemelina = isset($_POST['gemelina']) ? floatval($_POST['gemelina']) : 0;
    $caimito = isset($_POST['caimito']) ? floatval($_POST['caimito']) : 0;
    $mango = isset($_POST['mango']) ? floatval($_POST['mango']) : 0;
    $mangium = isset($_POST['mangium']) ? floatval($_POST['mangium']) : 0;

    // Validate inputs to ensure no negative values
    if ($falcata < 0 || $mahogany < 0 || $gemelina < 0 || $caimito < 0 || $mango < 0 || $mangium < 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid Input! Negative values are not allowed.'
        ]);
        exit;
    }

    // Database connection
    require_once "../../processphp/config.php";

    // Prepare SELECT statement to check if record exists
    $select_stmt = $con->prepare("SELECT 1 FROM wood_species_endorsement WHERE lumber_app_id = ? AND species = ?");
    if (!$select_stmt) {
        echo json_encode([
            'success' => false,
            'message' => 'Database query preparation failed: ' . $con->error
        ]);
        exit;
    }

    // Prepare INSERT statement with endorsement_id
    $insert_stmt = $con->prepare("INSERT INTO wood_species_endorsement (lumber_app_id, species, boardfeet, endorsement_id) VALUES (?, ?, ?, ?)");
    if (!$insert_stmt) {
        echo json_encode([
            'success' => false,
            'message' => 'Database query preparation failed: ' . $con->error
        ]);
        exit;
    }

    // Prepare UPDATE statement (no change needed unless updating endorsement_id)
    $update_stmt = $con->prepare("UPDATE wood_species_endorsement SET boardfeet = ? WHERE lumber_app_id = ? AND species = ?");
    if (!$update_stmt) {
        echo json_encode([
            'success' => false,
            'message' => 'Database query preparation failed: ' . $con->error
        ]);
        exit;
    }

    // Process each species
    $species_data = [
        'Falcata' => $falcata,
        'Mahogany' => $mahogany,
        'Gemelina' => $gemelina,
        'Caimito' => $caimito,
        'Mango' => $mango,
        'Mangium' => $mangium
    ];

    $errors = [];
    foreach ($species_data as $species_name => $boardfeet) {
        if ($boardfeet > 0) { // Only insert/update species with non-zero board feet
            // Check if record exists
            $select_stmt->bind_param("is", $lumber_app_id, $species_name);
            if (!$select_stmt->execute()) {
                $errors[] = "Failed to check data for $species_name: " . $select_stmt->error;
                continue;
            }
            $select_stmt->store_result();

            if ($select_stmt->num_rows > 0) {
                // Record exists, perform UPDATE
                $update_stmt->bind_param("dis", $boardfeet, $lumber_app_id, $species_name);
                if (!$update_stmt->execute()) {
                    $errors[] = "Failed to update data for $species_name: " . $update_stmt->error;
                }
            } else {
                // Record does not exist, perform INSERT including endorsement_id
                $insert_stmt->bind_param("isdi", $lumber_app_id, $species_name, $boardfeet, $endorsement_id);
                if (!$insert_stmt->execute()) {
                    $errors[] = "Failed to insert data for $species_name: " . $insert_stmt->error;
                }
            }
            $select_stmt->free_result(); // Free result to reuse statement
        }
    }

    // Close statements and connection
    $select_stmt->close();
    $insert_stmt->close();
    $update_stmt->close();
    $con->close();

    if (empty($errors)) {
        echo json_encode([
            'success' => true,
            'message' => 'Data submitted successfully!'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => implode("\n", $errors)
        ]);
    }
}
?>
