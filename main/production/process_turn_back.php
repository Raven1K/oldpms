<?php
// Include database connection
require_once "../../processphp/config.php";

date_default_timezone_set("Asia/Manila");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['turn_back'])) {
    $lumber_app_id = isset($_POST['lumber_app_id']) ? intval($_POST['lumber_app_id']) : null;
    $calendar = isset($_POST['calendar']) ? intval($_POST['calendar']) : null;


        if (!empty($calendar)) { 
            $stmt = $con->prepare("UPDATE c_endorsement SET date_ = ? WHERE lumber_app_id = ?");
            $formatted_date = date("F d, Y", strtotime($calendar));
            $stmt->bind_param("si", $formatted_date, $lumber_app_id);
                if ($stmt->execute()) {
                    echo "Record updated successfully.";
                } else {
                    echo "Error updating record: " . $con->error;
                }
            $stmt->close();
        }


    if ($lumber_app_id) {
        $query = "UPDATE lumber_application SET Application_status = 'Turned_Back', Remarks = '' WHERE lumber_app_id = ?";
        
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("i", $lumber_app_id);
            if ($stmt->execute()) {
                $date2 = date('m/d/y');
                $date3 = date('F d, Y', strtotime($date2));
                $time = date("h:i:sa");
                $title = 'CENRO Forest Utilization Unit';
                $details = 'We are pleased to inform you that your document has been successfully processed by CENR Officer/Head DENR Satellite Office FUU. Rest assured that all necessary attachments have been reviewed and verified. Thank you for your patience.';

    
                    $insertQuery = $connection->prepare("INSERT INTO client_client_document_history (lumber_app_id, Date, Title, Details, Time) VALUES (:lumber_app_id, :date, :title, :details, :time)");
                    $insertQuery->bindParam(":lumber_app_id", $lumber_app_id, PDO::PARAM_INT);
                    $insertQuery->bindParam(":date", $date2, PDO::PARAM_STR);
                    $insertQuery->bindParam(":title", $title, PDO::PARAM_STR);
                    $insertQuery->bindParam(":details", $details, PDO::PARAM_STR);
                    $insertQuery->bindParam(":time", $time, PDO::PARAM_STR);
                    $insertQuery->execute();
                
                
                echo '<script>alert("Application status updated successfully!"); window.location.href = document.referrer;</script>';
            } else {
                error_log("MySQLi Execution Error: " . $stmt->error);
                echo '<script>alert("Error updating record.");</script>';
            }
            $stmt->close();
        } else {
            error_log("MySQLi Preparation Error: " . $con->error);
            echo '<script>alert("Error preparing update.");</script>';
        }
    } else {
        echo '<script>alert("Invalid data provided.");</script>';
    }
}
?>
