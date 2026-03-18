<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database configuration
require_once '../processphp/config.php';

// If user is not logged in, redirect to login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../admin/login.php');
    exit;
}

// Validate user_id from session
$userid = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
if ($userid <= 0) {
    // If the user_id is invalid, clear the session and redirect
    session_destroy();
    header('Location: ../admin/login.php');
    exit;
}

// Prepare and execute the query safely using prepared statements
$sql = "SELECT name, user_role_id FROM denr_users WHERE user_id = ?";

if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row if it exists
    if ($row = $result->fetch_assoc()) {
        $clientname = $row['name'];
        $user_role  = $row['user_role_id'];
    } else {
        // No matching user found. Handle accordingly:
        session_destroy();
        header('Location: ../admin/login.php');
        exit;
    }
    $stmt->close();
} else {
    // Handle potential SQL preparation errors
    error_log("Database error: Unable to prepare the query: " . $con->error); // Log the error
    die("A system error occurred. Please try again later."); // Display a user-friendly message
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Existing Lumber Dealers within Caraga Region</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php require_once('sidebar.php'); ?>
            <?php require_once('topbar.php'); ?>
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3 class="text-success"><strong>Reports</strong> <small>| List of Approved Lumber Dealers in Caraga Region</small></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Approved Lumber Dealers <small>Detailed List</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <?php
                                                // Begin table
                                                echo '<table id="lumberApplicationsTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">';
                                                echo '<caption>List of released E-Permits</caption>';
                                                echo '<thead>';
                                                echo '<tr>';
                                                echo '<th scope="col">Lumber ID</th>';
                                                echo '<th scope="col">Owner Name</th>';
                                                echo '<th scope="col">Business Trade Name</th>';
                                                echo '<th scope="col">Registration Number</th>';
                                                echo '<th scope="col">Office</th>';
                                                echo '<th scope="col">Status</th>';
                                                echo '<th scope="col">Action</th>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';

                                                // Database query to fetch all completed lumber applications
                                                $sql = "SELECT * FROM `lumber_application` WHERE CAST(Flow_stat AS UNSIGNED) >= 5 ORDER BY lumber_app_id ASC";

                                                // Execute query using prepared statements for better security
                                                if ($stmt = $con->prepare($sql)) {
                                                    $stmt->execute();
                                                    $result = $stmt->get_result(); // Fetch the result set

                                                    // Loop through each record in the result set
                                                    while ($row = $result->fetch_assoc()) {
                                                        // Dynamically generate the dropdown menu ID
                                                        $dropdownId = 'dropdownMenuButton' . $row['lumber_app_id'];
                                                        $oldpmsId = $row['lumber_app_id'];
                                                        $bussiness_name = $row['bussiness_name'];

                                                        // Output table row
                                                        echo '<tr>';
                                                        echo '<th scope="row">' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '</th>';
                                                        echo '<td>' . htmlspecialchars($row['perm_fname'] . ' ' . $row['perm_lname'], ENT_QUOTES, 'UTF-8') . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['bussiness_name'], ENT_QUOTES, 'UTF-8') . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['Registration_Number'], ENT_QUOTES, 'UTF-8') . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['Office'], ENT_QUOTES, 'UTF-8') . '</td>';
                                                        echo '<td>';
                                                        if (isset($row['Status'])) {
                                                            $status = htmlspecialchars($row['Status'], ENT_QUOTES, 'UTF-8');
                                                            $badgeClass = '';
                                                            switch ($status) {
                                                                case 'Approved':
                                                                    $badgeClass = 'bg-success';
                                                                    break;
                                                                case 'Pending':
                                                                    $badgeClass = 'bg-warning text-dark';
                                                                    break;
                                                                case 'Returned':
                                                                    $badgeClass = 'bg-danger';
                                                                    break;
                                                                case 'Completed':
                                                                    $badgeClass = 'bg-primary';
                                                                    break;
                                                                default:
                                                                    $badgeClass = 'bg-secondary';
                                                                    break;
                                                            }
                                                            echo '<span class="badge ' . $badgeClass . '">' . $status . '</span>';
                                                        } else {
                                                            echo '';
                                                        }
                                                        echo '</td>';

                                                        // Dropdown menu for actions
                                                        echo '<td>';
                                                        echo '<div class="dropdown">';
                                                        echo '<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="' . $dropdownId . '" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>';
                                                        echo '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="' . $dropdownId . '">';
                                                        echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#print' . htmlspecialchars($oldpmsId, ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-map-marked-alt fa-fw me-2"></i> View Map</a></li>';
                                                        // echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#epermit' . htmlspecialchars($oldpmsId, ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-file-invoice fa-fw me-2"></i> View E-Permit</a></li>';
                                                        echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewdocuments' . htmlspecialchars($oldpmsId, ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-folder-open fa-fw me-2"></i> View Documents</a></li>';
                                                        echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewdtracking' . htmlspecialchars($oldpmsId, ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-route fa-fw me-2"></i> View Tracking</a></li>';
                                                        echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#orderOfPayment' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-money-bill-wave fa-fw me-2"></i> Order of Payment</a></li>';

                                                        if ($user_role == '19') { // Using $user_role from the session check
                                                            echo '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewCss' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-star fa-fw me-2"></i> View CSS</a></li>';
                                                        }

                                                        echo '</ul>';
                                                        echo '</div>';
                                                        echo '</td>';
                                                        echo '</tr>';

                                                        // Modals for each action
                                                        // View Map Modal
                                                        echo '
                                                        <div class="modal fade" id="print' . $oldpmsId . '" tabindex="-1" aria-labelledby="printModalLabel' . $oldpmsId . '" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="printModalLabel' . $oldpmsId . '">View Map for ' . htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') . '</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-center" id="loadingSpinnerMap' . $oldpmsId . '">
                                                                            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading Map...</span></div>
                                                                        </div>
                                                                        <iframe src="../map/index_view_map.php?lumber_app_id=' . $oldpmsId . '" style="width: 100%; height: 85vh; border: none; display:none;" onload="document.getElementById(\'loadingSpinnerMap' . $oldpmsId . '\').style.display=\'none\'; this.style.display=\'block\';"></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                        // E-Permit Modal
                                                        echo '
                                                        <div class="modal fade" id="epermit' . $oldpmsId . '" tabindex="-1" aria-labelledby="epermitModalLabel' . $oldpmsId . '" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="epermitModalLabel' . $oldpmsId . '">View E-Permit for ' . htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') . '</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-center" id="loadingSpinnerEpermit' . $oldpmsId . '">
                                                                            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading E-Permit...</span></div>
                                                                        </div>
                                                                        <iframe src="records/generate_viewLumberEdealer.php?lumber_app_id=' . $oldpmsId . '" style="width: 100%; height: 85vh; border: none; display:none;" onload="document.getElementById(\'loadingSpinnerEpermit' . $oldpmsId . '\').style.display=\'none\'; this.style.display=\'block\';"></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                        // View Documents Modal
                                                        echo '
                                                        <div class="modal fade" id="viewdocuments' . $oldpmsId . '" tabindex="-1" aria-labelledby="viewdocumentsModalLabel' . $oldpmsId . '" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="viewdocumentsModalLabel' . $oldpmsId . '">View Documents for ' . htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') . '</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-center" id="loadingSpinnerDocs' . $oldpmsId . '">
                                                                            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading Documents...</span></div>
                                                                        </div>
                                                                        <iframe src="listofdocuments_approved.php?lumber_app_id=' . $oldpmsId . '" style="width: 100%; height: 85vh; border: none; display:none;" onload="document.getElementById(\'loadingSpinnerDocs' . $oldpmsId . '\').style.display=\'none\'; this.style.display=\'block\';"></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                        // View Tracking Modal
                                                        echo '
                                                        <div class="modal fade" id="viewdtracking' . $oldpmsId . '" tabindex="-1" aria-labelledby="viewdtrackingModalLabel' . $oldpmsId . '" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="viewdtrackingModalLabel' . $oldpmsId . '">View Tracking for ' . htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') . '</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-center" id="loadingSpinnerTracking' . $oldpmsId . '">
                                                                            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading Tracking...</span></div>
                                                                        </div>
                                                                        <iframe src="../client/doctracker.php?lumber_app_id=' . $oldpmsId . '&bussiness_name=' . urlencode($bussiness_name) . '" style="width: 100%; height: 85vh; border: none; display:none;" onload="document.getElementById(\'loadingSpinnerTracking' . $oldpmsId . '\').style.display=\'none\'; this.style.display=\'block\';"></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                        // Order of Payment Modal
                                                        echo '
                                                        <div class="modal fade" id="orderOfPayment' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '" tabindex="-1" aria-labelledby="orderOfPaymentLabel' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="orderOfPaymentLabel' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '">Order of Payment for ' . htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') . '</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-center" id="loadingSpinnerOOP' . $oldpmsId . '">
                                                                            <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading Order of Payment...</span></div>
                                                                        </div>
                                                                        <iframe src="production/orderofpaymentview3.php?lumber_app_id=' .  $oldpmsId  . '" style="width: 100%; height: 85vh; border: none; display:none; zoom: 0.7;" onload="document.getElementById(\'loadingSpinnerOOP' . $oldpmsId . '\').style.display=\'none\'; this.style.display=\'block\';"></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                        // View CSS Modal (only for user_role_id 19)
                                                        if ($user_role == '19') {
                                                            echo '
                                                            <div class="modal fade" id="viewCss' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '" tabindex="-1" aria-labelledby="viewCssLabel' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="viewCssLabel' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '">View CSS for ' . htmlspecialchars($bussiness_name, ENT_QUOTES, 'UTF-8') . '</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="text-center" id="loadingSpinnerCSS' . $oldpmsId . '">
                                                                                <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading CSS...</span></div>
                                                                            </div>
                                                                            <iframe src="../client/clientcss_view.php?lumber_app_id=' . $oldpmsId . '" style="width: 100%; height: 85vh; border: none; display:none;" onload="document.getElementById(\'loadingSpinnerCSS' . $oldpmsId . '\').style.display=\'none\'; this.style.display=\'block\';"></iframe>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        }
                                                    }

                                                    $stmt->close(); // Close the statement
                                                } else {
                                                    // Handle potential query preparation errors
                                                    error_log('Database query failed: ' . $con->error); // Log the error
                                                    echo '<div class="alert alert-danger" role="alert">Error retrieving lumber applications. Please try again later.</div>';
                                                }

                                                // End table
                                                echo '</tbody>';
                                                echo '</table>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("footer.php"); ?>
            </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <script src="vendors/nprogress/nprogress.js"></script>
    <script src="vendors/iCheck/icheck.min.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="build/js/custom.js"></script>

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
                    { "orderable": false, "targets": [6] } // Disable sorting on the "Action" column
                ]
            });
        });
    </script>
</body>
</html>