<?php

// delete_script.php

if (isset($_POST['id'])) {
    $delete = $_POST['id'];
    
    // Your database connection and deletion logic here
    // Make sure to properly sanitize and validate user input to prevent SQL injection
    
    // Example deletion logic
    $sql = "DELETE FROM signatory_managerdb WHERE id=$delete";
    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $con->error;
    }
    
    // Close your database connection
    // $con->close();
}

?>
