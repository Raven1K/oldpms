<?php
include '../processphp/config.php';

$province_id = $_POST["province_data"];
// echo $province_id ;

$province = "SELECT * FROM muncity where prov_code = $province_id";

$province_qry = mysqli_query($con, $province);

$output = '<option value=""> Select Municipality </option>';

while($province_row = mysqli_fetch_assoc($province_qry)){

    $output .= '<option value="'.$province_row['mun_code'].'">'.$province_row['muncity_name']. '</option>';


}

echo $output;

?>