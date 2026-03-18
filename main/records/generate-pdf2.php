<?php

require __DIR__ . "/vendor/autoload.php";

require_once "../../processphp/config.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$date =  date("m/d/Y") ; 

// $lumber_app_id = '334';   
$lumber_app_id = $_POST["lumber_app_id"];
$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];
$owner = $_POST["owner"];
$municipal = $_POST["municipal"];
$province =	$_POST["province"];
$regnumber = $_POST["regnumber"];
$surname = $_POST["perm_lname"];
$status = $_POST["status"];
$dateclient = $date ;

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
$dompdf->setPaper("A4", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template2.php");

$html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{municipal}}", "{{status}}", "{{province}}", "{{dateclient}}", "{{regnumber}}", "{{surname}}"],[$ldname, $ldaddress, $date, $owner, $municipal, $status, $province, $dateclient, $regnumber, $surname], $html);

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







  








// -------------------------------------------------------------------------------
$lumber_app = "SELECT * FROM endorsement_form_for_release where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);



if ($lumber_ap_row) {


        

} else {



        $query = $connection->prepare("INSERT INTO endorsement_form_for_release(

                lumber_app_id,
                ldname,
                ldaddress,
                date,
                owner,
                municipal,
                province,
                regnumber,
                status,
                dateclient,
                surname
        
        
            )
        VALUES (
        
                :lumber_app_id,
                :ldname,
                :ldaddress,
                :date,
                :owner,
                :municipal,
                :province,
                :regnumber,
                :status,
                :dateclient,
                :surname
        
        
        )");
        $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
        $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
        $query->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
        $query->bindParam("date", $date, PDO::PARAM_STR);
        $query->bindParam("owner", $owner, PDO::PARAM_STR);
        $query->bindParam("municipal", $municipal, PDO::PARAM_STR);
        $query->bindParam("province", $province, PDO::PARAM_STR);
        $query->bindParam("regnumber", $regnumber, PDO::PARAM_STR);
        $query->bindParam("status", $status, PDO::PARAM_STR);
        $query->bindParam("dateclient", $dateclient, PDO::PARAM_STR);
        $query->bindParam("surname", $surname, PDO::PARAM_STR);
        
        
        $result = $query->execute();
        





}
//    $Title = 'Client';
//    $Details = 'E-Permit is now available for download.'.'<br> <br> '.'
   
//    Accomplished Client Satisfaction Survey (CSS)'.'<br> <br> '.'
   
//    Acknowledged'.'<br> <br> '.'

//    Downloaded and Printed E-Permit'.'<br> <br> '.'

//    Note: Kindly share your time to accomplish the Client Satisfaction Survey (CSS) for us to further improve our services to you.
//    ';
   

//    $query2 = $connection->prepare("INSERT INTO client_client_document_history(
//     lumber_app_id,
//     Date,
//     Title,
//     Details,
//     Time

//     )
//    VALUES (
//     :lumber_app_id,
//     :Date,
//     :Title,
//     :Details,
//     :Time
    
//     )");
//    $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
//    $query2->bindParam("Date", $date2, PDO::PARAM_STR);
//    $query2->bindParam("Title", $Title, PDO::PARAM_STR);
//    $query2->bindParam("Details", $Details, PDO::PARAM_STR);
//    $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
//    $result2 = $query2->execute();



//    $Title = 'For acknowledged';
//    $Details = 'Permittee acknowledged the letter, rate the CSS Form and print the e-Certificate of Registration Click View to Acknowlege .';
   

//    $query2 = $connection->prepare("INSERT INTO client_client_document_history(
//     lumber_app_id,
//     Date,
//     Title,
//     Details,
//     Time

//     )
//    VALUES (
//     :lumber_app_id,
//     :Date,
//     :Title,
//     :Details,
//     :Time
    
//     )");
//    $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
//    $query2->bindParam("Date", $date2, PDO::PARAM_STR);
//    $query2->bindParam("Title", $Title, PDO::PARAM_STR);
//    $query2->bindParam("Details", $Details, PDO::PARAM_STR);
//    $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
//    $result2 = $query2->execute();
   
   





// ------------------------------------------------------------------------------------------------











?>