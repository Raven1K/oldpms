<?php

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database configuration
if (!file_exists('../processphp/config.php')) {
    die('Error: Database configuration file not found. Please check the path.');
}
require_once('../processphp/config.php');

// Block if no log in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../admin/login.php");
    exit;
}

// Fetch user details from session
$userid = $_SESSION["user_id"];

// Fetch user data
$stmt = $con->prepare("SELECT name, user_role_id, office_id FROM denr_users WHERE user_id = ?");
$stmt->bind_param("i", $userid);
$stmt->execute();
$lumber_app_qry = $stmt->get_result();
$lumber_ap_row = $lumber_app_qry->fetch_assoc();
$stmt->close();

$clientname = $lumber_ap_row['name'];
$user_role = $lumber_ap_row['user_role_id'];
$office_id = $lumber_ap_row['office_id'];

// Fetch user role name
$stmt = $con->prepare("SELECT role FROM user_role WHERE Rolw_id2 = ?");
$stmt->bind_param("i", $user_role);
$stmt->execute();
$lumber_app_qry_role = $stmt->get_result();
$lumber_ap_row2 = $lumber_app_qry_role->fetch_assoc();
$stmt->close();

$user_role_name = !empty($lumber_ap_row2['role']) ? $lumber_ap_row2['role'] : "";

// Fetch office cover
$office_cover = null;
$stmt = $con->prepare("SELECT office_cover FROM muncity WHERE office_id = ?");
$stmt->bind_param("i", $office_id);
$stmt->execute();
$lumber_app_qry_office = $stmt->get_result();

if ($lumber_app_qry_office && $lumber_app_qry_office->num_rows > 0) {
    $lumber_ap_row3 = $lumber_app_qry_office->fetch_assoc();
    $office_cover = $lumber_ap_row3['office_cover'];
}
$stmt->close();

?>


<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: #22782c">
            <a href="fus.php" class="sidebar-brand d-flex align-items-center"><img class="img-fluid img-overlay" src="production/images/oldpmslogo.png" alt="logo"/></a>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="clearfix"></div>

        <div class="profile clearfix">
            <div class="profile_pic">
                </div>
            <div class="profile_info">
                <span><?php echo 'Welcome ' . ' <br> <b>' . $user_role_name; ?></span>
                </div>
        </div>
        <br />

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

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
                    // Dashboard link based on user role
                    if ($user_role == '16' || $user_role == '15') {
                        echo '<li><a href="dashboardored.php"><i class="fas fa-fw fa-home text-white"></i> Dashboard </a></li>';
                    } elseif ($user_role == '13') {
                        // SQL query to fetch data from user_client table for account requests
                        $numRecords = 0;
                        $stmt = $con->prepare("SELECT COUNT(*) AS count FROM user_client WHERE Status = '0'");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $numRecords = $row['count'];
                        }
                        $stmt->close();
                        echo '<li><a href="accountrequest.php"><i class="fas fa-fw fa-edit"></i> Account Request <span class="badge2">' . $numRecords . '</span></a></li>';
                    } else {
                        echo '<li><a href="fus.php"><i class="fas fa-fw fa-home text-white"></i> Dashboard </a></li>';
                    }
                    ?>
                    
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#clientModal"><i class="fas fa-fw fa-users text-white"></i> Manage Clients </a></li>
                    
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#expirationModal"><i class="fas fa-fw fa-calendar-alt text-white"></i> View Lumber Permit Expiration </a></li>

                    <?php
                    // Initialize the returned count for lumber applications
                    $returnedCount = 0;
                    // Query to count rows with the status "Returned"
                    $stmt = $con->prepare("SELECT COUNT(*) AS count FROM lumber_application WHERE status = 'Returned'");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $returnedCount = $row['count'];
                    }
                    $stmt->close();
                    ?>

                    <li><a href="action.php"><i class="fas fa-fw fa-edit"></i> For Action </a></li>
                    <li><a><i class="fas fa-fw fa-solid fa-file-text"></i> Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li>
                                <a href="table1.php" class="text-white">
                                    Upcoming Lumber Dealers
                                    <?php if ($returnedCount > 0): ?>
                                        <span style="background-color: red; color: white; border-radius: 50%; padding: 2px 8px; font-size: 0.8em;">
                                            <?= $returnedCount ?>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li><a href="tableic.php" class="text-white">Issued Certificates</a></li>
                            <li>
                                <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#analysisModal">Analysis</a>
                            </li>


                            
                            <li><a href="../map/index_show.php"><i class="fas fa-fw fa-map-marked-alt"></i> Maps </a></li>
                        </ul>
                    </li>
                    <li><a href="qrcode.php"><i>QR Code Scanner</i> &nbsp;&nbsp;&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                            <path d="M2 2h2v2H2V2Z"/>
                            <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
                            <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
                            <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
                            <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
                        </svg>
                    </a></li>

                </ul>
            </div>
        </div>
        </div>
</div>

<div class="modal fade" id="analysisModal" tabindex="-1" aria-labelledby="analysisModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-gradient-primary text-white p-3 border-bottom-0">
        <h5 class="modal-title fs-5 fw-bold" id="analysisModalLabel">
          <i class="fas fa-chart-line me-2"></i> Analysis Dashboard
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; outline: none; box-shadow: none;"></button>
      </div>
      <div class="modal-body p-4 bg-light" style="height: 80vh;"> <div class="ratio ratio-16x9" style="--bs-aspect-ratio: 65%; height: 100%;"> <iframe src="analysis.php" class="rounded-3 shadow-sm" title="Analysis Dashboard" allowfullscreen loading="lazy"></iframe>
        </div>
        <p class="text-muted text-center mt-3 mb-0">
          <small>Data refreshed daily. For detailed insights, view in full screen.</small>
        </p>
      </div>
      <div class="modal-footer d-flex justify-content-end align-items-center bg-white p-3 border-top-0">
        <button type="button" class="btn btn-outline-secondary me-2 rounded-pill" data-bs-dismiss="modal">
          <i class="fas fa-times me-1"></i> Close
        </button>
        <a href="analysis.php" target="_blank" class="btn btn-primary rounded-pill">
          <i class="fas fa-expand me-1"></i> Full Screen View
        </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-gradient-primary text-white p-3 border-bottom-0">
        <h5 class="modal-title fs-5 fw-bold" id="clientModalLabel">
          <i class="fas fa-users me-2"></i> Client Management
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; outline: none; box-shadow: none;"></button>
      </div>
      <div class="modal-body p-2 bg-light" style="height: 90vh;">
        <div class="ratio ratio-16x9" style="--bs-aspect-ratio: 100%; height: 100%;">
          <iframe src="user_client.php" class="rounded-3 shadow-sm" title="Client Management" allowfullscreen loading="lazy"></iframe>
        </div>
        <p class="text-muted text-center mt-3 mb-0">
          <small>This view provides real-time management of registered clients.</small>
        </p>
      </div>
      <div class="modal-footer d-flex justify-content-end align-items-center bg-white p-3 border-top-0">
        <button type="button" class="btn btn-outline-secondary me-2 rounded-pill" data-bs-dismiss="modal">
          <i class="fas fa-times me-1"></i> Close
        </button>
        <a href="user_client.php" target="_blank" class="btn btn-primary rounded-pill">
          <i class="fas fa-expand me-1"></i> Full Screen View
        </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="expirationModal" tabindex="-1" aria-labelledby="expirationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-gradient-primary text-white p-3 border-bottom-0">
        <h5 class="modal-title fs-5 fw-bold" id="expirationModalLabel">
          <i class="fas fa-calendar-times me-2"></i> Permit Expiration Tracking
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; outline: none; box-shadow: none;"></button>
      </div>
      <div class="modal-body p-2 bg-light" style="height: 90vh;">
        <div class="ratio ratio-16x9" style="--bs-aspect-ratio: 100%; height: 100%;">
          <iframe src="records/view_expiration.php" class="rounded-3 shadow-sm" title="Expiration Management" allowfullscreen loading="lazy"></iframe>
        </div>
        <p class="text-muted text-center mt-3 mb-0">
          <small>Review expiring permits and take necessary actions.</small>
        </p>
      </div>
      <div class="modal-footer d-flex justify-content-end align-items-center bg-white p-3 border-top-0">
        <button type="button" class="btn btn-outline-secondary me-2 rounded-pill" data-bs-dismiss="modal">
          <i class="fas fa-times me-1"></i> Close
        </button>
        <a href="view_expiration.php" target="_blank" class="btn btn-primary rounded-pill">
          <i class="fas fa-expand me-1"></i>  Full Screen View
        </a>
      </div>
    </div>
  </div>
</div>

<style>
  /* Custom Gradient for Modal Header */
  .bg-gradient-primary {
    background: linear-gradient(to right, #007bff, #0056b3); /* Blue gradient */
  }

  /* Adjust iframe for better responsiveness and appearance */
  .modal-body iframe {
    width: 100%;
    height: 100%; /* Ensures iframe takes full height of its container */
    border: none;
  }

  /* Ensure the close button is properly styled for accessibility */
  .btn-close:focus {
    box-shadow: 0 0 0 .25rem rgba(255, 255, 255, .5);
  }

  /* Improve button hover states */
  .btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  }

  .btn-outline-secondary:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
</style>