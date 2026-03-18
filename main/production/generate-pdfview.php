<?php
session_start ();
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

    // $name = $_POST["name"];
    // $address = $_POST["address"];
    // $cons = $_POST["cons"];
    // $planted = $_POST["planted"];
    // $ptpoc = $_POST["ptpoc"];
    // $ptadd = $_POST["ptadd"];
    // $falcu = $_POST["falcu"];
    // $macu = $_POST["macu"];
    // $gecu = $_POST["gecu"];
    // $cacu = $_POST["cacu"];
    // $mancu = $_POST["mancu"];
    // $bene = $_POST["bene"];
    // $result = $_POST["Total"];

    $l_id = $_POST['lumber_app_id'];

    // $lumber_app3 = "SELECT * FROM c_endorsement where lumber_app_id = $l_id  ";
    // $lumber_app_qry3 = mysqli_query($con, $lumber_app3);
    // $lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry3);
    





                    // $name = $_POST["name"];
                    // $address =  $_POST["address"];
                    // $office_address =  $_POST["office_address"];
                    // $cons =  $_POST["cons"];
                    // $planted = $_POST["planted"];
                    // $ptpoc =  $_POST["ptpoc"];
                    // $ptadd =   $_POST["ptadd"];

                    // $falcu = $_POST["falcu"];
                    // $macu =  $_POST["macu"];
                    // $gecu =  $_POST["gecu"];
                    // $cacu =  $_POST["cacu"];
                    // $mancu =  $_POST["mancu"];
                    // $bene = $_POST["bene"];
                    
                    $name = $_POST["name"];
                    $address =  $_POST["address"];
                    $office_address =  $_POST["office_address"];
                    $cons =  $_POST["cons"];
                    $planted = $_POST["planted"];
                    $ptpoc =  $_POST["ptpoc"];
                    $ptadd =   $_POST["ptadd"];

                    $falcu = $_POST["falcu"];
                    $macu =  $_POST["macu"];
                    $gecu =  $_POST["gecu"];
                    $cacu =  $_POST["cacu"];
                    $mancu =  $_POST["mancu"];
                    $bene = $_POST["bene"];

                    // $date = date('F d, Y');
    
                    $day = $_POST["_day"];
                    $month = $_POST["_month"];
                    $year = $_POST["_year"];
                    $result = $_POST["Total"];
                    
                    
                    // $name = 'fdg';
                    // $address = 'fdg';
                    // $cons =  'fdg';
                    // $planted = 'fdg';
                    // $ptpoc = 'fdg';
                    // $ptadd =  'fdg';

                    // $falcu = 'fdg';
                    // $macu =  'fdg';
                    // $gecu = 'fdg';
                    // $cacu =  'fdg';
                    // $mancu = 'fdg';
                    // $bene = 'fdg';
                    
                    
                

                  //   $a_total = array($falcu, $macu, $gecu, $cacu, $mancu, $bene);

                  // $b_total =   array_sum($a_total);

            

                    
          //   if (isset($_POST['result'])) {
          //     $result = $_POST['result'] ;
          // }else{
          //     $result = '';
          
          // }

                    // $result = $lumber_ap_row3["Total"];

// require_once 'generate_post.php';


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
$html = file_get_contents("template.php");


$html = str_replace(["{{ office_address }}", "{{ name }}", "{{ address }}", "{{ cons }}", "{{ planted }}", "{{ ptpoc }}", "{{ ptadd }}", "{{ falcu }}", "{{ macu }}", 
"{{ gecu }}", "{{ cacu }}", "{{ mancu }}", "{{ bene }}", "{{ result }}", "{{ day }}", "{{ month }}", "{{ year }}"], 
[$office_address, $name,$address,$cons,$planted,$ptpoc,$ptadd,$falcu,$macu,$gecu,$cacu,$mancu,$bene,$result,$day,$month,$year], $html);

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