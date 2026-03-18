<?php

$nshow = isset($_GET['lumber_app_id']) ? intval($_GET['lumber_app_id']) : 0;

include "../../processphp/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wood Species</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #007BFF;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e9ecef;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php

// Check if a valid ID is provided
if ($nshow > 0) {
    // Query to fetch data from wood_species table where idd = $nshow
    $sql = "SELECT userid, species, type, idd FROM wood_species WHERE idd = ?";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("Failed to prepare statement: " . $con->error);
    }

    $stmt->bind_param('i', $nshow);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if records are found
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>User ID</th>";
        echo "<th>Species</th>";
        echo "<th>Type</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Fetch and display each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['userid']) . "</td>";
            echo "<td>" . htmlspecialchars($row['species']) . "</td>";
            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
            echo "<td>
                <form method='POST' action='' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to delete this record?\");'>
                    <input type='hidden' name='userid' value='" . htmlspecialchars($row['userid']) . "'>
                    <button type='submit' class='delete-button'>Delete</button>
                </form>
                </td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='message'>No records found for IDD = $nshow.</p>";
    }

    $stmt->close();
} else {
    echo "<p class='message'>Invalid or missing ID.</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'userid' is set in POST request
    if (isset($_POST['userid'])) {
        $userid = intval($_POST['userid']);

        // Prepare the DELETE query
        $sql = "DELETE FROM wood_species WHERE userid = ?";
        $stmt = $con->prepare($sql);

        if (!$stmt) {
            die("Failed to prepare statement: " . $con->error);
        }

        $stmt->bind_param('i', $userid);

        // Execute the query and check if successful
        if ($stmt->execute()) {
            // Redirect to refresh the page after successful deletion
            header("Location: " . $_SERVER['PHP_SELF'] . "?lumber_app_id=" . $nshow);
            exit();
        } else {
            echo "<p class='message' style='color: red;'>Error deleting record: " . htmlspecialchars($stmt->error) . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='message'>Invalid request. User ID is missing.</p>";
    }
} else {
    echo "<p class='message'>Invalid request method. Only POST requests are allowed.</p>";
}

// Close the database connection
$con->close();

?>

</body>
</html>
