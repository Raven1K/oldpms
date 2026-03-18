<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Lumber Dealer Permitting and Monitoring System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
          crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-A3x6ThAcoiEO3Pjh51y5gVrHBdLq0sGMGWsUO7rOgI1xxNxDf+3US1uNzNImVoV3" 
            crossorigin="anonymous"></script>

    <style>
        body {
            margin: 20px;
        }
        .line-separator {
            width: 100%;
            height: 1px;
            background-color: black;
            margin: 10px 0;
        }
        .embed-container {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .embed-container embed {
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <!-- PHP Logic -->
    <?php
    session_start();
    require_once "../processphp/config.php";  // Adjust the path as necessary

    $l_id = $_GET['lumber_app_id'] ?? 0;

    // Fetch document paths
    $lumber_app0 = "SELECT * FROM lumber_app_doc_erow 
                    WHERE lumber_app_id = $l_id AND Number_of_doc = '2'";
    $lumber_app_qry0 = mysqli_query($con, $lumber_app0);
    $lumber_ap_row0 = mysqli_fetch_assoc($lumber_app_qry0);
    $documentPath = "../processphp/clientupload/uploads/" . ($lumber_ap_row0['name_app_doc'] ?? '');

    $viewPath = "../main/generate_VIEW.php?lumber_app_id=$l_id";
    ?>

    <!-- Embeds Section -->
    <div class="embed-container">
        <div class="col-md-8">
            <embed 
                src="<?php echo $documentPath; ?>" 
                width="100%" 
                height="800px">
        </div>
        <div class="col-md-4">
            <embed 
                src="<?php echo $viewPath; ?>" 
                width="200%" 
                height="800px">
        </div>
    </div>

    <!-- Line Separator -->
    <div class="line-separator"></div>

    <!-- Table Section -->
    <div class="container-fluid">
        <h2 class="text-warning">
            <strong>Supplier Contract <small>(Details)</small> |</strong>
        </h2>
        <div class="card-box table-responsive">
            <table id="datatable-responsive" class="table table-striped table-bordered text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Owner Name</th>
                        <th>Suppliers Address</th>
                        <th>Particulars</th>
                        <th>Supply Contract Type</th>
                        <th>Tree Species / Volume (bd.ft)</th>
                        <th>Expiration Date</th>
                        <th>Validity</th>
                        <th>Total Contracted Volume</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $connection->query("
                        SELECT 
                            ownername, 
                            Saddress, 
                            Type_contracts, 
                            Species, 
                            exdate, 
                            validity_val, 
                            result
                        FROM 
                            supp_contdetails  
                        WHERE 
                            lumber_app_id = $l_id
                    ");

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['ownername']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['Saddress']) . '</td>';
                        echo '<td>Chainsaw Cut Lumber</td>';
                        echo '<td>' . htmlspecialchars($row['Type_contracts']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['Species']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['exdate']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['validity_val']) . ' Year/s</td>';
                        echo '<td>' . htmlspecialchars($row['result']) . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
