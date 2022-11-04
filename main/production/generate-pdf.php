<?php
session_start ();

require_once "../../processphp/config.php";

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
$falbd = $_POST["falbd"];
$macu = $_POST["macu"];
$mabd = $_POST["mabd"];
$gecu = $_POST["gecu"];
$gebd = $_POST["gebd"];
$cacu = $_POST["cacu"];
$cabd = $_POST["cabd"];
$mancu = $_POST["mancu"];
$manbd = $_POST["manbd"];
$bene = $_POST["bene"];

$query = $connection->prepare("INSERT INTO c_endorsement(lumber_app_id, name, address, cons, planted, ptpoc, ptadd, falcu, falbd, macu, gecu, gebd, cacu, cabd, mancu, manbd, bene)
VALUES (:lumber_app_id, :name,:address,:cons,:planted,:ptpoc, :ptadd, :falcu, :falbd,  :macu,  :gecu, :gebd, :cacu, :cabd, :mancu, :manbd, :bene)");
$query->bindParam("lumber_app_id", $id, PDO::PARAM_STR);
$query->bindParam("name", $name, PDO::PARAM_STR);
$query->bindParam("address", $address, PDO::PARAM_STR);
$query->bindParam("cons", $cons, PDO::PARAM_STR);
$query->bindParam("planted", $planted, PDO::PARAM_STR);
$query->bindParam("ptpoc", $ptpoc, PDO::PARAM_STR);
$query->bindParam("ptadd", $ptadd, PDO::PARAM_STR);
$query->bindParam("falcu", $falcu, PDO::PARAM_STR);
$query->bindParam("falbd", $falbd, PDO::PARAM_STR);
$query->bindParam("macu", $macu, PDO::PARAM_STR);
$query->bindParam("gecu", $gecu, PDO::PARAM_STR);
$query->bindParam("gebd", $gebd, PDO::PARAM_STR);
$query->bindParam("cacu", $cacu, PDO::PARAM_STR);
$query->bindParam("cabd", $cabd, PDO::PARAM_STR);
$query->bindParam("mancu", $mancu, PDO::PARAM_STR);
$query->bindParam("manbd", $manbd, PDO::PARAM_STR);
$query->bindParam("bene", $bene, PDO::PARAM_STR);
$result = $query->execute();


$stat_uss = 'For Initial Chief RPS';
$Flow_stats = '6.3';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));


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

$html = str_replace(["{{ name }}","{{ address }}", "{{ cons }}", "{{ planted }}", "{{ ptpoc }}", "{{ ptadd }}", "{{ falcu }}", "{{ falbd }}", "{{ macu }}", "{{ mabd }}", "{{ gecu }}", "{{ gebd }}", "{{ cacu }}", "{{ cabd }}", "{{ mancu }}", "{{ manbd }}", "{{ bene }}"], [$name,$address,$cons,$planted,$ptpoc,$ptadd,$falcu,$falbd,$macu,$mabd,$gecu,$gebd,$cacu,$cabd,$mancu,$manbd,$bene], $html);

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
?>