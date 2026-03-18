

<?php


// require_once('configmysqli.php');
session_start();
include('../../processphp/config.php');
// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              header("location: ../../admin/login.php");
              exit;
            }
            else{

         
            }

     




              $userid = $_SESSION["user_id"] ;

              $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


               $clientname = $lumber_ap_row['name'] ;
              
              $user_role = $lumber_ap_row['user_role_id'] ;

              // echo $clientname ;
              // echo $user_role ;





?> 





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
                            <th> Name of Permittee </th>
                            <th> Address </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>

<?php 


      require_once "../../processphp/config.php";

      $datavastr2 = '6.3';

  $stmt = $connection->query("SELECT * FROM lumber_application where Flow_stat = $datavastr2 ORDER BY lumber_app_id  ASC");

  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

   $perm_fname = $row['perm_fname'];
   $perm_lname = $row['perm_lname'];
   $full_address = $row['full_address'];



   echo "<tr><td>" ;
   echo '<span class="pl-2" name="name" id="name">'.$perm_fname.' '.$perm_lname.'</span>' ; 
   echo("</td><td>");
   echo '<span class="pl-2" name="address" id="address">'.$full_address.'</span>' ; 
   echo("</td><td>");
   echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
   echo("</td><td>");
   echo('<a class="btn btn-warning" href="modaltemp.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');

  }



  ?> 




     			              




                


                          <!-- Modal -->
                          <div class="modal fade" id="myModal1" role="dialog">
                                   <div class="modal-dialog modal-lg">
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                     <h4 class="modal-title">GENERATE ENDORSEMENT</h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       </div>
                                       <div class="modal-body">

                                       <form class="form-label-left input_mask" method="post" action="generate-pdf.php">




                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="name" id="name" >
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Address" name="address" id="address">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required" placeholder="Total Lumber Contract" name="cons" id="cons">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left"  required="required" placeholder="Planted Recovery" name="planted" id="planted">
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left"  required="required" placeholder="PTPOC Holder" name="ptpoc" id="ptpoc">
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left"  required="required" placeholder="PTPOC Address" name="ptadd" id="ptadd">
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left"  required="required" placeholder="Municipality Beneficiary" name="bene" id="bene">
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                </div>
                                  <div class="form-group row">
                                  <label class="col-form-label col-md-2 col-sm-2 label-align" >Falcata</label>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="cu.m." name="falcu" id="falcu">
                                  </div>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="bd.ft." name="falbd" id="falbd">
                                  </div>
                                  <label class="col-form-label col-md-1 col-sm-1 label-align ">Mahogany</label>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="cu.m." name="macu" id="macu">
                                  </div>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="bd.ft." name="mabd" id="mabd">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-md-2 col-sm-2 label-align">Gemelina</label>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="cu.m." name="gecu" id="gecu">
                                  </div>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="bd.ft." name="gebd" id="gebd">
                                  </div>
                                  <label class="col-form-label col-md-1 col-sm-1 label-align">Caimito</label>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="cu.m." name="cacu" id="cacu">
                                  </div>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="bd.ft." name="cabd" id="cabd">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-form-label col-md-2 col-sm-2 label-align">Mango</label>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="cu.m." name="mancu" id="mancu">
                                  </div>
                                  <div class="col-md-2 col-sm-2 ">
                                    <input type="text" class="form-control" required="required" placeholder="bd.ft." name="manbd" id="manbd">
                                  </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                  <div class="col-md-9 col-sm-9  offset-md-4">
                                    <button type="submit" class="btn btn-success">Generate Endorsement</button>
                                  </div>
                                </div>
                            </form>
                   <div class="modal-footer">
                   <a class="btn btn-success" data-dismiss="modal">Endorse to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                </div>
                                      
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
</html>