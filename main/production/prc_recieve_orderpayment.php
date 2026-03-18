<?php 

session_start();


require_once "../../processphp/config.php";

$nshow = $_GET['lumber_app_id'];


    $stat_uss = 'Order Payment';
    $Flow_stats = '2';
    $date_ref = date('m/d/y') ;
    
    $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat, date_recieve = :date_recieve
    WHERE lumber_app_id = $nshow";
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(
    ':Status' => $stat_uss,
    ':date_recieve' => $date_ref,
    ':Flow_stat' => $Flow_stats,));
  
  






    
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



   $Title = 'Bill  Collector';
   $Details = 'You may now proceed to the Payment.';
   

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
   $query2->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
   $query2->bindParam("Date", $date2, PDO::PARAM_STR);
   $query2->bindParam("Title", $Title, PDO::PARAM_STR);
   $query2->bindParam("Details", $Details, PDO::PARAM_STR);
   $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result2 = $query2->execute();



	// function function_alert($message) {

	// 	echo "<script type='text/javascript'>alert('successfully Saved');location='../../client/dashboard_doclist.php';</script>";
	// 					}
	// 	function_alert("Successfully Saved");

          header( "Location: application.php" ) ;
   

// 	$date2 = date('m/d/y');

// 	function getFullMonthNameFromDate($date3){
// 	 $monthName = date('F d, Y', strtotime($date3));
// 	 return $monthName;
// 		  }
 
 
// 		 //  $date = $row['date_recieve'] ;
// 		 $date3 = $date2 ;
// 				getFullMonthNameFromDate($date3);
 
 
 
 
//  date_default_timezone_set("Asia/Manila");
//  $Time = date("h:i:sa");
 
 
 
// 	$Title = 'Received from CENRO Validator';
// 	$Details = 'Received from CENRO Validator'.' on '.($date3).' with 6 documents uploaded.';
	
 
// 	$query = $connection->prepare("INSERT INTO client_client_document_history(
// 	 lumber_app_id,
// 	 Date,
// 	 Title,
// 	 Details,
// 	 Time
 
// 	 )
// 	VALUES (
// 	 :lumber_app_id,
// 	 :Date,
// 	 :Title,
// 	 :Details,
// 	 :Time
	 
// 	 )");
// 	$query->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
// 	$query->bindParam("Date", $date2, PDO::PARAM_STR);
// 	$query->bindParam("Title", $Title, PDO::PARAM_STR);
// 	$query->bindParam("Details", $Details, PDO::PARAM_STR);
// 	$query->bindParam("Time", $Time, PDO::PARAM_STR);
 
	
// 	$result = $query->execute();


?>