<?php

// Initialize the session
require_once "../processphp/config.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}

$id = $_SESSION["client_id"];

// Use PDO to fetch client details
$query = $connection->prepare("SELECT * FROM user_client WHERE client_id=:client_id");
$query->bindParam("client_id", $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $clientname = $result['firstname'];
    $lastname = $result['lastname'];
    $email = $result['email'];
    $mobileno = $result['mobilenum'];
} else {
    $em = "Client not found!";
    header("Location: univmodal.php?error=$em");
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">

    <title>OLDPMS</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link href="css/custom_styles.css" rel="stylesheet">
    <style>
        .modal-xl {
            max-width: 90%;
        }
        /* Custom CSS for the loading spinner */
        .loading-spinner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10; /* Make sure it's on top of the iframe */
        }
        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .iframe-container {
            position: relative;
            width: 100%;
            height: 600px;
        }
    </style>
</head>
<body style="background: #ecedf0;">
    <div id="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
            <div class="container-fluid">
                <a href="#"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <a class="navbar-brand" href="#"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <div class="sidebar-header">
                    <div class="sidebar-brand">
                        <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;"><i class="fa-solid fa-circle-user"></i> <?php echo "<b>{$clientname}</b> </a>"; ?></div>
                </div>
                <li><a href="dashboard_requirement.php">Requirements</a></li>
                <li><a href="dashboard_doclist.php">Document Status</a></li>
                <li style="padding-left: 30px;"><i style="color: white;" class="fa-solid fa-right-from-bracket"></i><button style="color: white;" class="btn" name="btn" data-target="#logoutModal" data-toggle="modal">Logout</button></li><br><br>
            </ul>
        </nav>

        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bodytime">
        <div class="card" style="width: 1000px; padding: 0; align-items: center;display: flex;margin: auto;margin-top: 5%;">
            <div class="card-body">
                <center>
                    <h2 class="text-center" style="font-family: system-ui; font-weight: 600">Release of E-Permit and its attached Document</h2>
                    <p style="font-family: system-ui; word-wrap: normal; width:100%; word-wrap:break-word; font-size: 19px; font-weight: 350;">Click <b>'Details'</b> to select the corresponding electronic copy of document.<br></p><br></p>
                </center>
                <table class="table table-striped" style="width: 900px;">
                    <tr>
                        <th style="background: #597EFB; color: #fff; font-weight: 300;">DOCUMENTS</th>
                        <th style="background: #597EFB; color: #fff; font-weight: 300; text-align: center;">Action</th>
                    </tr>
                    <?php
                    $lumber_app_id = $_GET['lumber_app_id'];

                    if (isset($_POST['acknowlege'])) {
                        $sql = "UPDATE lumber_application SET Acknowlege_Client = :Acknowlege_Client WHERE lumber_app_id = :lumber_app_id";
                        $stmt = $connection->prepare($sql);
                        $stmt->execute([':Acknowlege_Client' => 'Acknowledged', ':lumber_app_id' => $lumber_app_id]);

                        $date2 = date('m/d/y');
                        date_default_timezone_set("Asia/Manila");
                        $Time = date("h:i:sa");
                        $Title = '-END-TRANSACTION-';
                        $Details = 'Note: You will be notified 3 months before the expiration of your Permit.';
                        
                        $query2 = $connection->prepare("INSERT INTO client_client_document_history(lumber_app_id, Date, Title, Details, Time) VALUES (:lumber_app_id, :Date, :Title, :Details, :Time)");
                        $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
                        $query2->bindParam("Date", $date2, PDO::PARAM_STR);
                        $query2->bindParam("Title", $Title, PDO::PARAM_STR);
                        $query2->bindParam("Details", $Details, PDO::PARAM_STR);
                        $query2->bindParam("Time", $Time, PDO::PARAM_STR);
                        $query2->execute();
                        
                        echo "<script type='text/javascript'>alert('Successfully Acknowledged');</script>";
                    }

                    // Use PDO to check acknowledgement status
                    $stmt_ack = $connection->prepare("SELECT Acknowlege_Client FROM lumber_application WHERE lumber_app_id = :lumber_app_id");
                    $stmt_ack->bindParam(':lumber_app_id', $lumber_app_id, PDO::PARAM_INT);
                    $stmt_ack->execute();
                    $lumber_ap_row = $stmt_ack->fetch(PDO::FETCH_ASSOC);

                    if (($lumber_ap_row['Acknowlege_Client']) == ('Acknowledged')) {
                        echo '<tr>';
                        echo '<td style="border-right-color: #fff;"><span id="custom-text" style="font-size: 13px; color: #808080;"> ANNEX A - Terms and Conditions for Certificate of Registration as Lumber Dealer </span></td>';
                        echo '<td align="center" style="width: 100px;"><a type="button" class="btn btn-warning view-doc" data-bs-toggle="modal" data-bs-target="#documentModal" data-bs-url="../main/records/ANNEX-A-Terms-and-Conditions.pdf">Read</a></td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td style="border-right-color: #fff;"><span id="custom-text" style="font-size: 13px; color: #808080;"> E-Permit </span></td>';
                        echo '<td align="center" style="width: 100px;"><a type="button" class="btn btn-warning view-doc" data-bs-toggle="modal" data-bs-target="#documentModal" data-bs-url="../main/records/generate_viewLumberEdealer.php?lumber_app_id=' . $lumber_app_id . '">View</a></td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td style="border-right-color: #fff;"><span id="custom-text" style="font-size: 13px; color: #808080;"> Acknowledgment </span></td>';
                        echo '<td align="center" style="width: 100px;"><a type="button" class="btn btn-warning view-doc" data-bs-toggle="modal" data-bs-target="#documentModal" data-bs-url="../main/records/generate-pdf2_2.php?lumber_app_id=' . $lumber_app_id . '">View</a></td>';
                        echo '</tr>';
                    } else {
                        echo '<tr>';
                        echo '<td style="border-right-color: #fff;"><span id="custom-text" style="font-size: 13px; color: #808080;"> Release Certification </span></td>';
                        echo '<td align="right" style="width: 100px;"><a type="button" class="btn btn-warning view-doc" data-bs-toggle="modal" data-bs-target="#documentModal" data-bs-url="../main/records/generate-pdf2_2.php?lumber_app_id=' . $lumber_app_id . '" id="openDocBtn">Open</a></td>';
                        echo '</tr>';
                        echo '<tr><td colspan="2" align="center"><form method="POST"><button class="btn btn-warning" name="acknowlege" id="acknowledgeBtn" disabled>Acknowledge</button></form></td></tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="documentModalLabel">Document Viewer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadingOverlay" class="loading-spinner-overlay" style="display: none;">
                <div class="loading-spinner"></div>
            </div>
            <iframe id="documentFrame" src="" width="100%" height="600px" style="border: none;"></iframe>
          </div>
        </div>
      </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const documentModal = document.getElementById('documentModal');
            const openDocBtn = document.getElementById('openDocBtn');
            const acknowledgeBtn = document.getElementById('acknowledgeBtn');
            const iframe = document.getElementById('documentFrame');
            const loadingOverlay = document.getElementById('loadingOverlay');

            // Event listener to enable the Acknowledge button when the Open button is clicked
            if (openDocBtn) {
                openDocBtn.addEventListener('click', function() {
                    // Use a slight delay to ensure the modal starts loading
                    setTimeout(() => {
                        if (acknowledgeBtn) {
                            acknowledgeBtn.removeAttribute('disabled');
                        }
                    }, 500);
                });
            }

            // Show loading spinner when modal is opening
            if (documentModal) {
                documentModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const url = button.getAttribute('data-bs-url');

                    // Show the loading spinner
                    loadingOverlay.style.display = 'flex';
                    iframe.style.display = 'none';

                    iframe.src = url;
                });
                
                // Hide loading spinner and show iframe when content is loaded
                iframe.onload = function() {
                    loadingOverlay.style.display = 'none';
                    iframe.style.display = 'block';
                };

                // Clear the iframe src when the modal is closed
                documentModal.addEventListener('hide.bs.modal', function (event) {
                    iframe.src = "";
                });
            }
        });
    </script>
</body>
</html>