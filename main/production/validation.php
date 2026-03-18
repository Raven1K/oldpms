

<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

// require_once('configmysqli.php');
session_start();
include('../../processphp/config.php');
// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              header("location: ../../admin/login.php");
              exit;
            }
            else{

         
            }

     




              $userid = $_SESSION["user_id"] ;

              $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


               $clientname = $lumber_ap_row['name'] ;
              
              $user_role = $lumber_ap_row['user_role_id'] ;

              // echo $clientname ;
              // echo $user_role ;





?> 


<?php 


require_once "../../processphp/config.php";

$l_id = $_GET['lumber_app_id'];


$lumber_app = "SELECT * FROM lumber_application where lumber_app_id  = $l_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$lumber_app_name = $lumber_ap_row['perm_fname'].' '.$lumber_ap_row['perm_lname'];
$address =  $lumber_ap_row['full_address'] ;




$Status_ =  $lumber_ap_row['Status_'] ;




if (($Status_) == ('Renewal')){

	header( "Location: validation_renewal.php?lumber_app_id=$l_id" ) ;

}



// $lumber_app = "SELECT * FROM geogrphic_coordinates where lumber_app_id = $l_id";
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

// echo $id = $lumber_ap_row['lumber_app_id'];




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



	<style>
  /* Modal styles */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    height: 500%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  .modal-dialog {
    max-width: none !important;
    width: 80%;
    margin: auto;
  }

  .modal-content {
    background-color: #fefefe;
    border: 1px solid #888;
  }

  .modal-body {
    padding: 20px;
    max-height: 80vh; /* Limit modal body height */
    overflow-y: auto; /* Enable vertical scrollbar */
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-right: 10px;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>

	<?php 
      require_once 'link.php';
  ?>
  </head>

  <?php 
      require_once 'navbar.php';
  ?>



			<!-- page content -->
			<div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
                                    <center>
                                        <div><h1>Validation Information</h1></div>
                                        <h4><?php echo $lumber_app_name ; ?></h4>
                                        <h4><?php echo $address ; ?></h4>
                                        <br>
                                    </center>
									<br />									
									<form class="form-label-left input_mask" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Annual Gross Volume</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="bd.ft." name="Annual_Gross_Volume" required>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total Value</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="0.00" name="Total_Value" required>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Number of Employee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control input" placeholder="Male"  id="male" name="No_of_Employee_Male" required>
											</div>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control input" placeholder="Female" id="female" name="No_of_Employee_Female" required>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder=""  id="result" readonly name="result">
												<script>
														$(document).ready(function(){
															$(".input").keyup(function(){
																var val1 = +$("#male").val();
																var val2 = +$("#female").val();
																$("#result").val(val1+val2);
														});
														});
												</script>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 " hidden>Previous Cert. Registration No.</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="" name="Previous_Cert_Reg_No" hidden>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 "hidden>Years Operated</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="" name="Years_Operated" hidden>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 "hidden>Date Issued
											</label>
											<div class="col-md-2 col-sm-2 ">
												<!-- <input name="Date_Issued" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" hidden> -->
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
                                            <label class="col-form-label col-md-2 col-sm-2 "hidden>Date Expired
											</label>
											<div class="col-md-2 col-sm-2 ">
												<!-- <input name="Date_Expired" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)"hidden> -->
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 " hidden>Application Fee</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="" readonly name="lumber_app_name" hidden value="<?php echo $lumber_app_name; ?>">
												<input type="text" class="form-control" placeholder="₱ 600.00" readonly name="Application_Fee" hidden>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 " hidden >Registration Fee</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 480.00" readonly name="Registration_Fee" hidden>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 " hidden >Oath Fee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="₱ 36.00" readonly name="Oath_Fee" hidden>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 " hidden >Cash Bond</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 1,000.00" readonly name="Cash_Bond" hidden>
											</div>
										</div>
										<div class="form-group row">
											<!-- <a class="col-form-label col-md-2 col-sm-2  " target="_blank" href="../../map/index.php?lumber_app_id=<?php echo $l_id ?>" > Add Coordinates (Decimal Degree) Here</a> -->
											<!-- <strong><a class="col-form-label col-md-2 col-sm-2" style="font-size: medium;" target="_blank" href="../../map/index.php?lumber_app_id=<?php echo $l_id ?>">Add Coordinates (Decimal Degree) Here</a></strong> -->

											<style>
											.btn-link {
											background: none;
											border: none;
											padding: 0;
											font: inherit;
											color: blue; /* Change the color to match your link style */
											text-decoration: underline;
											cursor: pointer;
											}

											</style>

											<!-- <strong>
											<center><button type="button"  onclick="openMap()">Add Coordinates (Decimal Degree) Here</button></center>
											</strong> -->

								<li>
									<button class='dropdown-item bg-success text-white' href='#' data-bs-toggle='modal' data-bs-target='#createcoordinatesModal'>Add Coordinates (Decimal Degree) Here</button>
								</li>

							<!-- Modal -->
							<div class="modal fade" id="createcoordinatesModal" tabindex="-1" aria-labelledby="createcoordinatesLabel" aria-hidden="true">
								<div class="modal-dialog" style="max-width: 50%; height: 50vh;">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="createcoordinatesLabel">Notification Details</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
										</div>
										<div class="modal-body">
											<!-- The iframe to display notification details -->
											<iframe src="../../map/index.php?lumber_app_id=<?php echo $l_id ?>" style="width: 100%; height: 85vh; border: none;"></iframe>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>


																							<!-- Button to trigger modal -->
												<!-- <button onclick="openMap()">Open Map</button> -->

												<!-- Modal -->
												<div id="mapModal" class="modal">
												<div class="modal-content">
													<span class="close" onclick="closeMap()">&times;</span>
													<iframe id="mapFrame" width="100%" height="900" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src=""></iframe>
												</div>
												</div>




															<!-- <script>
															// Function to open map modal with dynamic URL
															function openMap() {
																var l_id = <?php echo $l_id ?>; // Assuming $l_id is a PHP variable containing the lumber application ID
																var mapUrl = '../../map/index.php?lumber_app_id=' + l_id;
																var modal = document.getElementById("mapModal");
																var mapFrame = document.getElementById("mapFrame");
																mapFrame.src = mapUrl;
																modal.style.display = "block";
																				}

															// Function to close map modal
															function closeMap() {
																var modal = document.getElementById("mapModal");
																modal.style.display = "none";
																				}
															</script> -->

												<script>
												function openMap() {
												window.open('../../map/index.php?lumber_app_id=<?php echo $l_id ?>', '_blank');
												}
												</script>



										<div class="col-md-2 col-sm-2 ">
											<input type="text" class="form-control" placeholder="Latitude" name="Coordinates_Latitude" hidden>
										</div>

										<div class="col-md-2 col-sm-2 ">
											<input type="text" class="form-control" placeholder="Longitude" name="Coordinates_Longitude" hidden>
										</div>
										</div>
										<div class="form-group row">
                                                <label for="formFile" class="col-form-label col-md-2 col-sm-2  ">Lumber Dealer Photo :</label>
                                                <div class="col-md-4 col-sm-4 ">
                                                <input  class="form-control " type="file" id="formFile" name="my_image1">
											</div>
										</div>
                                        <div class="form-group row">
                                            <label for="formFile" class="col-form-label col-md-2 col-sm-2  ">Upload Verification Report :</label>
                                            <div class="col-md-4 col-sm-4 ">
                                            <input  class="form-control " type="file" id="formFile" name="my_image2">
                                        </div>
                                    	</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2  " >Date Verified</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="date" class="form-control" placeholder="Date" name="Date_verified" required>
											</div>
										</div>				

										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
												<button type="button" class="btn btn-primary" >Cancel</button>
								<button type="submit" class="btn btn-success" name="Submit">Submit</button>

								<!-- Loading Modal -->
								<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body text-center">
												<div class="spinner-border text-primary" role="status">
													<span class="sr-only">Loading...</span>
												</div>
												<p class="mt-2">Please wait...</p>
											</div>
										</div>
									</div>
								</div>
											</div>
										</div>
                    </div>
									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>






<?php





if ( isset($_POST['Submit'])) {    
$uniqid_lap = uniqid();
$l_id = $_GET['lumber_app_id'];





$query = $connection->prepare("SELECT * FROM geogrphic_coordinates WHERE lumber_app_id=:lumber_app_id");
$query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if (!$result) {

	function function_alert($message) {
      
		// Display the alert box 
		// echo "<script type='text/javascript'>alert('Coordinates Record Not Found');location='application.php';</script>";
		echo "<script type='text/javascript'>alert('Please Add Coordinates')	; history.back() ;</script>";
	
	}
	  
	  
	// Function call
	function_alert("Coordinates Record Not Found");


}else{








$Annual_Gross_Volume = $_POST['Annual_Gross_Volume']; 
$No_of_Employee_Male = $_POST['No_of_Employee_Male']; 
$No_of_Employee_Female = $_POST['No_of_Employee_Female']; 
$Date_verified = $_POST['Date_verified'];

$Kind_of_Equipment_used = '';
// $_POST['Kind_of_Equipment_used']; 

$State_Condition = '';
//  $_POST['State_Condition']; 
$Previous_Cert_Reg_No = $_POST['Previous_Cert_Reg_No']; 

// $Date_Issued = $_POST['Date_Issued']; 

$Date_Issued = ''; 


$Application_Fee = $_POST['Application_Fee']; 
$Coordinates_Latitude = $_POST['Coordinates_Latitude']; 
$Coordinates_Longitude = $_POST['Coordinates_Longitude']; 


$Total_Value = $_POST['Total_Value']; 
$Total = $_POST['result']; 
$Made = '';
//  $_POST['Made']; 
$Size = '';
// $_POST['Size']; 
$Years_Operated = $_POST['Years_Operated']; 


// $Date_Expired = $_POST['Date_Expired'];
$Date_Expired = '';

$Registration_Fee = $_POST['Registration_Fee']; 
$Oath_Fee = $_POST['Oath_Fee']; 
$Value = '';
// $_POST['Value']; 
$Cash_Bond = $_POST['Cash_Bond']; 








include 'Val_file1.php';
include 'Val_file2.php';




$query = $connection->prepare("INSERT INTO validation_form(
lumber_app_id,	
Annual_Gross_Volume,
No_of_Employee_Male,
No_of_Employee_Female,
Kind_of_Equipment_used,
State_Condition,
Previous_Cert_Reg_No,
Date_Issued,
Application_Fee,
Coordinates_Latitude,
Coordinates_Longitude,
Lumber_Dealer_Photo_File,
Upload_Verification_Report_File,
Total_Value,
Total,
Made,
Size,
Years_Operated,
Date_Expired,
Registration_Fee,
Oath_Fee,
Value,
Cash_Bond,
Date_verified


)

VALUES (
:lumber_app_id,	
:Annual_Gross_Volume,
:No_of_Employee_Male,
:No_of_Employee_Female,
:Kind_of_Equipment_used,
:State_Condition,
:Previous_Cert_Reg_No,
:Date_Issued,
:Application_Fee,
:Coordinates_Latitude,
:Coordinates_Longitude,
:Lumber_Dealer_Photo_File,
:Upload_Verification_Report_File,
:Total_Value,
:Total,
:Made,
:Size,
:Years_Operated,
:Date_Expired,
:Registration_Fee,
:Oath_Fee,
:Value,
:Cash_Bond,
:Date_verified

)");

$query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
$query->bindParam("Annual_Gross_Volume", $Annual_Gross_Volume, PDO::PARAM_STR);
$query->bindParam("No_of_Employee_Male", $No_of_Employee_Male, PDO::PARAM_STR);
$query->bindParam("No_of_Employee_Female", $No_of_Employee_Female, PDO::PARAM_STR);
$query->bindParam("Kind_of_Equipment_used", $Kind_of_Equipment_used, PDO::PARAM_STR);
$query->bindParam("State_Condition", $State_Condition, PDO::PARAM_STR);
$query->bindParam("Previous_Cert_Reg_No", $Previous_Cert_Reg_No, PDO::PARAM_STR);
$query->bindParam("Date_Issued", $Date_Issued, PDO::PARAM_STR);
$query->bindParam("Application_Fee", $Application_Fee, PDO::PARAM_STR);
$query->bindParam("Coordinates_Latitude", $Coordinates_Latitude, PDO::PARAM_STR);
$query->bindParam("Coordinates_Longitude", $Coordinates_Longitude, PDO::PARAM_STR);
$query->bindParam("Lumber_Dealer_Photo_File", $new_img_name, PDO::PARAM_STR);
$query->bindParam("Upload_Verification_Report_File", $new_img_name2, PDO::PARAM_STR);
$query->bindParam("Total_Value", $Total_Value, PDO::PARAM_STR);
$query->bindParam("Total", $Total, PDO::PARAM_STR);
$query->bindParam("Made", $Made, PDO::PARAM_STR);
$query->bindParam("Size", $Size, PDO::PARAM_STR);
$query->bindParam("Years_Operated", $Years_Operated, PDO::PARAM_STR);
$query->bindParam("Date_Expired", $Date_Expired, PDO::PARAM_STR);
$query->bindParam("Registration_Fee", $Registration_Fee, PDO::PARAM_STR);
$query->bindParam("Oath_Fee", $Oath_Fee, PDO::PARAM_STR);
$query->bindParam("Value", $Value, PDO::PARAM_STR);
$query->bindParam("Cash_Bond", $Cash_Bond, PDO::PARAM_STR);
$query->bindParam("Date_verified", $Date_verified, PDO::PARAM_STR);

$result = $query->execute();






// // // insert payment 



  
// 		$Account_Number = 'N/A' ;
// 		$Account_Name = $lumber_app_name ;
// 		$Reference_Number = 'N/A';
// 		$Total_Amount  = 'N/A';
// 		$Flow_stat = 'N/A';
// 		$Name_of_Permitte = $lumber_app_name ;
// 		$Payment_Status = 'NOT PAID';
// 		$Date_payment = date('m/d/y') ;
 




//        $query = $connection->prepare("INSERT INTO payment_feny(
//        lumber_app_id,       
//        Account_Number,
//        Account_Name,
//        Reference_Number,
//        Total_Amount,
//        Flow_stat,
//        Name_of_Permitte,
//        Payment_Status,
//        Date_payment

//        )
//        VALUES (
//        :lumber_app_id,      
//        :Account_Number,
//        :Account_Name,
//        :Reference_Number,
//        :Total_Amount,
//        :Flow_stat,
//        :Name_of_Permitte,
//        :Payment_Status,
//        :Date_payment
 

//        )");
       
//        $query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
// 	   $query->bindParam("Account_Number", $Account_Number, PDO::PARAM_STR);
// 	   $query->bindParam("Account_Name", $lumber_app_name, PDO::PARAM_STR);
// 	   $query->bindParam("Reference_Number", $Reference_Number, PDO::PARAM_STR);
// 	   $query->bindParam("Total_Amount", $Total_Amount, PDO::PARAM_STR);
// 	   $query->bindParam("Flow_stat", $Flow_stat, PDO::PARAM_STR);
// 	   $query->bindParam("Name_of_Permitte", $Name_of_Permitte, PDO::PARAM_STR);
// 	   $query->bindParam("Payment_Status", $Payment_Status, PDO::PARAM_STR);
// 	   $query->bindParam("Date_payment", $Date_payment, PDO::PARAM_STR);

       
//        $result = $query->execute();



//        // insert payment 



       

// $stat_uss = 'For Endorsement';
$stat_uss = 'For Certification';
$Flow_stats = '6.2';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $l_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));





// -------------------------------------------------------------------------------

date_default_timezone_set("Asia/Manila");


$Time = date("h:i:sa");

 
$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3){
 $monthName = date('F d, Y', strtotime($date3));
 return $monthName;
	  }


	 //  $date = $row['date_recieve'] ;
	 $date3 = $date2 ;
			getFullMonthNameFromDate($date3);





$Title = 'FUU';
// $Total_Amount1 =  $_POST['To_amount']; 

$Details = '<b>On-site validation was successfully conducted. </b>'.' <br> '.' On-site validation reports were submitted. '.'<br>'.' The application forwarded to the Chief, RPS.';

// $lumber_app = "SELECT * FROM lumber_app_doc_erow where upload_id_doc = $nshow";
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];

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
$query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
$query->bindParam("Date", $date2, PDO::PARAM_STR);
$query->bindParam("Title", $Title, PDO::PARAM_STR);
$query->bindParam("Details", $Details, PDO::PARAM_STR);
$query->bindParam("Time", $Time, PDO::PARAM_STR);


$result = $query->execute();

// -------------------------------------------------------------------------------




$Site_Validation_Schedule = 'Validated' ;

$sql = "UPDATE lumber_application SET Site_Validation_Schedule = :Site_Validation_Schedule 
WHERE lumber_app_id = $l_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
// -- ':Site_Validation_Schedule' => $stat_uss,
':Site_Validation_Schedule' => $Site_Validation_Schedule,));





// $em = "Successfully Submitted!";
// header ("Location: ../../processphp/univmodal.php?error=$em");

function function_alert($message) {
      
    // Display the alert box 
	echo "<script type='text/javascript'>alert('Successfully Submitted');location='application.php';</script>";
}
  
  
// Function call
function_alert("Successfully Submitted!");

}

}



 ?> 
		<?php 
      require_once 'footer.php';
  ?>
      

  </body>
</html>


