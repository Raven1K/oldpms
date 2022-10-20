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
                         <tr>
                          <td>
                              <span class="pl-2">Anthonie Feny Catalan</span>
                            </td>
                            <td> 02312 </td>
                            <td> ₱2,216 </td>
                            <td>
                              <div class="badge badge-success">Fully Paid</div>
                            </td>
                            <td > Lianga, Surigao del Sur </td>
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