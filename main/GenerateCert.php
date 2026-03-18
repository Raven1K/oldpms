<?php
session_start();
include "../processphp/config.php";


// use Dompdf\Dompdf;
// use Dompdf\Options;


// $ldname = $_POST["ldname"];
// $ldaddress = $_POST["ldaddress"];
// $date =	$_POST["date"];
// $owner = $_POST["owner"];
// $MPdateexpiry = $_POST["MPdateexpiry"];
// $MPdateissued = $_POST["MPdateissued"];
// $BNNumber =	$_POST["BNNumber"];
// $DTIdateissued = $_POST["DTIdateissued"];
// $SCtype = $_POST["SCtype"];
// $municipal = $_POST["municipal"];
// $province =	$_POST["province"];
// $totalsupply = $_POST["totalsupply"];
// $particulars = $_POST["particulars"];
// $treespecie = $_POST["treespecie"];
// $lsname = $_POST["lsname"];
// $yrvalidity = $_POST["yrvalidity"];
// $volume	= $_POST["volume"];
// $refnumber = $_POST["refnumber"];
// $DTIdateexpiry = $_POST["DTIdateexpiry"];
// // $lsname = $_POST["lsname"];



// $query = $connection->prepare("INSERT INTO r_endorsement(
//     lumber_app_id,
//     ldname,
//     ldaddress,
//     date,
//     owner,
//     MPdateexpiry,
//     MPdateissued,
//     BNNumber,
//     DTIdateissued,
//     SCtype,
//     municipal,
//     province,
//     totalsupply,
//     particulars,
//     treespecie,
//     lsname,
//     yrvalidity,
//     volume,
//     refnumber,
//     DTIdateexpiry
  
//     )
// VALUES (
//     :lumber_app_id,
//     :ldname,
//     :ldaddress,
//     :date,
//     :owner,
//     :MPdateexpiry,
//     :MPdateissued,
//     :BNNumber,
//     :DTIdateissued,
//     :SCtype,
//     :municipal,
//     :province,
//     :totalsupply,
//     :particulars,
//     :treespecie,
//     :lsname,
//     :yrvalidity,
//     :volume,
//     :refnumber,
//     :DTIdateexpiry

// )");
// $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
// $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
// $query->bindParam("ldaddress", $ldaddress, PDO::PARAM_STR);
// $query->bindParam("date", $date, PDO::PARAM_STR);
// $query->bindParam("owner", $owner, PDO::PARAM_STR);
// $query->bindParam("MPdateexpiry", $MPdateexpiry, PDO::PARAM_STR);
// $query->bindParam("MPdateissued", $MPdateissued, PDO::PARAM_STR);
// $query->bindParam("BNNumber", $BNNumber, PDO::PARAM_STR);
// $query->bindParam("DTIdateissued", $DTIdateissued, PDO::PARAM_STR);
// $query->bindParam("SCtype", $SCtype, PDO::PARAM_STR);
// $query->bindParam("municipal", $municipal, PDO::PARAM_STR);
// $query->bindParam("province", $province, PDO::PARAM_STR);
// $query->bindParam("totalsupply", $totalsupply, PDO::PARAM_STR);
// $query->bindParam("particulars", $particulars, PDO::PARAM_STR);
// $query->bindParam("treespecie", $treespecie, PDO::PARAM_STR);
// $query->bindParam("lsname", $lsname, PDO::PARAM_STR);
// $query->bindParam("yrvalidity", $yrvalidity, PDO::PARAM_STR);
// $query->bindParam("volume", $volume, PDO::PARAM_STR);
// $query->bindParam("refnumber", $refnumber, PDO::PARAM_STR);
// $query->bindParam("DTIdateexpiry", $DTIdateexpiry, PDO::PARAM_STR);


// $result = $query->execute();

$lumber_app_id = $_GET["lumber_app_id"];

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


$stat_uss = 'For Recommend (RO)';
$Flow_stats = '15';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));



// -------------------------------------------------------------------------------


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



   $Title = 'Chief LPDD';
   $Details = 'Chief LPDD reviewed the documents and recommend the approval of the endorsement to ARD TS.';
   

   $query2 = $connection->prepare("INSERT INTO client_client_document_history(
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
   $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
   $query2->bindParam("Date", $date2, PDO::PARAM_STR);
   $query2->bindParam("Title", $Title, PDO::PARAM_STR);
   $query2->bindParam("Details", $Details, PDO::PARAM_STR);
   $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result2 = $query2->execute();
   





// ------------------------------------------------------------------------------------------------



header( "Location: generate_viewLumberEdealer.php?lumber_app_id=$lumber_app_id" ) ;



?>
