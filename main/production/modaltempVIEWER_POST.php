<?php  
session_start();
require_once "../../processphp/config.php";





	if ( isset($_POST['Accept'])) {    
    

    $id = $_POST['lumber_app_id'];
    $docnumber = '10';
    $date =  date("m/d/Y") ; 
    $inddoc = '1';
    $inddoc2 = '2';
    $docstat = 'Approved (FG)';
    $docstat2 = 'Disapproved';
    // $id_name = '36';
    $dtdis = "";



    $sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
    doc_app_ind = :doc_app_ind, doc_status = :doc_status
    WHERE lumber_app_id  = $id && Number_of_doc = $docnumber ";
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(
    ':date_approved' => $date,
    ':date_disapprove' => $dtdis,
    ':doc_app_ind' => $inddoc,
    ':doc_status' => $docstat,));










    header( "Location: reviewrpschief.php?lumber_app_id=$id" ) ;
    // href="reviewrCENRO.php?lumber_app_id='.$row['lumber_app_id'].'"

    // WHERE lumber_app_id = $id && Number_of_doc $docnumber  ;

    


  return; 




} 






?> 