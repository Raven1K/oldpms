<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$name = $_POST["name"];
$gender = $_POST["genderM"]
$gender = $_POST["genderF"]
$address = $_POST["address"]
$contract = $_POST["contract"]
$planted = $_POST["planted"]
$ptpoc = $_POST["ptpoc"]
$ptadd = $_POST["ptpadd"]
$falcu = $_POST["falcu"]
$falbd = $_POST["falbd"]
$macu = $_POST["macu"]
$mabd = $_POST["mabd"]
$gecu = $_POST["gecu"]
$gebd = $_POST["gebd"]
$cacu = $_POST["cacu"]
$cabd = $_POST["cabd"]
$mancu = $_POST["mancu"]
$manbd = $_POST["manbd"]
$bene = $_POST["bene"]

//$html = '<h1 style="color: green">Example</h1>';
//$html .= "Hello <em>$name</em>";
//$html .= '<img src="example.png">';
//$html .= "Quantity: $quantity";

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
$html = file_get_contents("template.php");

$html = str_replace(["{{ name }}", "{{ gender }}", "{{ address }}", "{{ contract }}", "{{ planted }}", "{{ ptpoc }}", "{{ ptadd }}", "{{ falcu }}", "{{ falbd }}", "{{ macu }}", "{{ mabd }}"
                        , "{{ gecu }}", "{{ gebd }}", "{{ cacu }}", "{{ cabd }}", "{{ mancu }}", "{{ manbd }}", "{{ bene }}"], [$name, $gender,$address,$contract,$planted,$ptpoc,$ptadd,$falcu,$falbd,$macu,$mabd,$gecu,$gebd,$cacu,$cabd,$mancu,$manbd,$bene], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "Endorsement"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("Endorsement.pdf", ["Attachment" => 0]);

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);