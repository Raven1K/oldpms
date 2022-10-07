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
                    <h2>Application Status</h2>
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
                            <th> Name of Permittee </th>
                            <th> Address </th>
                            <th> Status </th>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                              <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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
                              <div class="badge badge-warning">For Evaluation</div>
                            </td>
                            <td>
                            <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
                              </div>
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
                            <div class="badge badge-warning">For Evaluation</div>
                            </td>
                             <td>
                              <div><a style="color: black" type="button" class="btn btn-round btn-warning" href="review.php">
                              <i class="fa fa-external-link"> </i> Evaluate</a>
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