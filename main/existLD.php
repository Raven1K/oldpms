<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OLDPMS-Lumber Dealer</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	
	
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
                <!--    <h1 class="h3 mb-2 text-success"><strong>Tables</strong></h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header bg-success py-3">
                            <h3 class="m-0 font-weight-bold text-light">Existing Lumber Dealers within CARAGA Region </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
								
									<thead class="bg-info text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>											
                                            <th>Control No.</th>
                                            <th>Date Issued</th>
											<th>Date Expiry</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
										 <tr>
											<td>1</td>
                                            <td>Tiger Nixon</td>
                                            <td>Nasipit</td>
                                            <td>LD-R13-01-06132019-ADN</td>
                                            <td>2021-01-31</td>
											<td>2022-01-31</td> 
                                            
                                        </tr>
										<tr>
											<td>2</td>
                                            <td>Garrett Winters</td>
                                            <td>Tubay</td>
                                            <td>LD-R13-02-06132019-ADN</td>
                                            <td>2021-05-31</td>
											<td>2022-05-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>3</td>
                                            <td>Alice Wint</td>
                                            <td>Cabadbaran</td>
                                            <td>LD-R13-02-06132019-ADN</td>
                                            <td>2021-03-31</td>
											<td>2022-03-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>4</td>
                                            <td>Garrett McDO</td>
                                            <td>Tubod</td>
                                            <td>LD-R13-01-06132019-SDN</td>
                                            <td>2021-07-31</td>
											<td>2022-07-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>5</td>
                                            <td>Juan Tamad</td>
                                            <td>Surigao City</td>
                                            <td>LD-R13-02-06132019-SDN</td>
                                            <td>2022-05-31</td>
											<td>2023-05-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>6</td>
                                            <td>Jobert Awa</td>
                                            <td>Tiniwisan</td>
                                            <td>LD-R13-02-06132019-ADN</td>
                                            <td>2023-05-31</td>
											<td>2024-05-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>7</td>
                                            <td>Feny Catalan</td>
                                            <td>Tubay</td>
                                            <td>LD-R13-011-06132019-ADN</td>
                                            <td>2020-05-31</td>
											<td>2021-05-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>8</td>
                                            <td>Patrick Luminarias</td>
                                            <td>Butuan City</td>
                                            <td>LD-R13-02-06132019-ADN</td>
                                            <td>2021-08-31</td>
											<td>2022-08-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>9</td>
                                            <td>Jay Ar Montaner</td>
                                            <td>Tubod</td>
                                            <td>LD-R13-20-06132019-SDN</td>
                                            <td>2021-11-31</td>
											<td>2022-11-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>10</td>
                                            <td>Rean Diamond Winters</td>
                                            <td>Dinagat Island</td>
                                            <td>LD-R13-02-06132019-PDI</td>
                                            <td>2021-12-31</td>
											<td>2022-12-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>11</td>
                                            <td>Jan2x Jurado Winters</td>
                                            <td>Tandag City</td>
                                            <td>LD-R13-02-06132019-SDS</td>
                                            <td>2021-06-31</td>
											<td>2022-06-31</td>
                                            
                                            
                                        </tr>
										<tr>
											<td>12</td>
                                            <td>Al Candido</td>
                                            <td>Tubay</td>
                                            <td>LD-R13-50-06132019-ADS</td>
                                            <td>2021-05-31</td>
											<td>2022-05-31</td>
                                            
                                            
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