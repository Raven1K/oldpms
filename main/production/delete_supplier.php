
<?php

require_once "../../processphp/config.php";

?>


<?php
// Check if the post ID is provided
if (isset($_POST['post_id'])) {
    echo $postId = $_POST['post_id'];

    // Connect to your database
    // $dbHost = 'your_db_host';
    // $dbUsername = 'your_db_username';
    // $dbPassword = 'your_db_password';
    // $dbName = 'your_db_name';
    // $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the post from the database
    $sql = "DELETE FROM lumbersupply WHERE id = $postId";

    if ($conn->query($sql) === true) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Post ID not provided.";
}
?>
