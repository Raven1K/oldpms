

<?php
error_reporting(0);
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
              $_SESSION['user_role_id'] = $lumber_ap_row['user_role_id'];
              



              $lumber_app = "SELECT * FROM office where office_id = $office_id";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
              $station = $lumber_ap_row2['station'];
              $office_under = $lumber_ap_row2['office_under'];
              $_SESSION['office_under'] = $lumber_ap_row2['office_under'];
  
              // echo $clientname ;
              // echo $user_role ;


              $lumber_app = "SELECT * FROM user_role where Rolw_id2 = $user_role";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
              $user_role_name = $lumber_ap_row2['role'] ;
              $_SESSION['user_role_name'] = $lumber_ap_row2['role'];


              $lumber_app = "SELECT * FROM office where office_id = $office_id && office_level = 'CENRO'";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
            
              $station = $lumber_ap_row3['station'] ;

              $_SESSION['station'] = $lumber_ap_row3['station'] ;

              $_SESSION['stationclient'] = $station ;

              $lumber_app = "SELECT * FROM muncity where office_id = $office_id";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
              $office_cover = $lumber_ap_row3['office_cover'] ;
         
  

?> 

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


        <?php

$returnedCount = 0;
$bussiness_name = '';

// Define variables (ensure these are properly set)
$Office = isset($office_cover) ? $office_cover : '';
$office_under = isset($office_under) ? $office_under : '';

// Query to count rows based on the criteria
$sql = "SELECT COUNT(*) AS count 
        FROM lumber_application 
        WHERE Application_status = 'Return_FUU' 
        AND (Office = ? OR office_under = ?)";

$stmt = $con->prepare($sql);
if (!$stmt) {
    die("Statement preparation failed: " . $con->error);
}

$stmt->bind_param("ss", $Office, $office_under);
if (!$stmt->execute()) {
    die("Statement execution failed: " . $stmt->error);
}

$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
    $returnedCount = $row['count'];
}

// Query to fetch business names (if needed)
if ($returnedCount > 0) {
    $sqlDetails = "SELECT bussiness_name 
                   FROM lumber_application 
                   WHERE Application_status = 'Return_FUU' 
                   AND (Office = ? OR office_under = ?)";
    $stmtDetails = $con->prepare($sqlDetails);
    if ($stmtDetails) {
        $stmtDetails->bind_param("ss", $Office, $office_under);
        $stmtDetails->execute();
        $resultDetails = $stmtDetails->get_result();
        if ($resultDetails && $resultDetails->num_rows > 0) {
            $businessNames = [];
            while ($rowDetails = $resultDetails->fetch_assoc()) {
                $businessNames[] = $rowDetails['bussiness_name'];
                $office[] = $rowoffice['office'];
            }
            $bussiness_name = implode(', ', $businessNames); // Combine names into a string
        }
        $stmtDetails->close();
    }
}


?>



<!-- Toast Notification -->
<?php 
// Check if the toast was not dismissed in this session
if ($returnedCount > 0 && !isset($_SESSION['toast_dismissed'])): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toastNotification" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="display: flex; justify-content: space-between; align-items: center;">
                <strong class="me-auto text-danger">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" style="margin-left: auto;" onclick="dismissToast()">x</button>
            </div>
            <div class="toast-body">
                There are <strong><?= htmlspecialchars($returnedCount, ENT_QUOTES, 'UTF-8') ?></strong> returned applications requiring CENRO FUU to comply.
                <br>
                Business Name: <?= htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') ?>
            </div>
        </div>
    </div>

    <script>
    function dismissToast() {
        // Send AJAX request to set session variable
        fetch('set_toast_session.php', {
            method: 'POST'
        });
        // Hide the toast
        document.getElementById('toastNotification').classList.remove('show');
    }
    </script>
<?php endif; ?>



        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">

            <h3><?php 
            
            
            if (stripos($user_role_name, "CENRO") !== false) {
              // Replace only the first occurrence of "CENRO" with "CENRO/SIPLAS"
              $user_role_name = preg_replace('/CENRO/i', 'CENRO/SIPLAS', $user_role_name, 1);
          }
          
   
            
            
            echo 'Welcome'. '<br>' . $user_role_name . '<br>' . '<br>' . $station  ; 
            
            
            
            
            
            ?></h3>
            <ul class="nav side-menu">
              <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>

              <!-- !-- Menu item with red notification badge -->
            <li>
                <a href="application.php">
                    <i class="fa fa-edit"></i> Application Status
                    <?php if ($returnedCount > 0): ?>
                        <span style="background-color: red; color: white; border-radius: 50%; padding: 2px 8px; font-size: 0.8em; margin-left: 5px;">
                            <?= $returnedCount ?>
                        </span>
                    <?php endif; ?>
                </a>
            </li>

              <li><a href="../../map/index_show.php"><i class="fas fa-fw fa-map-marked-alt"></i> Maps </a></li>
              <li><a href="list_released_permit.php"><i class="fas fa-fw fa-tree"></i> Approved Lumber </a></li>
              <li><a href="list-of-upcoming-lumberdealers.php"><i class="fas fa-fw fa-seedling"></i>On Process</a></li>

              <li><a href="lumbersupplycontract.php"><i class="fas fa-fw fa-map-marked-alt"></i> Lumber Supply</a></li>

              <style>
                    .badge2 {
                              background-color: red;
                              color: white;
                              padding: 3px 6px;
                              border-radius: 50%;
                              font-size: 12px;
                          }
                          </style>

              <?php

if (($user_role) == ('16')) {
	echo '<li><a href="dashboardored.php"><i class="fas fa-fw fa-home text-white"></i> Dashboard </a></li>';
} elseif (($user_role) == ('15')) {
	echo '<li><a href="dashboardored.php"><i class="fas fa-fw fa-home text-white"></i> Dashboard </a></li>';
} elseif (($user_role) == ('1')) {



  // SQL query to fetch data from user_client table
  $sql = "SELECT auth_letter, client_id, firstname, mid_name, lastname, email, mobilenum, comp_id_upload, zips FROM user_client WHERE Status = '0' and zips = '$station'";
  
  // Execute the SQL query
  $result = $con->query($sql);
  
  // Check for errors in executing the query
  if (!$result) {
      die("Error: " . $con->error);
  }
  
  // Count the number of records
  $numRecords = $result->num_rows;
  
  // Output the count
  // echo "Number of records: " . $numRecords;
  
  // Free the result set
  $result->free();
  
  echo '<li><a href="../accountrequest.php"><i class="fas fa-fw fa-edit"></i> Account Request ' . ($numRecords > 0 ? '<span class="badge2">' . $numRecords . '</span>' : '') . '</a></li>';

}else{
					echo	  '<li><a href="fus.php"><i class="fas fa-fw fa-home text-white"></i> Dashboard </a></li>';
	}
			


?>
              <!-- <li><a href="validation.php"><i class="fa fa-location-arrow"></i> Validation </a></li> -->
              <!-- <li><a href="sitevalidated.php"><i class="fa fa-map-marker"></i> Site Validated </a></li> -->
              <!-- <li><a href="orderofpayment.php"><i class="fa fa-paypal"></i> Order of Payment </a></li> -->
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
       <div class="nav_menu navbar-dark" style="background: #000000">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars text-white"></i></a>
          </div>
          <nav class="nav navbar-nav">
          <ul class=" navbar-right">
          <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-2">
          <a href="dashboard.php"><h5 class="text-white">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5></a>
          <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="images/user.png" alt="" ><span><?php echo $clientname ; ?></span>
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="../../admin/userprofile.php"> Profile</a>
                  <a class="dropdown-item"  href="javascript:;">Messages</a>
                  <a class="dropdown-item"  href="javascript:;">Notifications</a>
                  <a class="dropdown-item"  href="javascript:;">
                    <span>Settings</span>
                  </a>
              <a class="dropdown-item"  href="javascript:;">Help</a>
                <a class="dropdown-item"  href="../../admin/prc_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    </div>
    </body>
    <!-- /top navigation -->

