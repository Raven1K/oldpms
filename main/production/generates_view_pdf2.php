<?php
include "../../processphp/config.php";
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;




       



              




    $nshow = $_GET['lumber_app_id']; 

    $nshow = $nshow;
    $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = '$nshow'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $result = mysqli_fetch_assoc($lumber_app_qry);

    $_office_cover = $result['Office'];
    $suffix = $result['Suffix'];
    $Flow_stat = $result['Flow_stat'];
    $date_applied = date('Y-m-d', strtotime($result['date_applied']));

              // $query = $connection->prepare("SELECT * FROM lumber_application WHERE lumber_app_id=:lumber_app_id");
              // $query->bindParam("lumber_application", $id, PDO::PARAM_STR);
              // $query->execute();
              // $result = $query->fetch(PDO::FETCH_ASSOC);


              
              

              


        // Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature 
        
        $query = "
        SELECT * 
        FROM signatory_managerdb 
        WHERE official_station = ? 
          AND signature_type = 'Certification' 
          AND signature_order = '1'
          AND (
              ? BETWEEN date_started AND date_ended 
              OR date_ended = ''
          )
    ";
    
        $stmt = mysqli_prepare($con, $query);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $_office_cover, $date_applied);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        
        // Fetch data
        if ($result) {
            $lumber_ap_row22 = mysqli_fetch_assoc($result);
            $signature_1 = $lumber_ap_row22['signature_file'];
        } else {
            echo "Query failed: " . mysqli_error($con);
        }
        
        
        
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
        $query = "
        SELECT * 
        FROM signatory_managerdb 
        WHERE official_station = ? 
          AND signature_type = 'Certification' 
          AND signature_order = '2'
          AND (
              ? BETWEEN date_started AND date_ended 
              OR date_ended = ''
          )
      ";
      
      $stmt = mysqli_prepare($con, $query);
      
      // Bind parameters
      mysqli_stmt_bind_param($stmt, "ss", $_office_cover, $date_applied);
      
      // Execute the query
      mysqli_stmt_execute($stmt);
      
      // Get the result
      $result = mysqli_stmt_get_result($stmt);
      
      // Fetch data
      if ($result) {
          $lumber_ap_row33 = mysqli_fetch_assoc($result);
          $signature_2 = $lumber_ap_row33['signature_file'];
      } else {
          echo "Query failed: " . mysqli_error($con);
      }
        
        
            $file2 = "../../admin/uploads/$signature_2";
            // Destination location where we would like to move our file
            $dest_file = 'uploads/'.$signature_2.'';
        
        
            copy($file2, $dest_file);
            if (!copy($file2, $dest_file)) {
              // echo $file." failed to copy";
            } else {
              // echo $file. " copied into " .$dest_file;
            }



            $lumber_app_query = "SELECT * FROM certification_client WHERE lumber_app_id = ?";
            $stmt = mysqli_prepare($con, $lumber_app_query);
            
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "i", $nshow);
            
            // Execute query
            mysqli_stmt_execute($stmt);
            
            // Get result
            $result = mysqli_stmt_get_result($stmt);
            
            // Fetch data
            if ($row = mysqli_fetch_assoc($result)) {
                $name = $row["name"];
                $address = $row["address"];
                $fname = $row["fname"];
                $fal = $row["fal"];
                $gem = $row["gem"];
                $cai = $row["cai"];
                $mah = $row["mah"];
                $select = $row["select_12"];
                $office = $row["office"];
                $province = $row["province"];
                $day = $row["day"];
                $month = $row["month"];
                $year = $row["year"];
                $Others = $row["Others"];
            } else {
                // Handle case where no rows are returned
                // For example:
                // echo "No data found";
            }


// $lumber_app_id = $_POST["lumber_app_id"];
// $name = $_POST["name"];
// $address = $_POST["address"];
// $fname = $_POST["fname"];
// $fal = $_POST["fal"];
// $gem = $_POST["gem"];
// $cai = $_POST["cai"];
// $mah = $_POST["mah"];
// $Office = $_POST["select"]; 




    ob_start();
    include "templates_short.php";
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

              
//         $lumber_app = "SELECT * FROM certification_client where lumber_app_id = $nshow";
//         // && Number_of_doc = $number  
//         $lumber_app_qry = mysqli_query($con, $lumber_app);
//         $result = mysqli_fetch_assoc($lumber_app_qry);

              
    


// $lumber_app_id = $nshow ;
// $name = $result['Full_Name'];
// $address = $result['Address'];
// $fname = $result['Furniture_name'];
// $fal = $result['C_Wood_Facata'];
// $gem = $result['C_Wood_Gemelina'];
// $cai = $result['C_Wood_Caimito'];
// $mah = $result['C_Wood_Mahogany'];
// $Office = $result['Office']; 


// // [$name,$address,$fname,$fal,$gem,$cai,$mah], $html);


// // $lumber_app_id = $_POST["lumber_app_id"];
// // $name = $_POST["name"];
// // $address = $_POST["address"];
// // $fname = $_POST["fname"];
// // $fal = $_POST["fal"];
// // $gem = $_POST["gem"];
// // $cai = $_POST["cai"];
// // $mah = $_POST["mah"];
// // $Office = $_POST["select"]; 







// /**
//  * Set the Dompdf options
//  */
// $options = new Options;
// $options->setChroot(__DIR__);
// $options->setIsRemoteEnabled(true);

// $dompdf = new Dompdf($options);

// /**
//  * Set the paper size and orientation
//  */
// $dompdf->setPaper("LEGAL", "portrait");

// /**
//  * Load the HTML and replace placeholders with values from the form
//  */
// $html = file_get_contents("templates.php");

// $html = str_replace(["{{ name }}","{{ address }}", "{{ fname }}", "{{ fal }}", "{{ gem }}", "{{ cai }}", "{{ mah }}"], 
// [$name,$address,$fname,$fal,$gem,$cai,$mah], $html);

// $dompdf->loadHtml($html);
// /**
//  * Create the PDF and set attributes
//  */
// $dompdf->render();

// $dompdf->addInfo("Title", "ENDORSEMENT"); // "add_info" in earlier versions of Dompdf

// /**
//  * Send the PDF to the browser
//  */
// $dompdf->stream("endorsement.pdf", ["Attachment" => 0]);

// /**
//  * Save the PDF file locally
//  */
// $output = $dompdf->output();
// file_put_contents("file.pdf", $output);







?>

