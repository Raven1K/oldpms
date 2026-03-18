<?php
require_once "../../processphp/config.php";

if (isset($_POST['SubmitBillcol'])) {
    // Check if the form was submitted using the form field "SubmitBillcol"

    // Retrieve form data
    $Bank_no = $_POST['Bank_no'];
    $Name_of_Bank = $_POST['Name_of_Bank'];
    $Amount = $_POST['Amount'];
    $lumber_app_id = $_POST['lumber_app_id']; // Assuming you have this in your form

    // Perform database update with a WHERE clause
    $query = "UPDATE order_of_payment SET Bank_no = ?, Name_of_Bank = ?, Amount = ? WHERE lumber_app_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssss", $Bank_no, $Name_of_Bank, $Amount, $lumber_app_id);

    if ($stmt->execute()) {
        // Show an alert message using JavaScript
        echo '<script>alert("Form updated successfully forwarded to CENRO."); window.location.href = "application.php";</script>';
    } else {
        echo 'Error: ' . $stmt->error;
    }
}


$Title = "CENR Officer"; // Replace with your actual value
$Details = "The CENRO will review and approve the Order of Payment. Forward to the Client for Payment."; // Replace with your actual value

// SQL query to insert data into the table with automatic date and time
$sql = "INSERT INTO client_client_document_history (lumber_app_id, Date, Title, Details, Time)
        VALUES ('$lumber_app_id', CURRENT_DATE, '$Title', '$Details', CURRENT_TIME)";

// Execute the SQL query
if (mysqli_query($con, $sql)) {

} else {

}


$stat_uss = "For Cenro Order of Payment Approval";
$Flow_stats = '9';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));





?>
