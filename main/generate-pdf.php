<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];
$owner = $_POST["owner"];
$MPdateexpiry = $_POST["MPdateexpiry"];
$MPdateissued = $_POST["MPdateissued"];
$BNNumber =	$_POST["BNNumber"];
$DTIdateissued = $_POST["DTIdateissued"];
$SCtype = $_POST["SCtype"];
$municipal = $_POST["municipal"];
$province =	$_POST["province"];
$totalsupply = $_POST["totalsupply"];
$particulars = $_POST["particulars"];
$treespecie = $_POST["treespecie"];
$lsname = $_POST["lsname"];
$yrvalidity = $_POST["yrvalidity"];
$volume	= $_POST["volume"];
$refnumber = $_POST["refnumber"];
$DTIdateexpiry = $_POST["DTIdateexpiry"];
$lsname = $_POST["lsname"];

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
$html = file_get_contents("template.php");

$html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{MPdateexpiry}}", "{{MPdateissued}}", "{{BNNumber}}", "{{DTIdateissued}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{DTIdateexpiry}}", "{{lsname}}"],[$ldname, $ldaddress, $date, $owner, $MPdateexpiry, $MPdateissued, $BNNumber, $DTIdateissued, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $DTIdateexpiry, $lsname], $html);

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