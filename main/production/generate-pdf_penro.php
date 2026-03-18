<?php
session_start ();
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$name = $_POST["name"];
$address = $_POST["address"];
$cons = $_POST["cons"];
$planted = $_POST["planted"];
$ptpoc = $_POST["ptpoc"];
$ptadd = $_POST["ptadd"];
$falcu = $_POST["falcu"];
$macu = $_POST["macu"];
$gecu = $_POST["gecu"];
$cacu = $_POST["cacu"];
$mancu = $_POST["mancu"];
$bene = $_POST["bene"];
$result = $_POST["result"]; 

$date_day = date('d');
$date_month = date('F');
$date_year = date('Y');
$day = $date_day;
$month = $date_month;
$year = $date_year;






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
$html = file_get_contents("template_penro.php");

$html = str_replace(["{{ name }}", "{{ address }}", "{{ cons }}", "{{ planted }}", "{{ ptpoc }}", "{{ ptadd }}", "{{ falcu }}", "{{ macu }}", 
"{{ gecu }}", "{{ cacu }}", "{{ mancu }}", "{{ bene }}", "{{ result }}", "{{ day }}", "{{ month }}", "{{ year }}"], 
[$name,$address,$cons,$planted,$ptpoc,$ptadd,$falcu,$macu,$gecu,$cacu,$mancu,$bene,$result,$day,$month,$year], $html);

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

require_once 'generate_post.php';
?>
