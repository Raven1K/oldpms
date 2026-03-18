<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;
include "../processphp/config.php";

$lumber_app_id = $_POST["lumber_app_id"];
$ldname = $_POST["ldname"];
$ldaddress = $_POST["ldaddress"];
$date =	$_POST["date"];
$owner = $_POST["owner"];


$SCtype = '';
$municipal = '';
$province =	'';
$totalsupply = '';
$particulars = '';

$treespecie = "";
// $_POST["treespecie"];
$lsname = '';
$yrvalidity = '';
$volume = '';

$refnumber = $_POST["refnumber"];
$regnumber = $_POST["regnumber"];
// $lsname = $_POST["lsname"];
$SCregnumber = '';
$status = $_POST['application_status'];

$dateissued = date_create(date('Y-m-d'));
date_add($dateissued,date_interval_create_from_date_string("365 days"));
$dateexpiry = date_format($dateissued,"F d, Y");

// $date=date_create("2020-03-15");
// date_add($date,date_interval_create_from_date_string("350 days"));
// echo date_format($date,"Y-m-d");

$datepaid = $_POST["datepaid"];



$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);
$cashbond = $result['cash'];






$query = $connection->prepare("INSERT INTO lumber_dealer_e_permit_form(

    lumber_app_id,
    ldname,
    ldaddress,
    date,
    owner,
    SCtype,
    municipal,
    province,
    totalsupply,
    particulars,
    treespecie,
    lsname,
    yrvalidity,
    volume,
    refnumber,
    regnumber,
    SCregnumber,
    datepaid,
    status

      
        )
    VALUES (
    :lumber_app_id,  
    :ldname,
    :ldaddress,
    :date,
    :owner,
    :SCtype,
    :municipal,
    :province,
    :totalsupply,
    :particulars,
    :treespecie,
    :lsname,
    :yrvalidity,
    :volume,
    :refnumber,
    :regnumber,
    :SCregnumber,
    :datepaid,
    :status


    
    )");
    $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
    $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
    $query->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
    $query->bindParam("date", $date, PDO::PARAM_STR);
    $query->bindParam("owner", $owner, PDO::PARAM_STR);
    $query->bindParam("SCtype", $SCtype, PDO::PARAM_STR);
    $query->bindParam("municipal", $municipal, PDO::PARAM_STR);
    $query->bindParam("province", $province, PDO::PARAM_STR);
    $query->bindParam("totalsupply", $totalsupply, PDO::PARAM_STR);
    $query->bindParam("particulars", $particulars, PDO::PARAM_STR);
    $query->bindParam("treespecie", $treespecie, PDO::PARAM_STR);
    $query->bindParam("lsname", $lsname, PDO::PARAM_STR);
    $query->bindParam("yrvalidity", $yrvalidity, PDO::PARAM_STR);
    $query->bindParam("volume", $volume, PDO::PARAM_STR);
    $query->bindParam("refnumber", $refnumber, PDO::PARAM_STR);
    $query->bindParam("regnumber", $regnumber, PDO::PARAM_STR);
    $query->bindParam("lsname", $lsname, PDO::PARAM_STR);
    $query->bindParam("SCregnumber", $SCregnumber, PDO::PARAM_STR);
    $query->bindParam("datepaid", $datepaid, PDO::PARAM_STR);
    $query->bindParam("status", $status, PDO::PARAM_STR);

    $result = $query->execute();









ob_start();
include "template1.php";
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
$dompdf->setPaper("legal", "landscape");
/**
 * Load the HTML and replace placeholders with values from the form
 */
// $html = file_get_contents("template1.php");

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}", "{{datepaid}}", "{{status}}"],

// [$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber, $datepaid, $status], $html);

// Red Code 

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}", "{{dateissued}}", "{{dateissued}}"],[$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber, $dateissued, $dateexpiry], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "E-PERMIT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("endorsement.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);











// $lumber_app_id = $_GET["lumber_app_id"];

$date =  date("m/d/Y") ; 
$inddoc = '0';
$Number_of_doc = '13';
$doc_status = 'For Review (LPDD) CF';
$doc_type_name = 'Lumber Dealer E-Permit';

$sql = "UPDATE lumber_app_doc_erow SET date_applied = :date_applied, doc_type_name = :doc_type_name, doc_status = :doc_status
WHERE lumber_app_id  = $lumber_app_id && Number_of_doc = $Number_of_doc";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':date_applied' => $date,
':doc_type_name' => $doc_type_name,
':doc_status' => $doc_status,));


// _______________________________________________________

$stat_uss = 'For Review LPDD';
$Flow_stats = '14';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));






// header( "Location: evaluation.php?lumber_app_id='$lumber_app_id'" ) ;




?>