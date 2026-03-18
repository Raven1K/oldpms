<?php 

if (isset($_POST['Approve'])) {

require_once "../../processphp/config.php";

$lumber_app_id = $_POST["lumber_app_id"];
$Name_of_Payor = $_POST["Name_of_Payor"];
$Name_of_Payor2 = ucwords(str_replace('_', ' ', $Name_of_Payor));
$Title = "Credit  Officer"; // Replace with your actual value
$Details = "Mr/Ms $Name_of_Payor2 you may now proceed to payment."; // Replace with your actual value

// SQL query to insert data into the table with automatic date and time
$sql = "INSERT INTO client_client_document_history (lumber_app_id, Date, Title, Details, Time)
        VALUES ('$lumber_app_id', CURRENT_DATE, '$Title', '$Details', CURRENT_TIME)";

// Execute the SQL query
if (mysqli_query($con, $sql)) {

} else {

}

}



$stat_uss = "Waiting for Payment Confirmation";
$Flow_stats = '2';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));

echo '<script>alert("Successfully Approved forwarded to Client for the Payment."); window.location.href = "application.php";</script>';
?>