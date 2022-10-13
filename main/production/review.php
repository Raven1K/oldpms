<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS - DENR R13</title>

<?php 
      require_once 'link.php';
  ?>
  </head>

  <?php 
      require_once 'navbar.php';
  ?>
			<!-- page content -->
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
                          <th> No. </th>
                            <th> Document Name </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td> 01</td>
                            <td>1. Application form or duly accomplished & sworn/notirized.</td>
                            <td>
                              <div class="badge badge-danger">For Reevaluate</div>
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
                          <td> 02</td>
                            <td>2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer.</td>
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
                          <td> 03</td>
                            <td>3. Mayor's Permit/Business Permit</td>
                            <td>
                            <div class="badge badge-danger">For Reevaluate</div>
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
                          <td> 04</td>
                            <td>4. Annual Business Plan</td>
                            <td>
                            <div class="badge badge-danger">For Reevaluate</div>
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
                                <a class="btn btn-success" data-dismiss="modal" id="myBtn">
                                <i class="fa fa-thumbs-o-up"> </i>Approve</a>
                                <a class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-thumbs-o-down"> </i>Disapprove</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 05</td>
                            <td>5. Latest Income Tax Return</td>
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
                          <td> 06</td>
                            <td>6. Proof ownership of the lumberyard or consent/agreement with the owner</td>
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
                          <td> 07</td>
                            <td>7. Generated Application Form</td>
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
                          <td> 08</td>
                            <td>8. Lumber Dealer Geotag Photo</td>
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
                          <td> 09</td>
                            <td>9. Inspection/Validation Report</td>
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
<?php 
      require_once 'footer.php';
  ?>

      

  </body>
</html>
