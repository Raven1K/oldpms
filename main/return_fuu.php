<?php
// Include database connection
require_once "../processphp/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

 $_SESSION["user_role_id"] == 12.5 ? 13 : $_SESSION["user_role_id"];

$role_id = $_SESSION["user_role_id"] == 12.5 ? 13 : $_SESSION["user_role_id"];
$query = "SELECT role FROM user_role WHERE Rolw_id2 = ?";
if($stmt = $con->prepare($query)) {
    $stmt->bind_param("d", $role_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
         $_SESSION["role"] = $row['role'];
    }
    $stmt->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return'])) {
    // Get the submitted data
    $lumber_app_id = isset($_POST['lumber_app_id']) ? intval($_POST['lumber_app_id']) : null;
    $remarks = 'Returned by : ' . (isset($_POST['user_name']) ? $_POST['user_name'] . (isset($_POST['message-text']) ? ' ' . trim($_POST['message-text']) : '') : '');

    // Validate inputs
    if ($lumber_app_id && !empty($remarks)) {
        // Update query
        $query = "UPDATE lumber_application 
                  SET Application_status = 'Return_FUU', remarks = ? 
                  WHERE lumber_app_id = ?";
        
        // Prepare statement
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("si", $remarks, $lumber_app_id);

            // Execute the query
            if ($stmt->execute()) {
            // Additional processing
$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3) {
    $monthName = date('F d, Y', strtotime($date3));
    return $monthName;
}

$date3 = $date2;
getFullMonthNameFromDate($date3);

date_default_timezone_set("Asia/Manila");
$Time = date("h:i:sa");

$Title = $_SESSION["role"]  . ' Returned to CENRO Forest Utilization Unit';

$Details = 'Upon Reviewing the uploaded documents, we regret to inform you that your document has been returned to CENR Officer/Head DENR Satellite 
Office FUU due to missing attachments. Rest assured, our team will address this matter promptly and ensure compliance with the necessary requirements.
<br><br>

Remarks: ' . $_POST['message-text'] . '<br>
Returned to  : CENRO Forest Utilization Unit ';

// Check for duplicate entry based on Title and lumber_app_id
$checkQuery = $connection->prepare("SELECT COUNT(*) FROM client_client_document_history WHERE lumber_app_id = :lumber_app_id AND Title = :Title");
$checkQuery->bindParam(":lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$checkQuery->bindParam(":Title", $Title, PDO::PARAM_STR);
$checkQuery->execute();
$count = $checkQuery->fetchColumn();


    // Insert the record if it doesn't exist
    $query = $connection->prepare("INSERT INTO client_client_document_history(
        lumber_app_id,
        Date,
        Title,
        Details,
        Time
    ) VALUES (
        :lumber_app_id,
        :Date,
        :Title,
        :Details,
        :Time
    )");

    $query->bindParam(":lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
    $query->bindParam(":Date", $date2, PDO::PARAM_STR);
    $query->bindParam(":Title", $Title, PDO::PARAM_STR);
    $query->bindParam(":Details", $Details, PDO::PARAM_STR);
    $query->bindParam(":Time", $Time, PDO::PARAM_STR);


    if ($query->execute()) {

    } else {
        echo '<script type="text/javascript">
                alert("Error inserting record.");
              </script>';
    }


                echo '<script type="text/javascript">
                        alert("Application Returned successfully!");
                        window.location.href = document.referrer;
                      </script>';
                exit;
            } else {
                echo '<script type="text/javascript">
                        alert("Error updating record: ' . addslashes($stmt->error) . '");
                      </script>';
            }

            $stmt->close();
        } else {
            echo '<script type="text/javascript">
                    alert("Error preparing statement: ' . addslashes($con->error) . '");
                  </script>';
        }
    } else {
        echo '<script type="text/javascript">
                alert("Invalid input data. Please ensure all fields are filled correctly.");
              </script>';
    }
}
?>
