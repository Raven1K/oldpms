<?php
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'oldrms_db');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);


        // IN NI REPLICATE INTO OTHER CONNECTED DATABASE IN TERM NAG LAHI

        $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


        // EXECUTION
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>