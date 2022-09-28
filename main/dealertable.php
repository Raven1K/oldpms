<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Existing Lumber Dealer in Caraga Region</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="vendor/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
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
                            <h3 class="m-0 font-weight-bold text-light">Existing Lumber Dealer</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
		<table id="example" class="table table-bordered" width="100%" cellspacing="1">
        <thead class="bg-primary text-white">
            <tr>
                <th>Client ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Control Number</th>
                <th>Date Issued</th>
                <th>Expiry Date</th>
                <th>Permitting CENROs</th>                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nixon</td>
                <td>Buenavista</td>
                <td>LD-R13-27-06132019-ADN</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Nasipit</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>Nixon</td>
                <td>Cabadbaran</td>
                <td>LD-R13-27-06132019-ADN</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Tubay</td>
                
            </tr>
            <tr>
                <td>3</td>
                <td>Nixon</td>
                <td>Surigao City</td>
                <td>LD-R13-27-06132019-SDN</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Tubod</td>
                
            </tr>
            <tr>
                <td>4</td>
                <td>Nixon</td>
                <td>Carascal</td>
                <td>LD-R13-27-06132019-SDS</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Cantilan</td>
               
            </tr>
            <tr>
                <td>5</td>
                <td>Nixon</td>
                <td>Tandag City</td>
                <td>LD-R13-27-06132019-SDS</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Lianga</td>
                
            </tr>
            <tr>
              	<td>6</td>
                <td>Nixon</td>
                <td>Bislig City</td>
                <td>LD-R13-27-06132019-SDS</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Bislig</td>
                
            </tr>
            <tr>
                <td>7</td>
                <td>Nixon</td>
                <td>Bayugan City</td>
                <td>LD-R13-27-06132019-ADS</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Bayugan</td>
               
            </tr>
            <tr>
                <td>8</td>
                <td>Nixon</td>
                <td>Bunawan</td>
                <td>LD-R13-27-06132019-ADS</td>
                <td>08/22/2016</td>
                <td>08/22/2019</td>
                <td>Bunawan</td>
                
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="datatable/js/jquery.dataTables.min.js"></script>
    <script src="datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/js/dataTables.buttons.min.js"></script>
    <script src="datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="datatable/js/jszip.min.js"></script>
    <script src="datatable/js/pdfmake.min.js"></script>
    <script src="datatable/js/vfs_fonts.js"></script>
    <script src="datatable/js/buttons.html5.min.js"></script>
    <script src="datatable/js/buttons.print.min.js"></script>
    <script src="datatable/js/buttons.colVis.min.js"></script>
    <script src="datatable/js/dataTables.responsive.min.js"></script>
    <script src="datatable/js/responsive.bootstrap4.min.js"></script>
    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
	
	 <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>