<?php

require_once "../../processphp/config.php";


$date =  date("m/d/Y") ; 
$inddoc = '1';
$inddoc2 = '0';
$docstat = 'Approved';
$docstat2 = 'Disapproved';
// $id_name = '36';
$dtdis = "";

if ( isset($_POST['Approve']) && isset($_POST['name_app_doc']) ) {
  $sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
  doc_app_ind = :doc_app_ind, doc_status = :doc_status
  WHERE upload_id_doc  = $nshow";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':date_approved' => $date,
':date_disapprove' => $dtdis,
':doc_app_ind' => $inddoc,
':doc_status' => $docstat,));
$_SESSION['success'] = 'Record updated';

// header( 'Location: review.php' ) ;
  return;
}

elseif ( isset($_POST['Disapprove']) && isset($_POST['Disapprove']) ) {
  $sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
  doc_app_ind = :doc_app_ind, doc_status = :doc_status
  WHERE upload_id_doc  = $nshow";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':date_approved' => $dtdis,
':date_disapprove' => $date,
':doc_app_ind' => $inddoc2,
':doc_status' => $docstat2,));
$_SESSION['success'] = 'Record updated';
// header( 'Location: review.php' ) ;

  return;

}
?>