<?php
session_start ();
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;



require_once "../../processphp/config.php";

$lumber_app_id = $_GET['lumber_app_id'];


$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);




$office_address = $lumber_ap_row['office_address'];
$office_under = $lumber_ap_row['office_under'];
$penroaddress = $lumber_ap_row['penroaddress'];
$bussiness_name = $lumber_ap_row['bussiness_name'];
$date_ = $lumber_ap_row['date_'];



$full_address = $lumber_ap_row['full_address'];
$ldname = $lumber_ap_row['ldname'];
$full_name = $lumber_ap_row['full_name'];
$ldaddress = $lumber_ap_row['ldaddress'];
$MPdateissued = $lumber_ap_row['MPdateissued'];
$MPdateexpiry = $lumber_ap_row['MPdateexpiry'];
$BNNumber = $lumber_ap_row['BNNumber'];
$DTIdateissued = $lumber_ap_row['DTIdateissued'];
$DTIdateexpiry = $lumber_ap_row['DTIdateexpiry'];
$municipal_qry_result= $lumber_ap_row['municipal_qry_result'];
$datevalidation = $lumber_ap_row['datevalidation'];
$refnumber = $lumber_ap_row['refnumber'];
$datepaid = $lumber_ap_row['datepaid'];


$lumber_app10 = "SELECT * FROM payment_feny where lumber_app_id = '$lumber_app_id'";
$lumber_app_qry10 = mysqli_query($con, $lumber_app10);
$result10 = mysqli_fetch_assoc($lumber_app_qry10);
$Reference_Number = $result10["Reference_Number"];

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row2_ = mysqli_fetch_assoc($lumber_app_qry);
// require_once "modaltempextension.php";
$office_cover = $lumber_ap_row2_["Office"];
$office_qry_result = $lumber_ap_row2_['Office'];
$date_applied = date('Y-m-d', strtotime($lumber_ap_row2_['date_applied']));


$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result_orderofpayment = mysqli_fetch_assoc($lumber_app_qry);

$cashbond = $result_orderofpayment['cash'];
$Amount_Decimal = $result_orderofpayment['Amount_Decimal'];



 
                    $nshow = $lumber_app_id;
                    $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = '$nshow'";
                    $lumber_app_qry = mysqli_query($con, $lumber_app);
                    $result = mysqli_fetch_assoc($lumber_app_qry);
                    
                    $_office_cover = $result['Office'];
                    $suffix = $result['Suffix'];
                    $Flow_stat = $result['Flow_stat'];
                    $Status_ = $result['Status_'];



                    
                    
                    // Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature 
                    
                    $lumber_app = "
                    SELECT signature_file 
                    FROM signatory_managerdb 
                    WHERE official_station = ? 
                      AND signature_type = 'Endorsement' 
                      AND signature_order = '1' 
                      AND (
                          ? BETWEEN date_started AND date_ended 
                          OR date_ended = ''
                      )
                ";
                
                // Prepare the statement
                $stmt = mysqli_prepare($con, $lumber_app);
                
                // Check if the statement preparation was successful
                if ($stmt) {
                    // Bind parameters: 's' for string, 's' for the date
                    mysqli_stmt_bind_param($stmt, "ss", $_office_cover, $_current_date);
                
                    // Execute the query
                    if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
                
                        if ($result && mysqli_num_rows($result) > 0) {
                            $lumber_ap_row22 = mysqli_fetch_assoc($result);
                            $signature_1 = $lumber_ap_row22['signature_file'] ?? null; // Graceful handling if key is absent
                        } else {
                            $signature_1 = null; // No matching record found
                            echo "No matching signature file found.";
                        }
                    } else {
                        echo "Query failed: " . mysqli_error($con);
                        $signature_1 = null;
                    }
                
                    // Close the statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Statement preparation failed: " . mysqli_error($con);
                    $signature_1 = null;
                }
                    
                    
                        $file1 = "../../admin/uploads/$signature_1";
                        // Destination location where we would like to move our file
                        $dest_file = 'uploads/'.$signature_1.'';
                    
                    
                        copy($file1, $dest_file);
                        if (!copy($file1, $dest_file)) {
                          // echo $file." failed to copy";
                        } else {
                          // echo $file. " copied into " .$dest_file;
                        }











// require_once 'generate_postview.php';
ob_start();
include "template_short.php";
$html = ob_get_clean();
ob_end_clean();

/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("LEGAL", "portrait");

/**
 * Load the HTML and replace placeholders with values from the form
 */            
                            // $html = file_get_contents("template_short.php");
                            // $html = str_replace(["{{ office_address }}", "{{ office_under }}", "{{ penroaddress }}", "{{ bussiness_name }}", "{{ full_address }}", "{{ date_ }}", 
                            // "{{ ldname }}", "{{ owner }}", "{{ ldaddress }}", "{{ MPdateissued }}", "{{ MPdateexpiry }}", "{{ BNNumber }}", "{{ DTIdateissued }}", "{{ DTIdateexpiry }}", 
                            // "{{ SCtype }}", "{{ municipal }}", "{{ province2 }}", "{{ totalsupply }}", "{{ particulars }}", "{{ treespecie }}", "{{ lumber_app_id }}", "{{ refnumber }}", "{{ office_cover }}"], 
                            // [$office_address, $office_under,$penroaddress,$bussiness_name,$full_address,$date_,$ldname,$owner,$ldaddress,$MPdateissued,$MPdateexpiry,$BNNumber,$DTIdateissued,
                            // $DTIdateexpiry,$SCtype,$municipal,$province2,$totalsupply,$particulars,$treespecie, $lumber_app_id, $refnumber, $office_cover], $html);

                            // $html = str_replace(["{{ office_address }}"], 
// [$office_address], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();
$dompdf->addInfo("Title", "ENDORSEMENT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("endorsement.pdf", ["Attachment" => 0]);

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);

// require_once 'generate_post.php';





// exit();


$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

if (($lumber_ap_row['lumber_app_id']) == ($lumber_app_id)) {
   


}else{

    $query = $connection->prepare("INSERT INTO c_endorsement(
                                    

        lumber_app_id,
        office_address,
        office_under,
        penroaddress,
        bussiness_name,
        date_,
        full_address,
        ldname,
        full_name,
        ldaddress,
        MPdateissued,
        MPdateexpiry,
        BNNumber,
        DTIdateissued,
        DTIdateexpiry,
        municipal_qry_result,
        datevalidation,
        refnumber,
        datepaid
    
    )
    VALUES (
    
        :lumber_app_id,
        :office_address,
        :office_under,
        :penroaddress,
        :bussiness_name,
        :date_,
        :full_address,
        :ldname,
        :full_name,
        :ldaddress,
        :MPdateissued,
        :MPdateexpiry,
        :BNNumber,
        :DTIdateissued,
        :DTIdateexpiry,
        :municipal_qry_result,
        :datevalidation,
        :refnumber,
        :datepaid
    
    
    
    )");
    
    $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
    $query->bindParam("office_address", $office_address, PDO::PARAM_STR);
    $query->bindParam("office_under", $office_under, PDO::PARAM_STR);
    $query->bindParam("penroaddress", $penroaddress, PDO::PARAM_STR);
    $query->bindParam("bussiness_name", $bussiness_name, PDO::PARAM_STR);
    $query->bindParam("date_", $date_, PDO::PARAM_STR);
    $query->bindParam("full_address", $full_address, PDO::PARAM_STR);
    $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
    $query->bindParam("full_name", $full_name, PDO::PARAM_STR);
    $query->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
    $query->bindParam("MPdateissued", $MPdateissued, PDO::PARAM_STR);
    $query->bindParam("MPdateexpiry", $MPdateexpiry, PDO::PARAM_STR);
    $query->bindParam("BNNumber", $BNNumber, PDO::PARAM_STR);
    $query->bindParam("DTIdateissued", $DTIdateissued, PDO::PARAM_STR);
    $query->bindParam("DTIdateexpiry", $DTIdateexpiry, PDO::PARAM_STR);
    $query->bindParam("municipal_qry_result", $municipal_qry_result, PDO::PARAM_STR);
    $query->bindParam("datevalidation", $datevalidation, PDO::PARAM_STR);
    $query->bindParam("refnumber", $refnumber, PDO::PARAM_STR);
    $query->bindParam("datepaid", $datepaid, PDO::PARAM_STR);
    $result = $query->execute();
    
    

}


$lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $lumber_app_id && Number_of_doc = '10'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

if (($lumber_ap_row['Number_of_doc']) == ('10')) {
   





}else{



                $doc_type_name = 'Endorsement for PENRO ';
                $date = date('m/d/y');
                $Number_of_doc = '10';
                $doc_status = 'For Review (FG)';

                $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
                    lumber_app_id,
                    doc_type_name,
                    date_applied,
                    Number_of_doc,
                    doc_status
                    
                    )
                VALUES (
                    :lumber_app_id,
                    :doc_type_name,
                    :date_applied,
                    :Number_of_doc,
                    :doc_status

                )");
                $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
                $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
                $query->bindParam("date_applied", $date, PDO::PARAM_STR);
                $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
                $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);



                $result = $query->execute();



                $stat_uss = 'For Initial Chief RPS';
                $Flow_stats = '7';

                $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
                $stmt = $connection->prepare($sql);
                $stmt->execute(array(
                ':Status' => $stat_uss,
                ':Flow_stat' => $Flow_stats,));


                }


// -------------------------------------------------------------------------------


date_default_timezone_set("Asia/Manila");

$Time = date("h:i:sa");

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


$lumber_app = "SELECT * FROM client_client_document_history where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


if (!$lumber_ap_row['lumber_app_id']){

   $Title = 'On Chief RPS';
   $Details = 'Documents reviewed by Chief RPS and recommend the approval of Certification to DMO IV.';
   

   $query = $connection->prepare("INSERT INTO client_client_document_history(
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
   $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
   $query->bindParam("Date", $date2, PDO::PARAM_STR);
   $query->bindParam("Title", $Title, PDO::PARAM_STR);
   $query->bindParam("Details", $Details, PDO::PARAM_STR);
   $query->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result = $query->execute();
   
   }





// -------------------------------------------------------------------------------















// $stat_uss = 'For Initial Chief RPS';
// $Flow_stats = '6.3';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));







?>

