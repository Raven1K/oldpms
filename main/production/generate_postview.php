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




?>