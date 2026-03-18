<?php



require_once "../../processphp/config.php";

// $name = $_POST["name"];
// $address = $_POST["address"];
// $cons = $_POST["cons"];
// $planted = $_POST["planted"];
// $ptpoc = $_POST["ptpoc"];
// $ptadd = $_POST["ptadd"];
// $falcu = $_POST["falcu"];
// $falbd = $_POST["falbd"];
// $macu = $_POST["macu"];
// $mabd = $_POST["mabd"];
// $gecu = $_POST["gecu"];
// $gebd = $_POST["gebd"];
// $cacu = $_POST["cacu"];
// $cabd = $_POST["cabd"];
// $mancu = $_POST["mancu"];
// $manbd = $_POST["manbd"];
// $bene = $_POST["bene"];
$id = $_POST["lumber_app_id"]; 
$name = $_POST["name"];
$address = $_POST["address"];
$cons = $_POST["cons"];
$planted = $_POST["planted"];
$ptpoc = $_POST["ptpoc"];
$ptadd = $_POST["ptadd"];
$falcu = $_POST["falcu"];
$falbd = $_POST["falbd"];
$macu = $_POST["macu"];
$gecu = $_POST["gecu"];
$gebd = $_POST["gebd"];
$cacu = $_POST["cacu"];
$cabd = $_POST["cabd"];
$mancu = $_POST["mancu"];
$manbd = $_POST["manbd"];
$bene = $_POST["bene"];




$query = $connection->prepare("INSERT INTO c_endorsement(lumber_app_id, name, address, cons, planted, ptpoc, ptadd, falcu, falbd, macu, gecu, gebd, cacu, cabd, mancu, manbd, bene)
VALUES (:lumber_app_id, :name,:address,:cons,:planted,:ptpoc, :ptadd, :falcu, :falbd,  :macu,  :gecu, :gebd, :cacu, :cabd, :mancu, :manbd, :bene)");
$query->bindParam("lumber_app_id", $id, PDO::PARAM_STR);
$query->bindParam("name", $name, PDO::PARAM_STR);
$query->bindParam("address", $address, PDO::PARAM_STR);
$query->bindParam("cons", $cons, PDO::PARAM_STR);
$query->bindParam("planted", $planted, PDO::PARAM_STR);
$query->bindParam("ptpoc", $ptpoc, PDO::PARAM_STR);
$query->bindParam("ptadd", $ptadd, PDO::PARAM_STR);
$query->bindParam("falcu", $falcu, PDO::PARAM_STR);
$query->bindParam("falbd", $falbd, PDO::PARAM_STR);
$query->bindParam("macu", $macu, PDO::PARAM_STR);
$query->bindParam("gecu", $gecu, PDO::PARAM_STR);
$query->bindParam("gebd", $gebd, PDO::PARAM_STR);
$query->bindParam("cacu", $cacu, PDO::PARAM_STR);
$query->bindParam("cabd", $cabd, PDO::PARAM_STR);
$query->bindParam("mancu", $mancu, PDO::PARAM_STR);
$query->bindParam("manbd", $manbd, PDO::PARAM_STR);
$query->bindParam("bene", $bene, PDO::PARAM_STR);
$result = $query->execute();



// $doc_type_name = '9. Endorsement for PENRO ';
// $date = date('m/d/y');
// $Number_of_doc = '11';
// $doc_status = 'For Review (FG)';

// $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
    // lumber_app_id,
    // doc_type_name,
    // date_applied,
    // Number_of_doc,
    // doc_status
    
    // )
// VALUES (
    // :lumber_app_id,
    // :doc_type_name,
    // :date_applied,
    // :Number_of_doc,
    // :doc_status

// )");
// $query->bindParam("lumber_app_id", $id, PDO::PARAM_STR);
// $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
// $query->bindParam("date_applied", $date, PDO::PARAM_STR);
// $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
// $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);



// $result = $query->execute();




$doc_type_name = '11 Endorsement for RED';
$date = date('m/d/y');
$Number_of_doc = '11';
$doc_status = 'For Review (FG) RED';





$sql = "UPDATE lumber_app_doc_erow SET 


doc_type_name = :doc_type_name, 
date_applied = :date_applied,
Number_of_doc = :Number_of_doc,
doc_status = :doc_status

WHERE lumber_app_id = $id && Number_of_doc = $Number_of_doc";

$stmt = $connection->prepare($sql);
$stmt->execute(array(
':doc_type_name' => $doc_type_name,  
':date_applied' => $date,
':Number_of_doc' => $Number_of_doc,
':doc_status' => $doc_status,));





//  // -------------------------------------------------------------------------------


//  $date2 = date('m/d/y');

//  function getFullMonthNameFromDate($date3){
//   $monthName = date('F d, Y', strtotime($date3));
//   return $monthName;
//        }
 
 
//       //  $date = $row['date_recieve'] ;
//       $date3 = $date2 ;
//              getFullMonthNameFromDate($date3);
 
 
 
 
//  date_default_timezone_set("Asia/Manila");
//  $Time = date("h:i:sa");
 
 
 
//     $Title = 'PENRO FUU check and received';
//     $Details = 'PENRO FUU Chief review the docs and prepare the endorsement.';
    
 
//     $query = $connection->prepare("INSERT INTO client_client_document_history(
//      lumber_app_id,
//      Date,
//      Title,
//      Details,
//      Time
 
//      )
//     VALUES (
//      :lumber_app_id,
//      :Date,
//      :Title,
//      :Details,
//      :Time
     
//      )");
//     $query->bindParam("lumber_app_id", $id, PDO::PARAM_STR);
//     $query->bindParam("Date", $date2, PDO::PARAM_STR);
//     $query->bindParam("Title", $Title, PDO::PARAM_STR);
//     $query->bindParam("Details", $Details, PDO::PARAM_STR);
//     $query->bindParam("Time", $Time, PDO::PARAM_STR);
 
    
//     $result = $query->execute();
    
 
 
 
 
 
//  // ------------------------------------------------------------------------------------------------







// $stat_uss = 'For Recommend PENRO';
// $Flow_stats = '11';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));



?>