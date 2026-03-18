
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    
    
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

<script>
      $(document).ready(function(){
        $("#myCalendar").modal('show');

  
	$("#myBtn").click(function(){
    $("#myCalendar").modal("hide");
  });
  
  $("#myCalendar").on('hide.bs.modal', function(){
    // alert('The modal is about to be hidden.');
    history.back();
  });
      });
</script>


<div id="myCalendar" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>










			<button name="submit" type="button" class="close" data-dismiss="modal" >&times;</button>
			<!-- <form method="POST"><input type="submit" value="Accept" class="btn btn-success ms-3" name="submit"/> </form> -->


	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">
			<div class="x_content">
                                    





	<?php	if ( isset($_POST['submit'])) {     header( 'Location: sitevalidated.php' ) ;
    return; } ?>



<?php  
session_start();
require_once "../../processphp/config.php";






	if ( isset($_POST['Accept'])) {    
    
    
    



    
    
    header( 'Location: sitevalidated.php' ) ;
  return; 




} 






?> 











<?php     


$l_id = $_GET['lumber_app_id'];



$lumber_app = "SELECT * FROM payment_feny where lumber_app_id = $l_id  ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$lumber_ap_show_applicationform = $lumber_ap_row['Name_of_Permitte'];




$lumber_app1 = "SELECT * FROM lumber_application where lumber_app_id = $l_id  ";
$lumber_app_qry1 = mysqli_query($con, $lumber_app1);
$lumber_ap_row1 = mysqli_fetch_assoc($lumber_app_qry1);


$lumber_app2 = "SELECT * FROM validation_form where lumber_app_id = $l_id  ";
$lumber_app_qry2 = mysqli_query($con, $lumber_app1);
$lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry1);


// require_once "modaltempextension.php";


 ?> 






                        



    <form method="POST">
    <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Name_of_Permittee" placeholder="Name of Permittee" value="<?php echo $lumber_ap_row["Name_of_Permitte"];?>" readonly>
        <p> Name of Permittee:</p>
      </div>
      <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Reference_No" placeholder="Reference No" value="<?php echo $lumber_ap_row["Reference_Number"];?>" readonly>
        <p> Reference No:</p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Total_Payment" placeholder="Total Payment" value="<?php echo $lumber_ap_row["Total_Amount"];?>" readonly>
        <p> Total Payment:</p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Payment_Status" placeholder="Payment Status" value="<?php echo $lumber_ap_row["Payment_Status"];?>" readonly>   
        <p> Payment Status:</p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Application_Date" placeholder="Application Date" value="<?php echo $lumber_ap_row1["date_applied"];?>" readonly>    
        <p> Application_Date: </p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Status" placeholder="Status" value="For Endorsement">    
        <p> Status: </p>
        </div>
    </form>



    <div class="ln_solid"></div>






<form class="form-label-left input_mask" method="post" action="generate-pdf_penro.php" >


<input type="text" class="form-control" required="required" placeholder="lumber_app_id" name="lumber_app_id" id="lumber_app_id" value="<?php echo $l_id;?>" hidden>
<!-- $l_id = $_GET['lumber_app_id']; -->

<div class="col-md-6 col-sm-6  form-group has-feedb.ack">
  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="name" id="name" value="<?php echo $lumber_ap_row["Name_of_Permitte"];?>" >
    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-6 col-sm-6  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Address" name="address" id="address" value="<?php echo $lumber_ap_row1["full_address"];?>">
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
<div class="col-md-6 col-sm-6  form-group has-feedback">
<input type="text" class="form-control" name="select" id="select" value="<?php echo $result3['office_address'] ; ?> " readonly>
</div>
</div>
  <div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-2 label-align" >Falcata</label>
  <div class="col-md-2 col-sm-2 ">
    <input type="text" class="form-control" required="required" placeholder="bd.ft." name="falcu" id="falcu" />
  </div>
  <label class="col-form-label col-md-3 col-sm-2 label-align ">Mahogany</label>
  <div class="col-md-2 col-sm-2 ">
    <input type="text" class="form-control input" required="required" placeholder="bd.ft." name="macu" id="macu" />
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-2 label-align">Gemelina</label>
  <div class="col-md-2 col-sm-2 ">
    <input type="text" class="form-control input" required="required" placeholder="bd.ft." name="gecu" id="gecu" />
  </div>
  <label class="col-form-label col-md-3 col-sm-2 label-align">Caimito</label>
  <div class="col-md-2 col-sm-2 ">
    <input type="text" class="form-control input" required="required" placeholder="bd.ft." name="cacu" id="cacu" />
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-2 label-align">Mango</label>
  <div class="col-md-2 col-sm-2 ">
    <input type="text" class="form-control input" required="required" placeholder="bd.ft." name="mancu" id="mancu" />
  </div>
  <label class="col-form-label col-md-3 col-sm-2 label-align">Total :</label>
  <div class="col-md-2 col-sm-2 ">
    <input class="form-control input" name="result" id="result" readonly />
    <script>
														$(document).ready(function(){
															$(".input").keyup(function(){
																var val1 = +$("#falcu").val();
																var val2 = +$("#macu").val();
                                var val3 = +$("#gecu").val();
																var val4 = +$("#cacu").val();
                                var val5 = +$("#mancu").val();
																$("#result").val(val1+val2+val3+val4+val5);
														});
														});
														</script>
  </div>
</div>
<div class="ln_solid"></div>
<div class="form-group row">
  <div class="col-md-9 col-sm-9  offset-md-4">
    <button type="submit" class="btn btn-success">Generate Endorsement</button>
  </div>
</div>
</form>










                                </div>
		    <div class="modal-footer">
	
        <form method="POST"> 	<input type="submit" value="Save Record" class="btn btn-success ms-3" name="Accept"/></form>
			   <form method="POST"> <input type="submit" value="Return" class="btn btn-danger ms-3" name="submit"/> </input></form>
			   
		    </div>
	    </div>	   
	   									      
   </div>
</div>
</div>
</div>
</div>
</div>

