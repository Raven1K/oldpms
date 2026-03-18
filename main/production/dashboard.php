

<?php


// require_once('configmysqli.php');
session_start();
include('../../processphp/config.php');
// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              header("location: ../../admin/login.php");
              exit;
            }
            else{

         
            }

     



            $userid = $_SESSION["user_id"] ;

            $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
            $lumber_app_qry = mysqli_query($con, $lumber_app);
            $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


            $clientname = $lumber_ap_row['name'];
            $user_role = $lumber_ap_row['user_role_id'];
            $office_id = $lumber_ap_row['office_id'];




            $lumber_app = "SELECT * FROM office where office_id = $office_id";
            $lumber_app_qry = mysqli_query($con, $lumber_app);
            $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);


            $station = $lumber_ap_row2['station'];
            $office_under = $lumber_ap_row2['office_under'];

              //echo $clientname ;
              // echo $user_role ;

              $stmt = $connection->query("SELECT COUNT(*) AS total_records FROM lumber_application WHERE Office = '$station'");
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $totalRecordsLumber = $row['total_records'];
            
              $stmt = $connection->query("SELECT COUNT(*) AS complete_records FROM lumber_application WHERE Application_status = 'Complete' and Office = '$station'");
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $completeRecords = $row['complete_records'];
            
              $stmt = $connection->query("SELECT COUNT(*) AS on_process_records FROM lumber_application WHERE Application_status = 'On Process' and Office = '$station'");
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $onProcessRecords = $row['on_process_records'];

              $stmt = $connection->query("SELECT COUNT(*) AS total_records FROM lumber_application");
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $totalRecordsLumberall = $row['total_records'];

              $stmt = $connection->query("SELECT COUNT(*) AS disapprove_records FROM lumber_application WHERE Status = 'For Re-apply'");
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $totalRecordsLumberdisapprove = $row['disapprove_records'];
            

?> 




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <style>
    .tile_info td:nth-child(1) {
      font-weight: bold;
    }
  </style>
   <?php 
      require_once 'link.php';
  ?>
  </head>

  <?php 
      require_once 'navbar.php';
  ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->          
        <div class="clearfix"></div>
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lumber Dealer</span>
              <div class="count blue"><?php echo $totalRecordsLumber ;?></div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lumber Dealer</span>
              <div class="count green"><?php echo $completeRecords ; ?></div>
             
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lumber Dealer</span>
              <div class="count"><?php echo $totalRecordsLumberall ;?></div>
             
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Lumber Dealer</span>
              <div class="count red" style="color: #ffc107"><?php echo $onProcessRecords; ?></div>
            
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Lumber Dealer</span>
              <div class="count red"><?php echo $totalRecordsLumberdisapprove ;?></div>
            
            </div>
          </div>
        </div>
          <!-- /top tiles -->
					<div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Lumber Dealer Renewed</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>October 30, 2022 - Nov 31, 2022/span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                  <div class="x_title">
                    <h2><?php echo $station;?></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>CENRO Lianga</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>CENRO Bislig</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>CENRO Cantilan</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br/>

          <div class="row">

              <div class="col-md-4 col-sm-6 ">
                <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h2>Lumber Dealer <small>Renewed</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>CENRO</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                          <p class="">Offices</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Progress</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                        <td>
                            <!-- <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas> -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                              <canvas id="myPieChart" width="140" style="margin: 15px 10px 10px 0"></canvas>
                        </td>
                      <td>
                      <table class="tile_info">
    <?php
    // Connect to the database (replace with your own connection code)
   

    // Query the database for "Office" column values
 // Change this to the office value you want to count
    $sql = "SELECT COUNT(*) AS officeCount FROM lumber_application WHERE office_under = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $office_under);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the count value
    $row = $result->fetch_assoc();
    $officeCount = $row['officeCount'];
    
    // Close the prepared statement
    $stmt->close();
    
    // Output the table with the count value
    echo "<table class='tile_info'>";
    echo "<tr>";
    echo "<td><p>" . $officeValue . "</p></td>";
    echo "<td>" . $officeCount . "</td>";
    echo "</tr>";
    echo "</table>";

    // Close the database connection
 
    ?>
  </table>
                      </td>
                    </tr>
                  </table>
                  </div>
                </div>
              </div>


              <script>
    // Get data from HTML table
    const tableData = document.querySelectorAll('.tile_info td:nth-child(2)');
    const data = Array.from(tableData).map(td => parseInt(td.textContent));

    // Get labels from HTML table
    const labelData = document.querySelectorAll('.tile_info p');
    const labels = Array.from(labelData).map(p => p.textContent);

    // Generate random colors
    const colors = generateRandomColors(data.length);

    // Create pie chart with labels inside slices
    const ctx = document.getElementById('myPieChart').getContext('2d');
    const myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          data: data,
          backgroundColor: colors
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed + '%';
              }
            }
          }
        }
      }
    });

    // Function to generate random colors
    function generateRandomColors(numColors) {
      const colors = [];
      for (let i = 0; i < numColors; i++) {
        const color = '#' + Math.floor(Math.random() * 16777215).toString(16);
        colors.push(color);
      }
      return colors;
    }
  </script>
            <div class="col-md-8 col-sm-8 ">

              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
        <h2>Lumbe Dealer <small>Sites</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="dashboard-widget-content">
          <div class="col-md-4 hidden-small">
            <h2 class="line_30">Lumber Dealer Coordinates</h2>

            <table class="countries_list">
              <tbody>
                <tr>
                  <td>Lianga</td>
                  <td class="fs15 fw700 text-right">33</td>
                </tr>
                <tr>
                  <td>Bislig</td>
                  <td class="fs15 fw700 text-right">27</td>
                </tr>
                <tr>
                  <td>Cantilan</td>
                  <td class="fs15 fw700 text-right">16</td>
                </tr>
              </tbody>
            </table>
          </div>
          <section id="indexmap">
			<div class="col-md-8 col-sm-12 " style="height:230px;">
				<div class="gmap_canvas">
					<iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1200&amp;height=900&amp;hl=en&amp;q=Surigao del Sur&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
					</iframe>
				</div>
        <style>.mapouter{position:relative;text-align:right;width:100%;height:230px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:230px;}.gmap_iframe {height:230px!important;}</style>
      </div>
        </section>
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
        
<?php 
      require_once 'footer.php';
  ?>
      

  </body>
</html>