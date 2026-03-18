<?php
// Ensure the required database connection file is included
require_once "../../processphp/config.php";


$lumber_app_id = $_GET['lumber_app_id'];




$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3)
{
        $monthName = date('F d, Y', strtotime($date3));
        return $monthName;
}


//  $date = $row['date_recieve'] ;
$date3 = $date2;
getFullMonthNameFromDate($date3);




date_default_timezone_set("Asia/Manila");
$Time = date("h:i:sa");



$Title = 'Records Unit';
$Details = 'Released the approved Lumber Dealer E-Permit, Memorandum to the concerned PENROs and CENROs and the acknowledgment letter for the applicant.';


$query2 = $connection->prepare("INSERT INTO client_client_document_history(
lumber_app_id,
Date,
Title,
Details,
Time

)
VALUES (
:lumber_app_id,
:Date,
:Title,
:Details,
:Time

)");
$query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query2->bindParam("Date", $date2, PDO::PARAM_STR);
$query2->bindParam("Title", $Title, PDO::PARAM_STR);
$query2->bindParam("Details", $Details, PDO::PARAM_STR);
$query2->bindParam("Time", $Time, PDO::PARAM_STR);


$result2 = $query2->execute();




$Title = 'Client';
$Details = 'E-Permit is now available for download' . '<br><br>' . '

Note: Kindly share your time to accomplish the Client Satisfaction Survey (CSS) for us to further improve our services to you.
';


$query2 = $connection->prepare("INSERT INTO client_client_document_history(
lumber_app_id,
Date,
Title,
Details,
Time

)
VALUES (
:lumber_app_id,
:Date,
:Title,
:Details,
:Time

)");
$query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query2->bindParam("Date", $date2, PDO::PARAM_STR);
$query2->bindParam("Title", $Title, PDO::PARAM_STR);
$query2->bindParam("Details", $Details, PDO::PARAM_STR);
$query2->bindParam("Time", $Time, PDO::PARAM_STR);


$result2 = $query2->execute();



try {
    // Prepare the SQL query with named placeholders
    $sql = "UPDATE lumber_application 
            SET Application_status = :Application_status, Flow_stat = :Flow_stat
            WHERE lumber_app_id = :lumber_app_id";

    // Prepare the statement
    $stmt = $connection->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->execute(array(
        ':Application_status' => 'Complete',
        ':Flow_stat' => 'Complete',
        ':lumber_app_id' => $lumber_app_id
    ));

    // JavaScript alert for success and redirect
    echo "<script>
        alert('Application successfully released !');
        window.location.href = 'action.php';
    </script>";
} catch (PDOException $e) {
    // JavaScript alert for error and redirect
    echo "<script>
        alert('Error updating application: " . addslashes($e->getMessage()) . "');
        window.location.href = 'action.php';
    </script>";
}
?>
