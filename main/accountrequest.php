

<?php
error_reporting(0);

// require_once('configmysqli.php');
session_start();
include('../processphp/config.php');







// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              header("location: ../admin/login.php");
              exit;
            }
            else{

         
            }

     
              $userid = $_SESSION["user_id"] ;

              $lumber_app = "SELECT * FROM denr_users where user_id = '$userid'";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


               $clientname = $lumber_ap_row['name'] ;
               $user_role = $lumber_ap_row['user_role_id'] ;
               $office_id = $lumber_ap_row['office_id'];

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
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
       
    <!-- Datatables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
				  <h3 class="text-success"><strong>For Action</strong> <small>  | Lumber Dealers of Caraga Region</small></h3>
              </div>              
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>LPDD-FUS <small>| Regional Office Users</small></h2> -->
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
                                            <th>First Name</th>
											<th>Middle Name</th>
                                            <th>Last Name</th>
											<th>Email Address</th>
											<th>Mobile Number</th>
                                            <th>Documents</th>         
                                            <th>Action</th>                         
                                        </tr>
                                     </thead>                                                                  
                                    <tbody>
                                            
                                    <?php
        // Assuming $con is your database connection object
        require_once "../processphp/config.php";

        // SQL query to fetch data from user_client table
        $sql = "SELECT auth_letter, client_id, firstname, mid_name, lastname, email, mobilenum, comp_id_upload 
        FROM user_client 
        WHERE Status = '0' AND zips = '{$_SESSION['stationclient']}'";


        $result = $con->query($sql);

        // Check if there are rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["client_id"] . "</td>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["mid_name"] . "</td>";
                echo "<td>" . $row["lastname"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["mobilenum"] . "</td>";
                echo "<td>";
                echo '<button type="button" class="btn btn-primary" onclick="setDocumentData(' . $row["client_id"] . ', \'' . $row["comp_id_upload"] . '\', \'' . $row["auth_letter"] . '\', \'' . $row["auth_letter2"] . '\')" data-toggle="modal" data-target="#viewDocumentsModal">View</button>';
                echo "</td>";
       
                echo "<td>";
                echo '<form id="updateForm" action="confirm.php" method="POST" onsubmit="return confirm(\'Do you really want to confirm?\');">';
                echo '<input type="text" id="client_id" name="client_idPost" value="' . $row["client_id"] . '" required hidden>';
                echo '<button type="submit" class="btn btn-success" name="update_status">Confirm</button>';
                echo '</form>';
                echo "</td>";
                
                
     
                

                echo "</tr>";
                



                
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        ?>





       
<!-- Modal -->
<div class="modal fade" id="viewDocumentsModal" tabindex="-1" role="dialog" aria-labelledby="viewDocumentsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg class for large modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewDocumentsModalLabel">View Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="documentImage1" src="" alt="Document 1" style="max-width: 100%; max-height: 400px; margin-bottom: 10px;">
        <img id="documentImage2" src="" alt="Document 2" style="max-width: 100%; max-height: 400px;">
      </div>
    </div>
  </div>
</div>


<script>
function setDocumentData(clientId, compIdUpload, authLetter1) {
    var imgSrc1 = '../processphp/uploads/' + compIdUpload; // Modify this line with the correct path
    var imgSrc2 = '../processphp/uploads/' + authLetter1; // Modify this line with the correct path
    
    document.getElementById('documentImage1').src = imgSrc1;
    document.getElementById('documentImage2').src = imgSrc2;
}

document.getElementById('documentImage1').addEventListener('click', function() {
    toggleFullScreen(this);
});

document.getElementById('documentImage2').addEventListener('click', function() {
    toggleFullScreen(this);
});

function toggleFullScreen(image) {
    if (image.requestFullscreen) {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            image.requestFullscreen();
        }
    }
}
</script>



                <?php


    function getFullMonthNameFromDate($date){
     $monthName = date('F d, Y', strtotime($date));
     return $monthName;
          }
        $dateyear = date('Y');






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
