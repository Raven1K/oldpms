<?php

require __DIR__ . "/vendor/autoload.php";
include "../processphp/config.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$lumber_app_id = $_POST["lumber_app_id"];

$lumber_app = "SELECT * FROM validation_form where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row6 = mysqli_fetch_assoc($lumber_app_qry);
$datevalidation2 = $lumber_ap_row6['Date_verified'];

$lumber_app = "SELECT * FROM payment_feny where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row4 = mysqli_fetch_assoc($lumber_app_qry);
$refnumber = $lumber_ap_row4['Reference_Number'];

$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
$date_ = $lumber_ap_row2['date_'];


$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
$office = $lumber_ap_row3['Office'];
$Flow_stat = $lumber_ap_row3['Flow_stat'];
$Status_ = $lumber_ap_row3['Status_'];


$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row4 = mysqli_fetch_assoc($lumber_app_qry);
$cashbond = $lumber_ap_row4['cash'];
$Amount_Decimal = $lumber_ap_row4['Amount_Decimal'];


$stmt = $connection->query("SELECT 
id, Date_from
FROM calendar_sitevisit_db 
where lumber_app_id = $lumber_app_id ");

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
$datevalidationl = $row['Date_from'];


}


$stmt = $connection->query("SELECT 
lumber_app_id, Date_payment
FROM payment_feny 
where lumber_app_id = $lumber_app_id ");

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 


$datepaid = $row['Date_payment'];
}




$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];


$date_gen=date_create($date);

date_add($date_gen,date_interval_create_from_date_string("0 days"));
$date = date_format($date_gen,"F d, Y");





$owner = $_POST["owner"];
$MPdateexpiry = $_POST["MPdateexpiry"];
$MPdateissued = $_POST["MPdateissued"];
$BNNumber =	$_POST["BNNumber"];
$DTIdateissued = $_POST["DTIdateissued"];
$SCtype = '';
//$_POST["SCtype"];
$municipal = '';
//$_POST["municipal"];
$province = '';
//	$_POST["province"];
$totalsupply = '';
// $_POST["totalsupply"];
$particulars = '';
// $_POST["particulars"];
$treespecie = '';
// $_POST["treespecie"];
$lsname = '';
// $_POST["lsname"];
$yrvalidity = '';
// $_POST["yrvalidity"];

$volume = '';
// $_POST["volume"];
$DTIdateexpiry = '';
// $_POST["DTIdateexpiry"];

$yrvalidity = '';
//  $_POST["yrvalidity"];
$volume = ''; 
// $_POST["volume"];


// $lsname = $_POST["lsname"];



$lumber_app = "SELECT * FROM r_endorsement where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);




if ($lumber_ap_row) {
   
}else{



$query2 = $connection->prepare("INSERT INTO r_endorsement(

    lumber_app_id,
    ldname,
    ldaddress,
    date,
    owner,
    MPdateexpiry,
    MPdateissued,
    BNNumber,
    DTIdateissued,
    SCtype,
    municipal,
    province,
    totalsupply,
    particulars,
    treespecie,
    lsname,
    yrvalidity,
    refnumber,
    DTIdateexpiry,
    volume,
    date_,
    office

  
    )
VALUES (
    :lumber_app_id,
    :ldname,
    :ldaddress,
    :date,
    :owner,
    :MPdateexpiry,
    :MPdateissued,
    :BNNumber,
    :DTIdateissued,
    :SCtype,
    :municipal,
    :province,
    :totalsupply,
    :particulars,
    :treespecie,
    :lsname,
    :yrvalidity,
    :refnumber,
    :DTIdateexpiry,
    :volume,
    :date_,
    :office

)");
$query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query2->bindParam("ldname", $ldname, PDO::PARAM_STR);
$query2->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
$query2->bindParam("date", $date, PDO::PARAM_STR);
$query2->bindParam("owner", $owner, PDO::PARAM_STR);
$query2->bindParam("MPdateexpiry", $MPdateexpiry, PDO::PARAM_STR);
$query2->bindParam("MPdateissued", $MPdateissued, PDO::PARAM_STR);
$query2->bindParam("BNNumber", $BNNumber, PDO::PARAM_STR);
$query2->bindParam("DTIdateissued", $DTIdateissued, PDO::PARAM_STR);
$query2->bindParam("SCtype", $SCtype, PDO::PARAM_STR);
$query2->bindParam("municipal", $municipal, PDO::PARAM_STR);
$query2->bindParam("province", $province, PDO::PARAM_STR);
$query2->bindParam("totalsupply", $totalsupply, PDO::PARAM_STR);
$query2->bindParam("particulars", $particulars, PDO::PARAM_STR);
$query2->bindParam("treespecie", $treespecie, PDO::PARAM_STR);
$query2->bindParam("lsname", $lsname, PDO::PARAM_STR);
$query2->bindParam("yrvalidity", $yrvalidity, PDO::PARAM_STR);
$query2->bindParam("refnumber", $refnumber, PDO::PARAM_STR);
$query2->bindParam("DTIdateexpiry", $DTIdateexpiry, PDO::PARAM_STR);
$query2->bindParam("volume", $volume, PDO::PARAM_STR);
$query2->bindParam("date_", $date_, PDO::PARAM_STR);
$query2->bindParam("office", $office, PDO::PARAM_STR);



$result = $query2->execute();



$date =  date("m/d/Y") ; 
$inddoc = '0';
$Number_of_doc = '12';
$doc_status = 'For Review (LPDD)';
$doc_type_name = 'For Initial Generated RED Endorsement';

$sql = "UPDATE lumber_app_doc_erow SET date_applied = :date_applied, doc_type_name = :doc_type_name, doc_status = :doc_status
WHERE lumber_app_id  = $lumber_app_id && Number_of_doc = $Number_of_doc";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':date_applied' => $date,
':doc_type_name' => $doc_type_name,
':doc_status' => $doc_status,));


}







// -------------------------------------------------------------------------------


// $date2 = date('m/d/y');

// function getFullMonthNameFromDate($date3){
//  $monthName = date('F d, Y', strtotime($date3));
//  return $monthName;
//       }


//      //  $date = $row['date_recieve'] ;
//      $date3 = $date2 ;
//             getFullMonthNameFromDate($date3);




// date_default_timezone_set("Asia/Manila");
// $Time = date("h:i:sa");



//    $Title = 'RO FUS Chief review, prepare the endorsement and acknowledgement letter';
//    $Details = 'RO FUS Chief review the documents and prepare the endorsement, acknowledgement letter and the Certificate of Registration.';
   

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

// $stat_uss = 'For Review LPDD';
// $Flow_stats = '16';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));






// // -------------------PLESASE UNCOMMENT ME ------------------------------------------------------------


// date_default_timezone_set("Asia/Manila");

// $Time = date("h:i:sa");

// $date2 = date('m/d/y');

// function getFullMonthNameFromDate($date3){
//  $monthName = date('F d, Y', strtotime($date3));
//  return $monthName;
//       }


//      //  $date = $row['date_recieve'] ;
//      $date3 = $date2 ;
//             getFullMonthNameFromDate($date3);





// $Title = 'On Process CENRO Reviewer';
// // $Total_Amount1 =  $_POST['To_amount']; 

// $Details = 'On Reviewing your Documents';

// // $lumber_app = "SELECT * FROM lumber_app_doc_erow where upload_id_doc = $nshow";
// // $lumber_app_qry = mysqli_query($con, $lumber_app);
// // $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// // $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];

// $query3 = $connection->prepare("INSERT INTO client_client_document_history(
//  lumber_app_id,
//  Date,
//  Title,
//  Details,
//  Time

//  )
// VALUES (
//  :lumber_app_id,
//  :Date,
//  :Title,
//  :Details,
//  :Time
 
//  )");
// $query3->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
// $query3->bindParam("Date", $date2, PDO::PARAM_STR);
// $query3->bindParam("Title", $Title, PDO::PARAM_STR);
// $query3->bindParam("Details", $Details, PDO::PARAM_STR);y
// $query3->bindParam("Time", $Time, PDO::PARAM_STR);


// $result = $query3->execute();


// // -------------------------------------------------------------------------------

ob_start();
include "template.php";
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
$dompdf->setPaper("A4", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
// $html = file_get_contents("template.php");

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{MPdateexpiry}}", "{{MPdateissued}}", "{{BNNumber}}", "{{DTIdateissued}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{DTIdateexpiry}}", "{{lsname}}"],
// [$ldname, $ldaddress, $date, $owner, $MPdateexpiry, $MPdateissued, $BNNumber, $DTIdateissued, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $DTIdateexpiry, $lsname], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "ENDORSEMENT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("endorsement.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);