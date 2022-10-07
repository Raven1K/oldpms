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
          
          <!-- top tiles -->
          <div class="clearfix"></div>
					<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Application - <small> Status </small></h2>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <tr>
                          <th> No. </th>                            
                            <th> Name of Permittee </th>
                            <th> Reference No </th>
                            <th> Total Payment </th>
                            <th> Payment Status </th>
                            <th> Address </th>
                            <th> Payment Mode </th>
                            <th> Application Date </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td> 1.</td>
                            <td>
                              <img src="images/faces/face10.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Mayet Chua</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
          <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 2.</td>
                            <td>
                              <img src="images/faces/face28.png" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Julie Mar Madelo</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
       <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 3.</td>
                            <td>
                              <img src="images/faces/face5.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jobert Awa</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
   <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 4.</td>
                            <td>
                              <img src="images/faces/face13.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Anthonie Feny Catalan</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
          <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 5.</td>
                            <td>
                              <img src="images/faces/face4.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jaycelen Paler</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
          <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 6.</td>
                            <td>
                              <img src="images/faces/face7.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Joshua Jumonong</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 7.</td>
                            <td>
                              <img src="images/faces/face6.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Totitz Baptisma</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> Online Payment </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">
                            <!-- Trigger the modal with a button -->
           <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button><i class="fa fa-external-link"> </i>Endorse</a>
                          <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">GENERATE ENDORSEMENT</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <embed src="sample.pdf" frameborder="0" width="100%" height="400px">
                   <div class="modal-footer">
                                <a class="btn btn-success" data-dismiss="modal">Endorsement to DMO IV</a>
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

  <?php 
      require_once 'footer.php';
  ?>
 
</body>
</html>