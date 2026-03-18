



<?php
session_start();
require_once "../../processphp/config.php";


$id = $_GET['lumber_app_id'];

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id  = $id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];
$Fullname = $lumber_ap_row['perm_fname'] .' '. $lumber_ap_row['perm_lname'];
$muncity_code = $lumber_ap_row['muncity_code'];
$prov_code = $lumber_ap_row['prov_code'];
$perm_lname = $lumber_ap_row['perm_lname'];
$Status_ = $lumber_ap_row['Status_'];
$bussiness_name = $lumber_ap_row['bussiness_name'];
$full_address = $lumber_ap_row['full_address'];
$Suffix = $lumber_ap_row['Suffix'];


$lumber_app_payment = "SELECT * FROM payment_feny where lumber_app_id  = $id";
$lumber_app_qry_payment = mysqli_query($con, $lumber_app_payment);
$lumber_ap_row_payment = mysqli_fetch_assoc($lumber_app_qry_payment);

// mun code 
$lumber_app_QW2 = "SELECT * FROM muncity where mun_code = $muncity_code";
$lumber_app_qry_QW2 = mysqli_query($con, $lumber_app_QW2);
$lumber_ap_row_QW2 = mysqli_fetch_assoc($lumber_app_qry_QW2);
$muncity_name = $lumber_ap_row_QW2['muncity_name'];


// prov code 
$lumber_app_QW3 = "SELECT * FROM province where prov_code = $prov_code";
$lumber_app_qry_QW3 = mysqli_query($con, $lumber_app_QW3);
$lumber_ap_row_QW3 = mysqli_fetch_assoc($lumber_app_qry_QW3);
$prov_name = $lumber_ap_row_QW3['prov_name'];




$dateyear = date('Y');
date_default_timezone_set("Asia/Manila");

$datemonth = date('F');

$dtp1 = ($datemonth .' '. date('d') .', '. date('Y')) ;


        									
								
								         	



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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
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
									<h2 class="text-info"><?php echo $Fullname ; ?> <small><?php echo $lumber_ap_row['bussiness_name']; ?></small>&nbsp;&nbsp;</h2>
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
									<form class="form-label-left input_mask" method="post" action="generate-pdf2.php" formtarget="_blank" target="_blank">

									
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Registration Number.</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="lumber_app_id" name="lumber_app_id" id="lumber_app_id"  value="<?php echo $id; ?>" hidden >
											     	<input type="text" class="form-control" placeholder="Lumber Dealer" name="perm_lname" id="perm_lname"  value="<?php echo $perm_lname ; ?>" hidden>
													<input type="text" class="form-control" placeholder="Registration Number" name="regnumber" id="regnumber" value="<?php echo 'LD-R13-'.$Suffix.'-'.$dateyear.'00'.$lumber_ap_row['lumber_app_id']; ?>">
													<input type="text" class="form-control" placeholder="Registration Number" name="status" id="regnumber" value="<?php echo $Status_ ; ?>">
												
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Proprietor Name</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer owner" name="owner" id="owner" value="<?php echo $Fullname ; ?>" >
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Business Trade Name</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer" name="ldname" id="ldname"  value="<?php echo $bussiness_name ?>">
												</div>
											</div>
											<div class="item form-group row">
											 <label class="col-form-label col-md-2 col-sm-2 label-align">Lumber Dealer Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Address" name="ldaddress" id="ldaddress"  value="<?php echo $full_address ?>">
												</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" value="<?php echo $dtp1 ; ?>" readonly>										
											</div>
											</div>                                       	
										
											<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Lumber Dealer Municipal Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer Address" name="municipal" id="municipal" value="<?php echo $muncity_name ; ?>" readonly>			
												</div>
											</div>
											<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Lumber Dealer Provincial Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer Address" name="province" id="province" value="<?php echo $prov_name ; ?>" readonly>			
												</div>
											</div>
                                       	<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5">



											<div class="form-section" id="section1">

											<?php

												echo '<button type="submit" class="btn btn-success">Prepare Acknowledgement</button>';
											?>

											</div>


                                            	</form>
											<div class="form-section" id="section2" style="display:none;">
												<?php	
												echo '<a  target="_blank" href="generate-pdf_CF.php?lumber_app_id='.$id.'" type="button" name="submit_1" class="btn btn-success">Prepare Memorandum CF</a>';
												echo '</div>';	
												
												?>
										 <div class="form-section" id="section3" style="display:none;">
												<?php
												echo '<a id="receiveButton" href="../prc_receive.php?lumber_app_id=' . $id . '" type="button" name="submit_1" class="btn btn-success">Receive</a>';
												?>
										</div>

										<div class="form-navigation">
											<button type="button" id="prevBtn" onclick="prevSection()">Previous</button>
											<button type="button" id="nextBtn" onclick="nextSection()">Next</button>
						
										</div>
								


						
											</div>
										</div>
                    					</div>
								


										<br> <br>
						



							</div>
						</div>
					</div>
		  		</div>
			</div>
		<!-- end page content -->
        <!-- footer content -->
        	<?php
					require_once('footer.php');
			?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	 <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
	  
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	 
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



<script>
        let currentSection = 1;

        function showSection(sectionNumber) {
            document.querySelectorAll('.form-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(`section${sectionNumber}`).style.display = 'block';

            if (sectionNumber === 1) {
                document.getElementById('prevBtn').style.display = 'none';
            } else {
                document.getElementById('prevBtn').style.display = 'inline-block';
            }

            if (sectionNumber === 3) {
                document.getElementById('nextBtn').style.display = 'none';
                document.getElementById('submitBtn').style.display = 'inline-block';
            } else {
                document.getElementById('nextBtn').style.display = 'inline-block';
                document.getElementById('submitBtn').style.display = 'none';
            }
        }

        function nextSection() {
            if (currentSection < 3) {
                currentSection++;
                showSection(currentSection);
            }
        }

        function prevSection() {
            if (currentSection > 1) {
                currentSection--;
                showSection(currentSection);
            }
        }

        // Initialize the form with the first section visible
        showSection(currentSection);
    </script>