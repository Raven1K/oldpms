<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OLDPMS-Reviews</title>
	  
	  <!-- Custom badges for this template -->
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


      <div class="card shadow mb-4">
		  			
                        <div class="card-header bg-success py-3">
                            <h3 class="m-0 font-weight-bold text-light">Review Uploaded Documents</h3>
							<h6 class="m-0 font-weight-bold text-light">Click the View Button</h6>				                                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                      <thead>
                        <tr>
                          <tr>
                            <th> Document Name </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            1. Application form or duly accomplished & sworn/notirized.
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
             <div class="container">

                   <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                        <i class="fa fa-search-plus"> </i> View</a>
             
                         <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

             <div class="modal-content">
                 <div class="modal-header">
                 <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                  <div class="modal-body">

                  <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                          <div class="modal-footer">
                                <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fas fa-sharp fa-solid fa-thumbs-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fas fa-sharp fa-solid fa-thumbs-down"> </i>Reject</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fas fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer.
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View </a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                        <div class="modal-footer">
                                <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            3. Mayor's Permit/Business Permit
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
       		 <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                          <div class="modal-footer">
                                <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            </td>
                            <td>
                            4. Annual Business Plan
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                       <div class="modal-footer">
                                 <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            5. Latest Income Tax Return
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                        <div class="modal-footer">
                                <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            6. Proof ownership of the lumberyard or consent/agreement with the owner
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                          <div class="modal-footer">
                          <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            7. Generated Application Form
                            </td>
                            <td>
                              <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                         <div class="modal-footer">
                         <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            8. Lumber Dealer Geotag Photo
                            </td>
                            <td>
                            <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                     <div class="modal-footer">
                     <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            9. Inspection/Validation Report
                            </td>
                            <td>
                            <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Approved</span>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> View</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
     
           <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                                <a class="btn btn-round btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-round btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-round btn-secondary" data-dismiss="modal">
                                <i class="fa fa-close"> </i>Close</a>
                                </div>
                              </div>
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

