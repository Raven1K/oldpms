<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oldpms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display table
function displayTable($conn, $tableName) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Get column names
        $columns = array();
        while ($fieldinfo = $result->fetch_field()) {
            $columns[] = $fieldinfo->name;
        }

        // Generate HTML table
        echo "<table border='1'><tr>";
        foreach ($columns as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr>";

        // Fetch rows
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>{$row[$column]}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

// Specify the table name you want to display
// $tableName = "denr_users"; // Change this to your table name
$tableName = "user_client"; // Change this to your table name
displayTable($conn, $tableName);

$conn->close();
?>
