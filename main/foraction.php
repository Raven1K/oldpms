<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OLDPMS-Reviews</title>
	
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	<style>
.btn {
  width:80%;
 }
</style>

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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header bg-success py-3">
                            <h3 class="m-0 font-weight-bold text-light">Forest Utilization Section (For Action)</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                     <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Applicant Name</th>
                                            <th>Address</th>
											<th>Date Applied</th>
											<th>Office Applied</th>
											<th style="width: 110px">Action</th>
                                            <th>Status</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
											<td>1</td>
                                            <td>Tiger Nixon</td>
                                            <td>Cabadbaran</td>
											<td>2022-10-03</td>
											<td>CENRO Tubay</td>
											<td>
												<div class="row justify-content-center">
												<a href="evaluation.php" class="btn btn-warning btn-sm">                                       			 
                                       			 <span class="text align-content-center"><strong>Evaluate</strong></span>
                                    			
												 <span class="icon ml-2">
                                          			  <i class="fas fa-search-plus"></i>
                                       			 </span>
												</a>
												</div>	
											</td>
                                            <td >
												<span class=" text-warning"><i class="bi bi-exclamation-triangle me-1 text-warning"></i><strong> For Endorsement</strong></span>
												
												</td>
                                            
                                            
                                        </tr>
                                        
                                        <tr>
											<td>3</td>
                                            <td>Ashton Cox</td>
                                            <td>Talacogon</td>
											<td>2021-08-03</td>
											<td>CENRO Talacogon</td>
											<td>
												<div class="row justify-content-center">
												<a href="#" class="btn btn-info disabled btn-sm ">
                                        			
                                        			<span class="text align-content-center"><strong>Completed</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-check"></i>
                                       				 </span>
                                   				 </a>
												</div>
											</td>
                                            <td >
												<span class=" text-info"><i class="bi bi-upload me-1 text-info"></i><strong> For Initial</strong></span>
												
												</td>
                                            
                                            
                                            
                                        </tr>
                                        <tr>
											<td>4</td>
                                            <td>Cedric Kelly</td>
                                            <td>Bunawan</td>
											<td>2022-12-03</td>
											<td>CENRO Bunawan</td>
											<td>
												<div class="row justify-content-center">
												<a href="#" class="btn btn-info disabled btn-sm ">
                                        			
                                        			<span class="text align-content-center"><strong>Completed</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-check"></i>
                                       				 </span>
                                   				 </a>
												</div>
											</td>
                                            <td >
												<span class=" text-info"><i class="bi bi-upload me-1 text-info"></i><strong> For Initial</strong></span>
												
												</td>
                                            
                                            
                                            
                                        </tr>
                                        <tr>
											<td>5</td>
                                            <td>Airi Satou</td>
                                            <td>Bayugan City</td>
											<td>2022-11-03</td>
											<td>CENRO Bayugan</td>
											 <td>
												<div class="row justify-content-center">
												<a href="evaluation.php" class="btn btn-warning  btn-sm">                             			 
                                       			 <span class="text align-content-center"><strong>Evaluate</strong></span>
                                    			
												 <span class="icon ml-2">
                                          			  <i class="fas fa-search-plus"></i>
                                       			 </span>
												</a>
												</div>	
											</td>
                                            <td >
												<span class=" text-warning"><i class="bi bi-exclamation-triangle me-1 text-warning"></i><strong> For Endorsement</strong></span>
												
												</td>
                                           
                                            
                                            
                                        </tr>
                                        <tr>
											<td>6</td>
                                            <td>Brielle Williamson</td>
                                            <td>Surigao City</td>
											<td>2021-12-03</td>
											<td>CENRO Tubod</td>
											<td>
												<div class="row justify-content-center">
												<a href="#" class="btn btn-info disabled btn-sm ">
                                        			
                                        			<span class="text align-content-center"><strong>Completed</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-check"></i>
                                       				 </span>
                                   				 </a>
												</div>
											</td>
                                            <td >
												<span class=" text-info"><i class="bi bi-upload me-1 text-info"></i><strong> For Initial</strong></span>
												
												</td>
                                            
                                            
                                            
                                        </tr>
                                        
                                        <tr>
											<td>8</td>
                                            <td>Rhona Davidson</td>
                                            <td>Dinagat Island</td>
											<td>2022-10-15</td>
											<td>PENRO Dinagat Island</td>
											 <td>
												<div class="row justify-content-center">
											 	<a href="#" class="btn-danger  btn-sm disabled btn ml-0">
                                       				 
                                       				 <span class="text align-content-center"><strong>Rejected</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-times-circle"></i>
                                       				 </span>
                                   				 </a>
													</div>
											</td>
                                            <td >
												<span class=" text-danger"><i class="bi bi-exclamation-octagon me-1 text-danger"></i><strong> Returned</strong></span>
												
												</td>
                                           
                                            
                                            
                                        </tr>
                                        
                                       
                                        <tr>
											<td>11</td>
                                            <td>Jena Gaines</td>
                                            <td>Bislig</td>
											<td>2022-05-03</td>
											<td>CENRO Bislig</td>
											<td>
												<div class="row justify-content-center">
											 	<a href="#" class="btn-danger  btn-sm disabled btn ml-0">
                                       				 
                                       				 <span class="text align-content-center"><strong>Rejected</strong></span>
													<span class="icon ml-2">
                                           			 <i class="fas fa-times-circle"></i>
                                       				 </span>
                                   				 </a>
													</div>
											
											</td>
												<td >
												<span class=" text-danger"><i class="bi bi-exclamation-octagon me-1 text-danger"></i><strong> Returned</strong></span>
												
												</td>
                                            
                                            
                                            
                                        </tr>
                                      
                                    </tbody>
                                </table>
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
            <!-- End of Footer -->

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>