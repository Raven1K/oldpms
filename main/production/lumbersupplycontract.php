<?php
session_start();
include('../../processphp/config.php');

// Block if no login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../admin/login.php");
    exit;
}

$userid = $_SESSION["user_id"];

// Fetch user details
$lumber_app = "SELECT * FROM denr_users WHERE user_id = ?";
$stmt = $con->prepare($lumber_app);
if (!$stmt) {
    die("Prepare statement failed: " . $con->error);
}
$stmt->bind_param("i", $userid);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}
$result = $stmt->get_result();
$lumber_ap_row = $result->fetch_assoc();

if (!$lumber_ap_row) {
    die("No user found with the given ID.");
}

$clientname = $lumber_ap_row['name'];
$user_role = $lumber_ap_row['user_role_id'];
$office_id = $lumber_ap_row['office_id'];

$stmt->close();

// Fetch office details
$lumber_app_office = "SELECT * FROM office WHERE office_id = ? AND office_level = 'CENRO'";
$stmt_office = $con->prepare($lumber_app_office);
if (!$stmt_office) {
    die("Prepare statement failed: " . $con->error);
}
$stmt_office->bind_param("i", $office_id);
if (!$stmt_office->execute()) {
    die("Execute failed: " . $stmt_office->error);
}
$result_office = $stmt_office->get_result();
$lumber_ap_row3 = $result_office->fetch_assoc();

$station = $lumber_ap_row3 ? $lumber_ap_row3['station'] : "";

$stmt_office->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OLDPMS | DENR R13</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- sidebar navigation -->
        <?php require_once('navbar.php'); ?>
        <!-- /sidebar navigation -->

        <!-- top navigation -->
        <?php require_once('navbar.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- Chart Monthly Summary -->
                <table class="table">
                    <caption>Lumber Supply Data</caption>
                    <thead>
                    <tr>
                        <th scope="col">Lumber ID</th>
                        <th scope="col">Business Name</th>
                        <th scope="col">Saddress</th>
                        <th scope="col">Owner Name</th>
                        <th scope="col">ptadd</th>
                        <th scope="col">exdate</th>
                        <th scope="col">select</th>
                        <th scope="col">falcu</th>
                        <th scope="col">macu</th>
                        <th scope="col">gecu</th>
                        <th scope="col">cacu</th>
                        <th scope="col">mancu</th>
                        <th scope="col">result</th>
                        <th scope="col">Type_contracts</th>
                        <th scope="col">office_cover</th>
                        <th scope="col">Species</th>
                        <th scope="col">yearvalidity</th>
                        <th scope="col">validity_val</th>
                        <th scope="col">other</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $sql = "SELECT lumber_app_id, bname, Saddress, ownername, ptadd, exdate, `select`, falcu, macu, gecu, cacu, mancu, result, Type_contracts, office_cover, Species, yearvalidity, validity_val, `other` FROM supp_contdetails";
                    $result = $con->query($sql);

                    if (!$result) {
                        die("Query failed: " . $con->error);
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['lumber_app_id']}</td>
                                    <td>{$row['bname']}</td>
                                    <td>{$row['Saddress']}</td>
                                    <td>{$row['ownername']}</td>
                                    <td>{$row['ptadd']}</td>
                                    <td>{$row['exdate']}</td>
                                    <td>{$row['select']}</td>
                                    <td>{$row['falcu']}</td>
                                    <td>{$row['macu']}</td>
                                    <td>{$row['gecu']}</td>
                                    <td>{$row['cacu']}</td>
                                    <td>{$row['mancu']}</td>
                                    <td>{$row['result']}</td>
                                    <td>{$row['Type_contracts']}</td>
                                    <td>{$row['office_cover']}</td>
                                    <td>{$row['Species']}</td>
                                    <td>{$row['yearvalidity']}</td>
                                    <td>{$row['validity_val']}</td>
                                    <td>{$row['other']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='19'>No results found</td></tr>";
                    }
                    $con->close();
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php require_once('footer.php'); ?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- jQuery Sparklines -->
<script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>
