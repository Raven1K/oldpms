<?php
include('../processphp/config.php'); // Include your database connection

if (isset($_POST['duplicate'])) {
    $id = $_POST['idnumber'];

    // Validate the ID
    if (!empty($id) && is_numeric($id)) {
        // Fetch the row to duplicate
        $query = "SELECT * FROM signatory_managerdb WHERE id = $id";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Prepare the insert query without duplicating the primary key (id)
            $sql = "INSERT INTO signatory_managerdb (official_station, signature_type, signature_order, signature_file, date_started, date_ended) 
                    VALUES (
                        '" . $row['official_station'] . "',
                        '" . $row['signature_type'] . "',
                        '" . $row['signature_order'] . "',
                        '" . $row['signature_file'] . "',
                        '" . $row['date_started'] . "',
                        '" . $row['date_ended'] . "'
                    )";

            if ($con->query($sql) === TRUE) {
                echo "<script>
                    alert('Row duplicated successfully.');
                    window.location.href = 'signatureconfig.php'; // Redirect to your main page
                </script>";
            } else {
                echo "<script>
                    alert('Error duplicating record: " . $con->error . "');
                    window.history.back();
                </script>";
            }
        } else {
            echo "<script>
                alert('No record found with the provided ID.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Invalid ID.');
            window.history.back();
        </script>";
    }
}
?>
