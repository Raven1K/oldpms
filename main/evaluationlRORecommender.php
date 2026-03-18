<?php
error_reporting(0); // Consider enabling error reporting during development and handling errors gracefully in production.
require_once "../processphp/config.php";

$l_id = $_GET['lumber_app_id'];

// Include necessary production files
include 'production/cenro_cert_r.php';
include 'production/cenro_endorsement_r.php';

// Handle approval logic
if (isset($_POST['RApprove'])) {
    $stat_uss = 'For Approval (RED)';
    $Flow_stats = '16';

    try {
        $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = :lumber_app_id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':Status', $stat_uss, PDO::PARAM_STR);
        $stmt->bindParam(':Flow_stat', $Flow_stats, PDO::PARAM_STR);
        $stmt->bindParam(':lumber_app_id', $l_id, PDO::PARAM_INT);
        $stmt->execute();

        // Record history
        date_default_timezone_set("Asia/Manila");
        $date2 = date('m/d/y');
        $Time = date("h:i:sa");
        $Title = 'ARD TS';
        $Details = 'Reviewed all the documents and approved the endorsement for the RED to approve the Lumber Dealer E-Permit.';

        $query2 = $connection->prepare("INSERT INTO client_client_document_history (
            lumber_app_id, Date, Title, Details, Time
        ) VALUES (
            :lumber_app_id, :Date, :Title, :Details, :Time
        )");
        $query2->bindParam("lumber_app_id", $l_id, PDO::PARAM_INT);
        $query2->bindParam("Date", $date2, PDO::PARAM_STR);
        $query2->bindParam("Title", $Title, PDO::PARAM_STR);
        $query2->bindParam("Details", $Details, PDO::PARAM_STR);
        $query2->bindParam("Time", $Time, PDO::PARAM_STR);
        $query2->execute();

        echo "<script>alert('Successfully Approved!'); location='action.php';</script>";
        exit(); // Important to exit after header redirect or JavaScript redirect
    } catch (PDOException $e) {
        // Log the error for debugging
        error_log("Error approving application: " . $e->getMessage());
        echo "<script>alert('An error occurred during approval. Please try again.');</script>";
    }
}

// Fetch documents
$documents = [];
try {
    $stmt = $connection->prepare("SELECT * FROM lumber_app_doc_erow WHERE lumber_app_id = :lumber_app_id ORDER BY CAST(Number_of_doc AS UNSIGNED) ASC");
    $stmt->bindParam(':lumber_app_id', $l_id, PDO::PARAM_INT);
    $stmt->execute();
    $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching documents: " . $e->getMessage());
    echo "<script>alert('An error occurred while loading documents. Please try again.');</script>";
}

// Document status definitions (could be fetched from a database or config)
$doc_statuses = [
    'Reviewed',
    'Approved',
    'For Review',
    'For Review (FG)',
    'Approved (FG)',
    'For Generate Endorsement',
    'For Review (FG) RED',
    'For Review (CG)',
    'Approved (CG)',
    'For Review (LPDD)',
    'For Review (LPDD) CF'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS | DENR R13</title>

    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="build/css/custom.css" rel="stylesheet">
    
    <style>
        .btn {
            width: 80%;
        }
    </style>
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
                            </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <ul class="nav navbar-right panel_toolbox">
                                        <div class="row justify-content-center">
                                            <?php include 'return.php'; ?>
                                            
                                            <script>
                                                // Add a confirmation prompt
                                                function confirmApproval() {
                                                    return confirm("Do you really want to approve?");
                                                }
                                            </script>

                                            <li>
                                                <form method="POST" onsubmit="return confirmApproval();">
                                                    <button type="submit" class="btn-primary btn-sm btn-round btn ml-0" name="RApprove">
                                                        <span class="text align-content-center text-white"><strong>Approve</strong></span>
                                                        <span class="icon ml-2">
                                                            <i class="fas fa-check-to-slot text-white"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <a href="action.php" class="btn-secondary btn-sm btn-round btn ml-0">
                                                    <span class="text align-content-center text-white"><strong>Back</strong></span>
                                                    <span class="icon ml-2">
                                                        <i class="fas fa-circle-chevron-left text-white"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Document Name</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($documents)): ?>
                                                            <?php foreach ($documents as $row): ?>
                                                                <tr>
                                                                    <td><?php echo htmlentities($row['Number_of_doc']); ?></td>
                                                                    <td><?php echo htmlentities($row['doc_type_name']); ?></td>
                                                                    <td>
                                                                        <?php
                                                                        // Display 'Reviewed' for specific statuses, otherwise display the actual status
                                                                        $display_status = 'For Review'; // Default
                                                                        if (in_array($row['doc_status'], ['Approved', 'Approved (FG)', 'Approved (CG)', 'For Review (LPDD)', 'For Review (LPDD) CF'])) {
                                                                            $display_status = 'Reviewed';
                                                                        } else {
                                                                            $display_status = htmlentities($row['doc_status']);
                                                                        }
                                                                        echo $display_status;
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        // Centralize the view button logic
                                                                        $view_url = '#';
                                                                        $modal_id = '';
                                                                        $modal_title = '';
                                                                        $iframe_src = '';
                                                                        $use_modal = false;
                                                                        $modal_width = '80%'; // Default modal width
                                                                        $iframe_height = '85vh';

                                                                        if ($row['doc_status'] == 'Approved') {
                                                                            $view_url = 'modal_review_ROFUS.php?upload_id_doc=' . $row['upload_id_doc'];
                                                                        } elseif ($row['doc_status'] == 'Approved (FG)') {
                                                                            $view_url = 'production/modaltempVIEWER.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                        } elseif ($row['doc_type_name'] == 'Certification') {
                                                                            $view_url = 'production/generates_view_pdf2.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                            $use_modal = true; // Open in modal if desired, or keep target="_blank"
                                                                            $modal_id = 'certification_modal_' . $row['lumber_app_id'];
                                                                            $modal_title = 'Certification';
                                                                            $iframe_src = $view_url;
                                                                            $modal_width = '90%';
                                                                        } elseif ($row['doc_type_name'] == 'Endorsement for PENRO ') {
                                                                            $view_url = 'production/endorsement_PENRO_modal.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                            $use_modal = true;
                                                                            $modal_id = 'endorsement_penro_modal_' . $row['lumber_app_id'];
                                                                            $modal_title = 'Endorsement for PENRO';
                                                                            $iframe_src = 'production/penro_endorsement/endorsement_PENRO_modal.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                        } elseif ($row['doc_type_name'] == 'Endorsement for RED') {
                                                                            $view_url = '#'; // This will be handled by the modal
                                                                            $use_modal = true;
                                                                            $modal_id = 'endorsement_red_modal_' . $row['lumber_app_id'];
                                                                            $modal_title = 'Endorsement for RED';
                                                                            $iframe_src = 'production/penro_endorsement/endorsement_PENRO_modal.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                        } elseif ($row['doc_status'] == 'For Review (LPDD)') {
                                                                            $view_url = '#'; // This will be handled by the modal
                                                                            $use_modal = true;
                                                                            $modal_id = 'view_lpdd_modal_' . $row['lumber_app_id'];
                                                                            $modal_title = 'LPDD Document';
                                                                            $iframe_src = 'modaltemp_TS.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                            $modal_width = '100%';
                                                                        } elseif ($row['doc_status'] == 'For Review (LPDD) CF') {
                                                                            $view_url = '#'; // This will be handled by the modal
                                                                            $use_modal = true;
                                                                            $modal_id = 'view_permit_modal_' . $row['lumber_app_id'];
                                                                            $modal_title = 'View Permit';
                                                                            $iframe_src = 'generate_viewLumberEdealer.php?lumber_app_id=' . $row['lumber_app_id'];
                                                                            $modal_width = '90%';
                                                                        }

                                                                        if ($use_modal) {
                                                                            echo '<a class="btn btn-warning text-white" href="#" data-bs-toggle="modal" data-bs-target="#' . $modal_id . '">View</a>';
                                                                            echo '
                                                                            <div class="modal fade" id="' . $modal_id . '" tabindex="-1" aria-labelledby="' . $modal_id . 'Label" aria-hidden="true">
                                                                                <div class="modal-dialog" style="max-width: ' . $modal_width . '; height: 50vh;">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="' . $modal_id . 'Label">' . $modal_title . '</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <iframe src="' . $iframe_src . '" style="width: 100%; height: ' . $iframe_height . '; border: none;"></iframe>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>';
                                                                        } else {
                                                                            // For direct links
                                                                            echo '<a class="btn btn-warning" href="' . $view_url . '" ' . (($row['doc_type_name'] == 'Certification' || $row['doc_type_name'] == 'Endorsement for PENRO ') ? 'target="_blank"' : '') . '>View</a>';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="4" class="text-center">No documents found for this application.</td>
                                                            </tr>
                                                        <?php endif; ?>
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
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="build/js/custom.js"></script>

</body>
</html>