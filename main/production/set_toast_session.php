<?php
// Start the session
session_start();

// Set the session variable to mark the toast as dismissed
$_SESSION['toast_dismissed'] = true;

// Return a success response
header('Content-Type: application/json');
echo json_encode(['success' => true]);
?>