<?php
include '../processphp/config.php';

$citymun_id = $_POST["citymun_data"];
// echo $province_id ;
// $citymun_id = '160201' ;

$citymun = "SELECT * FROM brgy where mun_code = $citymun_id";

$citymun_qry = mysqli_query($con, $citymun);

$output = '<option value=""> Select Barangay </option>';

while($citymun_row = mysqli_fetch_assoc($citymun_qry)){

    $output .= '<option value="'.$citymun_row['brgy_code'].'">'.$citymun_row['brgy_name']. '</option>';
// include '../clientupload/config.php';

}

echo $output;








?>