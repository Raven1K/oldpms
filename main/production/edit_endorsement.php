<?php
    require_once "../../processphp/config.php";

    $lumber_app_id = isset($_GET['lumber_app_id']) ? $_GET['lumber_app_id'] : '';
    
    // Consider adding validation/sanitization here
    $query = "SELECT * FROM supp_contdetails WHERE lumber_app_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $lumber_app_id);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contract Details</title>
        <!-- Using latest Bootstrap from official CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .card-title {
                font-weight: 600;
                color: #0d6efd;
            }
            .table-header {
                background-color: #f8f9fa !important;
            }
            .action-btn {
                margin: 0 5px;
            }
            .main-container {
                padding: 20px;
                background-color: #f8f9fa;
            }
        </style>
    </head>
    <body>
    
    <div class="main-container">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0">
                    Contract Details for: <span class="text-primary fw-bold"><?= htmlspecialchars($lumber_app_id) ?></span>
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <a href="add_contdetails.php?lumber_app_id=<?= urlencode($lumber_app_id) ?>" 
                           class="btn btn-primary btn-lg">
                            <i class="bi bi-plus-circle me-2"></i> Add Contract Detail
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" 
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Export to PDF</a></li>
                            <li><a class="dropdown-item" href="#">Export to Excel</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Refresh</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Business Name</th>
                                <th width="10%">Supplier Address</th>
                                <th width="10%">Owner</th>
                                <th width="10%">PT Address</th>
                                <th width="8%">Expiry Date</th>
                                <th width="5%">Selected</th>
                                <th width="5%">FALCU</th>
                                <th width="5%">MACU</th>
                                <th width="5%">GECU</th>
                                <th width="5%">CACU</th>
                                <th width="5%">MANCU</th>
                                <th width="5%">Result</th>
                                <th width="8%">Type</th>
                                <th width="10%">Office Covered</th>
                                <th width="8%">Species</th>
                                <th width="8%">Year Validity</th>
                                <th width="5%">Validity Value</th>
                                <th width="10%">Other</th>
                                <th width="8%">Managed</th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['ID'] ?></td>
                                <td><?= htmlspecialchars($row['bname']) ?></td>
                                <td><?= htmlspecialchars($row['Saddress']) ?></td>
                                <td><?= htmlspecialchars($row['ownername']) ?></td>
                                <td><?= htmlspecialchars($row['ptadd']) ?></td>
                                <td><?= htmlspecialchars($row['exdate']) ?></td>
                                <td><?= htmlspecialchars($row['select']) ?></td>
                                <td><?= htmlspecialchars($row['falcu']) ?></td>
                                <td><?= htmlspecialchars($row['macu']) ?></td>
                                <td><?= htmlspecialchars($row['gecu']) ?></td>
                                <td><?= htmlspecialchars($row['cacu']) ?></td>
                                <td><?= htmlspecialchars($row['mancu']) ?></td>
                                <td><?= htmlspecialchars($row['result']) ?></td>
                                <td><?= htmlspecialchars($row['Type_contracts']) ?></td>
                                <td><?= htmlspecialchars($row['office_cover']) ?></td>
                                <td><?= htmlspecialchars($row['Species']) ?></td>
                                <td><?= htmlspecialchars($row['yearvalidity']) ?></td>
                                <td><?= htmlspecialchars($row['validity_val']) ?></td>
                                <td><?= htmlspecialchars($row['other']) ?></td>
                                <td><?= htmlspecialchars($row['mang']) ?></td>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        <a href="add_wood_species_endorse.php?endorsement_id=<?= $row['ID'] ?>&lumber_app_id=<?= $row['lumber_app_id'] ?>" 
                                           class="btn btn-sm btn-outline-primary action-btn">
                                            <i class="bi bi-pencil"></i>Edit Species
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
    
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>