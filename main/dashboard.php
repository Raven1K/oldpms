<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OLDPMS-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
  <!--  <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
	<link href="css/sb-admin-2.css" rel="stylesheet">
	
 

</head>

<body id="page-top">
	
    <!-- Page Wrapper -->
    <div id="wrapper">
		<!-- Sidebar -->
        <?php
			require_once('sidebarRO.php');
		?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
					require_once('topbarRO.php');
				?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-success"><strong>Regional Office Dashboard</strong></h1>
                        <a href="dealertable.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">
                                                Dealer Applications</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"># Application Recieved </div>
                                        </div>
                                        <div class="col-auto">
										<!-- 	<img class="img-fluid img-thumbnail rounded-circle mx-auto d-block" src="img/gryf.png"> -->
                                            <i class="fas fa-th-list fa-2x text-gray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 mx-auto d-block">
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                             		Approved Certificate </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"># of Lumber Dealers </div>
                                        </div>
                                        <div class="col-auto">
										<!--	<img class="img-fluid img-thumbnail rounded-circle mx-auto d-block" src="img/puff.png"> -->
                                            <i class="fas fa-certificate fa-2x text-gray"></i> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Targets of CY 2022
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Updating</div>
                                                </div>
                                               <div class="col">
											   		<div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
										<!--	<img class="img-fluid img-thumbnail rounded-circle mx-auto d-block" src="img/claw.png"> -->
                                            <i class="fas fa-calendar-alt fa-2x text-gray"></i> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-warning shadow h-80 py-2 ">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
        								  
			 								<div class="text-s font-weight-bold text-warning text-uppercase mb-1">
			 										Pending Reviews</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800"># of Reviews</div> 
										
                                        </div>
                                        <div class="col-auto">
										 <i class="fas fa-solid fa-cog fa-spin fa-2x text-gray" style="--fa-animation-duration: 15s;"></i> 
                                        </div>
                                    </div>
                                </div> 
							  
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
					
                    <div class="row justify-content-center">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-10 mb-4">
                            <div class="card shadow mb-4 ">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                                    <h6 class="m-0 font-weight-bold text-light">Approved Certificates Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">PENR Offices:</div>
                                            <a class="dropdown-item" href="#">Agusan del Norte</a>
                                            <a class="dropdown-item" href="#">Agusan del Sur</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Surigao del Norte</a>
											<a class="dropdown-item" href="#">Surigao del Sur</a>
											<div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Dinagat Island</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                    <!--    <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                         <!--       <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                                    <h6 class="m-0 font-weight-bold text-light">Lumber Dealer per PENROs</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                          <!--      <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->						 
                    </div>
			
                    <!-- Content Row -->
                    <div class="row justify-content-center">
						
                        <!-- Content Column -->
                        <div class="col-xl-12 col-lg-10 mb-4">
							
							<div class="card shadow mb-4 width">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-info">
                                    <h6 class="m-0 font-weight-bold text-light">Existing Lumber Dealer Per CENROs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>

                           

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
			
			<!-- Footer -->
            <?php
			require_once('footerdash.php');
			?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
		require_once('outmodal.php')
	?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
	

</body>

</html>