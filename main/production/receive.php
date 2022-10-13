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
                    <h2>For Proccessing</h2>
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
                            <th> Name of Permittee </th>
                            <th> Address </th>
                            <th> Date Applied </th>
                            <th> Date Received </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td> 1. </td>
                            <td>
                            <img src="images/faces/face10.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Mayet Chua</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> 03 Oct 2022 </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                            <div class="badge badge-warning">For Acknowledgement</div>
                            </td>
                            <td>
                            <div>
                              <button type="button" class="btn btn-round btn-warning" id="myBtn1">
                              <i class="fa fa-external-link"> </i> Recieve</button>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal1" role="dialog">
                                   <div class="modal-dialog">
    
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title"></h4>
                                     </div>
                                   <div class="modal-body">
                                   <p><strong>Sending Notification of Application Fee to the Permittee. Thank You!</strong></p>
                                    </div>
                                     <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 2. </td>
                            <td>
                            <img src="images/faces/face28.png" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Julie Mar Madelo</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> 03 Oct 2022 </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-warning">For Acknowledgement</div>
                            </td>
                            <td>
                            <div>
                              <button type="button" class="btn btn-round btn-warning" id="myBtn2">
                              <i class="fa fa-external-link"> </i> Recieve</button>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal2" role="dialog">
                                   <div class="modal-dialog">
    
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title"></h4>
                                     </div>
                                   <div class="modal-body">
                                   <p><strong>Sending Notification of Application Fee to the Permittee. Thank You!</strong></p>
                                    </div>
                                     <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 3. </td>
                            <td>
                            <img src="images/faces/face5.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jobert Awa</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> 03 Oct 2022 </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                            <div class="badge badge-warning">For Acknowledgement</div>
                            </td>
                            <td>
                            <div>
                              <button type="button" class="btn btn-round btn-warning" id="myBtn3">
                              <i class="fa fa-external-link"> </i> Recieve</button>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal3" role="dialog">
                                   <div class="modal-dialog">
    
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title"></h4>
                                     </div>
                                   <div class="modal-body">
                                   <p><strong>Sending Notification of Application Fee to the Permittee. Thank You!</strong></p>
                                    </div>
                                     <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 4. </td>
                            <td>
                            <img src="images/faces/face13.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Anthonie Feny Catalan</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> 03 Oct 2022 </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                            <div class="badge badge-warning">For Acknowledgement</div>
                            </td>
                            <td>
                            <div>
                              <button type="button" class="btn btn-round btn-warning" id="myBtn4">
                              <i class="fa fa-external-link"> </i> Recieve</button>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal4" role="dialog">
                                   <div class="modal-dialog">
    
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title"></h4>
                                     </div>
                                   <div class="modal-body">
                                   <p><strong>Sending Notification of Application Fee to the Permittee. Thank You!</strong></p>
                                    </div>
                                     <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                   </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                          <td> 5. </td>
                            <td>
                            <img src="images/faces/face4.jpg" alt="image" class="img-circle profile_pics" />
                              <span class="pl-2">Jaycelen Paler</span>
                            </td>
                            <td> Lianga, Surigao del Sur </td>
                            <td> 03 Oct 2022 </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                            <div class="badge badge-warning">For Acknowledgement</div>
                            </td>
                            <td>
                            <div>
                              <button type="button" class="btn btn-round btn-warning" id="myBtn5">
                              <i class="fa fa-external-link"> </i> Recieve</button>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal5" role="dialog">
                                   <div class="modal-dialog">
    
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title"></h4>
                                     </div>
                                   <div class="modal-body">
                                   <p><strong>Sending Notification of Application Fee to the Permittee. Thank You!</strong></p>
                                    </div>
                                     <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                   </div>
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
    
        <!-- Universal Modal-->
        <div class="modal" tabindex="-1" id="universal_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header py-1 px-2">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!-- Universal Modal-->

</body>
</html>
