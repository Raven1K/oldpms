<?php
session_start ();
require __DIR__ . "/vendor/autoload.php";


use Dompdf\Dompdf;
use Dompdf\Options;



require_once "../../processphp/config.php";

// $lumber_app_id = $_POST['lumber_app_id'];


if(isset($_GET['lumber_app_id'])) {   

    $lumber_app_id = $_GET['lumber_app_id']; 

   }elseif(isset($_POST['lumber_app_id'])){

    $lumber_app_id = $_POST['lumber_app_id']; 

    }



    $province = isset($_POST["province"]) ? $_POST["province"] : "";
    $office_under = isset($_POST["office_under"]) ? $_POST["office_under"] : "";
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : "";
    $penroaddress = isset($_POST['penroaddress']) ? $_POST['penroaddress'] : "";
    $bussiness_name = isset($_POST['bussiness_name']) ? $_POST['bussiness_name'] : "";
    $office_address = isset($_POST['office_address']) ? $_POST['office_address'] : "";
    
    $MPdateissued = isset($_POST['mpissued']) ? $_POST['mpissued'] : "";
    $MPdateexpiry = isset($_POST['mpexpiry']) ? $_POST['mpexpiry'] : "";
    $BNNumber = isset($_POST['bnissued']) ? $_POST['bnissued'] : "";
    $DTIdateissued = isset($_POST['dtissued']) ? $_POST['dtissued'] : "";
    $DTIdateexpiry = isset($_POST['dtiexpiry']) ? $_POST['dtiexpiry'] : "";
    
    if(empty($MPdateissued) || empty($MPdateexpiry) || empty($DTIdateissued) || empty($DTIdateexpiry)) {

                // If all conditions are met, open "p_endorsement" table and filter "lumber_app_id"
                $p_endorsement_query = "SELECT * FROM c_endorsement WHERE lumber_app_id = $lumber_app_id";
                $p_endorsement_result = mysqli_query($con, $p_endorsement_query);
                
                // Check if there are rows in the result
                if(mysqli_num_rows($p_endorsement_result) > 0) {
                    // Display the rows
                    echo "<table>";
                    while($row = mysqli_fetch_assoc($p_endorsement_result)) {
                  
                        $MPdateissued =  $row['MPdateissued'] ;
                        $MPdateexpiry = $row['MPdateexpiry'];
                        $DTIdateissued = $row['DTIdateissued'];
                        $DTIdateexpiry = $row['DTIdateexpiry'];
        
                    }
       
                    


    } else {

        echo '<script>alert("Bussiness permit should not be empty");</script>';
        echo '<script>
            setTimeout(function() {
                window.close(); // Close the current tab
            }, 1000); // Close the tab after 1 seconds (1000 milliseconds)
          </script>';
        exit();

 
            echo "No rows found in p_endorsement table for lumber_app_id = $lumber_app_id";
        }
    }

    
$date_ = date('F d, Y');

//echo "template_short.php?$lumber_app_id" ;

$nshow = $lumber_app_id;
$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = '$nshow'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);

$_office_cover = $result['Office'];
$suffix = $result['Suffix'];
$Flow_stat = $result['Flow_stat'];
$date_applied = $result['date_applied'];  


// Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature Signature 

$query = "
    SELECT * 
    FROM signatory_managerdb 
    WHERE official_station = ? 
      AND signature_type = 'Endorsement' 
      AND signature_order = '1'
      AND (
          (? BETWEEN date_started AND date_ended) 
          OR date_ended = ''
      )
";

// Prepare the statement
$stmt = $con->prepare($query);

// Check for errors
if (!$stmt) {
    die("Prepare failed: " . $con->error);
}

// Bind parameters: "ss" means two strings
$stmt->bind_param("ss", $_office_cover, $date_applied);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the row
$row = $result->fetch_assoc();

// Get the signature file or set null if not found
$signature_1 = $row['signature_file'] ?? null;





    $file1 = "../../admin/uploads/$signature_1";
    // Destination location where we would like to move our file
    $dest_file = 'uploads/'.$signature_1.'';


    copy($file1, $dest_file);
    if (!copy($file1, $dest_file)) {
      // echo $file." failed to copy";
    } else {
      // echo $file. " copied into " .$dest_file;
    }







                                                        $stmt = $connection->query("SELECT 
                                                        lumber_app_id, SUM(result), Species, ownername, validity_val, office_cover
                                                        FROM supp_contdetails  
                                                        where lumber_app_id = $lumber_app_id ");


                                                         

                                                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                                                        $totalsupply = $row['SUM(result)'];
                                                        $treespecie = $row['Species'];
                                                        $lsname = $row['ownername'];
                                                        $yrvalidity = $row['validity_val'];
                                                        $office_cover = $row['office_cover'];
                                                        }


                                                        $stmt = $connection->query("SELECT 
                                                        id, Date_from
                                                        FROM calendar_sitevisit_db 
                                                        where lumber_app_id = $lumber_app_id ");

                                                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                                                        $datevalidation = $row['Date_from'];
                                                        }

                                                        $stmt = $connection->query("SELECT 
                                                        lumber_app_id, Reference_Number
                                                        FROM payment_feny 
                                                        where lumber_app_id = $lumber_app_id ");

                                                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                                                        $refnumber = $row['Reference_Number'];
                                                        }
                                 
                                                        $stmt = $connection->query("SELECT 
                                                        lumber_app_id, Date_payment
                                                        FROM payment_feny 
                                                        where lumber_app_id = $lumber_app_id ");

                                                        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


                                                        $datepaid = $row['Date_payment'];
                                                        }

                                                        $lumber_app = "SELECT * FROM lumber_application where lumber_app_id  = $lumber_app_id";
                                                        $lumber_app_qry = mysqli_query($con, $lumber_app);
                                                        $result_municipal = mysqli_fetch_assoc($lumber_app_qry);

                                                        $municipal_qry = $result_municipal['muncity_code'];
                                                        $province_qry = $result_municipal['prov_code'];
                                                        $ldname_qry = $result_municipal['perm_fname']. ' ' .$result_municipal['perm_lname'];
                                                        $full_address = $result_municipal['full_address'];
                                                        $office_qry_result = $result_municipal['Office'];
                                                        $Status_ = $result_municipal['Status_'];
                
                                                        $lumber_app = "SELECT * FROM muncity where mun_code  = $municipal_qry";
                                                        $lumber_app_qry = mysqli_query($con, $lumber_app);
                                                        $result_municipal = mysqli_fetch_assoc($lumber_app_qry);
                                                        
                                                        $municipal_qry_result =  $result_municipal['muncity_name']; 

                                                        $lumber_app = "SELECT * FROM province where prov_code = $province_qry";
                                                        $lumber_app_qry = mysqli_query($con, $lumber_app);
                                                        $result_prov_name = mysqli_fetch_assoc($lumber_app_qry);

                                                        $prov_name = $result_prov_name['prov_name'];

                                                        $lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $lumber_app_id && Number_of_doc = '8'";
                                                        $lumber_app_qry = mysqli_query($con, $lumber_app);
                                                        $result_date_applied = mysqli_fetch_assoc($lumber_app_qry);

                                                        $date_applied = $result_date_applied['date_approved'];


                                                        $lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
                                                        $lumber_app_qry = mysqli_query($con, $lumber_app);
                                                        $result_orderofpayment = mysqli_fetch_assoc($lumber_app_qry);

                                                         $cashbond = $result_orderofpayment['cash'];
                                                         $Amount_Decimal = $result_orderofpayment['Amount_Decimal'];
                                                        



// $datevalidation = date($date_applied, ('F d, Y'));

$date_gen=date_create($date_applied);

date_add($date_gen,date_interval_create_from_date_string("0 days"));
$datevalidation = date_format($date_gen,"F d, Y");






$owner = $full_name ;
$ldaddress = $full_address ;
$ldname = $ldname_qry;
$SCtype = "" ;
$municipal = $municipal_qry_result;
$province2 = $prov_name ;
// $totalsupply = "" ;
$particulars ="Chainsaw-cut Lumbers" ;
$date_ = date('F d, Y');











$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);




if ($lumber_ap_row)  {


    $office_address = $lumber_ap_row['office_address'];

    
}else{

                    $query = $connection->prepare("INSERT INTO c_endorsement(
                                                        

                            lumber_app_id,
                            office_address,
                            office_under,
                            penroaddress,
                            bussiness_name,
                            date_,
                            full_address,
                            ldname,
                            full_name,
                            ldaddress,
                            MPdateissued,
                            MPdateexpiry,
                            BNNumber,
                            DTIdateissued,
                            DTIdateexpiry,
                            municipal_qry_result,
                            datevalidation,
                            refnumber,
                            datepaid
                        
                        )
                        VALUES (
                        
                            :lumber_app_id,
                            :office_address,
                            :office_under,
                            :penroaddress,
                            :bussiness_name,
                            :date_,
                            :full_address,
                            :ldname,
                            :full_name,
                            :ldaddress,
                            :MPdateissued,
                            :MPdateexpiry,
                            :BNNumber,
                            :DTIdateissued,
                            :DTIdateexpiry,
                            :municipal_qry_result,
                            :datevalidation,
                            :refnumber,
                            :datepaid
                        
                        
                        
                        )");
                        
                        $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
                        $query->bindParam("office_address", $office_address, PDO::PARAM_STR);
                        $query->bindParam("office_under", $office_under, PDO::PARAM_STR);
                        $query->bindParam("penroaddress", $penroaddress, PDO::PARAM_STR);
                        $query->bindParam("bussiness_name", $bussiness_name, PDO::PARAM_STR);
                        $query->bindParam("date_", $date_, PDO::PARAM_STR);
                        $query->bindParam("full_address", $full_address, PDO::PARAM_STR);
                        $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
                        $query->bindParam("full_name", $full_name, PDO::PARAM_STR);
                        $query->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
                        $query->bindParam("MPdateissued", $MPdateissued, PDO::PARAM_STR);
                        $query->bindParam("MPdateexpiry", $MPdateexpiry, PDO::PARAM_STR);
                        $query->bindParam("BNNumber", $BNNumber, PDO::PARAM_STR);
                        $query->bindParam("DTIdateissued", $DTIdateissued, PDO::PARAM_STR);
                        $query->bindParam("DTIdateexpiry", $DTIdateexpiry, PDO::PARAM_STR);
                        $query->bindParam("municipal_qry_result", $municipal_qry_result, PDO::PARAM_STR);
                        $query->bindParam("datevalidation", $datevalidation, PDO::PARAM_STR);
                        $query->bindParam("refnumber", $refnumber, PDO::PARAM_STR);
                        $query->bindParam("datepaid", $datepaid, PDO::PARAM_STR);
                        $result = $query->execute();
                        

}


ob_start();
include "template_short.php";
$html = ob_get_clean();
ob_end_clean();


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

// require_once 'generate_post.php';





// exit();




$lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $lumber_app_id && Number_of_doc = '10'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);




if ($lumber_ap_row) {
   





}else{



                $doc_type_name = 'Endorsement for PENRO ';
                $date = date('m/d/y');
                $Number_of_doc = '10';
                $doc_status = 'For Review (FG)';

                $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
                    lumber_app_id,
                    doc_type_name,
                    date_applied,
                    Number_of_doc,
                    doc_status
                    
                    )
                VALUES (
                    :lumber_app_id,
                    :doc_type_name,
                    :date_applied,
                    :Number_of_doc,
                    :doc_status

                )");
                $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
                $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
                $query->bindParam("date_applied", $date, PDO::PARAM_STR);
                $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
                $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);



                $result = $query->execute();

            


// -------------------------------------------------------------------------------


date_default_timezone_set("Asia/Manila");

$Time = date("h:i:sa");

$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3){
 $monthName = date('F d, Y', strtotime($date3));
 return $monthName;
      }


     //  $date = $row['date_recieve'] ;
     $date3 = $date2 ;
            getFullMonthNameFromDate($date3);




date_default_timezone_set("Asia/Manila");
$Time = date("h:i:sa");



   $Title = 'Chief, RPS';
   $Details = 'Document reviewed and application endorsed to the Deputy CENRO.';
   

   $query = $connection->prepare("INSERT INTO client_client_document_history(
    lumber_app_id,
    Date,
    Title,
    Details,
    Time

    )
   VALUES (
    :lumber_app_id,
    :Date,
    :Title,
    :Details,
    :Time
    
    )");
   $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
   $query->bindParam("Date", $date2, PDO::PARAM_STR);
   $query->bindParam("Title", $Title, PDO::PARAM_STR);
   $query->bindParam("Details", $Details, PDO::PARAM_STR);
   $query->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result = $query->execute();
   


//    $stat_uss = 'For Initial Chief RPS';
//    $Flow_stats = '7';
   
//    // Ensure $lumber_app_id is defined and sanitized
//    // For example, $lumber_app_id = 123; // Replace with your actual value
   
//    $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = :lumber_app_id";
//    $stmt = $connection->prepare($sql);
//    $stmt->execute(array(
//        ':Status'        => $stat_uss,
//        ':Flow_stat'     => $Flow_stats,
//        ':lumber_app_id' => $lumber_app_id
//    ));
   
    

}





?>

