<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];
$owner = $_POST["owner"];
$municipal = $_POST["municipal"];
$province =	$_POST["province"];
$regnumber = $_POST["regnumber"];
$status = '';
$dateclient = '';

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
$dompdf->setPaper("legal", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template2.php");

$html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{municipal}}", "{{status}}", "{{province}}", "{{dateclient}}", "{{regnumber}}"],[$ldname, $ldaddress, $date, $owner, $municipal, $status, $province, $dateclient, $regnumber], $html);

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