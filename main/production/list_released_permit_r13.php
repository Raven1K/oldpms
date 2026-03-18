








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



$lumber_app_qry = mysqli_query($con, $lumber_app);

if($lumber_app_qry === false) {
    die('Error executing query: ' . mysqli_error($con));
}

$lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);

if($lumber_ap_row3 === null) {
    die('No data found.');
   


$station = $lumber_ap_row3['station'];

}else{

  $station = "";

}


  
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
    <link href="../vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../build/css/custom.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
<!-- Include Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		  
		<!-- sidebar navigation -->        
          <?php
				require_once('navbar.php');
			?>        
		<!-- /sidebar navigation -->
		  
        <!-- top navigation -->
		  
          <?php
				require_once('navbar.php');
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
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

    <?php
// Database query to fetch all completed lumber applications
$sql = "SELECT * FROM `lumber_application` WHERE Flow_stat = 'Complete' ORDER BY lumber_app_id ASC";

// Execute query using prepared statements for better security
if ($stmt = $con->prepare($sql)) {
    $stmt->execute();
    $result = $stmt->get_result(); // Fetch the result set

    // Loop through each record in the result set
    while ($row = $result->fetch_assoc()):
        // Dynamically generate the dropdown menu ID
        $dropdownId = 'dropdownMenuButton' . $row['lumber_app_id'];

        // Output table row
        echo '<tr>';
        echo '<th scope="row">' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '</th>';
        echo '<td>' . htmlspecialchars($row['perm_fname'] . ' ' . $row['perm_lname'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td>' . htmlspecialchars($row['bussiness_name'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td>' . htmlspecialchars($row['Registration_Number'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td>' . htmlspecialchars($row['Office'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td>Forwarded to Client and Copy Furnished to PENROs and CENROs</td>';

        // Dropdown menu for actions
        echo "<td>
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' id='{$dropdownId}' data-bs-toggle='dropdown' aria-expanded='false'>
                        Action
                    </button>
                    <ul class='dropdown-menu' aria-labelledby='{$dropdownId}'>
                        <li><a class='dropdown-item bg-success text-white' href='../../map/index_view_map.php?lumber_app_id=" . urlencode($row['lumber_app_id']) . "'>View Map</a></li>
                        <li><a class='dropdown-item bg-info text-white' href='../records/generate_viewLumberEdealer.php?lumber_app_id=" . urlencode($row['lumber_app_id']) . "'>View E-Permit</a></li>
                        <li><a class='dropdown-item bg-secondary text-white' href='../listofdocuments_approved.php?lumber_app_id=" . urlencode($row['lumber_app_id']) . "'>View Documents</a></li>
                        <li><a class='dropdown-item bg-success text-white' href='../../client/client_tracker.php?lumber_app_id=" . urlencode($row['lumber_app_id']) . "'>View Tracking</a></li>
                        <li><a class='dropdown-item bg-secondary text-white' href='orderofpaymentview3.php?lumber_app_id=" . urlencode($row['lumber_app_id']) . "'>Order of Payment</a></li>
                        <li><a class='dropdown-item bg-success text-white' href='../../client/clientcss_view.php?lumber_app_id=" . urlencode($row['lumber_app_id']) . "'>View CSS</a></li>
                    </ul>
                </div>
              </td>";
        echo '</tr>';
    endwhile;

    $stmt->close(); // Close the statement
} else {
    // Handle potential query preparation errors
    die("Database query failed: " . htmlspecialchars($con->error, ENT_QUOTES, 'UTF-8'));
}
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