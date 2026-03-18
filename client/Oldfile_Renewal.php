<?php

require_once "../processphp/config.php";

?>

<style>
	form {
	  max-width: 600px;
	  margin: 0 auto;
	  border: 2px solid green;
	  padding: 20px;
	  border-radius: 10px;
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
	}
	
	input[type="date"] {
	  width: auto;
	}
  </style>
  
  
  <!DOCTYPE html>
  <html>
  <head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <form method="post">
	  <div>
		<label for="ref-number">Reference Number:</label>
		<input type="text" id="ref_number" name="ref_number">
	  </div>
	  <div>
		<label for="application">Application to CENRO:</label>
	  </div>
	  <div>
		<label for="release-date">Release:</label>
		<input type="date" id="release-date" name="App_CENRO_Release" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <div>
		<label for="received-date">Received:</label>
		<input type="date" id="received-date" name="App_CENRO_Recieved" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <hr color="gray" size="3" align="center">
	  <div>
		<label for="application">CENRO to PENRO</label>
	  </div>
	  <div>
		<label for="release-date">Release:</label>
		<input type="date" id="release-date" name="CENRO_PENRO_Release" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <div>
		<label for="received-date">Received:</label>
		<input type="date" id="received-date" name="CENRO_PENRO_Recieved" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <hr color="gray" size="3" align="center">
	  <div>
		<label for="application">PENRO to Regional Office</label>
	  </div>
	  <div>
		<label for="release-date">Release PENRO:</label>
		<input type="date" id="release-date" name="PENRO_Regional_Release_PENRO" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <div>
		<label for="received-date">Received Records Unit:</label>
		<input type="date" id="received-date" name="PENRO_Regional_Recieved_RECORDS" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <br>
	  <hr color="gray" size="3" align="center">
	
		
	  <div>
		<label for="release-date">Release ARD TS:</label>
		<input type="date" id="release-date" name="Release_ARD_TS" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <div>
		<label for="received-date">Received LPDD:</label>
		<input type="date" id="received-date" name="Received_LPDD_" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <hr color="gray" size="1" align="center">
	
		
	  <div>
		<label for="release-date">Received FUS:</label>
		<input type="date" id="release-date" name="Received_FUS" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <div>
		<label for="received-date">Received FUS Staff:</label>
		<input type="date" id="received-date" name="Received_FUS_Staff" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <div>
		<label for="received-date">Release FUS Staff:</label>
		<input type="date" id="received-date" name="Release_FUS_Staff" onchange="changeToFirstOfMonth(this)">
	  </div>
	  <hr color="gray" size="1" align="center">
	  <div>
		<label for="received-date">Received LPDD:</label>
		<input type="date" id="received-date" name="Received_LPDD" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <div>
		<label for="received-date">Release LPDD:</label>
		<input type="date" id="received-date" name="Release_LPDD" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <hr color="gray" size="3" align="center">
	  <div>
		<label for="received-date">Received ARD TS:</label>
		<input type="date" id="received-date" name="Received_ARD_TS" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <div>
		<label for="received-date">Received ORED:</label>
		<input type="date" id="received-date" name="Received_ORED" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <div>
		<label for="received-date">Release ORED:</label>
		<input type="date" id="received-date" name="Release_ORED" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <label for="received-date">RO TO PENRO</label>


	  <div>
		<label for="received-date">Release :</label>
		<input type="date" id="received-date" name="RO_TO_PENRO_Release" onchange="changeToFirstOfMonth(this)">
	  </div>


	  <div>
		<label for="received-date">Received :</label>
		<input type="date" id="received-date" name="RO_TO_PENRO_Received" onchange="changeToFirstOfMonth(this)">
	  </div>


	  <hr color="gray" size="3" align="center">

	  <div>
		<label for="received-date">Within the CENRO Reciept of Applicaton tp Date of Release :</label>
		<input type="date" id="received-date" name="Within_CENRO_Reciept" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <hr color="gray" size="1" align="center">

	  <div>
		<label for="received-date"> Transmittal CENRO Release to PENRO Reciept :</label>
		<input type="date" id="received-date" name="Transmittal_CENRO_Release_to_PENRO" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <hr color="gray" size="1" align="center">

	  <div>
		<label for="received-date"> Within RO (RO Receipt to Date of Release) :</label>
		<input type="date" id="received-date" name="Within_RO_Receipt_to_Date_of_Release" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <hr color="gray" size="3" align="center">

	  <div>
		<label for="received-date"> Total Time  :</label>
		<input type="text" id="received-date" name="Total_time" onchange="changeToFirstOfMonth(this)">
	  </div>

	  <hr color="gray" size="3" align="center">

	  <div>
		<label for="received-date"> Remarks  :</label>
		<input type="text" id="received-date" name="Remarks" onchange="changeToFirstOfMonth(this)">
	  </div>


      <br>
	  <input type="submit" value="Submit" name="Save_Old" ></input>
	</form>
  

<?php


if ( isset($_POST['Save_Old'])) {


	$lumber_app_id = $_GET['lumber_app_id']  ;

	
$ref_number = $_POST['ref_number'];
$app_cenro_release = $_POST['App_CENRO_Release'];
$app_cenro_received = $_POST['App_CENRO_Recieved'];
$cenro_penro_release = $_POST['CENRO_PENRO_Release'];
$cenro_penro_received = $_POST['CENRO_PENRO_Recieved'];
$penro_regional_release_penro = $_POST['PENRO_Regional_Release_PENRO'];
$penro_regional_received_records = $_POST['PENRO_Regional_Recieved_RECORDS'];
$release_ard_ts = $_POST['Release_ARD_TS'];
$received_lpdd = $_POST['Received_LPDD_'];
$received_fus = $_POST['Received_FUS'];
$received_fus_staff = $_POST['Received_FUS_Staff'];
$release_fus_staff = $_POST['Release_FUS_Staff'];
$received_lpdd2 = $_POST['Received_LPDD'];
$release_lpdd = $_POST['Release_LPDD'];
$received_ard_ts = $_POST['Received_ARD_TS'];
$received_ored = $_POST['Received_ORED'];
$release_ored = $_POST['Release_ORED'];
$ro_to_penro_release = $_POST['RO_TO_PENRO_Release'];
$ro_to_penro_received = $_POST['RO_TO_PENRO_Received'];



$sql = "UPDATE lumber_application SET Registration_Number = :Registration_Number
WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(

':Registration_Number' => $ref_number,));


$query2 = $connection->prepare("INSERT INTO old_registered(
	lumber_app_id,
	Reference_Number,
	App_CENRO_Release,
	App_CENRO_Recieved,
	CENRO_PENRO_Release,
	CENRO_PENRO_Recieved,
	PENRO_Regional_Release_PENRO,
	PENRO_Regional_Recieved_RECORDS,
	Release_ARD_TS,
	Received_LPDD_,
	Received_FUS,
	Received_FUS_Staff,
	Release_FUS_Staff,
	Received_LPDD,
	Release_LPDD,
	Received_ARD_TS,
	Received_ORED,
	Release_ORED,
	RO_TO_PENRO_Release,
	RO_TO_PENRO_Received

	)
   VALUES (
	:lumber_app_id,
	:Reference_Number,
	:App_CENRO_Release,
	:App_CENRO_Recieved,
	:CENRO_PENRO_Release,
	:CENRO_PENRO_Recieved,
	:PENRO_Regional_Release_PENRO,
	:PENRO_Regional_Recieved_RECORDS,
	:Release_ARD_TS,
	:Received_LPDD_,
	:Received_FUS,
	:Received_FUS_Staff,
	:Release_FUS_Staff,
	:Received_LPDD2,
	:Release_LPDD,
	:Received_ARD_TS,
	:Received_ORED,
	:Release_ORED,
	:RO_TO_PENRO_Release,
	:RO_TO_PENRO_Received
	
	)");
   $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
   $query2->bindParam("Reference_Number", $ref_number, PDO::PARAM_STR);
   $query2->bindParam("App_CENRO_Release", $app_cenro_release, PDO::PARAM_STR);
   $query2->bindParam("App_CENRO_Recieved", $app_cenro_received, PDO::PARAM_STR);
   $query2->bindParam("CENRO_PENRO_Release", $cenro_penro_release, PDO::PARAM_STR);
   $query2->bindParam("CENRO_PENRO_Recieved", $cenro_penro_received, PDO::PARAM_STR);
   $query2->bindParam("PENRO_Regional_Release_PENRO", $penro_regional_release_penro, PDO::PARAM_STR);
   $query2->bindParam("PENRO_Regional_Recieved_RECORDS", $penro_regional_received_records, PDO::PARAM_STR);
   $query2->bindParam("Release_ARD_TS", $release_ard_ts, PDO::PARAM_STR);
   $query2->bindParam("Received_LPDD_", $received_lpdd, PDO::PARAM_STR);
   $query2->bindParam("Received_FUS", $received_fus, PDO::PARAM_STR);
   $query2->bindParam("Received_FUS_Staff", $received_fus_staff, PDO::PARAM_STR);
   $query2->bindParam("Release_FUS_Staff", $release_fus_staff, PDO::PARAM_STR);
   $query2->bindParam("Received_LPDD2", $received_lpdd2, PDO::PARAM_STR);
   $query2->bindParam("Release_LPDD", $release_lpdd, PDO::PARAM_STR);
   $query2->bindParam("Received_ARD_TS", $release_lpdd, PDO::PARAM_STR);
   $query2->bindParam("Received_ORED", $release_lpdd, PDO::PARAM_STR);
   $query2->bindParam("Release_ORED", $release_lpdd, PDO::PARAM_STR);
   $query2->bindParam("RO_TO_PENRO_Release", $release_lpdd, PDO::PARAM_STR);
   $query2->bindParam("RO_TO_PENRO_Received", $release_lpdd, PDO::PARAM_STR);

   $result2 = $query2->execute();


   function function_alert($message) {
      
	// Display the alert box 
//   echo "<script type='text/javascript'>alert('Successfully Added');location='application.php';</script>";
  echo "<script type='text/javascript'>alert('Successfully Added'); location='dashboard_oldform.php' </script>";
}
  
  
// Function call
function_alert("Successfully Added!");

}

?>





	<script>
	  $(function() {
		// Attach a submit event listener to the form
		$('#myForm').submit(function(event) {
		  // Prevent the form from submitting normally
		  event.preventDefault();
  
		  // Get the form data as a serialized string
		  let formData = $(this).serialize();
  
		  // Send an AJAX POST request to the server
		  $.ajax({
			type: 'POST',
			url: 'process.php', // Replace this with the URL of the script that processes the form data
			data: formData,
			success: function(response) {
			  // Handle the server response
			  console.log(response);
			},
			error: function(xhr, status, error) {
			  // Handle AJAX errors
			  console.error(error);
			}
		  });
		});
	  });
  
	  function changeToFirstOfMonth(input) {
		// Get the input value as a Date object
		let date = new Date(input.value);
		// Set the month to the first month (January)
		date.setMonth(0);
		// Set the date to the first day of the month
		date.setDate(1);
		// Format the date as a string in the YYYY-MM-DD format required by the input element
		let formattedDate = date.toISOString().slice(0, 10);
		// Set the input value to the new date value
  
	  }

	  