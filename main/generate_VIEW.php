<?php

require __DIR__ . "/vendor/autoload.php";
include "../processphp/config.php";


use Dompdf\Dompdf;
use Dompdf\Options;


$lumber_app_id = $_GET["lumber_app_id"];
$lumber_app = "SELECT * FROM r_endorsement where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];

// doc_status

$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
$date_ = $lumber_ap_row2['date_'];

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
$office = $lumber_ap_row3['Office'];

$Flow_stat = $lumber_ap_row3['Flow_stat'];
$Status_ = $lumber_ap_row3['Status_'];



$stmt = $connection->query("SELECT 
id, Date_from
FROM calendar_sitevisit_db 
where lumber_app_id = $lumber_app_id ");

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
$datevalidationl = $row['Date_from'];
$datevalidation2 = $row['Date_from'];


}


$stmt = $connection->query("SELECT 
lumber_app_id, Date_payment
FROM payment_feny 
where lumber_app_id = $lumber_app_id ");

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


$datepaid = $row['Date_payment'];
}

$ldname = $lumber_ap_row["ldname"];
$ldaddress = $lumber_ap_row["ldaddress"];
$date =	$lumber_ap_row["date"];
$owner = $lumber_ap_row["owner"];
$MPdateexpiry = $lumber_ap_row["MPdateexpiry"];
$MPdateissued = $lumber_ap_row["MPdateissued"];
$BNNumber =	$lumber_ap_row["BNNumber"];
$DTIdateissued = $lumber_ap_row["DTIdateissued"];
$SCtype = $lumber_ap_row["SCtype"];
$municipal = $lumber_ap_row["municipal"];
$province =	$lumber_ap_row["province"];
$totalsupply = $lumber_ap_row["totalsupply"];
$particulars = $lumber_ap_row["particulars"];
$treespecie = $lumber_ap_row["treespecie"];
$lsname = $lumber_ap_row["lsname"];
$yrvalidity = $lumber_ap_row["yrvalidity"];
$volume	= $lumber_ap_row["volume"];
$refnumber = $lumber_ap_row["refnumber"];
$DTIdateexpiry = $lumber_ap_row["DTIdateexpiry"];

$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result_orderofpayment = mysqli_fetch_assoc($lumber_app_qry);

$cashbond = $result_orderofpayment['cash'];
$Amount_Decimal = $result_orderofpayment['Amount_Decimal'];




// $lsname = $_POST["lsname"];

ob_start();
include "template.php";
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
$dompdf->setPaper("A4", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
// $html = file_get_contents("template.php");

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{MPdateexpiry}}", "{{MPdateissued}}", "{{BNNumber}}", "{{DTIdateissued}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{DTIdateexpiry}}", "{{lsname}}"],[$ldname, $ldaddress, $date, $owner, $MPdateexpiry, $MPdateissued, $BNNumber, $DTIdateissued, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $DTIdateexpiry, $lsname], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "ENDORSEMENT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("endorsement.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);