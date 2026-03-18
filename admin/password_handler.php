<?php

include('../processphp/config.php');


function validatePassword($password, $confirmPassword) {
    return $password === $confirmPassword;
}

// Validate form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if (!validatePassword($password, $confirmPassword)) {
        echo "<script>alert('Passwords do not match'); window.location.href = 'viewaccount.php';</script>";
        exit; // Stop further execution
    }

    // Hash the password before storing (for security)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the user's information in the database
    $sql = "UPDATE denr_users SET username='$username', password='$hashedPassword', unhashPassword='$password', name='$name' WHERE user_id=$userId";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Password updated successfully'); window.location.href = 'viewaccount.php';</script>";
    } else {
        echo "<script>alert('Error updating password: " . $con->error . "'); window.location.href = 'viewaccount.php';</script>";
    }
}

// Close the database connection
$con->close();
?>
