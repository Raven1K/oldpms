<?php
include "../../processphp/config.php";
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;




       



              

     $nshow = $_GET['lumber_app_id'];

              // $query = $connection->prepare("SELECT * FROM lumber_application WHERE lumber_app_id=:lumber_app_id");
              // $query->bindParam("lumber_application", $id, PDO::PARAM_STR);
              // $query->execute();
              // $result = $query->fetch(PDO::FETCH_ASSOC);

              
        $lumber_app = "SELECT * FROM certification_client where lumber_app_id = $nshow";
        // && Number_of_doc = $number  
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $result = mysqli_fetch_assoc($lumber_app_qry);

              
    


$lumber_app_id = $nshow ;
$name = $result['Full_Name'];
$address = $result['Address'];
$fname = $result['Furniture_name'];
$fal = $result['C_Wood_Facata'];
$gem = $result['C_Wood_Gemelina'];
$cai = $result['C_Wood_Caimito'];
$mah = $result['C_Wood_Mahogany'];
$Office = $result['Office']; 



// $lumber_app_id = $_POST["lumber_app_id"];
// $name = $_POST["name"];
// $address = $_POST["address"];
// $fname = $_POST["fname"];
// $fal = $_POST["fal"];
// $gem = $_POST["gem"];
// $cai = $_POST["cai"];
// $mah = $_POST["mah"];
// $Office = $_POST["select"]; 







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
$html = file_get_contents("templates.php");

$html = str_replace(["{{ name }}","{{ address }}", "{{ fname }}", "{{ fal }}", "{{ gem }}", "{{ cai }}", "{{ mah }}"], 
[$name,$address,$fname,$fal,$gem,$cai,$mah], $html);

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

