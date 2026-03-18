<?php
session_start ();
require __DIR__ . "../../vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;



require_once "../../../processphp/config.php";

$lumber_app_id = $_GET['lumber_app_id'];

$formattedDate = date('F j, Y');
$stmt = $con->prepare("UPDATE c_endorsement SET date_penro = ? WHERE lumber_app_id = ?");
$stmt->bind_param("si", $formattedDate, $lumber_app_id);


if ($stmt->execute()) {
    echo "Record updated successfully. Affected rows: " . $stmt->affected_rows;
} else {
    echo "Error updating record: " . $stmt->error;
}



$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$lumber_app1 = "SELECT * FROM payment_feny where lumber_app_id = $lumber_app_id ";
$lumber_app_qry1 = mysqli_query($con, $lumber_app1);
$lumber_ap_row1 = mysqli_fetch_assoc($lumber_app_qry1);
$refnumber  = $lumber_ap_row1['Reference_Number'];
$datepaid = date('F d, Y') == ($lumber_ap_row1['Date_payment']);

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
$municipal_qry_result = $lumber_ap_row2['Office'];



$nshow = $lumber_app_id;
$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = '$nshow'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);

$office_under = $result['office_under'];
$_office_cover = $result['Office'];
$suffix = $result['Suffix'];
$Flow_stat = $result['Flow_stat'];
$date_applied = date('Y-m-d', strtotime($result['date_applied']));


$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result_orderofpayment = mysqli_fetch_assoc($lumber_app_qry);

$cashbond = $result_orderofpayment['cash'];
$Amount_Decimal = $result_orderofpayment['Amount_Decimal'];


// Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature 

$date_applied = $result['date_applied'];

$query = "
    SELECT * 
    FROM signatory_managerdb 
    WHERE official_station = ? 
      AND signature_type = 'Endorsement' 
      AND signature_order = '1'
      AND (
          ? BETWEEN date_started AND date_ended 
          OR date_ended = ''
      )
";

$stmt = mysqli_prepare($con, $query);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ss", $office_under, $date_applied);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch data
if ($result) {
    $lumber_ap_row22 = mysqli_fetch_assoc($result);
    $signature_1 = $lumber_ap_row22['signature_file'] ?? null; // Handle null case
} else {
    echo "Query failed: " . mysqli_error($con);
}






    $file1 = "../../../admin/uploads/$signature_1";
    // Destination location where we would like to move our file
    $dest_file = 'uploads/'.$signature_1.'';


    copy($file1, $dest_file);
    if (!copy($file1, $dest_file)) {
      // echo $file." failed to copy";
    } else {
      // echo $file. " copied into " .$dest_file;
    }













                                    $full_name = $lumber_ap_row['full_name'];
                                    $lumber_app_id  = $lumber_ap_row['lumber_app_id'];
                                    $penroaddress = $lumber_ap_row['penroaddress'];
                                    $office_address = $lumber_ap_row['office_under'];
                                    $office_under = $lumber_ap_row['office_under'];
                                    $bussiness_name = $lumber_ap_row['bussiness_name'];
                                    $full_address = $lumber_ap_row['full_address'];
                                    $date_ = $lumber_ap_row['date_'];
                                    $date_penro = $lumber_ap_row['date_penro'];
                                    $ldname = $lumber_ap_row['ldname'];
                                    $owner = $lumber_ap_row['owner'];
                                    $ldaddress = $lumber_ap_row['ldaddress'];
                                    $MPdateissued = $lumber_ap_row['MPdateissued'];
                                    $MPdateexpiry = $lumber_ap_row['MPdateexpiry'];
                                    $BNNumber = $lumber_ap_row['BNNumber'];
                                    $DTIdateissued = $lumber_ap_row['DTIdateissued'];
                                    $DTIdateexpiry = $lumber_ap_row['DTIdateexpiry'];
                                    $SCtype = "" ;
                                    $municipal = "";
                                    $province2 = "" ;    
                                    $totalsupply = $lumber_ap_row['totalsupply'];
                                    $particulars = $lumber_ap_row['particulars'];
                                    $treespecie = "" ;
                                    $date_ = $lumber_ap_row['date_'];



                    $stmt = $connection->query("SELECT 
                    lumber_app_id, SUM(result)
                    FROM supp_contdetails  
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $totalsupply = $row['SUM(result)'];
                    }

                    $stmt = $connection->query("SELECT 
                    lumber_app_id, Species
                    FROM supp_contdetails  
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $treespecie = $row['Species'];
                    }

                    $stmt = $connection->query("SELECT 
                    lumber_app_id, ownername
                    FROM supp_contdetails  
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $lsname = $row['ownername'];
                    }

                    $stmt = $connection->query("SELECT 
                    lumber_app_id, validity_val
                    FROM supp_contdetails  
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $yrvalidity = $row['validity_val'];
                    }

                    $stmt = $connection->query("SELECT 
                    lumber_app_id, office_cover
                    FROM supp_contdetails  
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $office_cover = $row['office_cover'];
                    }

                    $stmt = $connection->query("SELECT 
                    id, Date_from
                    FROM calendar_sitevisit_db 
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $datevalidation = $row['Date_from'];
                    }

                    $stmt = $connection->query("SELECT 
                    lumber_app_id, Reference_Number
                    FROM payment_feny 
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $refnumber = $row['Reference_Number'];
                    }

                    $stmt = $connection->query("SELECT 
                    lumber_app_id, Date_payment
                    FROM payment_feny 
                    where lumber_app_id = $lumber_app_id ");

                    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                    $datepaid = $row['Date_payment'];
                    }


                    ob_start();
                    include "template_short_PENRO_ENDRM.php";
                    $html = ob_get_clean();
                    ob_end_clean();

// exit();
// require_once 'generate_postview.php';

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


$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();
$dompdf->addInfo("Title", "ENDORSEMENT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("../endorsement.pdf", ["Attachment" => 0]);

/**../
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

            $query = $connection->prepare("INSERT INTO p_endorsement(
                
                lumber_app_id, 
                office_address, 
                office_under,
                penroaddress, 
                bussiness_name, 
                full_address, 
                date_, 
                ldname, 
                owner, 
                ldaddress, 
                MPdateissued, 
                MPdateexpiry, 
                BNNumber, 
                DTIdateissued, 
                DTIdateexpiry,
                SCtype, 
                municipal, 
                province2, 
                totalsupply,
                particulars, 
                treespecie 
                    
                )
            VALUES (

                :lumber_app_id,
                :office_address, 
                :office_under,
                :penroaddress, 
                :bussiness_name, 
                :full_address, 
                :date_, 
                :ldname, 
                :owner, 
                :ldaddress, 
                :MPdateissued, 
                :MPdateexpiry, 
                :BNNumber, 
                :DTIdateissued, 
                :DTIdateexpiry,
                :SCtype, 
                :municipal, 
                :province2, 
                :totalsupply,
                :particulars, 
                :treespecie 

                
                )");

            $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
            $query->bindParam("office_address", $office_address, PDO::PARAM_STR);
            $query->bindParam("office_under", $office_under, PDO::PARAM_STR);
            $query->bindParam("penroaddress", $penroaddress, PDO::PARAM_STR);
            $query->bindParam("bussiness_name", $bussiness_name, PDO::PARAM_STR);
            $query->bindParam("full_address", $full_address, PDO::PARAM_STR);
            $query->bindParam("date_", $date_, PDO::PARAM_STR);
            $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
            $query->bindParam("owner", $owner, PDO::PARAM_STR);
            $query->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
            $query->bindParam("MPdateissued", $MPdateissued, PDO::PARAM_STR);
            $query->bindParam("MPdateexpiry", $MPdateexpiry, PDO::PARAM_STR);
            $query->bindParam("BNNumber", $BNNumber, PDO::PARAM_STR);
            $query->bindParam("DTIdateissued", $DTIdateissued, PDO::PARAM_STR);
            $query->bindParam("DTIdateexpiry", $DTIdateexpiry, PDO::PARAM_STR);
            $query->bindParam("SCtype", $SCtype, PDO::PARAM_STR);
            $query->bindParam("municipal", $municipal, PDO::PARAM_STR);
            $query->bindParam("province2", $province2, PDO::PARAM_STR);
            $query->bindParam("totalsupply", $totalsupply, PDO::PARAM_STR);
            $query->bindParam("particulars", $particulars, PDO::PARAM_STR);
            $query->bindParam("treespecie", $treespecie, PDO::PARAM_STR);
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



$lumber_app = "SELECT * FROM client_client_document_history where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


if (!$lumber_ap_row['lumber_app_id']){

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



            $Title = 'PENRO FUU';
            $Details = 'Evaluated the endorsed application from the concerned CENROs.

            Forward the complete documents to the Chief RPS.
            
            Note: If there are discrepancies in the endorsed documents they will be returned to CENRO FUU. Both the applicant and the CENR Officer will be notified thru SMS.
            
            ';
   

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



$doc_type_name = 'Endorsement for RED';
$date = date('m/d/y');
$Number_of_doc = '11';
$doc_status = 'For Review (FG) RED';





$sql = "UPDATE lumber_app_doc_erow SET 


doc_type_name = :doc_type_name, 
date_applied = :date_applied,
Number_of_doc = :Number_of_doc,
doc_status = :doc_status

WHERE lumber_app_id = $lumber_app_id && Number_of_doc = $Number_of_doc";

$stmt = $connection->prepare($sql);
$stmt->execute(array(
':doc_type_name' => $doc_type_name,  
':date_applied' => $date,
':Number_of_doc' => $Number_of_doc,
':doc_status' => $doc_status,));





// -------------------------------------------------------------------------------















// $stat_uss = 'For Initial Chief RPS';
// $Flow_stats = '6.3';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));







?>

