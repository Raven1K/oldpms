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
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
       
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
	  
	<style>
		.btn {
 			 width:80%;
			 }
	</style>
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
              <div class="title_left">
				  <h3 class="text-success"><strong>For Action</strong> <small>  | Lumber Dealers of Caraga Region</small></h3>
              </div>              
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ARD-Technical Services <small>| Regional Office Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench fa-pull-left"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Agusan del Norte</a>
                            <a class="dropdown-item" href="#">Agusan del Sur</a>
							<a class="dropdown-item" href="#">Surigao del Norte</a>
                            <a class="dropdown-item" href="#">Surigao del Sur</a>
							<a class="dropdown-item" href="#">Dinagat Island</a>
                        </div>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
								<table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Permittee Name</th>
											<th>Business Trade Name</th>
                                            <th>Address</th>
											<th>Registration Number</th>
											<th>Date Applied</th>
											<th>CENROs Concerned</th>
											<th>New / Renewal</th>
											<th>Action</th>
                                            <th>Status</th>                                           
                                        </tr>
                                     </thead>                                    
                                    <tbody>
                                         <tr>
											<td>1</td>
                                            <td>Tiger Nixon</td>
											<td>No1knows Lumber Dealer</td>
                                            <td>Cabadbaran</td>
											<td>Registration Number</td>
											<td>2022-10-03</td>
											<td>CENRO Tubay</td>
											<td> <strong>New</strong> </td>
											<td>
												<div class="row justify-content-center">
												<a href="evaluation.php" class="btn btn-round btn-primary btn-sm ">                                        			
                                        			<span class="text align-content-center"><strong>Review</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-magnifying-glass-arrow-right"></i>
                                       				</span>
                                   				 </a>
												</div>
											</td>
                                            <td>
												<span class="text-primary"><i class="bi bi-upload me-1 text-primary"></i><strong>For Signature</strong></span>
												
											</td>                                          
                                        </tr>                                        
                                         <tr>
											<td>2</td>
                                            <td>Ashton Cox</td>
											<td>No1knows Lumber Dealer</td>
                                            <td>Talacogon</td>
											<td>Registration Number</td>
											<td>2021-08-03</td>
											<td>CENRO Talacogon</td>
											<td> <strong>New</strong> </td>
											<td>
												<div class="row justify-content-center">
												<a href="#" class="btn btn-success btn-round disabled btn-sm ">                                        			
                                        			<span class="text align-content-center"><strong>Completed</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-check-double"></i>
                                       				</span>
                                   				 </a>
												</div>
											</td>
                                            <td >
												<span class="text-success"><i class="bi bi-upload me-1 text-info"></i><strong> Approved </strong></span>
											</td>                               
                                         </tr>
                                         <tr>
											<td>5</td>
                                            <td>Airi Satou</td>
											<td>No1knows Lumber Dealer</td>
                                            <td>Bayugan City</td>
											<td>Registration Number</td>
											<td>2022-11-03</td>
											<td>CENRO Bayugan</td>
											<td> <strong>New</strong> </td>
											 <td>
												<div class="row justify-content-center">
											 	<a href="#" class="btn-warning btn-sm btn-round btn ml-0">                                       				 
                                       				 <span class="text align-content-center"><strong>Receive</strong></span>
													 <span class="icon ml-2">
                                           			    <i class="fas fa-check-to-slot"></i>
                                       				 </span>
                                   				</a>
												</div>											
											</td>
											<td >
												<span class="text-warning"><i class="bi bi-exclamation-octagon me-1 text-danger"></i><strong>For Acknowledgemnt</strong></span>	
											</td>                                    
                                           </tr>
                                         <tr>
											<td>6</td>
                                            <td>Brielle Williamson</td>
											<td>No1knows Lumber Dealer</td>
                                            <td>Surigao City</td>
											<td>Registration Number</td>
											<td>2021-12-03</td>
											<td>CENRO Tubod</td>
											<td> <strong>Renewal</strong> </td>
											<td>
												<div class="row justify-content-center">
												 <a href="evaluation.php" class="btn btn-primary btn-round btn-sm ml-0">                                       			
                                        			<span class="text align-content-center"><strong>Review</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-magnifying-glass-arrow-right"></i>
                                       				</span>
                                   				 </a>
												</div>
											</td>
                                            <td>
												<span class="text-primary"><i class="bi bi-upload me-1 text-primary"></i><strong>For Signature</strong></span>
												
											</td>                                  
                                            </tr>
                                         <tr>
											<td>5</td>
                                            <td>Airi Satou</td>
											<td>No1knows Lumber Dealer</td>
                                            <td>Bayugan City</td>
											<td>Registration Number</td>
											<td>2022-11-03</td>
											<td>CENRO Bayugan</td>
											<td> <strong>Renewal</strong> </td>
											 <td>
												<div class="row justify-content-center">
											 	<a href="#" class="btn-warning btn-sm btn-round btn ml-0">                                       				 
                                       				 <span class="text align-content-center"><strong>Receive</strong></span>
													 <span class="icon ml-2">
                                           			    <i class="fas fa-check-to-slot"></i>
                                       				 </span>
                                   				</a>
												</div>											
											</td>
											<td >
												<span class=" text-warning"><i class="bi bi-exclamation-octagon me-1 text-danger"></i><strong>For Acknowledgemnt</strong></span>	
											</td>                                    
                                           </tr>
                                         <tr>
											<td>8</td>
                                            <td>Rhona Davidson</td>
											<td>No1knows Lumber Dealer</td>
                                            <td>Dinagat Island</td>
											<td>Registration Number</td>
											<td>2022-10-15</td>
											<td>PENRO Dinagat Island</td>
											<td><strong>Renewal</strong></td>
											<td>
												<div class="row justify-content-center">
											 	<a href="#" class="btn-danger  btn-sm btn btn-round ml-0">                                      				 
                                       				 <span class="text align-content-center"><strong>Rejected</strong></span>
													 <span class="icon ml-2">
                                           			   <i class="fas fa-times-circle"></i>
                                       				 </span>
                                   				</a>
													</div>
											</td>
                                            <td>
												<span class=" text-danger"><i class="bi bi-exclamation-octagon me-1 text-danger"></i><strong>Returned</strong></span>
											</td>                                           
                                            </tr>
                                      </tbody>
                                </table>
							</div>
                		  </div>
              		  </div>
            	  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php
		   require_once("footer.php")
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
