<?php

require __DIR__ . "/vendor/autoload.php";

require_once "../../processphp/config.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$date =  date("m/d/Y") ; 

// $lumber_app_id = '334';   
$lumber_app_id = $_GET["lumber_app_id"];



$lumber_app = "SELECT * FROM endorsement_form_for_release where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);



$lumber_app2 = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
$lumber_app_qry2 = mysqli_query($con, $lumber_app2);
$lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry2);
$status = $lumber_ap_row2['Status_'];

$ldname = $lumber_ap_row['ldname'];
$ldaddress = $lumber_ap_row['ldaddress'];
$date =	$lumber_ap_row['date'];
$owner = $lumber_ap_row['owner'];
$municipal = $lumber_ap_row['municipal'];
$province = $lumber_ap_row['province'];
$regnumber = $lumber_ap_row['regnumber'];
$surname = $lumber_ap_row['surname'];
// $status = '';
$dateclient = $lumber_ap_row['dateclient'] ;


// $ldname = $_POST["ldname"];
// $ldaddress = $_POST["ldaddress"];
// $date =	$_POST["date"];
// $owner = $_POST["owner"];
// $municipal = $_POST["municipal"];
// $province =	$_POST["province"];
// $regnumber = $_POST["regnumber"];
// $surname = $_POST["perm_lname"];
// $status = '';
// $dateclient = $date ;

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
$dompdf->setPaper("A4", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template2.php");

$html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{municipal}}", "{{status}}", "{{province}}", "{{dateclient}}", "{{regnumber}}", "{{surname}}"],[$ldname, $ldaddress, $date, $owner, $municipal, $status, $province, $dateclient, $regnumber, $surname], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "ACKNOWLEDGEMENT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("acknowledgement.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("acknowledgement.pdf", $output);







  






?>