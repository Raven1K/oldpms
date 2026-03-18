<?php
require_once "../processphp/config.php";

$lumber_app_id = $_POST['lumber_app_id'];

echo $lumber_app_id ;

    // $responsiveness = $_POST['responsiveness'] ;
    // $responsiveness1 = $_POST['responsiveness1'] ;
    // $Rq = $_POST['Rq'] ;
    // $Rq1 = $_POST['Rq1'] ;
    // $Rq2 = $_POST['Rq2'] ;
    // $af = $_POST['af'] ;
    // $af1 = $_POST['af1'] ;
    // $co = $_POST['co'] ;
    // $co1 = $_POST['co1'] ;
    // $co2 = $_POST['co2'] ;
    // $cos_s = $_POST['cos_s'] ;
    // $int1_in = $_POST['int1_in'] ;
    // $assu = $_POST['assu'] ;
    // $outc = $_POST['outc'] ;
    // $Suggestions_Comments = $_POST['Suggestions_Comments'] ;
    // $Date_of_Application = $_POST['Date_of_Application'] ;


    $responsiveness = $_POST['responsiveness'] ?? '';
    $responsiveness1 = $_POST['responsiveness1'] ?? '';
    $Rq = $_POST['Rq'] ?? '';
    $Rq1 = $_POST['Rq1'] ?? '';
    $Rq2 = $_POST['Rq2'] ?? '';
    $af = $_POST['af'] ?? '';
    $af1 = $_POST['af1'] ?? '';
    $co = $_POST['co'] ?? '';
    $co1 = $_POST['co1'] ?? '';
    $co2 = $_POST['co2'] ?? '';
    $cos_s = $_POST['cos_s'] ?? '';
    $int1_in = $_POST['int1_in'] ?? '';
    $assu = $_POST['assu'] ?? '';
    $outc = $_POST['outc'] ?? '';
    $Suggestions_Comments = $_POST['Suggestions_Comments'] ?? '';
    $Date_of_Application = $_POST['Date_of_Application'] ?? '';
    
    // Check if any of the radio button values are empty
    if (empty($responsiveness) || empty($responsiveness1) || empty($Rq) || empty($Rq1) || empty($Rq2) || empty($af) || empty($af1) || empty($co) || empty($co1) || empty($co2) || empty($cos_s) || empty($int1_in) || empty($assu) || empty($outc) || empty($Suggestions_Comments) || empty($Date_of_Application)) {
        echo '<script>alert("Please fill out all the fields and rating radio buttons."); history.back();</script>';
        exit();
    }

    




    if(isset($_POST['Lungsuranon_Indibidwal_Representante']) && $_POST['Lungsuranon_Indibidwal_Representante'] != null) {
    
        $Lungsuranon_Indibidwal_Representante = $_POST['Lungsuranon_Indibidwal_Representante'] ;
          // Run your code
      } else {
          // Do nothing - no error
          $Lungsuranon_Indibidwal_Representante = "";
      }



    // $Negosyo_Kompanya = $_POST['Negosyo_Kompanya'] ;
    if (empty($_POST['Negosyo_Kompanya'])) {
        // If $_POST['Negosyo_Kompanya'] is empty, set $Negosyo_Kompanya to an empty string
        $Negosyo_Kompanya = "";
    } else {
        // If $_POST['Negosyo_Kompanya'] is not empty, assign its value to $Negosyo_Kompanya
        $Negosyo_Kompanya = $_POST['Negosyo_Kompanya'];
    }



    if(isset($_POST['myCheckboxname_Kapunungan_PO']) && $_POST['myCheckboxname_Kapunungan_PO'] != null) {
    
        $myCheckboxname_Kapunungan_PO = $_POST['myCheckboxname_Kapunungan_PO'] ;
          // Run your code
      } else {
          // Do nothing - no error
          $myCheckboxname_Kapunungan_PO = "";
      }



    // $chksexlalaki = $_POST['chksexlalaki'] ;

    // $chkbabae = $_POST['chkbabae'] ;

    if (isset($_POST['chksexlalaki'])) {
        $chksexlalaki = $_POST['chksexlalaki'] ;
    }else{
        $chksexlalaki = '';
    
    }

    if (isset($_POST['chkbabae'])) {
        $chkbabae = $_POST['chkbabae'] ;
    }else{
        $chkbabae = '';
    }

    if (isset($_POST['myCheckboxname_gobyerno'])) {
        $myCheckboxname_gobyerno = $_POST['myCheckboxname_gobyerno'] ;
    }else{
        $myCheckboxname_gobyerno = '';
    }

    // $myCheckboxname_gobyerno = $_POST['myCheckboxname_gobyerno'] ;


    if (isset($_POST['myCheckboxnames_Gitugotan'])) {
        $myCheckboxnames_Gitugotan = $_POST['myCheckboxnames_Gitugotan'] ;
    }else{
        $myCheckboxnames_Gitugotan = '';
    }

    // $myCheckboxnames_Gitugotan = $_POST['myCheckboxnames_Gitugotan'];


    $Edad = $_POST['Edad'] ;






// $query = $connection->prepare("INSERT INTO client_css(

//                 lumber_app_id,
//                 responsiveness,
//                 responsiveness1,
//                 Rq,
//                 Rq1,
//                 Rq2,
//                 af,
//                 af1,
//                 co, 
//                 co1, 
//                 co2, 
//                 cos_s, 
//                 int1_in, 
//                 assu, 
//                 outc, 
//                 Suggestions_Comments, 
//                 Date_of_Application,
//                 Lungsuranon_Indibidwal_Representante,
//                 Negosyo_Kompanya, 
//                 myCheckboxname_Kapunungan_PO, 
//                 chksexlalaki,
//                 chkbabae, 
//                 myCheckboxname_gobyerno, 
//                 Edad, 
//                 myCheckboxnames_Gitugotan

//     )
// VALUES (
//                 :lumber_app_id,
//                 :responsiveness,
//                 :responsiveness1,
//                 :Rq,
//                 :Rq1,
//                 :Rq2,
//                 :af,
//                 :af1,
//                 :co, 
//                 :co1, 
//                 :co2, 
//                 :cos_s, 
//                 :int1_in, 
//                 :assu, 
//                 :outc, 
//                 :Suggestions_Comments, 
//                 :Date_of_Application,
//                 :Lungsuranon_Indibidwal_Representante,
//                 :Negosyo_Kompanya, 
//                 :myCheckboxname_Kapunungan_PO, 
//                 :chksexlalaki,
//                 :chkbabae, 
//                 :myCheckboxname_gobyerno, 
//                 :Edad, 
//                 :myCheckboxnames_Gitugotan

// )");

// $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
// $query->bindParam("responsiveness", $responsiveness, PDO::PARAM_STR);
// $query->bindParam("responsiveness1", $responsiveness1, PDO::PARAM_STR);
// $query->bindParam("Rq", $Rq, PDO::PARAM_STR);
// $query->bindParam("Rq1", $Rq1, PDO::PARAM_STR);
// $query->bindParam("Rq2", $Rq2, PDO::PARAM_STR);
// $query->bindParam("af", $af, PDO::PARAM_STR);
// $query->bindParam("af1", $af1, PDO::PARAM_STR);
// $query->bindParam("co", $co, PDO::PARAM_STR);
// $query->bindParam("co1", $co1, PDO::PARAM_STR);
// $query->bindParam("co2", $co2, PDO::PARAM_STR);
// $query->bindParam("cos_s", $cos_s, PDO::PARAM_STR);
// $query->bindParam("int1_in", $int1_in, PDO::PARAM_STR);
// $query->bindParam("assu", $assu, PDO::PARAM_STR);
// $query->bindParam("outc", $outc, PDO::PARAM_STR);
// $query->bindParam("Suggestions_Comments", $Suggestions_Comments, PDO::PARAM_STR);
// $query->bindParam("Date_of_Application", $Date_of_Application, PDO::PARAM_STR);
// $query->bindParam("Lungsuranon_Indibidwal_Representante", $Lungsuranon_Indibidwal_Representante, PDO::PARAM_STR);
// $query->bindParam("Negosyo_Kompanya", $Negosyo_Kompanya, PDO::PARAM_STR);
// $query->bindParam("myCheckboxname_Kapunungan_PO", $myCheckboxname_Kapunungan_PO, PDO::PARAM_STR);
// $query->bindParam("chksexlalaki", $chksexlalaki, PDO::PARAM_STR);
// $query->bindParam("chkbabae", $chkbabae, PDO::PARAM_STR);
// $query->bindParam("myCheckboxname_gobyerno", $myCheckboxname_gobyerno, PDO::PARAM_STR);
// $query->bindParam("Edad", $Edad, PDO::PARAM_STR);
// $query->bindParam("myCheckboxnames_Gitugotan", $myCheckboxnames_Gitugotan, PDO::PARAM_STR);

// $result = $query->execute();

$query = $connection->prepare("INSERT INTO client_css(

    lumber_app_id,
    responsiveness,
    responsiveness1,
    Rq,
    Rq1,
    Rq2,
    af,
    af1,
    co, 
    co1, 
    co2, 
    cos_s, 
    int1_in,
    assu,
    outc,
    Suggestions_Comments, 
    Date_of_Application,
    Lungsuranon_Indibidwal_Representante,
    Negosyo_Kompanya,
    myCheckboxname_Kapunungan_PO,
    chksexlalaki,
    chkbabae,
    myCheckboxname_gobyerno,
    Edad, 
    myCheckboxnames_Gitugotan

)
VALUES (
    :lumber_app_id,
    :responsiveness,
    :responsiveness1,
    :Rq,
    :Rq1,
    :Rq2,
    :af,
    :af1,
    :co, 
    :co1, 
    :co2, 
    :cos_s, 
    :int1_in, 
    :assu,
    :outc,
    :Suggestions_Comments, 
    :Date_of_Application,
    :Lungsuranon_Indibidwal_Representante,
    :Negosyo_Kompanya,
    :myCheckboxname_Kapunungan_PO,
    :chksexlalaki,
    :chkbabae,
    :myCheckboxname_gobyerno,
    :Edad, 
    :myCheckboxnames_Gitugotan

)");

$query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query->bindParam("responsiveness", $responsiveness, PDO::PARAM_STR);
$query->bindParam("responsiveness1", $responsiveness1, PDO::PARAM_STR);
$query->bindParam("Rq", $Rq, PDO::PARAM_STR);
$query->bindParam("Rq1", $Rq1, PDO::PARAM_STR);
$query->bindParam("Rq2", $Rq2, PDO::PARAM_STR);
$query->bindParam("af", $af, PDO::PARAM_STR);
$query->bindParam("af1", $af1, PDO::PARAM_STR);
$query->bindParam("co", $co, PDO::PARAM_STR);
$query->bindParam("co1", $co1, PDO::PARAM_STR);
$query->bindParam("co2", $co2, PDO::PARAM_STR);
$query->bindParam("cos_s", $cos_s, PDO::PARAM_STR);
$query->bindParam("int1_in", $int1_in, PDO::PARAM_STR);
$query->bindParam("assu", $assu, PDO::PARAM_STR);
$query->bindParam("outc", $outc, PDO::PARAM_STR);
$query->bindParam("Suggestions_Comments", $Suggestions_Comments, PDO::PARAM_STR);
$query->bindParam("Date_of_Application", $Date_of_Application, PDO::PARAM_STR);
$query->bindParam("Lungsuranon_Indibidwal_Representante", $Lungsuranon_Indibidwal_Representante, PDO::PARAM_STR);
$query->bindParam("Negosyo_Kompanya", $Negosyo_Kompanya, PDO::PARAM_STR);
$query->bindParam("myCheckboxname_Kapunungan_PO", $myCheckboxname_Kapunungan_PO, PDO::PARAM_STR);
$query->bindParam("chksexlalaki", $chksexlalaki, PDO::PARAM_STR);
$query->bindParam("chkbabae", $chkbabae, PDO::PARAM_STR);
$query->bindParam("myCheckboxname_gobyerno", $myCheckboxname_gobyerno, PDO::PARAM_STR);
$query->bindParam("Edad", $Edad, PDO::PARAM_STR);
$query->bindParam("myCheckboxnames_Gitugotan", $myCheckboxnames_Gitugotan, PDO::PARAM_STR);

$result = $query->execute();






$sql = "UPDATE lumber_application SET Rating = :Rating
WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(

':Rating' => 'Rated',));







$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3){
 $monthName = date('F d, Y', strtotime($date3));
 return $monthName;
      }


     //  $date = $row['date_recieve'] ;
     $date3 = $date2 ;
            getFullMonthNameFromDate($date3);




date_default_timezone_set("Asia/Manila");
$Time = date("h:i:sa");



   $Title = 'Client  ';
   $Details = 'Accomplished Client Satisfaction Survey (CSS)'.'<br><br>'.'
   Acknowledged'.'<br><br>'.'
   Downloaded and Printed E-Permit';
   

   $query2 = $connection->prepare("INSERT INTO client_client_document_history(
    lumber_app_id,
    Date,
    Title,
    Details,
    Time

    )
   VALUES (
    :lumber_app_id,
    :Date,
    :Title,
    :Details,
    :Time
    
    )");
   $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
   $query2->bindParam("Date", $date2, PDO::PARAM_STR);
   $query2->bindParam("Title", $Title, PDO::PARAM_STR);
   $query2->bindParam("Details", $Details, PDO::PARAM_STR);
   $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result2 = $query2->execute();






















// header("Location: docstatus_released.php?lumber_app_id=");

header( "Location: docstatus_released.php?lumber_app_id=$lumber_app_id" ) ;




?>
