


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
	
	
	
	<script>
	  $(document).ready(function(){
		$("#myModal3").modal('show');
	
		  
		$("#myBtn").click(function(){
		$("#myModal3").modal("hide");
	  });
	  
	  $("#myModal3").on('hide.bs.modal', function(){
		history.back();
	  });
	
	
	  });
	
	</script>
	
<?php 				
session_start();

require_once "../processphp/config.php";

$l_id = $_GET['lumber_app_id'];



$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $l_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

?>

<div id="myModal3" class="modal fade" role="dialog">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
								
	</div>
	  							 
									<h2 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $lumber_ap_row['perm_lname']. ' ' . $lumber_ap_row['perm_fname']; ?> | <small>----</small>&nbsp;&nbsp; | <?php  echo $lumber_ap_row['Status_']; ?> </h2>
											
									
								
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-7">
			<embed src="generate_VIEW.php?lumber_app_id=<?php echo $l_id; ?>" frameborder="0" width="100%" height="600px">
		    
	    </div>	   
	   <div class="col-md-5 ms-auto">
		   <h2><strong>"E-Permit Details"</strong></h2>
  		     
		   									<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Registration Number</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="LD-R13-<?php echo $lumber_ap_row['Suffix'].'-'. date('Y') .'00'.$lumber_ap_row['lumber_app_id'] ; ?>" name="regnumber" id="regnumber" readonly>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Proprietor's Name</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="<?php echo $lumber_ap_row['perm_lname']. ' ' . $lumber_ap_row['perm_fname']; ?>" name="owner" id="owner" readonly>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Business/Trade Name</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="<?php echo  $lumber_ap_row['bussiness_name']; ?>" name="ldname" id="ldname" readonly>
												</div>
											</div>
											<div class="item form-group row">
											 <label class="col-form-label col-md-4 col-sm-4 label-align">Lumber Dealer Address</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="<?php echo  $lumber_ap_row['full_address']; ?>" name="ldaddress" id="ldaddress" readonly>
												</div>
											</div>
		   					
											<?php
                        require_once "../processphp/config.php";
						?>		

	   </div>											      
   </div>
	<h2 class="text-warning">&nbsp;&nbsp;&nbsp;&nbsp;Supplier Contract <small>(Details) |</small>&nbsp;&nbsp;</h2>
	 <div class="row">
		 <div class="col-md-12 ms-auto">
		 <div class="col-md-12 col-sm-12 ">
			 <div class="card-box table-responsive">
        						<table id="datatable-responsive" class="table table-striped table-bordered center">
								   <thead class="bg-primary text-white">                        	
										  <tr>
											  <th> Suppliers </th>
											  <th> Suppliers Address</th>
											  <th> Tree Species </th>
											  <th> Particulars </th>
											  <th> Supply Contract Type </n> (PTPOC/PTPR) </th>
											  <th> Volume </n> (bd.ft) </th>
											  <th> Year Validity </th>
										  </tr>

<?php 



?> 



								   </thead>
										   <tbody>
												  <tr>
													<td style="text-align: center">{{lsname}}</td>
													<td style="text-align: center">{{lsaddress}}</td>
													<td style="text-align: center">{{treespecie}}</td>
													<td style="text-align: center">Chainsaw Cut Lumber</td>
													<td style="text-align: center">{{SCtype}}</td>
													<td style="text-align: center">{{volume}}</td>
													<td style="text-align: center">{{yrvalidity}}</td>
												</tr>
                                           </tbody>
                                 </table>
							</div>
											
		</div>
		</div>
		
	</div>
		<div class="modal-footer">
			   <a class="btn btn-success" data-dismiss="modal">
				<i class="fas fa-thumbs-o-up" href="prc_approve/prc_approve_endorsement.php"> </i>Approve</a>
			   <a class="btn btn-danger" data-dismiss="modal">
				<i class="fas fa-thumbs-o-down"> </i>Disapprove</a>
			   
		   </div>
	</div>
</div>
</div>
</div>
</div>