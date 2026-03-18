
<?php
error_reporting(0);
session_start();
require_once "../processphp/config.php";


$id = $_GET['lumber_app_id'];

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id  = '$id'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];
$Fullname = $lumber_ap_row['perm_fname'] .' '. $lumber_ap_row['perm_lname'];
$suffix = $lumber_ap_row['Suffix'];
$bussiness_name = $lumber_ap_row['bussiness_name'];
$full_address = $lumber_ap_row['full_address'];

$lumber_app_payment = "SELECT * FROM payment_feny where lumber_app_id  = $id";
$lumber_app_qry_payment = mysqli_query($con, $lumber_app_payment);
$lumber_ap_row_payment = mysqli_fetch_assoc($lumber_app_qry_payment);

$dateyear = date('Y');



date_default_timezone_set("Asia/Manila");

$dtp1 = date('m/d/y');



$lumber_app = "SELECT * FROM c_endorsement where lumber_app_id = $id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row_c_endorsement = mysqli_fetch_assoc($lumber_app_qry);

 $MPdateexpiry = $lumber_ap_row_c_endorsement['MPdateexpiry'];
 $MPdateissued = $lumber_ap_row_c_endorsement['MPdateissued'];
 $BNNumber = $lumber_ap_row_c_endorsement['BNNumber'];
 $DTIdateexpiry = $lumber_ap_row_c_endorsement['DTIdateexpiry'];
 $DTIdateissued = $lumber_ap_row_c_endorsement['DTIdateissued'];




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS | DENR R13</title>

    <!-- Bootstrap -->	
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		  
		<!-- sidebar navigation -->        
          <?php
				require_once('sidebar.php');
			?>        
		<!-- /sidebar navigation -->
		  
        <!-- top navigation -->
		  
          <?php
				require_once('topbar.php');
			?> 
		  
        <!-- /top navigation -->

		<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_right">
							<h3 class="text-success">Endorsement Form</h3>
						</div>						
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">											
								<div class="x_title">
									<h2 class="text-info"> <small></small>&nbsp;&nbsp;</h2>
											<div class="item form-group">
											<label class="col-form-label col-md-0 col-sm-0 label-align"></label>
											<div class="col-md-0 col-sm-0 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-warning disabled" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="male" class="join-btn"> <strong>&nbsp; New &nbsp;</strong>
													</label>
												</div>
											</div>
											</div>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form class="form-label-left input_mask" method="post" action="generate_POST.php"  target="_blank">

									<input type="text" class="form-control" placeholder="Reference Number" name="lumber_app_id" id="lumber_app_id" value="<?php echo $id; ?>" hidden>



									<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Registration No.</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Reference Number" name="regnumber" id="regnumber" value="<?php echo 'LD-R13-'.''.$suffix.'-'.$dateyear.'00'.$id; ?>" hidden>
													<label class="form-control" ><?php echo 'LD-R13-'.''.$suffix.'-'.$dateyear.'00'.$id; ?></label>
												</div>
											</div>

											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Payment Reference No.</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Reference Number" name="refnumber" id="refnumber"  value="<?php echo $lumber_ap_row_payment['Reference_Number']; ?>" hidden>
													<label class="form-control" ><?php echo $lumber_ap_row_payment['Reference_Number']; ?></label>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Permittee Name</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer owner" name="owner" id="owner" value="<?php echo $Fullname ; ?>" hidden>
													<label class="form-control" ><?php echo $Fullname; ?></label>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Business Trade Name</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer" name="ldname" id="ldname" value="<?php echo $bussiness_name ; ?>" hidden>
													<label class="form-control" ><?php echo $bussiness_name; ?></label>
												</div>
											</div>
											<div class="item form-group row">
											 <label class="col-form-label col-md-2 col-sm-2 label-align">Lumber Dealer Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Address" name="ldaddress" id="ldaddress" value="<?php echo $full_address ; ?>" hidden>
													<label class="form-control" ><?php echo $full_address; ?></label>
												</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<!-- <input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?php echo $dtp1 ; ?>" readonly>			 -->
												<input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" value="<?php echo $dtp1 ; ?>" hidden>	
												<label class="form-control" ><?php echo $dtp1; ?></label>			
											</div>
											</div>
                                        	<span class="section"><strong>Mayor's Permit Details</strong> <small>&nbsp;|&nbsp; <a href type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal2"></button>
												<i class="fa fa-search-plus"></i> <u/>view</u/> </a></small></span>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Issued Date<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input value="<?php echo $MPdateissued ; ?>" id="MPdateissued" name="MPdateissued" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align"> Expiry Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input value="<?php echo $MPdateexpiry ; ?>" id="MPdateexpiry" name="MPdateexpiry" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>

											<!-- hidden -->
											<span hidden class="section"><strong>Department of Trade and Industry (DTI) Details</strong><small>&nbsp;|&nbsp; <a href type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal3"></button>
												<i class="fa fa-search-plus"></i> <u/>view</u/> </a></small></span>
												<!-- hidden -->
											<div hidden class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Business Name No.</label>
												<div class="col-md-4 col-sm-4 ">
													<input value="<?php echo $BNNumber; ?>" type="text" class="form-control" placeholder="DTI BN #" name="BNNumber" id="BNNumber">
												</div>
											</div>
											<!-- hidden -->
											<div hidden class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align"> Issued Date <span class="required">*</span>
											</label>
											<!-- hidden -->
											<div hidden class="col-md-2 col-sm-2 ">
												<input value="<?php echo $DTIdateissued ; ?>" id="DTIdateissued" name="DTIdateissued" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
											<!-- hidden -->
											<div hidden class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align"> Expiry Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input value="<?php echo $DTIdateexpiry ; ?>" id="DTIdateexpiry" name="DTIdateexpiry" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
										
                                       	<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
                                                <button type="submit" class="btn btn-success">Generate Endorsement</button>
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
		<!-- end page content -->
															<!-- modal for view -->
															  <?php
																require_once('modalview.php');
																?> 
															<!-- end modal for view --> 
        <!-- footer content -->
        	<?php
					require_once('footer.php');
			?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	 <!-- jQuery Smart Wizard -->
    <script src="vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- iCheck -->
	<script src="vendors/iCheck/icheck.min.js"></script>
	<!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
	  
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	 
	 <script>
		$(document).ready(function(){
		  $('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
	  
	<script>
		function timeFunctionLong(input) {
			setTimeout(function() {
				input.type = 'text';
			}, 60000);
		}
	</script>
  </body>
</html>