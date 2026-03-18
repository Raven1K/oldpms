








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


  $clientname = $lumber_ap_row['name'];
  $user_role = $lumber_ap_row['user_role_id'];
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
	
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
		

	  <!-- Chart Monthly Summary -->
    <table class="table">
  <caption>List of released E-Permit</caption>
  <thead>

    <tr>
      <th scope="col">Lumber ID</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Bussiness Trade Name</th>
      <th scope="col">Registration Number</th>
      <th scope="col">Office</th>
      <th scope="col">Status</th>
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
         echo   '<td>'.$row['perm_fname'].' '.$row['perm_lname'].'</td>';
         echo   '<td>'.$row['bussiness_name'].'</td>';
         echo   '<td>'.$row['Registration_Number'].'</td>';
         echo   '<td>'.$row['Office'].'</td>';
         echo   '<td>Forwarded to Client and Copy Furnished to PENROs and CENROs</td>';
         echo    '<td><a type="button" class="btn btn-primary" href="../../map/index_view_map.php?lumber_app_id='.$row['lumber_app_id'].'" )">View Map</a></td>';
         echo   '</tr>';

endwhile;
?>
  </tbody>
</table>
	  <!-- End Chart Monthly Summary -->



            
          </div>
        </div>
        <!-- /page content -->

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
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>    
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>