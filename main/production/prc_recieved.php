<?php 

if (session_status() == PHP_SESSION_NONE) {
  session_start();
 }



require_once "../../processphp/config.php";

$nshow = $_GET['lumber_app_id'];

      // $stat_uss = 'On Process';
      // $Flow_stats = "3";
      // $date =  date("m/d/Y") ; 


      // $sql = "UPDATE lumber_application SET Status = :Status, date_recieve = :date_recieve, Flow_stat = :Flow_stat 
      // WHERE lumber_app_id = $nshow";
      // $stmt = $connection->prepare($sql);
      // $stmt->execute(array(
      // ':Status' => $stat_uss,
      // 'date_recieve' => $date,
      // ':Flow_stat' => $Flow_stats,));





      $stat_uss = 'For Payment';
      $Flow_stats = '4';
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



               $Title = 'FUU';
               // $Details = 'Received '.' on '.($date3).;
               $Details = 'Your application has been evaluated and officially received. 
               FUU will prepare the Order of Payment, and a notification will be sent to you for your payment';
               

               $query = $connection->prepare("INSERT INTO client_client_document_history(
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
               $query->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
               $query->bindParam("Date", $date2, PDO::PARAM_STR);
               $query->bindParam("Title", $Title, PDO::PARAM_STR);
               $query->bindParam("Details", $Details, PDO::PARAM_STR);
               $query->bindParam("Time", $Time, PDO::PARAM_STR);

               
               $result = $query->execute();
               






   $em = "Successfully Received!";
   header ("Location: application.php");

    

  
  // header( 'Location: review.php' ) ;




?>