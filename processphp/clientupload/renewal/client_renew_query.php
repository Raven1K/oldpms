<?php
$uniqid_lap = uniqid();




include('../../config.php');
error_reporting(0);

if(isset($_POST['num']))
{


  $reg = $_POST['reg'];

 echo $reg  ;



 $lumber_app = "SELECT * FROM lumber_application where Registration_Number = '$reg'";
 $lumber_app_qry = mysqli_query($con, $lumber_app);
 $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

 $name = $lumber_ap_row['perm_fname'];

 echo $name ;

//   $lumber_app = "SELECT * FROM lumber_application where Registration_Number = $reg";
//   $lumber_app_qry = mysqli_query($con, $lumber_app);
//   $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

//   $reg = $lumber_ap_row['perm_fname'];

//   echo $reg ;
// echo "<p align='center' style='color:blue'>".numberTowords("$num").' PESO(s) ONLY'."</p>";

// $val_words = numberTowords("$num").''.' PESO(s) ONLY' ;

}

?>
