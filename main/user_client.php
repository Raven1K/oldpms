<?php
// Start session and check login status (based on sidebar.php logic)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ensure the database configuration file is available
if (!file_exists('../processphp/config.php')) {
    die('Error: Database configuration file not found. Please check the path.');
}
require_once('../processphp/config.php');

// Block if no log in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../admin/login.php");
    exit;
}

// --- PHP Functions for Data Retrieval (RETAINED) ---

/**
 * Fetches client data from the database based on search criteria.
 * @param mysqli $con Database connection object.
 * @param string $search Search term (name or address part).
 * @return array Array of client records.
 */
function fetchClients($con, $search = '') {
    $clients = [];
    $search = "%" . trim($search) . "%"; // Prepare search term for LIKE query

    // Base query selects all necessary client fields for the table
    $query = "SELECT client_id, firstname, mid_name, lastname, email, mobilenum, province, citymun, brgy, Status 
              FROM user_client 
              WHERE 1=1";
    
    // Add search conditions for Name, Email, Province, City/Municipality, or Barangay
    if (!empty(trim($search, '%'))) {
        $query .= " AND (
            CONCAT(firstname, ' ', mid_name, ' ', lastname) LIKE ? OR 
            email LIKE ? OR 
            province LIKE ? OR 
            citymun LIKE ? OR 
            brgy LIKE ?
        )";
        $stmt = $con->prepare($query);
        // Bind the search parameter five times for each LIKE comparison
        $stmt->bind_param("sssss", $search, $search, $search, $search, $search);
    } else {
        $stmt = $con->prepare($query);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
    }
    $stmt->close();
    return $clients;
}

// Get search query from URL parameter
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$client_data = fetchClients($con, $search_query);

// Helper functions for stats card calculation
$active_clients = count(array_filter($client_data, function($client) { return $client['Status'] == 1; }));
$pending_clients = count(array_filter($client_data, function($client) { return $client['Status'] == 0; }));

// --- Simple PDF Generation Logic (Placeholder) ---
// RETAINED: Left as original structure in case server-side PDF generation is preferred later.
if (isset($_GET['action']) && $_GET['action'] == 'pdf') {
    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="client_report.pdf"');
    // exit; // Real PDF generation logic goes here
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Management | DENR App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --denr-green: #22782c;
            --denr-light-green: #4CAF50;
            --denr-dark-green: #1a5c22;
            --denr-gradient: linear-gradient(135deg, #22782c 0%, #4CAF50 100%);
            --light-bg: #f8f9fa;
            --card-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            --hover-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 15px;
            color: #333;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
        }
        
        .header-gradient {
            background: var(--denr-gradient);
            color: white;
            padding: 25px 30px;
        }
        
        .header-gradient h2 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .header-gradient p {
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .action-bar {
            background-color: #ffffff;
            padding: 20px 25px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        
        .stats-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: block;
        }
        
        .stats-card .stats-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stats-card .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .stats-card.active {
            border-top: 4px solid var(--denr-green);
        }
        
        .stats-card.pending {
            border-top: 4px solid #ffc107;
        }
        
        .stats-card.total {
            border-top: 4px solid #0d6efd;
        }
        
        .btn-denr {
            background: var(--denr-gradient);
            border: none;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-denr:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(34, 120, 44, 0.2);
            color: white;
        }
        
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table-custom thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            padding: 15px 12px;
            font-weight: 600;
            color: #495057;
        }
        
        .table-custom tbody td {
            padding: 15px 12px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        
        .table-custom tbody tr {
            transition: all 0.2s ease;
        }
        
        .table-custom tbody tr:hover {
            background-color: #f8fdf9;
            transform: scale(1.002);
        }
        
        .client-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--denr-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 10px;
            flex-shrink: 0; /* Prevents shrinking on small screens */
        }
        
        .client-name {
            display: flex;
            align-items: center;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-active {
            background-color: rgba(34, 120, 44, 0.1);
            color: var(--denr-green);
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #b58a08;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-edit {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
        }
        
        .btn-edit:hover {
            background-color: #0d6efd;
            color: white;
        }
        
        .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .btn-delete:hover {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-pdf {
            background-color: rgba(34, 120, 44, 0.1);
            color: var(--denr-green);
        }
        
        .btn-pdf:hover {
            background-color: var(--denr-green);
            color: white;
        }
        
        .search-box {
            position: relative;
            max-width: 350px;
        }
        
        /* Hides the default DataTables search filter, as we use a custom one */
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
        
        .dataTables_wrapper .dataTables_length {
             padding-top: 10px;
        }

        .dataTables_wrapper .dataTables_info {
             padding-top: 10px;
             padding-left: 10px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }
        
        @media (max-width: 768px) {
            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .action-buttons {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card header-gradient animate__animated animate__fadeIn">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h2>Client Management</h2>
                            <p>Manage and view all registered clients in the system</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-light rounded-pill px-4 shadow-sm" onclick="triggerExcelExport()">
                                <i class="fas fa-file-excel me-2 text-success"></i> Export to Excel
                            </button>
                            <button class="btn btn-light rounded-pill px-4 shadow-sm" onclick="triggerPDFExport()">
                                <i class="fas fa-file-pdf me-2 text-danger"></i> Export to PDF
                            </button>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="stats-card total animate__animated animate__fadeInUp">
                    <i class="fas fa-users text-primary"></i>
                    <div class="stats-value"><?= count($client_data) ?></div>
                    <div class="stats-label">Total Clients</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card active animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                    <i class="fas fa-user-check text-success"></i>
                    <div class="stats-value"><?= $active_clients ?></div>
                    <div class="stats-label">Active Clients</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stats-card pending animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                    <i class="fas fa-user-clock text-warning"></i>
                    <div class="stats-value"><?= $pending_clients ?></div>
                    <div class="stats-label">Pending Clients</div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card animate__animated animate__fadeIn">
                    <div class="action-bar">
                        <h5 class="mb-0 text-dark">Client Records</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" id="customSearch" class="form-control" placeholder="Search clients...">
                            </div>
                            <button class="btn btn-denr shadow-sm">
                                <i class="fas fa-plus me-2"></i> Add Client
                            </button>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="clientTable" class="table table-custom" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Contact Info</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($client_data) > 0): ?>
                                        <?php foreach ($client_data as $client): 
                                            $fullName = htmlspecialchars($client['firstname'] . ' ' . $client['mid_name'] . ' ' . $client['lastname']);
                                            $initials = strtoupper(substr($client['firstname'], 0, 1) . substr($client['lastname'], 0, 1));
                                            $address = trim(htmlspecialchars($client['brgy'] . ', ' . $client['citymun'] . ', ' . $client['province']), ', ');
                                            $statusText = $client['Status'] == 1 ? 'Active' : 'Pending';
                                            $statusClass = $client['Status'] == 1 ? 'status-active' : 'status-pending';
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="client-name">
                                                    <div class="client-avatar" title="<?= $fullName ?>">
                                                        <?= $initials ?>
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold text-truncate" style="max-width: 150px;"><?= $fullName ?></div>
                                                        <small class="text-muted">ID: <?= htmlspecialchars($client['client_id']) ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-medium text-wrap" style="word-break: break-all;"><?= htmlspecialchars($client['email']) ?></div>
                                                <small class="text-muted"><?= htmlspecialchars($client['mobilenum']) ?></small>
                                            </td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 250px;" title="<?= $address ?>">
                                                    <?= $address ?>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="status-badge <?= $statusClass ?>"><?= $statusText ?></span>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-action btn-edit" title="Edit Client" 
                                                        onclick="editClient(<?= $client['client_id'] ?>)">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    
                                                    <button class="btn btn-action btn-delete" title="Delete Client" 
                                                        onclick="deleteClient(<?= $client['client_id'] ?>, '<?= $fullName ?>')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    
                                                    <button class="btn btn-action btn-pdf" title="Generate PDF" 
                                                        onclick="printSinglePDF(<?= $client['client_id'] ?>, '<?= $fullName ?>')">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">
                                                <div class="empty-state">
                                                    <i class="fas fa-users"></i>
                                                    <h4>No Clients Found</h4>
                                                    <p>There are no clients in the system yet. Click the button below to add your first client.</p>
                                                    <button class="btn btn-denr mt-2 shadow-sm">
                                                        <i class="fas fa-plus me-2"></i> Add First Client
                                                    </button>
                                                </div>
                                            </td>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    
    <script>
        // Initialize DataTables
        $(document).ready(function() {
            const table = $('#clientTable').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 4 } // Disable sorting for Actions column
                ],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search clients...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ clients",
                    "infoEmpty": "Showing 0 to 0 of 0 clients",
                    "infoFiltered": "(filtered from _MAX_ total clients)",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                },
                // Custom DOM to hide the default DataTables search and add other controls if needed
                "dom": 
                    "<'row'<'col-sm-12 col-md-6 mb-2'l><'col-sm-12 col-md-6 mb-2'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                "buttons": [] // Removed inline DataTable buttons since we have custom Export and Add buttons
            });
            
            // Custom search logic to hook into the DataTables filter
            $('#customSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
        });

        // --- Action Functions (RETAINED) ---

        function editClient(clientId) {
            alert(`Redirecting to edit page for Client ID: ${clientId}`);
            // window.location.href = `edit_client.php?id=${clientId}`; 
        }

        function deleteClient(clientId, clientName) {
            if (confirm(`Are you sure you want to delete client: ${clientName} (ID: ${clientId})?`)) {
                alert(`Client ID: ${clientId} (${clientName}) deleted successfully (simulated).`);
                // AJAX call to delete_client.php
            }
        }
        
        // --- === ADDED: NEW EXCEL EXPORT FUNCTION === ---
        function triggerExcelExport() {
            // Get the DataTables API instance
            const table = $('#clientTable').DataTable();
            
            // Define the headers for the Excel file
            const headers = ['Client ID', 'Name', 'Email', 'Contact', 'Location', 'Status'];
            
            // Create an array to hold the data
            const body = [];
            
            // Get data from ALL rows that match the current search filter
            table.rows({ search: 'applied' }).nodes().each(function() {
                const row = $(this);
                // Create a clean object for SheetJS
                const rowData = {
                    'Client ID': row.find('td:eq(0) small').text().replace('ID: ', ''),
                    'Name': row.find('td:eq(0) .fw-semibold').text().trim(),
                    'Email': row.find('td:eq(1) .fw-medium').text().trim(),
                    'Contact': row.find('td:eq(1) small').text().trim(),
                    'Location': row.find('td:eq(2)').text().trim(),
                    'Status': row.find('td:eq(3) span').text().trim()
                };
                body.push(rowData);
            });

            // Create a new worksheet from the JSON data (array of objects)
            const ws = XLSX.utils.json_to_sheet(body, { header: headers });
            
            // Optional: Set column widths for a cleaner look
            ws['!cols'] = [
                { wch: 10 }, // Client ID
                { wch: 30 }, // Name
                { wch: 30 }, // Email
                { wch: 15 }, // Contact
                { wch: 40 }, // Location
                { wch: 10 }  // Status
            ];
            
            // Create a new workbook
            const wb = XLSX.utils.book_new();
            
            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, "Client Report");

            // Trigger the download
            XLSX.writeFile(wb, "DENR_Client_Report.xlsx");
        }

        
        // --- PDF Generation Functions (ADJUSTED FOR NEW TABLE STRUCTURE) ---
        
        // 1. Print ALL data to PDF (using jsPDF for client-side)
        function triggerPDFExport() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            // Header for PDF
            doc.setFillColor(34, 120, 44);
            doc.rect(0, 0, 220, 30, 'F');
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(18);
            doc.text("Client Management Report", 14, 20);
            doc.setFontSize(10);
            doc.text(`Generated on: ${new Date().toLocaleDateString()}`, 14, 28);
            doc.setTextColor(0, 0, 0);
            
            const headers = ['Client ID', 'Name', 'Email', 'Contact', 'Location', 'Status'];
            
            // Get data from all rows (not just the current page)
            const body = [];
            
            $('#clientTable').DataTable().rows({ search: 'applied' }).nodes().each(function() {
                const row = $(this);
                const rowData = [
                    row.find('td:eq(0) small').text().replace('ID: ', ''), // Client ID
                    row.find('td:eq(0) .fw-semibold').text().trim(), // Name
                    row.find('td:eq(1) .fw-medium').text().trim(), // Email
                    row.find('td:eq(1) small').text().trim(), // Contact
                    row.find('td:eq(2)').text().trim(), // Location
                    row.find('td:eq(3) span').text().trim() // Status
                ];
                body.push(rowData);
            });

            doc.autoTable({
                startY: 40,
                head: [headers],
                body: body,
                theme: 'grid',
                headStyles: { 
                    fillColor: [34, 120, 44],
                    textColor: 255,
                    fontStyle: 'bold'
                },
                margin: { top: 40 }
            });

            // Opens the PDF in a new tab instead of downloading
            doc.output('dataurlnewwindow');
        }

        // 2. Print SINGLE client data to PDF
        function printSinglePDF(clientId, clientName) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            // Find the row data using the ID embedded in the small tag
            const row = $(`#clientTable tbody tr`).filter(function() {
                return $(this).find('td:eq(0) small').text().includes(clientId);
            });

            if (row.length === 0) {
                alert("Client data not found for PDF generation.");
                return;
            }

            // Header for PDF
            doc.setFillColor(34, 120, 44);
            doc.rect(0, 0, 220, 30, 'F');
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(16);
            doc.text("Client Detail Report", 14, 20);
            doc.setTextColor(0, 0, 0);
            doc.setFontSize(12);
            
            // Extract data based on new table structure
            const data = {
                'Client ID': row.find('td:eq(0) small').text().replace('ID: ', ''),
                'Full Name': row.find('td:eq(0) .fw-semibold').text().trim(),
                'Email': row.find('td:eq(1) .fw-medium').text().trim(),
                'Contact Number': row.find('td:eq(1) small').text().trim(),
                'Address': row.find('td:eq(2)').text().trim(),
                'Status': row.find('td:eq(3) span').text().trim()
            };
            
            const finalData = Object.entries(data).map(([key, value]) => [key, value]);

            doc.autoTable({
                startY: 40,
                head: [['Field', 'Value']],
                body: finalData,
                theme: 'grid',
                headStyles: { 
                    fillColor: [34, 120, 44],
                    textColor: 255,
                    fontStyle: 'bold'
                },
                columnStyles: {
                    0: { fontStyle: 'bold', cellWidth: 50 },
                    1: { cellWidth: 'auto' }
                },
                styles: {
                    cellPadding: 5,
                    fontSize: 11
                }
            });
            
            // Opens the PDF in a new tab instead of downloading
            doc.output('dataurlnewwindow');
        }
    </script>
</body>
</html>