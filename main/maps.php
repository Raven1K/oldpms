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
				<div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-10 col-m-8 mb-4">
                            <div class="card shadow mb-1 ">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center bg-success">
                                    <h6 class="m-0 font-weight-bold text-light">LUMBER DEALER PERMITTEES</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <section id="indexmap">										
										<div class="mapouter">
											<div class="gmap_canvas">
												<iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1200&amp;height=900&amp;hl=en&amp;q=denr ambago&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
												</iframe><a href="https://embedmapgenerator.com/">embed google maps in website</a>
											</div>
												<style>.mapouter{position:relative;text-align:right;width:100%;height:800px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:800px;}.gmap_iframe {height:800px!important;}
												</style>
												<br>
										</div>
									</section>
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