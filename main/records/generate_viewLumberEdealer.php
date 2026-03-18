<?php



        require __DIR__ . "/vendor/autoload.php";

        use Dompdf\Dompdf;
        use Dompdf\Options;
        include "../../processphp/config.php";

        $lumber_app_id = $_GET["lumber_app_id"];





        $lumber_app2 = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
        $lumber_app_qry2 = mysqli_query($con, $lumber_app2);
        $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry2);
        $status = $lumber_ap_row2['Status_'];

        $lumber_app = "SELECT * FROM lumber_dealer_e_permit_form where lumber_app_id = $lumber_app_id";
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

        echo $lumber_ap_row['ldname'];

        $lumber_app = "SELECT * FROM lumber_dealer_e_permit_form where lumber_app_id = $lumber_app_id";
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
        $date_issued = $lumber_ap_row3['date'];

        $lumber_app = "SELECT * FROM client_client_document_history where Title = 'Records Unit' AND lumber_app_id = $lumber_app_id" ;
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $lumber_ap_row4 = mysqli_fetch_assoc($lumber_app_qry);
        $date_release = $lumber_ap_row4['Date'];

        



$ldname =  $lumber_ap_row['ldname'];

$ldaddress = $lumber_ap_row['ldaddress'];



function getFullMonthNameFromDate($date2){
        $monthName = date('F d, Y', strtotime($date2));
        return $monthName;
        
}


                
 $date2 = $date_release;
// echo getFullMonthNameFromDate($date2);

$date =	getFullMonthNameFromDate($date2);



$owner = $lumber_ap_row['owner'];

$SCtype = $lumber_ap_row['SCtype'];

$municipal = $lumber_ap_row['municipal']; 

$province = $lumber_ap_row['province']; 

$totalsupply = $lumber_ap_row['totalsupply']; 

$particulars = $lumber_ap_row['particulars']; 

$treespecie = $lumber_ap_row['treespecie'];  

$lsname = $lumber_ap_row['lsname'];  

$yrvalidity = $lumber_ap_row['yrvalidity'];  

$volume	= $lumber_ap_row['volume'];  


$refnumber = $lumber_ap_row['refnumber'];  

$regnumber = 'LD-R13-'.''. $lumber_ap_row['regnumber'];  

$lsname = $lumber_ap_row['lsname'];  

$SCregnumber = $lumber_ap_row['SCregnumber'];  

$datepaid = $lumber_ap_row['datepaid'];  

$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);
$cashbond = $result['cash'];



$date_gen=date_create($date_issued);

date_add($date_gen,date_interval_create_from_date_string("365 days"));

$dateissued = date("Y-F-d");

$dateexpiry = date_format($date_gen,"F d, Y");

$Status = "Approved" ;


$sql = "UPDATE geogrphic_coordinates SET date_expiry = :date_expiry, date_approve = :date_approve, Status = :Status
WHERE lumber_app_id = $lumber_app_id";

$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $Status,        
':date_expiry' => $dateexpiry,
':date_approve' => $date,));


// $datepaid = $_POST["datepaid"];



        // $query = $connection->prepare("INSERT INTO lumber_dealer_e_permit_form(

        // lumber_app_id,
        // ldname,
        // ldaddress,
        // date,
        // owner,
        // SCtype,
        // municipal,
        // province,
        // totalsupply,
        // particulars,
        // treespecie,
        // lsname,
        // yrvalidity,
        // volume,
        // refnumber,
        // regnumber,
        // SCregnumber

        //     )
        // VALUES (
        // :lumber_app_id,  
        // :ldname,
        // :ldaddress,
        // :date,
        // :owner,
        // :SCtype,
        // :municipal,
        // :province,
        // :totalsupply,
        // :particulars,
        // :treespecie,
        // :lsname,
        // :yrvalidity,
        // :volume,
        // :refnumber,
        // :regnumber,
        // :SCregnumber

        // )");
        // $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("ldname", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("ldaddress", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("date", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("owner", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("SCtype", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("municipal", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("municipal", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("province", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("totalsupply", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("particulars", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("treespecie", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("lsname", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("yrvalidity", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("volume", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("refnumber", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("regnumber", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("refnumber", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("lsname", $lumber_app_id, PDO::PARAM_STR);
        // $query->bindParam("SCregnumber", $lumber_app_id, PDO::PARAM_STR);

        // $result = $query->execute();


        ob_start();
        include "template1.php";
        $html = ob_get_clean();
        ob_end_clean();




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
$dompdf->setPaper(array(0, 0, 660, 936), "landscape"); // 8.5x13 inches at 72 dpi/**
//  * Load the HTML and replace placeholders with values from the form
//  */

 
                                        // $html = file_get_contents("template1.php");

                                        // $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}",
                                        // "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}", "{{datepaid}}" , "{{status}}",  "{{dateexpiry}}" ],

                                        // [$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber, $datepaid, $status, $dateexpiry], $html);

// Red Code 

// $html = str_replace(["{{ldname}}", "{{ldaddress}}", "{{date}}", "{{owner}}", "{{SCtype}}", "{{municipal}}", "{{province}}", "{{totalsupply}}", "{{particulars}}", "{{treespecie}}", "{{lsname}}", "{{yrvalidity}}", "{{volume}}", "{{refnumber}}", "{{regnumber}}", "{{lsname}}", "{{SCregnumber}}", "{{dateissued}}", "{{dateissued}}"],[$ldname, $ldaddress, $date, $owner, $SCtype, $municipal, $province, $totalsupply, $particulars, $treespecie, $lsname, $yrvalidity, $volume, $refnumber, $regnumber, $lsname, $SCregnumber, $dateissued, $dateexpiry], $html);

$dompdf->loadHtml($html);
/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "E-PERMIT"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("CERTIFICATE_OF_REGISTRATION.pdf", array("Attachment" => false));

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);



// $lumber_app_id = $_GET["lumber_app_id"];

$sql = "UPDATE lumber_application SET Registration_Number = :Registration_Number
WHERE lumber_app_id = $lumber_app_id";

// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Registration_Number' => $regnumber,));


// $sql = "UPDATE geogrphic_coordinates SET date_expiry = :date_expiry, date_approve = :date_approve 
// WHERE lumber_app_id = $lumber_app_id";

// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':date_expiry' => $dateexpiry,
// ':date_approve' => $date,));




?>