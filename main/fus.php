<?php

error_reporting(0); // Suppress PHP errors for production, but consider `E_ALL` for development
session_start();
include('../processphp/config.php');

// Block if no login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../admin/login.php");
    exit;
}

$userid = $_SESSION["user_id"];

$lumber_app = "SELECT * FROM denr_users where user_id = $userid";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$clientname = $lumber_ap_row['name'];
$user_role = $lumber_ap_row['user_role_id'];

// --- Dashboard Data Fetching ---

// 1. Top Summary Tiles
$total_applications_query = "SELECT COUNT(*) AS total_apps FROM lumber_application";
$total_applications_result = mysqli_query($con, $total_applications_query);
$total_applications = mysqli_fetch_assoc($total_applications_result)['total_apps'];

$approved_applications_query = "SELECT COUNT(*) AS approved_apps FROM lumber_application WHERE Status = 'For Client' AND Flow_stat = 'Complete'";
$approved_applications_result = mysqli_query($con, $approved_applications_query);
$approved_applications = mysqli_fetch_assoc($approved_applications_result)['approved_apps'];

// Define statuses that indicate "For Action"
$for_action_statuses = "'On Process', 'Returned', 'For Re-apply', 'Waiting for Payment Confirmation', 'For Review R-CENRO', 'For Review LPDD', 'For Approve PENRO', 'On Process FUS RO', 'For Validation Information'";
$for_action_query = "SELECT COUNT(*) AS for_action_apps FROM lumber_application WHERE Status IN ($for_action_statuses) OR Application_status IN ($for_action_statuses)";
$for_action_result = mysqli_query($con, $for_action_query);
$for_action_applications = mysqli_fetch_assoc($for_action_result)['for_action_apps'];

// For "Target for CY 2022" - this would usually come from a separate target/goal setting in your database,
// or be a static value. For now, we'll keep it static as per your example.
$target_cy_2022 = 179; // Static value from your example

// 2. Monthly Progress Chart Data
$monthly_data = [];
// Get current year applications (adjust year as needed)
$current_year = date('Y');
$monthly_query = "SELECT DATE_FORMAT(STR_TO_DATE(date_applied, '%m/%d/%Y'), '%Y-%m') AS month_year, COUNT(*) AS count 
                  FROM lumber_application 
                  WHERE YEAR(STR_TO_DATE(date_applied, '%m/%d/%Y')) = $current_year
                  GROUP BY month_year 
                  ORDER BY month_year ASC";
$monthly_result = mysqli_query($con, $monthly_query);

while ($row = mysqli_fetch_assoc($monthly_result)) {
    $month_name = date('M', strtotime($row['month_year'])); // Get month abbreviation
    $monthly_data[$month_name] = $row['count'];
}

// Prepare data for the chart (months with 0 if no data)
$all_months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$chart_labels = json_encode($all_months);
$chart_data = [];
foreach ($all_months as $month) {
    $chart_data[] = isset($monthly_data[$month]) ? $monthly_data[$month] : 0;
}
$chart_data_json = json_encode($chart_data);


// Get Total Approved, Expired, Returned for the chart area
$total_approved_query = "SELECT COUNT(*) AS total_approved FROM lumber_application WHERE Status = 'For Client' AND Flow_stat = 'Complete'";
$total_approved_result = mysqli_query($con, $total_approved_query);
$total_approved = mysqli_fetch_assoc($total_approved_result)['total_approved'];

$total_expired_query = "SELECT COUNT(*) AS total_expired FROM lumber_application WHERE Status_ = 'Expired'"; // Assuming a Status_ column for expired
$total_expired_result = mysqli_query($con, $total_expired_query);
$total_expired = mysqli_fetch_assoc($total_expired_result)['total_expired'];

$total_returned_query = "SELECT COUNT(*) AS total_returned FROM lumber_application WHERE Status = 'Returned' OR Application_status = 'Return'";
$total_returned_result = mysqli_query($con, $total_returned_query);
$total_returned = mysqli_fetch_assoc($total_returned_result)['total_returned'];


// 3. CENRO Summary Chart (Polar Area Chart)
$cenro_data = [];
$cenro_query = "SELECT Office, COUNT(*) AS count FROM lumber_application GROUP BY Office ORDER BY count DESC";
$cenro_result = mysqli_query($con, $cenro_query);

while ($row = mysqli_fetch_assoc($cenro_result)) {
    $cenro_data[$row['Office']] = $row['count'];
}

$cenro_labels = json_encode(array_keys($cenro_data));
$cenro_counts = json_encode(array_values($cenro_data));
// Generate random colors for the polar chart
$cenro_colors = [];
foreach ($cenro_data as $office => $count) {
    $cenro_colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
$cenro_colors_json = json_encode($cenro_colors);


// 4. Recent Activity Feed
$recent_activity_query = "SELECT perm_fname, perm_lname, Status, Remarks, date_recieve, date_applied, Office FROM lumber_application
                          WHERE Status IN ('Returned', 'For Review R-CENRO', 'For Review LPDD', 'Waiting for Payment Confirmation') OR Application_status IN ('Return', 'Turned_Back', 'Return_FUU')
                          ORDER BY STR_TO_DATE(date_applied, '%m/%d/%Y') DESC, lumber_app_id DESC LIMIT 5"; // Limit to 5 for recent activities
$recent_activity_result = mysqli_query($con, $recent_activity_query);
$activities = [];
while ($row = mysqli_fetch_assoc($recent_activity_result)) {
    $activities[] = $row;
}

// 5. Wood Species Endorsement Data
$wood_species_query = "SELECT species, boardfeet, created_at FROM wood_species_endorsement ORDER BY created_at DESC LIMIT 5";
$wood_species_result = mysqli_query($con, $wood_species_query);
$wood_species_data = [];
while ($row = mysqli_fetch_assoc($wood_species_result)) {
    $wood_species_data[] = $row;
}

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
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="build/css/custom.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require_once('sidebar.php'); ?>        
        <?php require_once('topbar.php'); ?> 
        <div class="right_col" role="main">
          <div class="">
            
            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row top_tiles">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-th-list"></i></div>
                          <div class="count"><?php echo $total_applications; ?></div>
                          </br>
                          <h3 class="text-info">Lumber Dealer</h3>
                          <p>Total Applications</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-certificate"></i></div>
                          <div class="count"><?php echo $approved_applications; ?></div>
                          </br>
                          <h3 class="text-success">Lumber Dealer</h3>
                          <p>Approved Applications</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-amount-down-alt"></i></div>
                          <div class="count"><?php echo $target_cy_2022; ?></div>
                          </br>
                          <h3 class="text-primary">Lumber Dealer</h3>
                          <p>Target for CY <?php echo $current_year; ?></p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-solid fa-cog fa-spin"></i></div>
                          <div class="count"><?php echo $for_action_applications; ?></div>
                          </br>
                          <h3 class="text-warning">Lumber Dealer</h3>
                          <p>For Action</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lumber Dealer Registrations <small>| Monthly progress</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span><?php echo date('F 1, Y') . ' - ' . date('F d, Y'); ?></span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 ">
                      <div class="demo-container" style="height:280px">
                        <canvas id="monthlyProgressChart"></canvas>
                      </div>
                      </br>
                      </br>
                      </br>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Approved</span>
                          <h2><?php echo $total_approved; ?></h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Expired</span>
                          <h2><?php echo $total_expired; ?></h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Returned</span>
                          <h2><?php echo $total_returned; ?></h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-12 ">
                      <div>
                        <div class="x_title">
                          <h2>Recent Activity</h2>
                          </br>
                          </br>
                          <ul class="messages">
                            <?php if (!empty($activities)): ?>
                                <?php foreach ($activities as $activity): ?>
                                    <li>
                                        <i class="fa fa-user-circle-o" style="font-size: 24px;"></i>
                                        <div class="message_date">
                                            <h3 class="date text-<?php echo ($activity['Status'] == 'Returned' || $activity['Application_status'] == 'Return' || $activity['Application_status'] == 'Turned_Back' || $activity['Application_status'] == 'Return_FUU') ? 'error' : 'info'; ?>">
                                                <?php echo date('d', strtotime($activity['date_applied'])); ?>
                                            </h3>
                                            <p class="month"><?php echo date('F', strtotime($activity['date_applied'])); ?></p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading"><?php echo $activity['perm_fname'] . ' ' . $activity['perm_lname']; ?> (<?php echo $activity['Office']; ?>)</h4>
                                            <blockquote class="message">
                                                <?php
                                                    $status_text = $activity['Status'];
                                                    if (!empty($activity['Application_status'])) {
                                                        $status_text = $activity['Application_status'];
                                                    }

                                                    $message = $status_text;
                                                    if (!empty($activity['Remarks'])) {
                                                        $message .= ": " . $activity['Remarks'];
                                                    } else {
                                                        $message .= " application.";
                                                    }
                                                    echo $message;
                                                ?>
                                            </blockquote>
                                            <br />
                                            <p class="url">
                                                <span class="fs1 <?php echo ($activity['Status'] == 'Returned' || $activity['Application_status'] == 'Return' || $activity['Application_status'] == 'Turned_Back' || $activity['Application_status'] == 'Return_FUU') ? '' : 'text-info'; ?>" aria-hidden="true" data-icon="&#xe045;"></span>
                                                <a href="action.php"><i class="fa fa-paperclip"></i> View Details </a>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No recent activity to display.</li>
                            <?php endif; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>CENROs Summary <small>Activity shares</small></h2>              
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                      <div class="col-md-8" style="overflow:hidden;">
                        <canvas id="cenroPolarChart"></canvas>
                      </div>

                      <div class="col-md-4">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Wood Species <small>Endorsement</small></h2>                
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <?php if (!empty($wood_species_data)): ?>
                                <?php foreach ($wood_species_data as $species_entry): ?>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month"><?php echo date('M', strtotime($species_entry['created_at'])); ?></p>
                                            <p class="day"><?php echo date('d', strtotime($species_entry['created_at'])); ?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#"><?php echo htmlspecialchars($species_entry['species']); ?></a>
                                            <p>Board Feet: <?php echo htmlspecialchars($species_entry['boardfeet']); ?></p>
                                        </div>
                                    </article>
                                    </br>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No wood species data to display.</p>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once('footer.php'); ?>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendors/fastclick/lib/fastclick.js"></script>    
    <script src="vendors/nprogress/nprogress.js"></script>
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>    
    <script src="vendors/DateJS/build/date.js"></script>
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="vendors/iCheck/icheck.min.js"></script>
    
    <script src="build/js/custom.js"></script>

    <script>
        // Monthly Progress Chart (Column/Bar Chart)
        var ctxMonthly = document.getElementById('monthlyProgressChart').getContext('2d');
        var monthlyProgressChart = new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: <?php echo $chart_labels; ?>,
                datasets: [{
                    label: 'Applications',
                    backgroundColor: '#26B99A', // Greenish color
                    borderColor: '#26B99A',
                    borderWidth: 1,
                    data: <?php echo $chart_data_json; ?>
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // CENRO Summary Chart (Polar Area Chart)
        var ctxCenro = document.getElementById('cenroPolarChart').getContext('2d');
        var cenroPolarChart = new Chart(ctxCenro, {
            type: 'polarArea',
            data: {
                labels: <?php echo $cenro_labels; ?>,
                datasets: [{
                    data: <?php echo $cenro_counts; ?>,
                    backgroundColor: <?php echo $cenro_colors_json; ?>,
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                },
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Initialize Daterange Picker (as it was in your original code)
        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
        });
    </script>
  </body>
</html>