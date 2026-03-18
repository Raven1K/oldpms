<?php
include('../processphp/config.php');

if (isset($_POST['edit'])) {
    $id = $_POST['idnumber'];
    $date_started = !empty($_POST['date_started']) ? "'" . $_POST['date_started'] . "'" : "NULL";
    $date_ended = !empty($_POST['date_ended']) ? "'" . $_POST['date_ended'] . "'" : "NULL";

    // Validate input
    if (!empty($id) && is_numeric($id)) {
        $sql = "UPDATE signatory_managerdb 
                SET date_started = $date_started, date_ended = $date_ended
                WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            echo "<script>
                alert('Record updated successfully.');
                window.location.href = 'signatureconfig.php';
            </script>";
        } else {
            echo "<script>
                alert('Error updating record: " . $con->error . "');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Invalid input.');
            window.history.back();
        </script>";
    }
}
?>
