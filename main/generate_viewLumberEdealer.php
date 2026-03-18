<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;
include "../processphp/config.php";

$lumber_app_id = $_GET["lumber_app_id"];



$lumber_app = "SELECT * FROM lumber_dealer_e_permit_form where lumber_app_id = '$lumber_app_id'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);
$cashbond = $result['cash'];


// echo $lumber_ap_row['ldname'];


// exit();
$ldname =  $lumber_ap_row['ldname'];


$ldaddress = $lumber_ap_row['ldaddress'];

$date =	$lumber_ap_row['date'];

$owner = $lumber_ap_row['owner'];

$SCtype = $lumber_ap_row['SCtype'];

$municipal = $lumber_ap_row['municipal']; 

$province = $lumber_ap_row['province']; 

$totalsupply = $lumber_ap_row['totalsupply']; 

$particulars = $lumber_ap_row['particulars']; 

$treespecie = $lumber_ap_row['treespecie'];  

$lsname = $lumber_ap_row['lsname'];  

$yrvalidity = $lumber_ap_row['yrvalidity'];  

$volume	= $lumber_ap_row['volume'];  


$refnumber = $lumber_ap_row['refnumber'];  

$regnumber = 'LD-R13-'.''. $lumber_ap_row['regnumber'];  

$lsname = $lumber_ap_row['lsname'];  

$SCregnumber = $lumber_ap_row['SCregnumber'];  

$datepaid = $lumber_ap_row['datepaid'];

$status = $lumber_ap_row['status'];


$dateissued = '';
$dateexpiry = '';



ob_start();
include "template1.php";
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
$dompdf->setPaper("legal", "landscape");
/**
 * Load the HTML and replace placeholders with values from the form
 */
// $html = file_get_contents("template1.php");

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}", "{{datepaid}}"],

// [$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber, $datepaid], $html);

// Red Code 

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}", "{{dateissued}}", "{{dateissued}}"],[$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber, $dateissued, $dateexpiry], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "E-PERMIT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("endorsement.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);




// $lumber_app_id = $_GET["lumber_app_id"];

$sql = "UPDATE lumber_application SET Registration_Number = :Registration_Number
WHERE lumber_app_id = $lumber_app_id";

$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Registration_Number' => $regnumber,));



?>