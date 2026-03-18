<?php
// Force HTTPS cookies and prevent JavaScript access
session_set_cookie_params([
    'lifetime' => 0,        // Session expires when browser closes
    'path' => '/',
    'domain' => '',
    'secure' => true,       // Only send cookie over HTTPS
    'httponly' => true,     // Prevent JavaScript access
    'samesite' => 'Strict'  // Prevent CSRF attacks
]);

// Start secure session
session_start();

// Regenerate session ID to prevent session fixation
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}
?>