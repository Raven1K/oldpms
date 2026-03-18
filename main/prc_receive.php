

<?php 

session_start();









$nshow = $_GET['lumber_app_id'];




require_once "../processphp/config.php";


$lumber_app_id = $_GET['lumber_app_id']; // Assuming this is passed via URL

// Query to check if a record exists in cf_documents
$check_query = "SELECT * FROM cf_documents WHERE lumber_app_id = $lumber_app_id";
$result = mysqli_query($con, $check_query);

if (mysqli_num_rows($result) == 0) {
    // If no record found, alert and exit
    echo "<script>
        alert('Erorr: Please prepare certification');
        window.history.back(); // Optionally go back to the previous page
    </script>";
    exit();
}




   $stat_uss = 'On Process FUS RO';
   $Flow_stats = "13";
   $date =  date("m/d/Y") ; 





                        $sql = "UPDATE lumber_application SET Status = :Status, date_recieve = :date_recieve, Flow_stat = :Flow_stat 
                        WHERE lumber_app_id = $nshow";
                        $stmt = $connection->prepare($sql);
                        $stmt->execute(array(
                        ':Status' => $stat_uss,
                        'date_recieve' => $date,
                        ':Flow_stat' => $Flow_stats,));


                        $lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $nshow && Number_of_doc = '12'";
                        $lumber_app_qry = mysqli_query($con, $lumber_app);
                        $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

if ($lumber_ap_row) {


} else {
               
                    $doc_type_name = 'To Generate RED Endorsement';
                    $date_applied = $date;
                    $Number_of_doc = '12';
                    $doc_app_ind = '0';
                    $doc_status = 'For Generate RED Endorsement';


                    $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
                                            lumber_app_id,
                                            doc_type_name,
                                            date_applied,
                                            doc_status,
                                            Number_of_doc,
                                            doc_app_ind

                                            )
                                        VALUES (
                                            :lumber_app_id,
                                            :doc_type_name,
                                            :date_applied,
                                            :doc_status,
                                            :Number_of_doc,
                                            :doc_app_ind


                                        )");
                    $query->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
                    $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
                    $query->bindParam("date_applied", $date, PDO::PARAM_STR);
                    $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);
                    $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
                    $query->bindParam("doc_app_ind", $doc_app_ind, PDO::PARAM_STR);

                    $result = $query->execute();




}




$lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $nshow && Number_of_doc = '13'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

if ($lumber_ap_row) {


} else {

    $doc_type_name = 'To Generate Lumber Dealer E-Permit';
    $date_applied = $date;
    $Number_of_doc = '13';
    $doc_app_ind = '0';
    $doc_status = 'For Generate Lumber Dealer E-Permit';


    $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
    lumber_app_id,
    doc_type_name,
    date_applied,
    doc_status,
    Number_of_doc,
    doc_app_ind

    )
VALUES (
    :lumber_app_id,
    :doc_type_name,
    :date_applied,
    :doc_status,
    :Number_of_doc,
    :doc_app_ind


)");
    $query->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
    $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
    $query->bindParam("date_applied", $date, PDO::PARAM_STR);
    $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);
    $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
    $query->bindParam("doc_app_ind", $doc_app_ind, PDO::PARAM_STR);

    $result = $query->execute();


}
// -------------------------------------------------------------------------------


$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3){
 $monthName = date('F d, Y', strtotime($date3));
 return $monthName;
      }


     //  $date = $row['date_recieve'] ;
     $date3 = $date2 ;
            getFullMonthNameFromDate($date3);




date_default_timezone_set("Asia/Manila");
$Time = date("h:i:sa");



   $Title = 'RO FUS';
   $Details = 'Evaluated the endorsed application from the concerned PENROs.'.'<br><br>'.'

Forward the complete documents and endorsed the application with the E-Permit to the Chief LPDD.'.'<br><br>'.'
Note: If there are discrepancies in the endorsed documents they will be returned to CENRO/PENRO FUU. The applicant and the CENR and PENR Officers will be notified thru SMS.
.';
   

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
   $query2->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
   $query2->bindParam("Date", $date2, PDO::PARAM_STR);
   $query2->bindParam("Title", $Title, PDO::PARAM_STR);
   $query2->bindParam("Details", $Details, PDO::PARAM_STR);
   $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result2 = $query2->execute();
   





// ------------------------------------------------------------------------------------------------







//    $em = "Successfully Received!";
//    header ("Location: ../processphp/univmodal.php?error=$em");

    

  
//    function function_alert($message) {
//     echo "<script type='text/javascript'>alert('Successfully Received!'); </script> ";

//     // header("location: evaluation_R_FUS.php?lumber_app_id=$nshow") ;

//     }

//     function_alert("Successfully Received!");

//     header ("Location: evaluation_R_FUS.php?lumber_app_id=$nshow");

function function_alert($message) {
      
    // Display the alert box 
	echo "<script type='text/javascript'>alert('Successfully Recieved');
    
         location='action.php?';
    

    
    </script>";

    // javascript:history.back()
}
  
  
// Function call
function_alert("Successfully Recieved!");

echo $nshow;
// header( "Location: docstatus_released.php?lumber_app_id=$lumber_app_id" ) ;

?>