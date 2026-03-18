<?php
include '../processphp/config.php';

$brgy_id = $_POST["brgy_data"];
// echo $province_id ;



// echo $province_id ;

$brgy = "SELECT * FROM muncity where mun_code = $brgy_id";

$brgy_qry = mysqli_query($con, $brgy);

$brgy_row = mysqli_fetch_assoc($brgy_qry);

// $output = $zip_row['zip_code'];


// $output = "<value="'.$zip_row['zip_code'].'">" ;



// $zipname = $zip_row['zip_code'];
// $output = '<option value=""> Select Barangay </option>';



// while($citymun_row = mysqli_fetch_assoc($zip_qry)){

    // $output .= '<option value="'.$citymun_row['brgy_code'].'">'.$citymun_row['brgy_name']. '</option>';

    $output = $brgy_row['mun_code'];


    

?>