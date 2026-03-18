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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
       
    <!-- Datatables -->
    
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
	  
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
                    <ul class="nav navbar-right panel_toolbox">
						<div class="row justify-content-center">
							  <li><a href="#" class="btn-primary btn-sm btn-round btn ml-0">                                       				 
									   <span class="text align-content-center text-white"><strong>Endorsement</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-check-to-slot text-white"></i>
										</span>
							  </li></a>
							  <li><a href="action.php" class="btn-secondary btn-sm btn-round btn ml-0">                                       				 
									   <span class="text align-content-center text-white"><strong>Cancel</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-circle-chevron-left text-white"></i>
										</span>
							  </li></a>
					    </div>
                    </ul>
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
											
					<?php
                        require_once "../processphp/config.php";
                        // session_start();
						$l_id = $_GET['lumber_app_id'];
                        
                   ?>
                        

                <?php


          $stmt = $connection->query("SELECT * FROM lumber_app_doc_erow  where lumber_app_id = $l_id ORDER BY doc_type_name");
          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
          
          {

              $Review = 'Approved';
              $Review2 = 'For Review';
              $For_Review_FG = 'For Review (FG)';
              $ApprovedFG = 'Approved (FG)';
              $For_Generate_Endorsement = 'For Generate Endorsement';
              $For_Review_FG_RED = 'For Review (FG) RED';
              $For_Review_CG = 'For Review (CG)' ;
              $Approved_CG = 'Approved (CG)';
              $ApprovedFG = 'Approved (FG)';
              $For_Review_FG_RED = 'For Review (FG) RED';
              $For_Gen_EN_Red = 'For Review (LPDD)';
              $For_Gen_EN_cert = 'For Review (LPDD) CF';
              $Number_of_doc = '13';

                echo "<tr><td>" ;
                echo(htmlentities($row['Number_of_doc']));
                echo("</td><td>");
                echo(htmlentities($row['doc_type_name']));
                echo("</td><td>");
                echo(htmlentities ($row['doc_status']) );
                // echo('<a class="btn btn-warning" "'($row['doc_type_name'])'"");
                // echo(htmlentities($row['doc_status']) . '' . ($row['perm_lname']));
                echo("</td><td>");


       
                // echo(htmlentities($row['application_type']));
                // echo("</td><td>");
                if (($row['doc_status']) == ($Review))
                echo('<a class="btn btn-warning" href="modal_review_ROFUS.php?upload_id_doc='.$row['upload_id_doc'].'">View </a>');

                                
                if (($row['doc_status']) == ($Approved_CG))
                echo('<a class="btn btn-warning" href="production\generates_view_pdf2.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');

                if (($row['doc_status']) == ($ApprovedFG))
                echo('<a class="btn btn-warning" href="production\modaltempVIEWER.php?lumber_app_id='.$row['lumber_app_id'].'">View </a>');

                if (($row['doc_status']) == ($For_Review_FG_RED))
                echo('<a class="btn btn-warning" href="production/generates_view_pdf2.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');


                if (($row['doc_status']) == ($For_Gen_EN_Red))
                echo('<a class="btn btn-danger" href="generate_VIEW.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');

                

                if (($row['doc_status']) == ($For_Gen_EN_cert))
                echo('<a class="btn btn-warning" href="GenerateCert.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');



                
      
                // echo('<a class="btn btn-warning" data-toggle="modal" data-target="#myModal1" >Review </a>');




          }
                // echo('<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$row['user_id'].'" class="img-fluid" alt="QR Not available"  width="50" height="50t"');
    
 
                echo("</td></tr>\n");


                // include 'modal_review.php';

                  ?>






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
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>
