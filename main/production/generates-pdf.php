<?php

include "../../processphp/config.php";
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

use function PHPSTORM_META\override;

        $lumber_app_id = $_POST["lumber_app_id"];
        // $name = $_POST["name"];
        // $address = $_POST["address"];
        // $fname = $_POST["fname"];
        // $fal = $_POST["fal"];
        // $gem = $_POST["gem"];
        // $cai = $_POST["cai"];
        // $mah = $_POST["mah"];
        // $select = $_POST["select"];

        // $selectt = '';

        // $date_day = date('d');
        // $date_month = date('F');
        // $date_year = date('Y');

        // $office = '';
        // $province = '';
        // $day = $date_day;
        // $month = $date_month;
        // $year = $date_year;


        

$nshow = $lumber_app_id;
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


    


        
    

   
            // $name = $_POST["name"];

            if (isset($_POST['name'])) {
                $name = $_POST['name'] ;
            }else{
                $name = '';
            
            }

            
            if (isset($_POST['suffix'])) {
                $suffix = $_POST['suffix'] ;
            }else{
                $suffix = '';
            
            }
            
            // $address = $_POST["address"];

            if (isset($_POST['address'])) {
                $address = $_POST['address'] ;
            }else{
                $address = '';
            
            }
            
            // $fname = $_POST["fname"];

            if (isset($_POST['fname'])) {
                $fname = $_POST['fname'] ;
            }else{
                $fname = '';
            
            }

            // $fal = $_POST["fal"];

            if (isset($_POST['fal'])) {
                $fal = $_POST['fal'] ;
            }else{
                $fal = '';
            
            }

            // $gem = $_POST["gem"];

            if (isset($_POST['gem'])) {
                $gem = $_POST['gem'] ;
            }else{
                $gem = '';
            
            }
            // $cai = $_POST["cai"];

            if (isset($_POST['cai'])) {
                $cai = $_POST['cai'] ;
            }else{
                $cai = '';
            
            }

            // $mah = $_POST["mah"];

            if (isset($_POST['mah'])) {
                $mah = $_POST['mah'] ;
            }else{
                $mah = '';
            
            }

            // $select = $_POST["select"];

            if (isset($_POST['select'])) {
                $select = $_POST['select'] ;
            }else{
                $select = '';
            
            }

            // $office = $_POST["office_cover"];

            if (isset($_POST['office_cover'])) {
                $office = $_POST['office_cover'] ;
            }else{
                $office = '';
            
            }


            // $province = $_POST["province"];

            if (isset($_POST['province'])) {
                $province = $_POST['province'] ;
            }else{
                $province = '';
            
            }

            if (isset($_POST['Others'])) {
                $Others = $_POST['Others'] ;
            }else{
                $Others = '';
            
            }


            

            $day = date('d');
            $month = date('F');
            $year = date('Y');

// $office = $_POST["office"];
// $province = $_POST["province"];
// $day = $_POST["day"];
// $month = $_POST["month"];
// $year = $_POST["year"];



$signature2 = '';



// exit();

ob_start();
include "templates_short.php";
$html = ob_get_clean();
ob_end_clean();

// header ("Location: uploads/cenro_cert.php?lumber_app_id='$lumber_app_id'");

   
// exit();

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
// $html = file_get_contents("templates_short.php");

// $html = str_replace(["{{ name }}","{{ address }}", "{{ fname }}", "{{ fal }}", "{{ gem }}", "{{ cai }}", "{{ mah }}", "{{ select }}", "{{ office }}", "{{ province }}", "{{ day }}", "{{ month }}", "{{ year }}", "{{ signature2 }}"], 
// [$name,$address,$fname,$fal,$gem,$cai,$mah,$select,$office,$province,$day,$month,$year,$signature2], $html);

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






$query = $connection->prepare("INSERT INTO certification_client(
    lumber_app_id,
    name,
    address,
    fname, 
    fal, 
    gem, 
    cai, 
    mah, 
    select_12, 
    office, 
    province, 
    day,
    month, 
    year,
    Others


    )
VALUES (
    :lumber_app_id,
    :name,
    :address,
    :fname, 
    :fal, 
    :gem, 
    :cai, 
    :mah, 
    :select_12, 
    :office, 
    :province, 
    :day,
    :month, 
    :year,
    :Others

)");
$query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query->bindParam("name", $name, PDO::PARAM_STR);
$query->bindParam("address", $address, PDO::PARAM_STR);
$query->bindParam("fname", $fname, PDO::PARAM_STR);
$query->bindParam("fal", $fal, PDO::PARAM_STR);
$query->bindParam("gem", $gem, PDO::PARAM_STR);
$query->bindParam("cai", $cai, PDO::PARAM_STR);
$query->bindParam("mah", $mah, PDO::PARAM_STR);
$query->bindParam("select_12", $select, PDO::PARAM_STR);
$query->bindParam("office", $office, PDO::PARAM_STR);
$query->bindParam("province", $province, PDO::PARAM_STR);
$query->bindParam("day", $day, PDO::PARAM_STR);
$query->bindParam("month", $month, PDO::PARAM_STR);
$query->bindParam("year", $year, PDO::PARAM_STR);
$query->bindParam("Others", $Others, PDO::PARAM_STR);


$result = $query->execute();



// error_reporting(E_ALL);
// ini_set('display_errors', 1);


    $lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $lumber_app_id && Number_of_doc = '9'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


    if ($lumber_ap_row) {
       





    }else{





                $doc_type_name = 'Certification';
                $date = date('m/d/y');
                $Number_of_doc = '9';
                $doc_status = 'For Review (CG)';

                $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
                    lumber_app_id,
                    doc_type_name,
                    date_applied,
                    Number_of_doc,
                    doc_status,
                    doc_app_ind
                    
                    )
                VALUES (
                    :lumber_app_id,
                    :doc_type_name,
                    :date_applied,
                    :Number_of_doc,
                    :doc_status,
                    :doc_app_ind

                )");
                $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
                $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
                $query->bindParam("date_applied", $date, PDO::PARAM_STR);
                $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
                $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);
                $query->bindParam("doc_app_ind", $doc_status, PDO::PARAM_STR);



                $result = $query->execute();


    }



$lumber_app1 = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
// && Number_of_doc = $number
$lumber_app_qry1 = mysqli_query($con, $lumber_app1);
$lumber_ap_row1 = mysqli_fetch_assoc($lumber_app_qry1);
$provecode = $lumber_ap_row1['prov_code'];



$lumber_app = "SELECT * FROM province where prov_code = $provecode";
// && Number_of_doc = $number
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$Suffix = $lumber_ap_row['Suffix'];





// $sql = "UPDATE lumber_application SET Office = :Office, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
$sql = "UPDATE lumber_application SET Suffix = :Suffix WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Suffix' => $Suffix,));




$stat_uss = 'For Endorsement';
$Flow_stats = '6.3';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));






// header( "Location: Modal_Doc/cenro_certifcation.php?lumber_app_id=$lumber_app_id" ) ;







?>



