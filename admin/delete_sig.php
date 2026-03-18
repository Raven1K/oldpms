<?php
    include('../processphp/config.php');

if (isset($_POST['delete'])) {
    $delete = $_POST['idnumber'];

    // Validate input
    if (!empty($delete) && is_numeric($delete)) {
        $sql = "DELETE FROM signatory_managerdb WHERE id = $delete";

        if ($con->query($sql) === TRUE) {
            echo "<script>
                alert('Record deleted successfully.');
                window.location.href = 'signatureconfig.php'; // Redirect to your main page
            </script>";
        } else {
            echo "<script>
                alert('Error deleting record: " . $con->error . "');
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
