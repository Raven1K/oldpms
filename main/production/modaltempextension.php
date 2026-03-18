<?php


$l_id = $_GET['lumber_app_id'];

$lumber_app_4 = "SELECT * FROM lumber_application where lumber_app_id = $nshow";
// && Number_of_doc = $number  
$lumber_app_qry_4 = mysqli_query($con, $lumber_app_4);
$result = mysqli_fetch_assoc($lumber_app_qry_4);

echo $result['muncity_code'];

$mun_code = $result['muncity_code'];


$lumber_app2 = "SELECT * FROM muncity where mun_code = $mun_code";
// && Number_of_doc = $number  
$lumber_app_qry2 = mysqli_query($con, $lumber_app2);
$result2 = mysqli_fetch_assoc($lumber_app_qry2);
echo  $result2['office_cover'];
$office_id =   $result2['office_id'];


$lumber_app3 = "SELECT * FROM office where office_id = $office_id";
// && Number_of_doc = $number  
$lumber_app_qry3 = mysqli_query($con, $lumber_app3);
$result3 = mysqli_fetch_assoc($lumber_app_qry3);
echo  $result3['office_address'];



?>