<?php
/**
 * Displays a report of approved lumber dealers.
 *
 * This script fetches and displays a list of lumber applications that have been marked as "Complete".
 * It includes session validation, role-based access control for certain features, and dynamic generation
 * of modals for viewing details like maps, documents, and e-permits.
 *
 * Improvements:
 * - Initialized variables `$fromDate` and `$toDate` to prevent "Undefined variable" warnings.
 * - Used the null coalescing operator (??) for safer handling of $_POST data.
 * - Ensured all dynamic output is escaped with htmlspecialchars() to prevent XSS.
 * - Added comments for better code readability and maintenance.
 * - Maintained the use of prepared statements for SQL security.
 */

// Start session if it hasn't been started already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database configuration
require_once '../processphp/config.php';

// --- Session and User Validation ---

// If user is not logged in, redirect to the login page.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../admin/login.php');
    exit;
}

// Validate user_id from the session. It must be a positive integer.
$userid = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
if ($userid <= 0) {
    // If user_id is invalid, destroy the session and redirect to login.
    session_destroy();
    header('Location: ../admin/login.php');
    exit;
}

// --- Fetch User Details ---

$clientname = '';
$user_role = null;

// Prepare and execute a query to get the current user's name and role.
$sql_user = "SELECT name, user_role_id FROM denr_users WHERE user_id = ?";
if ($stmt_user = $con->prepare($sql_user)) {
    $stmt_user->bind_param("i", $userid);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($row_user = $result_user->fetch_assoc()) {
        $clientname = $row_user['name'];
        $user_role  = $row_user['user_role_id'];
    } else {
        // If no user is found for the user_id, they are logged out.
        session_destroy();
        header('Location: ../admin/login.php');
        exit;
    }
    $stmt_user->close();
} else {
    // Log and handle database errors gracefully.
    error_log("Database error (user query): " . $con->error);
    die("A system error occurred. Please try again later.");
}

// --- Date Filter Handling ---

// Initialize date filter variables. Use null coalescing operator for safety.
$fromDate = $_POST['from_date'] ?? '';
$toDate = $_POST['to_date'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Existing Lumber Dealers within Caraga Region</title>

    <!-- External CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php require_once('sidebar.php'); ?>
            <?php require_once('topbar.php'); ?>

            <!-- Main Content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 class="text-success"><strong>Reports</strong> <small>| List of Approved Lumber Dealers in Caraga Region</small></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Approved Lumber Dealers <small>Detailed List</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <!-- Date Filter Form -->
                                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mb-4">
                                                    <div class="row align-items-end g-3">
                                                        <div class="col-md-4">
                                                            <label for="from_date" class="form-label">
                                                                <i class="fa fa-calendar-alt me-1"></i>From Date:
                                                            </label>
                                                            <input type="date" class="form-control" id="from_date" name="from_date" value="<?php echo htmlspecialchars($fromDate); ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="to_date" class="form-label">
                                                                <i class="fa fa-calendar-check me-1"></i>To Date:
                                                            </label>
                                                            <input type="date" class="form-control" id="to_date" name="to_date" value="<?php echo htmlspecialchars($toDate); ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-filter me-1"></i> Filter
                                                            </button>
                                                            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary ms-2">
                                                                <i class="fa fa-undo me-1"></i> Reset
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- Lumber Applications Table -->
                                                <table id="lumberApplicationsTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <caption>List of released E-Permits</caption>
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Lumber ID</th>
                                                            <th scope="col">Owner Name</th>
                                                            <th scope="col">Business Trade Name</th>
                                                            <th scope="col">Registration Number</th>
                                                            <th scope="col">Office</th>
                                                            <th scope="col">Date Applied</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // --- Database Query for Lumber Applications ---
                                                        $params = [];
                                                        $types = '';
                                                        
                                                        $sql_lumber = "SELECT * FROM `lumber_application` WHERE Flow_stat = 'Complete'";
                                                        
                                                        // Append date filter to the query if dates are provided
                                                        if (!empty($fromDate) && !empty($toDate)) {
                                                            $sql_lumber .= " AND date_applied BETWEEN ? AND ?";
                                                        // Convert date format from yyyy-mm-dd to mm/dd/yyyy for SQL query
                                                        $fromDateFormatted = date('m/d/Y', strtotime($fromDate));
                                                        $toDateFormatted = date('m/d/Y', strtotime($toDate));
                                                        $params[] = $fromDateFormatted;
                                                        $params[] = $toDateFormatted;
                                                            $types .= 'ss';
                                                        }
                                                        
                                                        $sql_lumber .= " ORDER BY lumber_app_id ASC";
                                                        
                                                        if ($stmt_lumber = $con->prepare($sql_lumber)) {
                                                            if (!empty($params)) {
                                                                $stmt_lumber->bind_param($types, ...$params);
                                                            }
                                                            $stmt_lumber->execute();
                                                            $result_lumber = $stmt_lumber->get_result();

                                                            while ($row = $result_lumber->fetch_assoc()) {
                                                                $lumber_app_id = htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8');
                                                                $business_name = htmlspecialchars($row['bussiness_name'], ENT_QUOTES, 'UTF-8');
                                                                $owner_name = htmlspecialchars($row['perm_fname'] . ' ' . $row['perm_lname'], ENT_QUOTES, 'UTF-8');
                                                                $date_applied = htmlspecialchars($row['date_applied']);
                                                                // Output table row
                                                                echo '<tr>';
                                                                echo '<th scope="row">' . $lumber_app_id . '</th>';
                                                                echo '<td>' . $owner_name . '</td>';
                                                                echo '<td>' . $business_name . '</td>';
                                                                echo '<td>' . htmlspecialchars($row['Registration_Number'], ENT_QUOTES, 'UTF-8') . '</td>';
                                                                echo '<td>' . htmlspecialchars($row['Office'], ENT_QUOTES, 'UTF-8') . '</td>';
                                                                // Format the date as "Month Day, Year"
                                                                $formattedDate = '';
                                                                if (!empty($date_applied)) {
                                                                    // Handle different potential date formats
                                                                    $dateObj = DateTime::createFromFormat('m/d/Y', $date_applied);
                                                                    if (!$dateObj) {
                                                                        // Try alternative format if needed
                                                                        $dateObj = DateTime::createFromFormat('Y-m-d', $date_applied);
                                                                    }
                                                                    
                                                                    if ($dateObj) {
                                                                        $formattedDate = $dateObj->format('F j, Y'); // Format as "January 22, 2025"
                                                                    } else {
                                                                        $formattedDate = $date_applied; // Use original if parsing fails
                                                                    }
                                                                }
                                                                echo '<td>' . htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8') . '</td>';
                                                                
                                                                // Status badge
                                                                echo '<td>';
                                                                if (isset($row['Application_status'])) {
                                                                    $status = htmlspecialchars($row['Application_status'], ENT_QUOTES, 'UTF-8');
                                                                    $badgeClass = 'bg-secondary'; // Default
                                                                    switch ($status) {
                                                                        case 'Approved':
                                                                        case 'Complete':
                                                                            $badgeClass = 'bg-success';
                                                                            break;
                                                                        case 'Pending':
                                                                            $badgeClass = 'bg-warning text-dark';
                                                                            break;
                                                                        case 'Returned':
                                                                            $badgeClass = 'bg-danger';
                                                                            break;
                                                                    }
                                                                    echo '<span class="badge ' . $badgeClass . '">' . $status . '</span>';
                                                                }
                                                                echo '</td>';

                                                                // Actions dropdown
                                                                $dropdownId = 'dropdownMenuButton' . $lumber_app_id;
                                                                echo '<td>';
                                                                echo '<div class="dropdown">';
                                                                echo '<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="' . $dropdownId . '" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>';
                                                                echo '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="' . $dropdownId . '">';
                                                                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#mapModal' . $lumber_app_id . '"><i class="fas fa-map-marked-alt fa-fw me-2"></i> View Map</a></li>';
                                                                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#epermitModal' . $lumber_app_id . '"><i class="fas fa-file-invoice fa-fw me-2"></i> View E-Permit</a></li>';
                                                                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#documentsModal' . $lumber_app_id . '"><i class="fas fa-folder-open fa-fw me-2"></i> View Documents</a></li>';
                                                                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trackingModal' . $lumber_app_id . '"><i class="fas fa-route fa-fw me-2"></i> View Tracking</a></li>';
                                                                echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#paymentModal' . $lumber_app_id . '"><i class="fas fa-money-bill-wave fa-fw me-2"></i> Order of Payment</a></li>';
                                                                
                                                                if ($user_role == '19') {
                                                                    echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cssModal' . $lumber_app_id . '"><i class="fas fa-star fa-fw me-2"></i> View CSS</a></li>';
                                                                }
                                                                
                                                                echo '</ul>';
                                                                echo '</div>';
                                                                echo '</td>';
                                                                echo '</tr>';

                                                                // --- Modals for Each Row ---
                                                                // Note: A more advanced implementation might use a single modal and update its content with JavaScript.
                                                                
                                                                // View Map Modal
                                                                echo '
                                                                <div class="modal fade" id="mapModal' . $lumber_app_id . '" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl"><div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">View Map for ' . $business_name . '</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center" id="loadingSpinnerMap' . $lumber_app_id . '"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
                                                                            <iframe src="../map/index_view_map.php?lumber_app_id=' . $lumber_app_id . '" style="width:100%; height:85vh; border:none; display:none;" onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerMap' . $lumber_app_id . '\').style.display=\'none\';"></iframe>
                                                                        </div>
                                                                    </div></div>
                                                                </div>';

                                                                // View E-Permit Modal
                                                                echo '
                                                                <div class="modal fade" id="epermitModal' . $lumber_app_id . '" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl"><div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">View E-Permit for ' . $business_name . '</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center" id="loadingSpinnerEpermit' . $lumber_app_id . '"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
                                                                            <iframe src="records/viewlumberModal.php?lumber_app_id=' . $lumber_app_id . '" style="width:100%; height:85vh; border:none; display:none;" onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerEpermit' . $lumber_app_id . '\').style.display=\'none\';"></iframe>
                                                                        </div>
                                                                    </div></div>
                                                                </div>';
                                                                
                                                                // View Documents Modal
                                                                echo '
                                                                <div class="modal fade" id="documentsModal' . $lumber_app_id . '" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl"><div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">View Documents for ' . $business_name . '</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center" id="loadingSpinnerDocs' . $lumber_app_id . '"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
                                                                            <iframe src="listofdocuments_approved.php?lumber_app_id=' . $lumber_app_id . '" style="width:100%; height:85vh; border:none; display:none;" onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerDocs' . $lumber_app_id . '\').style.display=\'none\';"></iframe>
                                                                        </div>
                                                                    </div></div>
                                                                </div>';

                                                                // View Tracking Modal
                                                                echo '
                                                                <div class="modal fade" id="trackingModal' . $lumber_app_id . '" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl"><div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">View Tracking for ' . $business_name . '</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center" id="loadingSpinnerTracking' . $lumber_app_id . '"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
                                                                            <iframe src="../client/doctracker.php?lumber_app_id=' . $lumber_app_id . '&bussiness_name=' . urlencode($row['bussiness_name']) . '" style="width:100%; height:85vh; border:none; display:none;" onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerTracking' . $lumber_app_id . '\').style.display=\'none\';"></iframe>
                                                                        </div>
                                                                    </div></div>
                                                                </div>';

                                                                // Order of Payment Modal
                                                                echo '
                                                                <div class="modal fade" id="paymentModal' . $lumber_app_id . '" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl"><div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Order of Payment for ' . $business_name . '</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center" id="loadingSpinnerOOP' . $lumber_app_id . '"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>
                                                                            <iframe src="production/orderofpaymentview3.php?lumber_app_id=' .  $lumber_app_id  . '" style="width:100%; height:85vh; border:none; display:none; zoom:0.8;" onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerOOP' . $lumber_app_id . '\').style.display=\'none\';"></iframe>
                                                                        </div>
                                                                    </div></div>
                                                                </div>';

                                                                // View CSS Modal (Role-specific)
                                                                if ($user_role == '19') {
                                                                    // Detect year in $date_applied and show different iframe accordingly
                                                                    $year = '';
                                                                    if (!empty($row['date_applied'])) {
                                                                        $dateObj = DateTime::createFromFormat('m/d/Y', $row['date_applied']);
                                                                        if ($dateObj) {
                                                                            $year = $dateObj->format('Y');
                                                                        } else {
                                                                            // Try alternative format if needed
                                                                            $dateObj = DateTime::createFromFormat('Y-m-d', $row['date_applied']);
                                                                            if ($dateObj) {
                                                                                $year = $dateObj->format('Y');
                                                                            }
                                                                        }
                                                                    }
                                                                    echo '
                                                                    <div class="modal fade" id="cssModal' . $lumber_app_id . '" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-fullscreen"><div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">View CSS for ' . $business_name . '</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="text-center" id="loadingSpinnerCSS' . $lumber_app_id . '"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
                                                                    if ($year === '2025') {
                                                                        echo '
                                                                            <div class="css-view-container">
                                                                                <ul class="nav nav-tabs mb-3" id="cssViewTabs' . $lumber_app_id . '" role="tablist">
                                                                                    <li class="nav-item" role="presentation">
                                                                                        <button class="nav-link active" id="front-tab' . $lumber_app_id . '" 
                                                                                            data-bs-toggle="tab" data-bs-target="#front-view' . $lumber_app_id . '" 
                                                                                            type="button" role="tab" aria-controls="front-view" aria-selected="true">
                                                                                            <i class="fas fa-id-card-alt me-1"></i> Front View
                                                                                        </button>
                                                                                    </li>
                                                                                    <li class="nav-item" role="presentation">
                                                                                        <button class="nav-link" id="back-tab' . $lumber_app_id . '" 
                                                                                            data-bs-toggle="tab" data-bs-target="#back-view' . $lumber_app_id . '" 
                                                                                            type="button" role="tab" aria-controls="back-view" aria-selected="false">
                                                                                            <i class="fas fa-id-card me-1"></i> Back View
                                                                                        </button>
                                                                                    </li>
                                                                                </ul>
                                                                                <div class="tab-content" id="cssViewTabsContent' . $lumber_app_id . '">
                                                                                    <div class="tab-pane fade show active" id="front-view' . $lumber_app_id . '" role="tabpanel" aria-labelledby="front-tab">
                                                                                        <iframe src="../client/css_2025/front-index.php?lumber_app_id=' . $lumber_app_id . '" 
                                                                                            style="width:100%; height:80vh; border:none; display:none;" 
                                                                                            onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerCSS' . $lumber_app_id . '\').style.display=\'none\';"></iframe>
                                                                                    </div>
                                                                                    <div class="tab-pane fade" id="back-view' . $lumber_app_id . '" role="tabpanel" aria-labelledby="back-tab">
                                                                                        <iframe src="../client/css_2025/back-index.php?lumber_app_id=' . $lumber_app_id . '" 
                                                                                            style="width:100%; height:80vh; border:none;"></iframe>
                                                                                    </div>
                                                                                </div>
                                                                            </div>';
                                                                    } else {
                                                                        echo '
                                                                                <iframe src="../client/clientcss_view.php?lumber_app_id=' . $lumber_app_id . '" style="width:100%; height:85vh; border:none; display:none;" onload="this.style.display=\'block\'; document.getElementById(\'loadingSpinnerCSS' . $lumber_app_id . '\').style.display=\'none\';"></iframe>';
                                                                    }
                                                                    echo '
                                                                            </div>
                                                                        </div></div>
                                                                    </div>';
                                                                }
                                                            }
                                                            $stmt_lumber->close();
                                                        } else {
                                                            error_log('Database query failed: ' . $con->error);
                                                            echo '<tr><td colspan="8"><div class="alert alert-danger" role="alert">Error retrieving lumber applications. Please check the system logs.</div></td></tr>';
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
            <!-- /Main Content -->

            <?php require_once("footer.php"); ?>
        </div>
    </div>

    <!-- Core & Vendor JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- DataTables & Plugins JS -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme JS -->
    <script src="build/js/custom.js"></script>

    <!-- Page-specific JS -->
    <script>
        $(document).ready(function() {
            $('#lumberApplicationsTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10,
                "dom": 'lBfrtip',
                "buttons": [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 7 } // Disable sorting on the "Action" column (index 7)
                ]
            });
        });
    </script>
</body>
</html>