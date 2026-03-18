<?php
// Retrieve password and confirm_password from POST data
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Perform validation
if ($password !== $confirm_password) {
    // Passwords do not match
    echo "Passwords do not match";
} else {
    // Passwords match
    echo "Passwords match";
}
?>
