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
$falbd = '';
// $_POST["falbd"];
$macu = $_POST["macu"];
$gecu = $_POST["gecu"];
$gebd = '';
// $_POST["gebd"];
$cacu = $_POST["cacu"];
$cabd = ''; 
// $_POST["cabd"];
$mancu = $_POST["mancu"];
$manbd = '';
// $_POST["manbd"];
$bene = $_POST["bene"];
$result = $_POST["result"];
// $_POST["result"];




$query = $connection->prepare("INSERT INTO c_endorsement(lumber_app_id, name, address, cons, planted, ptpoc, ptadd, falcu, falbd, macu, gecu, gebd, cacu, cabd, mancu, manbd, bene, Total, day, month, year)
VALUES (:lumber_app_id, :name,:address,:cons,:planted,:ptpoc, :ptadd, :falcu, :falbd,  :macu,  :gecu, :gebd, :cacu, :cabd, :mancu, :manbd, :bene, :Total, :day, :month, :year)");
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

$query->bindParam("day", $mancu, PDO::PARAM_STR);
$query->bindParam("month", $manbd, PDO::PARAM_STR);
$query->bindParam("year", $bene, PDO::PARAM_STR);

$query->bindParam("Total", $result, PDO::PARAM_STR);
$result = $query->execute();



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
$query->bindParam("lumber_app_id", $id, PDO::PARAM_STR);
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








// -------------------------------------------------------------------------------















// $stat_uss = 'For Initial Chief RPS';
// $Flow_stats = '6.3';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));




$stat_uss = 'For Initial Chief RPS';
$Flow_stats = '7';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));



?>