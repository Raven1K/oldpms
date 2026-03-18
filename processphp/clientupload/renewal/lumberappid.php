<?php
// Initialize the session




$query = $connection->prepare("SELECT * FROM lumber_application WHERE uniqid_lapp=:uniqid_lapp");
$query->bindParam("uniqid_lapp", $uniqid_lap, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
if (!$result) {




} else {



    $idkeylumber = $result['lumber_app_id'];


}
?>