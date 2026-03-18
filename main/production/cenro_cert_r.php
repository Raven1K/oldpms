<?php 



$nshow = $_GET['lumber_app_id'];
$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = '$nshow'";
// && Number_of_doc = $number  
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);

// $mun_code = $result['muncity_code'];
// $bussiness_name = $result['bussiness_name'];
$_office_cover = $result['Office'];





    $lumber_app = "SELECT * FROM signatory_managerdb where official_station = '$_office_cover' && signature_type = 'Certification' && signature_order = '1'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row22 = mysqli_fetch_assoc($lumber_app_qry);
    $signature_1 = $lumber_ap_row22['signature_file'];


    $file = "../admin/uploads/$signature_1";
    // Destination location where we would like to move our file
    $dest_file = 'production/uploads/c_certificate1.png';


    copy($file, $dest_file);
    if (!copy($file, $dest_file)) {
      // echo $file." failed to copy";
    } else {
      // echo $file. " copied into " .$dest_file;
    }


    $lumber_app = "SELECT * FROM signatory_managerdb where official_station = '$_office_cover' && signature_type = 'Certification' && signature_order = '2'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row33 = mysqli_fetch_assoc($lumber_app_qry);
    $signature_2 = $lumber_ap_row33['signature_file'];


    $file = "../admin/uploads/$signature_2";
    // Destination location where we would like to move our file
    $dest_file = 'production/uploads/c_certificate2.png';


    copy($file, $dest_file);
    if (!copy($file, $dest_file)) {
      // echo $file." failed to copy";
    } else {
      // echo $file. " copied into " .$dest_file;
    }



?> 