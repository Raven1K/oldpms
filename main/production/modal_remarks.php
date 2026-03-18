<?php 

$nshow = $_GET['lumber_app_id'];


require_once "../../processphp/config.php";





// $lumber_app = "SELECT * FROM lumber_app_doc_erow where upload_id_doc = $nshow";
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];





// $n ="../../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;
?> 





<!DOCTYPE html>
<html>
<head>
<style>
	form {
	  max-width: 600px;
	  margin: 0 auto;
	  border: 2px solid green;
	  padding: 20px;
	  border-radius: 10px;
	  font-family: Arial, sans-serif;
	}
	
	label {
	  display: block;
	  margin-bottom: 10px;
	}
	
	input {
	  padding: 10px;
	  font-size: 16px;
	  border-radius: 5px;
	  border: 1px solid #ccc;
	  width: 100%;
	  font-family: Arial, sans-serif;
	}
	
	input[type="date"] {
	  width: auto;
	}

	h1, h2 {
	  font-family: Arial, sans-serif;
	}
  </style>
</head>
<body>






<?php





    session_start();
    // include('../../processphp/config.php');
    if ( isset($_POST['Send'])) {

      // echo  'WORKING';

// $remarks = 'REQUEST FOR RE APPLY';

    $remarks = $_POST['remarks'];

    $sql = "UPDATE lumber_application SET Flow_stat = :Flow_stat, Remarks = :Remarks
    WHERE lumber_app_id  = $nshow";
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(
    ':Flow_stat' => '0',
    ':Remarks' => $remarks,));










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
    
    
    
       $Title = 'Request for Reapplication';
       $Details = 'We apologize to inform you that your application for permitting has been disapproved. After careful consideration, we have determined that <br> your application does not meet the requirements set forth by our agency. <br> <br> Remarks :'.$remarks.' ';
       
    
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
    




       function function_alert($message) {
      
        // Display the alert box 
      echo "<script type='text/javascript'>alert('Successfully Disapproved');location='application.php';</script>";
      // echo "<script type='text/javascript'>alert('Successfully Submitted');</script>";
    }
      
      
    // Function call
    function_alert("Successfully Disapproved!");
    










    }





    ?>


<form method='POST'>

<h1>RE APPLY</h1>
<h2>ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h2>

<textarea id="remarks" name="remarks" rows="4" cols="50">
</textarea>



<input type="submit" value="Send" class="btn btn-success" name="Send"/> 

  </form>

<?php

return;
?>


</body>
</html>
