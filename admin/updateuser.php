<?php
// Assuming you have established database connection

include('../processphp/config.php');

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact_no = $_POST['contact_no'];
    $user_role_id = $_POST['user_role_id'];
    $office_id = $_POST['office_id'];
    $unhashPassword = $_POST['unhashPassword'];

    
    // Prepare SQL statement to update the record
    $sql = "UPDATE denr_users SET name='$name', username='$username', password='$password', contact_no='$contact_no', user_role_id='$user_role_id', office_id='$office_id', unhashPassword='$unhashPassword' WHERE user_id='$user_id'";

    if ($con->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Record updated successfully");';
        echo 'window.location.replace("viewaccount.php");'; // Redirect to another page
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error updating record: ' . $con->error . '");';
        echo 'window.location.replace("viewaccount.php");'; // Redirect to another page
        echo '</script>';
    }
    
}

// Close connection
$con->close();
?>
