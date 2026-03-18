<?php

include('../../processphp/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lumber_app_id = $_POST['lumber_app_id'];

    // Validate and process the ID
    if (!empty($lumber_app_id)) {

        // Define the new status and flow state
        $stat_uss = 'For Endorsement';
        $Flow_stats = '6.3';

        try {
            // Prepare the SQL query using ? placeholders
            $sql = "UPDATE lumber_application 
                    SET Status = ?, Flow_stat = ? 
                    WHERE lumber_app_id = ?";
            $stmt = $con->prepare($sql);

            if ($stmt === false) {
                throw new Exception($con->error);
            }

            // Bind parameters and execute the query
            $stmt->bind_param("ssi", $stat_uss, $Flow_stats, $lumber_app_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Alert and redirect on success
                echo "
                <script>
                    alert('No Certification confirmed for application ID: $lumber_app_id');
                    window.location.href = 'application.php';
                </script>
                ";
            } else {
                // Alert and redirect if no rows were updated
                echo "
                <script>
                    alert('No changes were made to the application.');
                    window.location.href = 'application.php';
                </script>
                ";
            }

            $stmt->close();
        } catch (Exception $e) {
            // Handle database errors gracefully
            echo "
            <script>
                alert('An error occurred while updating the application. Please try again.');
                window.location.href = 'application.php';
            </script>
            ";
        }
    } else {
        // Handle invalid or missing ID
        echo "
        <script>
            alert('Invalid application ID.');
            window.location.href = 'application.php';
        </script>
        ";
    }
}
?>
