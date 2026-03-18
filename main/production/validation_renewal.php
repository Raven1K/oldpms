<?php 

require_once "../../processphp/config.php";

// Sanitize ID
$l_id = mysqli_real_escape_string($con, $_GET['lumber_app_id']);


$lumber_app = "SELECT * FROM lumber_application where lumber_app_id  = $l_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$lumber_app_name = $lumber_ap_row['perm_fname'].' '.$lumber_ap_row['perm_lname'];
$address =  $lumber_ap_row['full_address'] ;
$perm_email = $lumber_ap_row['perm_email']; // Get email for history lookup

$Status_ =  $lumber_ap_row['Status_'] ;

if (($Status_) == ('New')){
	header( "Location: validation.php?lumber_app_id=$l_id" ) ;
}

// ---------------------------------------------------------
// NEW LOGIC: Fetch Previous Permits for Modal
// Inner Join with client_client_document_history to get Records Unit Date
// ---------------------------------------------------------
$prev_sql = "SELECT 
                la.lumber_app_id, 
                la.Registration_Number, 
                la.date_applied, 
                ch.Date as Date_Released
             FROM lumber_application la
             INNER JOIN client_client_document_history ch ON la.lumber_app_id = ch.lumber_app_id
             WHERE la.perm_email = '$perm_email' 
             AND la.lumber_app_id != '$l_id'
             AND ch.Title = 'Records Unit'
             ORDER BY la.lumber_app_id DESC";

$prev_qry = mysqli_query($con, $prev_sql);
// ---------------------------------------------------------

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS - DENR R13</title>

    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="../build/css/custom.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard.php" class="sidebar-brand d-flex align-items-center" ><img class="img-fluid img-overlay" src="images/oldpmslogo.png" alt="logo"/></a>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="application.php"><i class="fa fa-edit"></i> Evaluation </a></li>
                  <li><a href="payment.php"><i class="fa fa-paypal"></i> Payment </a></li>
                  <li><a href="validation.php"><i class="fa fa-location-arrow"></i> Validation </a></li>
                  <li><a href="sitevalidated.php"><i class="fa fa-map-marker"></i> Site Validated </a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              </div>
            </div>
        </div>

        <div class="top_nav">
           <div class="nav_menu navbar-dark" style="background: #222222">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
              <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
              <a href="dashboard.php"><h5>ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5></a>
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/faces/face28.png" alt="" ><span style="color: green">FUU - CENRO</span>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="javascript:;"> Message</a>                   
                      <a class="dropdown-item"  href="javascript:;">
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        </div>
			<div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Validation Form | <?php echo $Status_ ; ?></h2>
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
                                        <div class="count green"><h1>Validation Information</h1></div>
                                        <h4><?php echo $lumber_app_name ; ?></h4>
                                        <h4><?php echo $address ; ?></h4>
                                        <br>
                                    </center>
									<br />									
									<form class="form-label-left input_mask" method="POST" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Annual Gross Volume</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="cu.m" name="Annual_Gross_Volume" >
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total Value</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="0.00" name="Total_Value">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Number of Employee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control input" placeholder="Male"  id="male" name="No_of_Employee_Male">
											</div>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control input" placeholder="Female" id="female" name="No_of_Employee_Female">
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
											<label class="col-form-label col-md-2 col-sm-2 ">Previous Cert. Registration No.</label>
											<div class="col-md-2 col-sm-2 ">
                                                <div class="input-group">
												    <input type="text" class="form-control" placeholder="" name="Previous_Cert_Reg_No" id="Previous_Cert_Reg_No">
                                                    <span class="input-group-btn" style="margin-left:5px;">
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#prevPermitModal" title="Search Previous Permit">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Years Operated</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="" name="Years_Operated">
											</div>
										</div>
                                        
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Date Issued</label>
											<div class="col-md-2 col-sm-2 ">
												<input name="Date_Issued" id="Date_Issued" class="form-control" type="date" required="required">
											</div>
                                            <label class="col-form-label col-md-2 col-sm-2 ">Date Expired</label>
											<div class="col-md-2 col-sm-2 ">
												<input name="Date_Expired" id="Date_Expired" class="form-control" type="date" required="required">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 " hidden>Application Fee</label>
											<div class="col-md-2 col-sm-2 ">
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
											<label class="col-form-label col-md-2 col-sm-2  " >Coordinates (UTM)</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Northing" name="Coordinates_Latitude">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Easting" name="Coordinates_Longitude">
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


										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
												<button type="button" class="btn btn-primary" >Cancel</button>
												<button type="submit" class="btn btn-success" name="Submit">Submit</button>
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

require_once "../../processphp/config.php";

if ( isset($_POST['Submit'])) {    
$uniqid_lap = uniqid();
$l_id = $_GET['lumber_app_id'];

$Annual_Gross_Volume = $_POST['Annual_Gross_Volume']; 
$No_of_Employee_Male = $_POST['No_of_Employee_Male']; 
$No_of_Employee_Female = $_POST['No_of_Employee_Female']; 

$Kind_of_Equipment_used = '';
// $_POST['Kind_of_Equipment_used']; 

$State_Condition = '';
//  $_POST['State_Condition']; 
$Previous_Cert_Reg_No = $_POST['Previous_Cert_Reg_No']; 
$Date_Issued = $_POST['Date_Issued']; 
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
$Date_Expired = $_POST['Date_Expired']; 
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
Cash_Bond)

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
:Cash_Bond
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

$result = $query->execute();


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




// -------------------------------------------------------------------------------









// $em = "Successfully Submitted!";
// header ("Location: ../../processphp/univmodal.php?error=$em");

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("Successfully Submitted!");


}

 ?> 

<div class="modal fade" id="prevPermitModal" tabindex="-1" role="dialog" aria-labelledby="prevPermitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prevPermitModalLabel">Select Previous Permit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Registration No.</th>
                        <th>Date Applied</th>
                        <th>Date Released (Records Unit)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(mysqli_num_rows($prev_qry) > 0){
                        while($row = mysqli_fetch_assoc($prev_qry)){
                            $regNum = $row['Registration_Number'];
                            $dateApp = $row['date_applied'];
                            $dateRelRaw = $row['Date_Released'];
                            
                            // Format for Display (e.g., September 12, 2024)
                            $dateRelDisplay = date('F j, Y', strtotime($dateRelRaw));
                            
                            // Format for Input Value (MUST be Y-m-d for date input types)
                            $dateRelISO = date('Y-m-d', strtotime($dateRelRaw));
                    ?>
                    <tr>
                        <td><?php echo $regNum; ?></td>
						<td><?php echo date('F j, Y', strtotime($dateApp)); ?></td>
						<td><?php echo $dateRelDisplay; ?></td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" 
                                    onclick="selectPermit('<?php echo $regNum; ?>', '<?php echo $dateRelISO; ?>')">
                                Select
                            </button>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No previous records found for this email.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<footer class="footer-dark" style="background: #01390c">
        <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
						<h6>Department of Environment and Natural Resources - CARAGA Region <h/6> 
						<h5>DENR Regional ICT Caraga </h5> 
                        <h6>&copy; Copyright 2022. All Rights Reserved </h6>
                    </div>
          <div class="clearfix"></div>
            </footer>
      </body>
      </html>

	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<script src="../vendors/nprogress/nprogress.js"></script>
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<script src="../build/js/custom.min.js"></script>

    <script>
        function selectPermit(regNo, dateRelease) {
            // Set the Registration Number
            $('#Previous_Cert_Reg_No').val(regNo);
            
            // Set the Date Issued
            // This now accepts YYYY-MM-DD from the PHP loop
            $('#Date_Issued').val(dateRelease);
            
            // Close the modal
            $('#prevPermitModal').modal('hide');
        }
    </script>