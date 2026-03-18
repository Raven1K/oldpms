




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


	 $clientname = $lumber_ap_row['name'] ;
	
	$user_role = $lumber_ap_row['user_role_id'] ;

	// echo $clientname ;
	// echo $user_role ;

	$stmt = $connection->query("SELECT COUNT(*) AS total_records FROM lumber_application");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$totalRecordsLumber = $row['total_records'];

	$stmt = $connection->query("SELECT COUNT(*) AS complete_records FROM lumber_application WHERE Application_status = 'Complete'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$completeRecords = $row['complete_records'];

	$stmt = $connection->query("SELECT COUNT(*) AS on_process_records FROM lumber_application WHERE Application_status = 'On Process'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$onProcessRecords = $row['on_process_records'];

	
	
		

// Initialize an array to store the series data
$seriesData = array();

// SQL query to retrieve data from the "Office" column of the "lumber_application" table
$sql = "SELECT Office, COUNT(*) AS count FROM lumber_application GROUP BY Office";

// Execute the query
$result = $con->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Fetch data and store it in the $seriesData array
    while ($row = $result->fetch_assoc()) {
        $seriesData[] = $row['count'];
    }
} else {
    echo "0 results";
}

// Close the database connection
$con->close();

// Convert the PHP array into a JavaScript array
$seriesDataJS = json_encode($seriesData);



?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
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
          <?php
				require_once('sidebar.php');
			?>        
		<!-- /sidebar navigation -->
		  
        <!-- top navigation -->
		  
          <?php
				require_once('topbar.php');
			?> 
		  
        <!-- /top navigation -->

        <!-- page content -->
            <div class="right_col" role="main">
          <div class="">
			  
		<!-- Top Summary -->
			  
			<div class="row">
				<div class="col-md-12">
					<div class="">
						<div class="x_content">
					<div class="top_tiles">
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
						<div class="tile-stats">
						  <div class="icon"><i class="fas fa-th-list"></i></div>
						  <div class="count"><?php echo $totalRecordsLumber;?> </div>
							</br>
						  <h3 class="text-info">Lumber Dealer</h3>
						  <p>Number of Applications</p>
						</div>
					  </div>
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
						<div class="tile-stats">
						  <div class="icon"><i class="fas fa-certificate"></i></div>
						  <div class="count"><?php echo $completeRecords ;?></div>
							</br>
						  <h3 class="text-success">Lumber Dealer</h3>
						  <p>Number of Approved</p>
						</div>
					  </div>
					  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
						<div class="tile-stats">
						  <div class="icon"><i class="fa fa-sort-amount-down-alt"></i></div>
						  <div class="count">179</div>
							</br>
						  <h3 class="text-primary">Lumber Dealer</h3>
						  <p>Target for CY 2022</p>
						</div>
					  </div>
					  	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
						<div class="tile-stats">
						  <div class="icon"><i class="fas fa-solid fa-cog fa-spin"></i></div>
						  <div class="count"><?php echo $onProcessRecords; ?></div>
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
	  
	  	<!-- End Top Summary -->

	  <!-- Chart Monthly Summary -->
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lumber Dealer Registrations <small>| Monthly progress</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="fa-pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>Octber 13, 2022 - November 12, 2022</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 ">
                      <div class="demo-container" style="height:280px">
                        <div class="demo-placeholder">
						  	<?php
								require_once('columnchart.php');
						      ?>
						</div>
                      </div>
					  </br>
					  </br>
					  </br>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Approved</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Expired</span>
                          <h2>231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Returned</span>
                          <h2>231,809</h2>
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
                          <li>
                            <img src="../production/images/faces/face7.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-info">24</h3>
                              <p class="month">October</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Ton2x Davison</h4>
                              <blockquote class="message">Submitted by CENRO Nasipit for Acknowledgement please</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="action.php"><i class="fa fa-paperclip"></i> Receive </a>
                              </p>
                            </div>
                          </li>
                          <li>
                            <img src="../production/images/faces/face17.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-error">21</h3>
                              <p class="month">October</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Archim Michaels</h4>
                              <blockquote class="message">Return application of Permittee Juan Tamad to CENRO Tubay lacking of documents</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                <a href="#" data-original-title="">Review</a>
                              </p>
                            </div>
                          </li>
                          <li>
                            <img src="../production/images/faces/face1.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-info">24</h3>
                              <p class="month">October</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Rosemarie Mitchell</h4>
                              <blockquote class="message">Forwarded endorsement to LPDD Chief for initial</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="#"><i class="fa fa-paperclip"></i> endorsement.pdf </a>
                              </p>
                            </div>
                          </li>
                        </ul>
						
						<!-- End User Messages -->
                      </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	  <!-- End Chart Monthly Summary -->

	  <!-- Chart CENRO Summary -->
			
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
								<?php
									require_once('polarChart.php');
								  ?>
							  </div>

							    <div class="col-md-4">
									 <div class="x_panel">
									  <div class="x_title">
										<h2>CENRO Profiles <small>Sessions</small></h2>										
										<div class="clearfix"></div>
									  </div>
									  <div class="x_content">
										<article class="media event">
										  <a class="pull-left date">
											<p class="month">Sept</p>
											<p class="day">23</p>
										  </a>
										  <div class="media-body">
											<a class="title" href="#">Item One Title</a>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										  </div>
										</article>
										  </br>
										<article class="media event">
										  <a class="pull-left date">
											<p class="month">Oct</p>
											<p class="day">23</p>
										  </a>
										  <div class="media-body">
											<a class="title" href="#">Item Two Title</a>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										  </div>
										</article>
										  </br>
										<article class="media event">
										  <a class="pull-left date">
											<p class="month">Oct</p>
											<p class="day">23</p>
										  </a>
										  <div class="media-body">
											<a class="title" href="#">Item Two Title</a>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										  </div>
										</article>
									 	  </br>
										<article class="media event">
										  <a class="pull-left date">
											<p class="month">Nov</p>
											<p class="day">23</p>
										  </a>
										  <div class="media-body">
											<a class="title" href="#">Item Two Title</a>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										  </div>
										</article>
											 </br>
										<article class="media event">
										  <a class="pull-left date">
											<p class="month">Dec</p>
											<p class="day">23</p>
										  </a>
										  <div class="media-body">
											<a class="title" href="#">Item Three Title</a>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										  </div>
										</article>
									  </div>
									</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</div>

	  <!-- End Chart CENRO Summary -->

            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        	<?php
					require_once('footer.php');
			?>
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
    <script src="../build/js/custom.js"></script>
  </body>
</html>