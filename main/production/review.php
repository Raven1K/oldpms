<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS - DENR R13</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard.php" class="sidebar-brand d-flex align-items-center" ><img class="img-fluid img-overlay" src="images/oldpmslogo.png" alt="logo"/></a>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="application.php"><i class="fa fa-edit"></i> Application Status </a></li>
                  <li><a href="payment.php"><i class="fa fa-paypal"></i> Payment </a></li>
                  <li><a href="validation.php"><i class="fa fa-location-arrow"></i> Validation </a></li>
                  <li><a href="sitevalidated.php"><i class="fa fa-map-marker"></i> Site Validated </a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              </div>
            <!-- /sidebar menu -->

             <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
           <div class="nav_menu navbar-dark" style="background: #222222">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
              <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
              <a href="dashboard.php"><h5>ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5></a>
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/faces/face28.png" alt="" ><span style="color: green">FUU - CENRO</span>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="javascript:;"> Message</a>                   
                      <a class="dropdown-item"  href="javascript:;">
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1>Review Uploaded Documents</h1>
                    <h2>Click the Document Status to View</h2>
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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
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
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
             <div class="container">

                   <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                        <i class="fa fa-search-plus"> </i> Review</a>
             
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer.
                            </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            3. Mayor's Permit/Business Permit
                            </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            </td>
                            <td>
                            4. Annual Business Plan
                            </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            5. Latest Income Tax Return
                            </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            6. Proof ownership of the lumberyard or consent/agreement with the owner
                            </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            7. Generated Application Form
                            </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            8. Lumber Dealer Geotag Photo
                            </td>
                            <td>
                            <div class="badge badge-warning">Pending</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            9. Inspection/Validation Report
                            </td>
                            <td>
                            <div class="badge badge-warning">Pending</div>
                            </td>
                            <td>
                            <div class="container">

                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button>
                    <i class="fa fa-search-plus"> </i> Review</a>
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
                                <a class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
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
            </div>
  

      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- footer content -->
<footer class="footer-dark" style="background: #222222">
<div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
						<h6>Department of Environment and Natural Resources - CARAGA Region <h/6> 
						<h5>DENR Regional ICT Caraga </h5> 
                        <h6>&copy; Copyright 2022. All Rights Reserved </h6>
                    </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
      

  </body>
</html>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>