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
				  <h3 class="text-success"><strong>For Evaluation</strong> <small>  | Lumber Dealers of Caraga Region</small></h3>
              </div>              
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="text-info">Juan Dela Cruz<small> | No1knows Lumber Dealer</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
        						<table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
								   <thead class="bg-primary text-white">                        	
										  <tr>
											  <th> No. </th>
											  <th> Document Name </th>
											  <th> Status </th>
											  <th> Action </th>
										  </tr>
								   </thead>
										   <tbody>
												  <tr>
													  <td> 01</td>
													  <td>1. Application form or duly accomplished & sworn/notirized.</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
														  <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>
															<!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>
								  
												  <tr>
												      <td> 02</td>
													  <td>2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer.</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
														  <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>

															  <!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															  <!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>
					  
												  <tr>
												      <td> 03</td>
													  <td>3. Mayor's Permit/Business Permit</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
														  <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>

															  <!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>
				  
												  <tr>
												      <td> 04</td>
													  <td>4. Annual Business Plan</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
													      <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>

															  <!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>
			  
												  <tr>
												      <td> 05</td>
													  <td>5. Latest Income Tax Return</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
													      <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>

															  <!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>
		  
												  <tr>
												      <td> 06</td>
													  <td>6. Proof ownership of the lumberyard or consent/agreement with the owner</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
														  <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>

															 <!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												   </tr>
	  
												  <tr>
												      <td> 07</td>
													  <td>7. Generated Application Form</td>
													  <td>
														  <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
													      <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal1"></button>
																<i class="fa fa-search-plus"></i> View</a>

															  <!-- modal for evaluation -->
															  <?php
																require_once('modaleval.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>

												  <tr>
												      <td> 08</td>
													  <td>Memorandum of Endorsement</td>
													  <td>
													      <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
													      <div class="container">
															<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal3"></button>
																<i class="fa fa-search-plus"></i> View</a>

															 <!-- modal for evaluation -->
															  <?php
																require_once('modaleval3.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>

												  <tr>
												      <td> 09</td>
													  <td>Release Lumber Dealer Permit</td>
													  <td>
													     <div class="badge badge-success">Approved</div>
													  </td>
													  <td>
													     <div class="container">
															<div><a type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal4"></button>
																<i class="fa fa-search-plus"></i> Release </a>

															 <!-- modal for evaluation -->
															  <?php
																require_once('modaleval4.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>
														   </div>
													  </td>
												  </tr>
                                           </tbody>
                                 </table>
							</div>
                		  </div>
              		  </div>
            	  </div>
					<ul class="nav navbar-right panel_toolbox">
						<div class="row justify-content-center">
							  <li><a href="endorsement2.php" class="btn-primary btn-sm btn-round btn ml-0">                                       				 
									   <span class="text align-content-center text-white"><strong>Create Acknowledgement</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-check-to-slot text-white"></i>
										</span>
							  </li></a>
							  <li><a href="action.php" class="btn-secondary btn-sm btn-round btn ml-0">                                       				 
									   <span class="text align-content-center text-white"><strong>Back</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-circle-chevron-left text-white"></i>
										</span>
							  </li></a>
					    </div>
                    </ul>
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
