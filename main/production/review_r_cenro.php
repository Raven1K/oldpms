<?php
/**
 * Logic portion (evaluations / database updates)
 * ----------------------------------------------
 * Make sure this portion executes before sending any HTML output so that header() redirection won’t fail.
 */

require_once "../../processphp/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get lumber_app_id from GET; cast to int for safety
$l_id = isset($_GET['lumber_app_id']) ? (int) $_GET['lumber_app_id'] : 0;

// If $l_id is invalid (0), you might want to handle it or redirect
if ($l_id === 0) {
    // You could redirect or show an error
    header("Location: application.php");
    exit;
}

/**
 * First example usage: we retrieve the record that has Number_of_doc = 2
 * If you actually need it. (This was in your original code.)
 */
$stmtDoc2 = $connection->prepare("SELECT * FROM lumber_app_doc_erow 
    WHERE lumber_app_id = :l_id AND Number_of_doc = 2");
$stmtDoc2->execute([':l_id' => $l_id]);
$lumber_ap_row = $stmtDoc2->fetch(PDO::FETCH_ASSOC);

if ($lumber_ap_row) {
    $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];
    // If you need to do something with $lumber_ap_show_applicationform
}

/**
 * Perform checks for doc_app_ind = 0 or doc_app_ind = 2
 */
$queryCheck0 = $connection->prepare("
    SELECT COUNT(*) 
    FROM lumber_app_doc_erow
    WHERE lumber_app_id = :l_id
      AND doc_app_ind = 0
");
$queryCheck0->execute([':l_id' => $l_id]);
$count0 = $queryCheck0->fetchColumn(); // number of rows with doc_app_ind=0

$queryCheck2 = $connection->prepare("
    SELECT COUNT(*)
    FROM lumber_app_doc_erow
    WHERE lumber_app_id = :l_id
      AND doc_app_ind = 2
");
$queryCheck2->execute([':l_id' => $l_id]);
$count2 = $queryCheck2->fetchColumn(); // number of rows with doc_app_ind=2

// If no record has doc_app_ind=0
if ($count0 == 0) {
    // echo 'Zero (doc_app_ind=0) not Existing';

    // Then check doc_app_ind=2
    if ($count2 == 0) {
        // echo 'Disapprove (doc_app_ind=2) Not Existing';

        // Then we do: For Acknowledgement, Flow_stat=1
        $stat_uss  = 'For Acknowledgement';
        $Flow_stats = '1';
        $sql = "UPDATE lumber_application
                SET Status = :Status, Flow_stat = :Flow_stat
                WHERE lumber_app_id = :l_id";
        $updateStmt = $connection->prepare($sql);
        $updateStmt->execute([
            ':Status'    => $stat_uss,
            ':Flow_stat' => $Flow_stats,
            ':l_id'      => $l_id
        ]);

        // Redirect to application.php
        header("Location: application.php");
        exit;
    } else {
        // If doc_app_ind=2 record(s) found => For Re-apply, Flow_stat=3
        $stat_uss  = 'For Re-apply';
        $Flow_stats = '3';

        $sql = "UPDATE lumber_application
                SET Status = :Status, Flow_stat = :Flow_stat
                WHERE lumber_app_id = :l_id";
        $updateStmt = $connection->prepare($sql);
        $updateStmt->execute([
            ':Status'    => $stat_uss,
            ':Flow_stat' => $Flow_stats,
            ':l_id'      => $l_id
        ]);

        // Insert into history
        date_default_timezone_set("Asia/Manila");
        $dateNow = date('m/d/y');
        $Time    = date('H:i:s');

        $Title   = 'For Re-apply';
        $Details = 'For Re-apply please check your attachment with 6 documents uploaded.';

        $histQuery = $connection->prepare("
            INSERT INTO client_client_document_history(
                lumber_app_id, Date, Title, Details, Time
            )
            VALUES (
                :lumber_app_id, :Date, :Title, :Details, :Time
            )
        ");
        $histQuery->bindParam(":lumber_app_id", $l_id, PDO::PARAM_INT);
        $histQuery->bindParam(":Date", $dateNow, PDO::PARAM_STR);
        $histQuery->bindParam(":Title", $Title, PDO::PARAM_STR);
        $histQuery->bindParam(":Details", $Details, PDO::PARAM_STR);
        $histQuery->bindParam(":Time", $Time, PDO::PARAM_STR);
        $histQuery->execute();
    }
}

/** 
 * End of logic portion
 * -------------------------------------------------------
 * Now that all logic is done, we proceed with the HTML output.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>OLDPMS - DENR R13</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
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

    <!-- Left column -->
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="dashboard.php" class="sidebar-brand d-flex align-items-center">
            <img class="img-fluid img-overlay" src="images/oldpmslogo.png" alt="logo"/>
          </a>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
              <li><a href="application.php"><i class="fa fa-edit"></i> Evaluation </a></li>
              <!-- Add more menu items as needed -->
            </ul>
          </div>
        </div>
        <!-- /sidebar menu -->
      </div>
    </div>
    <!-- /Left column -->

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu navbar-dark" style="background: #222222">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
          <ul class="navbar-right">
            <div class="copyright text-white my-auto d-sm-flex align-items-center">
              <a href="dashboard.php"><h5>ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5></a>
              <li class="nav-item dropdown open" style="padding-left: 15px;">
     
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="javascript:;"> Message</a>
                  <a class="dropdown-item" href="javascript:;">Settings</a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item" href="login.html">
                    <i class="fa fa-sign-out pull-right"></i> Log Out
                  </a>
                </div>
              </li>
            </div>
          </ul>
        </nav>
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
              <h1>Evaluate Uploaded Documents</h1>
              <h2>Click the Document Status to View</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li>
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-wrench"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">

                    <!-- Table of documents -->
                    <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Document Number</th>
                          <th>Document Name</th>
                          <th>Status</th>
                          <th>For Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      // Fetch all doc rows for this lumber_app_id
                      $stmt = $connection->prepare("
                          SELECT * 
                          FROM lumber_app_doc_erow
                          WHERE lumber_app_id = :l_id
                          ORDER BY Number_of_doc ASC
                      ");
                  
                      $stmt->execute([':l_id' => $l_id]);

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($row['Number_of_doc']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['doc_type_name']) . "</td>";
                

                          // Convert doc_status from DB into a user-friendly label
                          // or show the actual status:
                          $status = $row['doc_status'];

                          // If doc_status is "Approved"
                          if ($status === 'Approved') {
                              echo "<td>Evaluated</td>";
                              echo "<td>";
                              // Link to your review page
                              echo '<a class="btn btn-warning" href="modal_review_rc.php?upload_id_doc='
                                   . $row['upload_id_doc'] . '">View</a>';
                              echo "</td>";

                          } elseif ($status === 'For Review') {
                              echo "<td>For Evaluation</td>";
                              echo "<td>";
                              echo '<a class="btn btn-warning" href="modal_review_rc.php?upload_id_doc='
                                   . $row['upload_id_doc'] . '">Evaluate</a>';
                              echo "</td>";
                          } else {
                              // For any other statuses you might have
                              echo "<td>" . htmlspecialchars($status) . "</td>";
                              echo "<td>-</td>";
                          }
                          echo "</tr>";
                      }
                      ?>
                      </tbody>
                    </table>
                    <!-- End of table -->
                    
                  </div>
                </div>
              </div>
            </div><!-- end x_content -->
            
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer class="footer-dark" style="background: #222222">
      <div class="copyright text-white my-auto d-sm-flex align-items-center justify-content-between mb-4">
        <h6>Department of Environment and Natural Resources - CARAGA Region</h6>
        <h5>DENR Regional ICT Caraga</h5>
        <h6>&copy; Copyright 2022. All Rights Reserved</h6>
      </div>
      <div class="clearfix"></div>
    </footer>
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

<script>
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</body>
</html>
