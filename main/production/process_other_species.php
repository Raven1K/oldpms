<?php
// process_other_species.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lumber_app_id = isset($_POST['lumber_app_id']) ? intval($_POST['lumber_app_id']) : 0;
    $endorsement_id = isset($_POST['endorsement_id']) ? intval($_POST['endorsement_id']) : 0;
    $species_name = isset($_POST['other_species_name']) ? trim($_POST['other_species_name']) : '';
    $species_bdft = isset($_POST['other_species_bdft']) ? floatval($_POST['other_species_bdft']) : 0;

    if (!empty($species_name) && $species_bdft > 0 && $lumber_app_id > 0) {

        // Database connection
        require_once "../../processphp/config.php";

        // Prepare SELECT statement to check if record exists
        $select_stmt = $con->prepare("
            SELECT 1 FROM wood_species_endorsement
            WHERE lumber_app_id = ? AND species = ? AND endorsement_id = ?
        ");

        if (!$select_stmt) {
            die("<div class='container mt-5'><h4 class='text-danger'>Error!</h4>
                <p>Database query preparation failed: " . $con->error . "</p></div>");
        }

        $select_stmt->bind_param("isi", $lumber_app_id, $species_name, $endorsement_id);
        $select_stmt->execute();
        $select_stmt->store_result();

        if ($select_stmt->num_rows > 0) {
            // Record exists, perform UPDATE
            $update_stmt = $con->prepare("
                UPDATE wood_species_endorsement
                SET boardfeet = ?
                WHERE lumber_app_id = ? AND species = ? AND endorsement_id = ?
            ");

            if (!$update_stmt) {
                die("<div class='container mt-5'><h4 class='text-danger'>Error!</h4>
                    <p>Database query preparation failed: " . $con->error . "</p></div>");
            }

            $update_stmt->bind_param("disi", $species_bdft, $lumber_app_id, $species_name, $endorsement_id);

            if ($update_stmt->execute()) {
                echo "<div class='container mt-5'><h4 class='text-success'>Other Species Updated Successfully!</h4>
                    <p>Species: $species_name</p><p>bd.ft: $species_bdft</p></div>";
            } else {
                echo "<div class='container mt-5'><h4 class='text-danger'>Error!</h4>
                    <p>Failed to update data: " . $update_stmt->error . "</p></div>";
            }

            $update_stmt->close();

        } else {
            // Record does not exist, perform INSERT
            $insert_stmt = $con->prepare("
                INSERT INTO wood_species_endorsement (lumber_app_id, species, boardfeet, endorsement_id)
                VALUES (?, ?, ?, ?)
            ");

            if (!$insert_stmt) {
                die("<div class='container mt-5'><h4 class='text-danger'>Error!</h4>
                    <p>Database query preparation failed: " . $con->error . "</p></div>");
            }

            $insert_stmt->bind_param("isdi", $lumber_app_id, $species_name, $species_bdft, $endorsement_id);

            if ($insert_stmt->execute()) {
                echo "<div class='container mt-5'><h4 class='text-success'>Other Species Added Successfully!</h4>
                    <p>Species: $species_name</p><p>bd.ft: $species_bdft</p></div>";
            } else {
                echo "<div class='container mt-5'><h4 class='text-danger'>Error!</h4>
                    <p>Failed to insert data: " . $insert_stmt->error . "</p></div>";
            }

            $insert_stmt->close();
        }

        $select_stmt->close();
        $con->close();

    } else {
        echo "<div class='container mt-5'><h4 class='text-danger'>Invalid Input!</h4>
            <p>Please provide a valid lumber application ID, species name, and bd.ft.</p></div>";
    }
}
?>
