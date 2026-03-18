<?php

// Define constants only if not already defined
if (!defined('USER')) {
    define('USER', 'root');
}
if (!defined('PASSWORD')) {
    define('PASSWORD', '');
}
if (!defined('HOST')) {
    define('HOST', 'localhost');
}
if (!defined('DATABASE')) {
    define('DATABASE', 'oldpms');
}

try {
    // PDO connection
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);

    // MySQLi connection
    $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if (!$con) {
        die("MySQLi connection failed: " . mysqli_connect_error());
    }
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

// // Ensure session is started only once
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// Set timezone
date_default_timezone_set('Asia/Manila');


    ?>
    
