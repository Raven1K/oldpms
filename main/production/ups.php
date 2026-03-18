<?php 

$nshow = $_GET['upload_id_doc'];


require_once "../../processphp/config.php";





$lumber_app = "SELECT * FROM lumber_app_doc_erow where upload_id_doc = $nshow";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];





$n ="../../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;
?> 