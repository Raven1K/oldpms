<?php
if (isset($_POST['content'])) {
    $scannedContent = $_POST['content'];






    // Perform actions with the scanned content
    // For example, insert it into a database
    // $conn = ... (database connection)
    // $scannedContent = mysqli_real_escape_string($conn, $scannedContent);
    // $query = "INSERT INTO qr_codes (content) VALUES ('$scannedContent')";
    // mysqli_query($conn, $query);
    echo "Scanned content received: ";
    // Return a response
    echo "Scanned content received: " . $scannedContent;
} else {
    echo "No content received.";
}
?>
