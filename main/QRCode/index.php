<?php session_start();?>
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		#divvideo{
			 box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
		</style>
    </head>
    <body style="background:#eee">

       <div class="container">
            <div class="row">
                <div class="col-md-4" style="padding:10px;background:#fff;border-radius: 5px;" id="divvideo">
					<center><p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> TAP HERE</p></center>
                    <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>
					<br>
					<br>
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

                </div>
				
					<?php

							if(isset($_POST['studentID'])){
								

								include('../../processphp/config.php');

	                  			  $reg_id = $_POST['studentID'];

	                    // echo $reg_id;

								if($con->connect_error){
									die("Connection failed" .$con->connect_error);
								}
									$lumber_app = "SELECT * FROM lumber_application where Registration_Number = '$reg_id'";
									$lumber_app_qry = mysqli_query($con, $lumber_app);
									$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
									// 
									$lumber_owner = $lumber_ap_row['perm_fname']. ' ' . $lumber_ap_row['perm_lname']; ;
									$lumber_dealer_address = $lumber_ap_row['full_address'];
									$lumber_app_id = $lumber_ap_row['lumber_app_id'];
																
									$lumber_app = "SELECT * FROM lumber_dealer_e_permit_form where lumber_app_id = $lumber_app_id";
									$lumber_app_qry = mysqli_query($con, $lumber_app);
									$lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
									// 
									$date_issued_date = $lumber_ap_row3['date'];
								


									$date_gen_issued=date_create($date_issued_date);
									date_add($date_gen_issued,date_interval_create_from_date_string("0 days"));
									$dateissued = date("Y-F-d");
									// 
									$date_issued = date_format($date_gen_issued,"F d, Y");



									$date_gen=date_create($date_issued);
									date_add($date_gen,date_interval_create_from_date_string("365 days"));
									$dateissued = date("Y-F-d");
									// 
									$dateexpiry = date_format($date_gen,"F d, Y");


									
							}


					?>


                <div class="col-md-8">
				<!-- <form action="CheckInOut.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo"> -->
                <form method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                     <i class="glyphicon glyphicon-qrcode"></i> <label>SCAN QR CODE</label> <p id="time"></p>
                    <input type="text" name="studentID" id="text" placeholder="scan qrcode" class="form-control"   autofocus>
                </form>

	



				<div class="row">
								  <div class="col-md-6 col-sm-12">
									<div style="width:500px;" id="reader"></div>
								  </div>
								  <div class="col-md-6 col-sm-12">
												<h4>Lumber Dealer Registration Number:</h4>
											
													
												<!-- <a type="input" id="result" name="qr_result">LD Reg No. #</a> -->
								  									
											<form method="post"	>
												
											<!-- <span name="result" type="text" id="result"> LD Reg No. #</span> -->
											<!-- <input type="button" id="result" name="result" >LD Reg No. #</input> -->

												  <div class="ln_solid"></div>
												  <div class="col-md-12 ">
											<div class="x_panel">
											<div >
												<h2><strong>Lumber Dealer Client Information</strong></h2>
											</div>
											<div class="x_content">
												<br />
												<form class="form-horizontal form-label-left">

													<div class="form-group row ">
														<label class="control-label col-md-3 col-sm-3 ">Lumber Dealer Owner</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" readonly="readonly" placeholder="" name="owner" value="<?php error_reporting(0); echo $lumber_owner ; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 col-sm-3 ">Lumber Dealer Business Address </label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control"  readonly="readonly" placeholder="" name="ldaddress" value="<?php echo $lumber_dealer_address; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 col-sm-3 ">Date of Issuance</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" readonly="readonly" name="dateissued" value="<?php echo $date_issued ; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label col-md-3 col-sm-3 ">Date of Expiry</label>
														<div class="col-md-9 col-sm-9 ">
															<input type="text" class="form-control" readonly="readonly" name="dateexpiry" value="<?php echo $dateexpiry ; ?>">
														</div>
													</div>
													<div>
										            <a type="button" class="btn btn-round btn-warning" href="../records/generate_viewLumberEdealer.php?lumber_app_id=<?php echo $lumber_app_id ; ?>" target="_blank" >View</a>
														<!-- <input type="button" class="btn btn-round btn-warning" name="result" ><i class="fa fa-search-plus">View </i> </input> -->

																</div>





							
                  </table>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>

		<script>
			function Export()
			{
				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);

			   }if(cameras.length > 1 ){
                   scanner.start(cameras[1]);

				   
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               document.forms[0].submit();
           });
        </script>
		
		<script type="text/javascript">
		var timestamp = '<?=time();?>';
		function updateTime(){
		  $('#time').html(Date(timestamp));
		  timestamp++;
		}
		$(function(){
		  setInterval(updateTime, 1000);
		});
		</script>
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script>
		  $(function () {
			$("#example1").DataTable({
			  "responsive": true,
			  "autoWidth": false,
			});
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false,
			  "responsive": true,
			});
		  });
		</script>
		
    </body>
</html>