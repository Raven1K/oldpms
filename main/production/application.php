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
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><img src="images/oldpmslogo.png" alt="logo" height="50"/></a>
            </div>

            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/faces/face28.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>FUU - CENRO</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="application.php"><i class="fa fa-edit"></i> Evaluation </a></li>
                  <li><a href="payment.php"><i class="fa fa-paypal"></i> Payment </a></li>
                  <li><a href="validation.php"><i class="fa fa-location-arrow"></i> Validation </a></li>
                  <li><a href="https://oldpms.herokuapp.com/"><i class="fa fa-map-marker"></i> Site Validated </a></li>
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
              <span class="navbar-text" style="color: green">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</span>
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/faces/face28.png" alt="" ><span style="color: green">FUU - CENRO</span>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/faces/face28.png" alt="Profile Image" /></span>
                        <span>
                          <span>FUU - CENRO</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Evaluate Data.
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/faces/face28.png" alt="Profile Image" /></span>
                        <span>
                          <span>FUU - CENRO</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Review and Validate.
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/faces/face28.png" alt="Profile Image" /></span>
                        <span>
                          <span>FUU - CENRO</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Schedule for Validation.
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/faces/face28.png" alt="Profile Image" /></span>
                        <span>
                          <span>FUU - CENRO</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          For Endorsement to CENR Officer
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
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
                    <h2>Application Form</h2>
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
                            <th> Applicant Name </th>
                            <th> Address </th>
                            <th> Application Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            <img src="images/faces/face10.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Mayet Chua</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-success"> Approved</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face28.png" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Julie Mar Madelo</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-warning">Pending</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face5.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jobert Awa</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-danger">Rejected</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            </td>
                            <td>
                            <img src="images/faces/face13.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Anthonie Feny Catalan</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face4.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jaycelen Paler</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face7.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Joshua Jumonong</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face6.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-1">Totitz Baptisma</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face7.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Patric Luminarias</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-success">Approved</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face12.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jay Ar Montaner</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-danger">Rejected</div>
                            </td>
                            <td>
                            <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <img src="images/faces/face15.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Kent Bandoy</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td>
                              <div class="badge badge-danger">Rejected</div>
                            </td>
                             <td>
                              <div><a  type="button" class="btn btn-round btn-warning" href="review.php"></button>
                              <i class="fa fa-external-link"> </i> For Evaluation</a>
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
  <div class="pull-right" style="color: green">
  DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES - R13<a href=""></a>
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