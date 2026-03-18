<?php
// Check if the form is submitted


    include '../processphp/config.php'; // Change 'config.php' to your actual database connection file


    // Get form data
    $client_id = $_POST['client_idPost'];
    $status = "1";

            // Update status in the database
            $sql = "UPDATE user_client SET Status='$status' WHERE client_id='$client_id'";
            if ($con->query($sql) === TRUE) {

                echo '<script>';
                echo 'alert("Successfully Confirmed");';
                echo 'window.location.href = "accountrequest.php";'; // Redirect to confirm.php
                echo '</script>';
                
            } else {

                echo '<script>';
                echo 'alert("Error");';
                echo 'window.location.href = "accountrequest.php";'; // Redirect to confirm.php
                echo '</script>';

            }

?>
