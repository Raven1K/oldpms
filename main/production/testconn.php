<?php
    $host = 'mysql-38441-0.cloudclusters.net:38441';
    $username = 'FENY';
    $password = 'FENY2021';
    $database = 'to_caraga';
    
    // Create a new database connection
    $conn = mysqli_connect($host, $username, $password, $database);
    
    // Check the database connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "Connected successfully.";
    
    // Close the database connection
    mysqli_close($conn);



?>

