<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];
$owner = $_POST["owner"];
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
$regnumber = $_POST["regnumber"];
$lsname = $_POST["lsname"];
$SCregnumber = $_POST["SCregnumber"];


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
$dompdf->setPaper("A4", "landscape");
/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("templateRED.php");

$html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}"],[$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "E-PERMIT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("templateRED.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);