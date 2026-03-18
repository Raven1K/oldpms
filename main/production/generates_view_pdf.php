<?php
include "../../processphp/config.php";
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;




       



          if(isset($_GET['lumber_app_id'])) {   

          $nshow = $_GET['lumber_app_id']; 

         }elseif(isset($_POST['lumber_app_id'])){

          $nshow = $_POST['lumber_app_id']; 

          }




              // $query = $connection->prepare("SELECT * FROM lumber_application WHERE lumber_app_id=:lumber_app_id");
              // $query->bindParam("lumber_application", $id, PDO::PARAM_STR);
              // $query->execute();
              // $result = $query->fetch(PDO::FETCH_ASSOC);

              
        $lumber_app = "SELECT * FROM certification_client where lumber_app_id = $nshow";
        // && Number_of_doc = $number  
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $result = mysqli_fetch_assoc($lumber_app_qry);





// $lumber_app_id = $nshow ;
// $name ='';
//  $result['Full_Name'];
// $address = '';
// $result['Address'];
// $fname = '';
// $result['Furniture_name'];
// $fal = '' ;
// $result['C_Wood_Facata'];
// $gem = '';
// $result['C_Wood_Gemelina'];
// $cai = '' ;
// $result['C_Wood_Caimito'];
// $mah = '' ;
// $result['C_Wood_Mahogany'];
// $Office =  '' ;
// $result['Office']; 



$name = $result["name"];
$address = $result["address"];
$fname = $result["fname"];
$fal = $result["fal"];
$gem = $result["gem"];
$cai = $result["cai"];
$mah = $result["mah"];
$select = $result["select_12"];
$office = $result["office"];
$province = $result["province"];
$day = $result["day"];
$month = $result["month"];
$year =  $result["year"];
$Others =  $result["Others"];

// $lumber_app_id = $_POST["lumber_app_id"];
// $name = $_POST["name"];
// $address = $_POST["address"];
// $fname = $_POST["fname"];
// $fal = $_POST["fal"];
// $gem = $_POST["gem"];
// $cai = $_POST["cai"];
// $mah = $_POST["mah"];
// $Office = $_POST["select"]; 



$nshow = $nshow;
$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = '$nshow'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);

$_office_cover = $result['Office'];
$suffix = $result['Suffix'];
$Flow_stat = $result['Flow_stat'];


// Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature 

    $lumber_app = "SELECT * FROM signatory_managerdb where official_station = '$_office_cover' && signature_type = 'Certification' && signature_order = '1'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row22 = mysqli_fetch_assoc($lumber_app_qry);
    $signature_1 = $lumber_ap_row22['signature_file'];



    $file1 = "../../admin/uploads/$signature_1";
    // Destination location where we would like to move our file
    $dest_file = 'uploads/'.$signature_1.'';


    copy($file1, $dest_file);
    if (!copy($file1, $dest_file)) {
      // echo $file." failed to copy";
    } else {
      // echo $file. " copied into " .$dest_file;
    }

// Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature 

    $lumber_app = "SELECT * FROM signatory_managerdb where official_station = '$_office_cover' && signature_type = 'Certification' && signature_order = '2'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row33 = mysqli_fetch_assoc($lumber_app_qry);
    $signature_2 = $lumber_ap_row33['signature_file'];


    $file2 = "../../admin/uploads/$signature_2";
    // Destination location where we would like to move our file
    $dest_file = 'uploads/'.$signature_2.'';


    copy($file2, $dest_file);
    if (!copy($file2, $dest_file)) {
      // echo $file." failed to copy";
    } else {
      // echo $file. " copied into " .$dest_file;
    }




    ob_start();
    include "templates.php";
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
$dompdf->setPaper("LEGAL", "portrait");

/**
 * Load the HTML and replace placeholders with values from the form
 */
// $html = file_get_contents("templates.php");

// $html = str_replace(["{{ name }}","{{ address }}", "{{ fname }}", "{{ fal }}", "{{ gem }}", "{{ cai }}", "{{ mah }}"], 

// [$name,$address,$fname,$fal,$gem,$cai,$mah], $html);

// $html = str_replace(["{{ name }}","{{ address }}", "{{ fname }}", "{{ fal }}", "{{ gem }}", "{{ cai }}", "{{ mah }}", "{{ select }}", "{{ office }}", "{{ province }}", "{{ day }}", "{{ month }}", "{{ year }}"], 
// [$name,$address,$fname,$fal,$gem,$cai,$mah,$select,$office,$province,$day,$month,$year], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "CERTIFICATION"); // "add_info" in earlier versions of Dompdf

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

