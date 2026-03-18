
<?php


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






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Issued Certificates  within Caraga Region</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
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
                <h3 class="text-success"><strong>Reports</strong><small>  | List of Issued Certificates of Registration as Lumber Dealer</small></h3>
              </div>              
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>Office of the RED</strong> <small>| Regional Office Users</small></h2>
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
                    		<table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">			
								<thead class="bg-primary text-white">
									<tr>
										<th>Client ID</th>
										<th>Business Trade Name</th>
										<th>Business Address</th>
										<th>Registration Number</th>							
										<th>Volume Contracted</th>
										<th>Implementing CENROs</th>
										<th>PENROs Concerned</th>
										<th>Action</th>
                    <th>Documents</th>
									</tr>
								</thead>
								<tbody>
								<?php


$sql = "SELECT * FROM `lumber_application` WHERE Application_status  = 'Complete' ORDER BY lumber_app_id ASC";
$province = mysqli_query($con,$sql);


// user_client ORDER BY lastname ASC"; 


while ($row = mysqli_fetch_array($province,MYSQLI_ASSOC)):;


	   echo   '<tr>' ;
	   echo   '<th scope="row">'.$row['lumber_app_id'].'</th>';
	   echo   '<td>'.$row['bussiness_name'].' </td>';
	   echo   '<td>'.$row['full_address'].'</td>';
	   echo   '<td>'.$row['Registration_Number'].'</td>';
	   echo   '<td>'.$row['Status_'].'</td>';
	   echo   '<td>'.$row['Office'].'</td>';
	   echo   '<td>'.$row['office_under'].'</td>';
	   echo    '<td><a type="button" class="btn btn-primary" href="../../map/index_view_map.php?lumber_app_id='.$row['lumber_app_id'].'" )">View Map</a></td>';
     echo    '<td><a type="button" class="btn btn-primary" href="generate_viewLumberEdealer.php?lumber_app_id='.$row['lumber_app_id'].'" )">View Certificates</a></td>';
	   echo   '</tr>';

endwhile;
?>
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
	<script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>

  </body>
</html>
