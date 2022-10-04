<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS - DENR R13</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
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
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="application.php"><i class="fa fa-edit"></i> Evaluation </a></li>
                  <li><a href="payment.php"><i class="fa fa-paypal"></i> Payment </a></li>
                  <li><a href="validation.php"><i class="fa fa-location-arrow"></i> Validation </a></li>
                  <li><a href="https://oldpms.herokuapp.com/"><i class="fa fa-map-marker"></i> Site Validated </a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              </div>
            <!-- /sidebar menu -->

             <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
           <div class="nav_menu navbar-dark" style="background: #222222">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
              <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
              <h5>ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
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
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Validation Form</h2>
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
                                        <h4>Juan Dela Cruz</h4>
                                        <h4>San Vicente, Bislig Surigao del Sur</h4>
                                        <br>
                                    </center>
									<br />
									<form class="form-label-left input_mask">
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Annual Gross Volume</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="cu.m">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total Value</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="0.00">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Number of Employee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Male">
											</div>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Female">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Total</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="0.00" disabled="disabled">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Kind of Equipment used</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Made</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">State/Condition</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Size</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Value</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Previous Cert. Registration No.</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Years Operated</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Date Issued
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
                                            <label class="col-form-label col-md-2 col-sm-2 ">Date Expired
											</label>
											<div class="col-md-2 col-sm-2 ">
												<input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
											<label class="col-form-label col-md-2 col-sm-2 ">Application Fee</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 600.00" disabled="disabled">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Registration Fee</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 480.00" disabled="disabled">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Oath Fee</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="₱ 36.00" disabled="disabled">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Cash Bond</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="₱ 1,000.00" disabled="disabled">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Coordinates</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Latitude">
											</div>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Longitude">
											</div>
										</div>
										<div class="form-group row">
                                                <label for="formFile" class="col-form-label col-md-2 col-sm-2  ">Lumber Dealer Photo :</label>
                                                <div class="col-md-4 col-sm-4 ">
                                                <input  class="form-control " type="file" id="formFile">
											</div>
										</div>
                                        <div class="form-group row">
                                            <label for="formFile" class="col-form-label col-md-2 col-sm-2  ">Upload Verification Report :</label>
                                            <div class="col-md-4 col-sm-4 ">
                                            <input  class="form-control " type="file" id="formFile">
                                        </div>
                                    </div>
										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
												<button type="button" class="btn btn-primary">Cancel</button>
												<button type="submit" class="btn btn-success">Submit</button>
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

			<!-- /page content -->

			<!-- footer content -->
      <footer class="footer-dark" style="background: #222222">
        <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
						<h6>Department of Environment and Natural Resources - CARAGA Region <h/6> 
						<h5>DENR Regional ICT Caraga </h5> 
                        <h6>&copy; Copyright 2022. All Rights Reserved </h6>
                    </div>
          <div class="clearfix"></div>
            </footer>
      </body>
      </html>

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>


