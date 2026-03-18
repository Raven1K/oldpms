


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
                    <h2><strong>Records Section for Release</strong> <small>| Regional Office Users</small></h2>
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
   




                                    <?php
                        require_once "../../processphp/config.php";
                        // session_start();
                        // require_once "../modalcalendar.php";



                   ?>
                        




                <?php


    function getFullMonthNameFromDate($date){
     $monthName = date('F d, Y', strtotime($date));
     return $monthName;
          }
        $dateyear = date('Y');




		  $l_id = '17';
          $stmt = $connection->query("SELECT perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, bussiness_name, Office, Suffix
		  FROM lumber_application 
		  where Flow_stat >= $l_id");

// where Flow_stat = $l_id

          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {


        $Certification = 'For Certification';
				$ForReceive_ROFUS = 'For receive RO FUS';
        $On_Process_FUS_RO = 'On Process FUS RO';
        $Review_LPDD = 'For Review LPDD';
        $For_Review_LPDD_CF = 'For Review (LPDD) CF' ;
        $For_Recommend_RO = 'For Recommend (RO)' ;
        $For_Approval_RED = 'For Approval (RED)' ;
        $For_Release = 'For Client';
        

                echo "<tr><td>" ;
                // echo(htmlentities($row['lumber_app_id']));
                echo('<img src="https://qrcode.tec-it.com/API/QRCode?data='.$row['uniqid_lapp'].'" class="img-fluid" alt="QR Not available"  width="50" height="50t"');
                echo("</td><td>");
                echo(htmlentities($row['perm_fname']) . ' ' . ($row['perm_lname']));
                echo("</td><td>");
                echo(htmlentities($row['bussiness_name']));
                echo("</td><td>");

                echo(htmlentities($row['full_address']));
                echo("</td><td>");

				        echo(htmlentities('LD-R13-'.''.$row['Suffix'].'-'.$dateyear.'00'.$row['lumber_app_id']));
                echo("</td><td>");


				$date = $row['date_applied'] ;
				echo getFullMonthNameFromDate($date);
				echo("</td><td>");

                echo(htmlentities($row['Office']));
                echo("</td><td>");
 
                echo(htmlentities($row['Office']));
                echo("</td><td>");

				if (($row['Status']) == ($ForReceive_ROFUS)){
	
		  
					echo('<a class="btn btn-warning" href="prc_receive.php?lumber_app_id='.$row['lumber_app_id'].'">Receive</a>');
					echo("</td><td>");

					echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
				  }

          
          elseif (($row['Status']) == ($On_Process_FUS_RO)){
	
		  
					echo('<a class="btn btn-warning" href="evaluation.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
					echo("</td><td>");

					echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
				  }

          elseif (($row['Status']) == ($Review_LPDD)){
	
		  
            echo('<a class="btn btn-warning" href="evaluationlpdd.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
            echo("</td><td>");
  
            echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
            }

            
          elseif (($row['Status']) == ($For_Recommend_RO)){
	
		  
            echo('<a class="btn btn-warning" href="evaluationlRORecommender.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
            echo("</td><td>");
            echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
            }
  
          elseif (($row['Status']) == ($For_Approval_RED)){

    
            echo('<a class="btn btn-warning" href="evaluationROapprover.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
            echo("</td><td>");
            echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
            }

          elseif (($row['Status']) == ($For_Release)){

  
            echo('<a class="btn btn-warning" href="evaluation.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
            echo("</td><td>");
            echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
            }
  
  
                
  

				  

				echo("</td></tr>\n");

				
		  }
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
