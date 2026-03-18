<?php
// 1. Force sessions to only use cookies (prevents session IDs in URLs)
ini_set('session.use_only_cookies', 1);
// 2. Prevent session fixation attacks
ini_set('session.use_strict_mode', 1);

// 3. Set strict cookie parameters for maximum compatibility
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_samesite', 'Strict');

// 4. Set the cookie parameters array (for PHP 7.3+)
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

include('processphp/config.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? null;
    $newPassword = $_POST['newPassword'] ?? null;
    $confirmPassword = $_POST['confirmPassword'] ?? null;

    if ($email === null || $newPassword === null || $confirmPassword === null) {
        error_log("Form data missing.");
        header("Location: forgot_password.php?error=Form data missing.");
        exit();
    }

    if ($newPassword !== $confirmPassword) {
        header("Location: forgot_password.php?error=Passwords do not match.");
        exit();
    }

    // Hash the password securely
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    if ($hashedPassword === false) {
        error_log("Password hashing failed.");
        header("Location: forgot_password.php?error=Password hashing failed.");
        exit();
    }

    // Check if the email exists in the database
    $checkEmailStmt = $con->prepare("SELECT email FROM user_client WHERE email = ?");
    if (!$checkEmailStmt) {
        error_log("Error preparing statement: " . $con->error);
        header("Location: forgot_password.php?error=Error preparing statement.");
        exit();
    }

    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows === 0) {
        $checkEmailStmt->close();
        header("Location: forgot_password.php?error=Email does not exist.");
        exit();
    }

    $checkEmailStmt->close();

    // FIXED: Removed the plain text password variable completely.
    // Updated the SQL query to only store the hashed password.
    $stmt = $con->prepare("UPDATE user_client SET password = ? WHERE email = ?");
    if (!$stmt) {
        error_log("Error preparing statement: " . $con->error);
        header("Location: forgot_password.php?error=Error preparing statement.");
        exit();
    }

    // "ss" indicates we are binding two strings: the hashed password and the email
    $stmt->bind_param("ss", $hashedPassword, $email);

    if ($stmt->execute()) {
        header("Location: login.php?success=Password reset successfully.");
        exit();
    } else {
        error_log("Error updating password: " . $stmt->error);
        header("Location: forgot_password.php?error=Error updating password.");
        exit();
    }

    $stmt->close();
}

$con->close();
?>