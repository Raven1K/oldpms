<?php
include 'processphp/config.php';

// Check if the POST variable exists to prevent undefined index errors
if (isset($_POST["zip_data"])) {
    $zip_id = $_POST["zip_data"];

    // 1. Prepare the SQL statement with a placeholder (?)
    $zip = "SELECT * FROM muncity WHERE mun_code = ?";
    $stmt = mysqli_prepare($con, $zip);

    if ($stmt) {
        // 2. Bind the user input to the placeholder. 
        // "s" means we are treating $zip_id as a string (safe for codes with leading zeros).
        mysqli_stmt_bind_param($stmt, "s", $zip_id);

        // 3. Execute the statement
        mysqli_stmt_execute($stmt);

        // 4. Get the result
        $result = mysqli_stmt_get_result($stmt);

        // 5. Fetch the row and safely set the output
        if ($zip_row = mysqli_fetch_assoc($result)) {
            $output = $zip_row['zip_code'];
        } else {
            // Fallback if no matching mun_code is found
            $output = ""; 
        }

        // 6. Close the statement
        mysqli_stmt_close($stmt);

        echo $output;
    } else {
        // Handle preparation error (optional, usually for debugging)
        echo "Database error.";
    }
} else {
    echo "No data received.";
}
?>