<?php           

session_start();
              include "../../processphp/config.php";
              
              $office_id = "CENRO";


              // $sql = "SELECT * FROM `office` WHERE office_level = $office_id ORDER BY office_name ASC";
              $sql = "SELECT * FROM office ORDER BY office_name ASC";
              // user_client ORDER BY lastname ASC"; 
              $province = mysqli_query($con,$sql);


              $nshow = $_GET['lumber_app_id'];



              
              // $query = $connection->prepare("SELECT * FROM lumber_application WHERE lumber_app_id=:lumber_app_id");
              // $query->bindParam("lumber_application", $id, PDO::PARAM_STR);
              // $query->execute();
              // $result = $query->fetch(PDO::FETCH_ASSOC);

              
        $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $nshow";
        // && Number_of_doc = $number  
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $result = mysqli_fetch_assoc($lumber_app_qry);

              
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
                            <th> Application Date </th>
                            <th> Validation Date Date </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                         <tr>
                          <td>

                              <span class="pl-2">Anthonie Feny Catalan</span>
                            </td>
                            <td> 07 Oct 2022 </td>
                            <td> 07 Oct 2022 </td>
                            <td>
                              <div class="badge badge-success">For Endorsement</div>
                            </td>
                            <td>
                            <div class="container">




                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-round btn-warning" id="myBtn1"  data-toggle="modal" data-target="#myModal1">
                              <i class="fa fa-external-link"> </i> Generate </button>









                          <!-- Modal -->
                          <div class="modal fade" id="myModal1" role="dialog">
                                   <div class="modal-dialog modal-lg">
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                     <h4 class="modal-title">GENERATE CERTIFICATION</h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       </div>
                                       <div class="modal-body">
                                       <form class="form-label-left input_mask" method="post" action="generates-pdf.php">

                                <div class="col-md-6 col-sm-6  form-group has-feedback">


                                <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="lumber_app_id" id="lumber_app_id" value="<?php echo $result['lumber_app_id']; ?>" hidden  >


                                  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="name" id="name" value="<?php echo 
                                  $result['perm_fname']. ' '.  $result['perm_lname'] ; ?>" >




                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Address" name="address" id="address" value="<?php echo $result['full_address'] ; ?>">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" required="required" placeholder="Furniture Name" name="fname" id="fname">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                              </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                      <select type="text" class="form-control" name="select" id="select">
                                        <option>Choose CENRO</option>
                                        <option>CENRO Lianga</option>
                                        <option>CENRO Bislig</option>
                                        <option>CENRO Cantilan</option>          
                                        
                                        





             <?php   while ($row = mysqli_fetch_array($province,MYSQLI_ASSOC)):;?>

              <option value="<?php echo $row["office_id"];?>">  <?php echo $row["office_name"];?> </option>

              <?php endwhile;?>



                                      </select>

                                    </div>
                                <label>Choice Wood Species</label>
                                  <p style="padding: 10px;">
                                    <input type="checkbox"  value="Falcata" data-parsley-mincheck="" required class="flat" name="fal" id="fal"/> Falcata
                                    <br />

                                    <input type="checkbox"   value="Gemelina" class="flat" name="gem" id="gem"/> Gemelina
                                    <br />

                                    <input type="checkbox"  value="Caimito" class="flat" name="cai" id="cai" /> Caimito
                                    <br />

                                    <input type="checkbox"  value="Mahogany" class="flat" name="mah" id="mah" /> Mahogany
                                    <br />
                                    <p>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                  <div class="col-md-9 col-sm-9  offset-md-4">
                                    <button type="submit" class="btn btn-success">Generate Certification</button>
                                  </div>
                                </div>
                            </form>
                   <div class="modal-footer">
                    <!-- END MODAL -->
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
