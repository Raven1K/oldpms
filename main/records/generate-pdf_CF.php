<?php

require __DIR__ . "/vendor/autoload.php";

require_once "../../processphp/config.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$date =  date("m/d/Y") ; 

// $lumber_app_id = '334';   
$dayWithSuffix;
$lumber_app_id = $_GET["lumber_app_id"];

$lumber_app = "SELECT * FROM cf_documents where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


if ($lumber_ap_row) {

$province = $lumber_ap_row['province'];
$penro_address = $lumber_ap_row['penro_address'];
$office_under = $lumber_ap_row['office_under'];
$ldname = $lumber_ap_row['ldname'];
$date = $lumber_ap_row['date'];





// Function to add suffix to the day
function addDaySuffix($day) {
    if ($day >= 11 && $day <= 13) {
        return $day . 'th';
    } else {
        switch ($day % 10) {
            case 1:
                return $day . 'st';
            case 2:
                return $day . 'nd';
            case 3:
                return $day . 'rd';
            default:
                return $day . 'th';
        }
    }
}

// Assuming $date contains the date in the format 'Y-m-d' (e.g., '2023-11-30')
$date = $lumber_ap_row['date'];

// Extract day from the date
$day = date('j', strtotime($date));

// Add suffix to the day
// $dayWithSuffix = addDaySuffix($day) . date('M, Y');
// $dayWithSuffix = (string) addDaySuffix($day) . "  Day of  " . date('M, Y');
$dayWithSuffix = (string) addDaySuffix($day) . " Day of " . date('F, Y');






} else {





    $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

    $office_dir = $lumber_ap_row['Office'];

    $province_suffix = $lumber_ap_row['Suffix'];

    $bussiness_name = $lumber_ap_row['bussiness_name'];

    $lumber_app = "SELECT * FROM Office where station = '$office_dir'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row1 = mysqli_fetch_assoc($lumber_app_qry);

    $office_penroaddress = $lumber_ap_row1['office_under'];


    $lumber_app = "SELECT * FROM Office where station = '$office_penroaddress'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row1 = mysqli_fetch_assoc($lumber_app_qry);



    $office_address = $lumber_ap_row1['office_address'];

    $lumber_app = "SELECT * FROM province where Suffix = '$province_suffix'";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
    echo '<br>';

    $prov_name = $lumber_ap_row2['prov_name'];



        $province = $prov_name;
        $penro_address = $office_address ;
        $office_under = $office_dir;
        $ldname = $bussiness_name;
        $date = date('F d, Y');

}
       



/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("A4", "portrait");
/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template_CF.php");

$html = str_replace(["{{ province }}", "{{ penro_address }}", "{{ office_under }}", "{{ ldname }}", "{{ date }}"],
[$province, $penro_address, $office_under, $ldname, $dayWithSuffix ], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "Memorandum"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("copyfurnish.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("acknowledgement.pdf", $output);






            $lumber_app = "SELECT * FROM cf_documents where lumber_app_id = $lumber_app_id ";
            $lumber_app_qry = mysqli_query($con, $lumber_app);
            $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

            if ($lumber_ap_row) {
            
            }else{


            $query = $connection->prepare("INSERT INTO cf_documents(
                            
                lumber_app_id, 
                province,
                penro_address,
                office_under,
                ldname,
                date

                )
            VALUES (

                :lumber_app_id,
                :province,
                :penro_address,
                :office_under,
                :ldname,
                :date

                )");

            $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
            $query->bindParam("province", $province, PDO::PARAM_STR);
            $query->bindParam("penro_address", $penro_address, PDO::PARAM_STR);
            $query->bindParam("office_under", $office_under, PDO::PARAM_STR);
            $query->bindParam("ldname", $ldname, PDO::PARAM_STR);
            $query->bindParam("date", $date, PDO::PARAM_STR);
            $result = $query->execute();





            }

  
        


?>