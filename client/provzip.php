<?php
include '../processphp/config.php';

$zip_id = $_POST["zip_data"];


$zip = "SELECT * FROM muncity where mun_code = $zip_id";

$zip_qry = mysqli_query($con, $zip);

$zip_row = mysqli_fetch_assoc($zip_qry);



    $output = $zip_row['zip_code'];


echo $output;

?>