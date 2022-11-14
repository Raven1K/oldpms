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
									<h2 class="text-info">Juan dela Cruz <small>Laki Sa Layaw Lumber Dealer</small>&nbsp;&nbsp;</h2>
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
									<form class="form-label-left input_mask" method="post" action="generate-pdf.php" formtarget="_blank" target="_blank">
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Payment Reference No.</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Reference Number" name="refnumber" id="refnumber">
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Permittee Name</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer owner" name="owner" id="owner">
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Business Trade Name</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer" name="ldname" id="ldname">
												</div>
											</div>
											<div class="item form-group row">
											 <label class="col-form-label col-md-2 col-sm-2 label-align">Lumber Dealer Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Address" name="ldaddress" id="ldaddress">
												</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
                                        	<span class="section"><strong>Mayor's Permit Details</strong> <small>&nbsp;|&nbsp; <a href type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal2"></button>
												<i class="fa fa-search-plus"></i> <u/>view</u/> </a></small></span>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Issued Date<span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input id="MPdateissued" name="MPdateissued" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align"> Expiry Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input id="MPdateexpiry" name="MPdateexpiry" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
											<span class="section"><strong>Department of Trade and Industry (DTI) Details</strong><small>&nbsp;|&nbsp; <a href type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal2"></button>
												<i class="fa fa-search-plus"></i> <u/>view</u/> </a></small></span>
											<div class="item form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Business Name No.</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="DTI BN #" name="BNNumber" id="BNNumber">
												</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align"> Issued Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input id="DTIdateissued" name="DTIdateissued" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
											<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align"> Expiry Date <span class="required">*</span>
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input id="DTIdateexpiry" name="DTIdateexpiry" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">												
											</div>
											</div>
										<span class="section"><strong>Lumber Supplier Contract Details</strong></span>
											<div class="form-group row">
												<label class="col-form-label col-md-2 col-sm-2 label-align">Supplier Name (Owner)</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Lumber Supplier Name" name="lsname" id="lsname">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-form-label col-md-2 col-sm-2 label-align">Type of Contracts</label>
												<div class="col-md-4 col-sm-4 ">
													<select class="form-control" name="SCtype" id="SCtype" placeholder="PTPOC or PTPR">
													<option>Private Tree Plantation Registration (PTPR)</option>
													<option>Private Tree Plantation Ownership Certificate (PTPOC)</option>												
												</select>
												</div>
											</div>
											<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Supplier Municipal Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Supplier Address" name="municipal" id="municipal">
												</div>
											</div>
											<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Supplier Provincial Address</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="Supplier Address" name="province" id="province">
												</div>
											</div>
											<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 label-align">Total Supply</label>
												<div class="col-md-4 col-sm-4 ">
													<input type="text" class="form-control" placeholder="bd. ft." name="totalsupply" id="totalsupply">
												</div>
											</div>
										<div class="form-group row">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Particulars</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" readonly="readonly" value="Chainsaw-cut Lumber" placeholder="Chainsaw-cut Lumber" name="particulars" id="particulars">
											</div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Lumber Species</label>
                                        <div class="col-md-2 col-sm-2 ">
										<p style="padding: 5px;">
											<input type="checkbox" name="treespecie" id="treespecie" value="Falcata" class="flat" /> Falcata
											<br />

											<input type="checkbox" name="treespecie1" id="treespecie" value="Mahogany" class="flat" /> Mahogany
											<br />

											<input type="checkbox" name="treespecie2" id="treespecie" value="Gemelina" class="flat" /> Gemelina
											<br />

											<input type="checkbox" name="treespecie3" id="treespecie" value="Caimito" class="flat" /> Caimito
											<br />

                                            <input type="checkbox" name="treespecie4" id="treespecie" value="Mango" class="flat" /> Mango
											<br />
											<p>
											</div>
                                            </div>
<!--	Start Here								-->
											<div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Falacata</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="falbd" id="falbd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Mahogany</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="mabd" id="mabd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Gemelina</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="gebd" id="gebd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Caimito</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="cabd" id="cabd">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Mango</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Volume bd.ft." name="manbd" id="manbd">
											</div>
                                            </div>
<!--	End Here								-->
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Supplier Validity</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="# of Years" name="yrvalidity" id="yrvalidity">
											</div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Volume</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="bd. ft." name="volume" id="volume">
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