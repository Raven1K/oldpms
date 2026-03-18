<?php
session_start ();
require __DIR__ . "/vendor/autoload.php";

ob_start();
include "template_short.php";
$html = ob_get_clean();
ob_end_clean();

use Dompdf\Dompdf;
use Dompdf\Options;



require_once "../../processphp/config.php";

$lumber_app_id = $_POST['lumber_app_id'];
$province = $_POST["province"];
$office_under = $_POST["office_under"];



$full_name = $_POST["full_name"];


//echo "template_short.php?$lumber_app_id" ;
                                                        $stmt = $connection->query("SELECT 
                                                        lumber_app_id, SUM(result), Species, ownername, validity_val, office_cover
                                                        FROM supp_contdetails  
                                                        where lumber_app_id = $lumber_app_id ");

                                                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                                                        $totalsupply = $row['SUM(result)'];
                                                        $treespecie = $row['Species'];
                                                        $lsname = $row['ownername'];
                                                        $yrvalidity = $row['validity_val'];
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

$owner = $full_name ;
$ldaddress = $full_address ;
$MPdateissued = $_POST['mpissued'] ;
$MPdateexpiry = $_POST['mpexpiry'] ;
$BNNumber = $_POST['bnissued'] ;
$DTIdateissued = $_POST['dtissued'] ;
$DTIdateexpiry = $_POST['dtiexpiry'] ;
$SCtype = "" ;
$municipal = "" ;
$province2 = "" ;
// $totalsupply = "" ;
$particulars ="Chainsaw-cut Lumbers" ;








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
   






// -------------------------------------------------------------------------------















// $stat_uss = 'For Initial Chief RPS';
// $Flow_stats = '6.3';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));




$stat_uss = 'For Initial Chief RPS';
$Flow_stats = '7';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));



?>

