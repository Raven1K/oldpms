<?php
// Assuming you have included necessary database connection code here
include('../processphp/config.php');

// Check if ID is provided in the URL
if(isset($_POST['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = $_POST['id'];
    
    // Fetch image data based on the ID
    $query = "SELECT * FROM signatory_managerdb WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if($result) {
        // Fetch the row
        $row = mysqli_fetch_assoc($result);
        // Now you can use $row['signature_file'] to get the image file name/path
        // Use this information to populate your edit form or perform other actions
    } else {
        echo "Error fetching data from the database: " . mysqli_error($con);
    }
} else {
    echo "No ID provided.";
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Get the uploaded file details
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    
    // Get the file extension
    $img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    
    // Allowed extensions
    $allowed_exs = array("jpg", "jpeg", "png");
    
    // Check if the uploaded file has an allowed extension
    if (in_array($img_ex_lc, $allowed_exs)) {
        // Generate a unique file name
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        // Set the upload path
        $img_upload_path = 'uploads/'.$new_img_name;
        // Move the uploaded file to the upload path
        if (move_uploaded_file($file_tmp, $img_upload_path)) {
            // File uploaded successfully, now update the database
            $update_query = "UPDATE signatory_managerdb SET signature_file = '$new_img_name' WHERE id = $id";
            $update_result = mysqli_query($con, $update_query);

            if($update_result) {
                // Display success message using JavaScript alert
                echo '<script>alert("Image uploaded and database updated successfully."); window.location.href = "signatureconfig.php";</script>';
                exit; // Stop further execution
            } else {
                echo '<script>alert("Error updating database: ' . mysqli_error($con) . '"); window.location.href = "signatureconfig.php";</script>';
                exit; // Stop further execution
            }
        } else {
            echo '<script>alert("Error uploading file."); window.location.href = "signatureconfig.php";</script>';
            exit; // Stop further execution
        }
    } else {
        echo '<script>alert("Invalid file extension. Please upload a JPG, JPEG, or PNG file."); window.location.href = "signatureconfig.php";</script>';
        exit; // Stop further execution
    }
}
?>
