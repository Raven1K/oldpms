<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;


$regnumber = $_POST["regnumber"];
$refnumber = $_POST["refnumber"];
$owner = $_POST["owner"];
$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];
$MPdateissued = $_POST["MPdateissued"];
$MPdateexpiry = $_POST["MPdateexpiry"];
$BNNumber =	$_POST["BNNumber"];
$DTIdateissued = $_POST["DTIdateissued"];
$DTIdateexpiry = $_POST["DTIdateexpiry"];
$regnonumber = $_POST["regnonumber"];
$regissueddate = $_POST["regissueddate"];
$regexpirydate = $_POST["regexpirydate"];
$lumtype = $_POST["lumtype"];
$previousbal = $_POST["previousbal"];
$voldisplayed = $_POST["voldisplayed"];
$totvolhand = $_POST["totvolhand"];
$voldisposed = $_POST["voldisposed"];
$volbalance = $_POST["volbalance"];
$lsname = $_POST["lsname"];
$SCtype = $_POST["SCtype"];
$municipal = $_POST["municipal"];
$province =	$_POST["province"];
$totalsupply = $_POST["totalsupply"];
$particulars = $_POST["particulars"];
$treespecie = $_POST["treespecie"];
$yrvalidity = $_POST["yrvalidity"];
$volume	= $_POST["volume"];
$lsdateissued = '';
$office = '';
$dateendorsePENRO = '';
$dateendorseCENRO = '';
$datepaid = '';

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
$dompdf->setPaper("8.5in x 13in", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template.php");

$html = str_replace(["{{regnumber}}", "{{refnumber}}", "{{owner}}", "{{ldname}}", "{{ldaddress}}", "{{date}}", "{{MPdateissued}}", "{{MPdateexpiry}}", "{{BNNumber}}", "{{DTIdateissued}}", "{{DTIdateexpiry}}", "{{regnonumber}}", "{{regissueddate}}", "{{regexpirydate}}", "{{lumtype}}", "{{previousbal}}", "{{voldisplayed}}", "{{totvolhand}}", "{{voldisposed}}", "{{volbalance}}", "{{lsname}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{yrvalidity}}", "{{volume}}"],[$regnumber, $refnumber, $owner, $ldname, $ldaddress, $date, $MPdateissued, $MPdateexpiry, $BNNumber, $DTIdateissued, $DTIdateexpiry, $regnonumber, $regissueddate, $regexpirydate, $lumtype, $previousbal, $voldisplayed, $totvolhand, $voldisposed, $volbalance, $lsname, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $yrvalidity, $volume], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "ENDORSEMENT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("endorsement3.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);