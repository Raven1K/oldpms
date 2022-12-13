<div id="myModal3" class="modal fade" role="dialog">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
								
	</div>
	  							
									<h2 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;Juan dela Cruz | <small>Laki Sa Layaw Lumber Dealer</small>&nbsp;&nbsp; | NEW</h2>
											
									
								
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-7">
			<embed src="endorsement.pdf" frameborder="0" width="100%" height="300px">
		    
	    </div>	   
	   <div class="col-md-5 ms-auto">
		   <h2><strong>"E-Permit Details"</strong></h2>
  		     
		   									<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Registration Number</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="LD-R13-XXXXXXX" name="regnumber" id="regnumber" readonly>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Proprietor's Name</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer owner" name="owner" id="owner" readonly>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Business/Trade Name</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="Lumber Dealer" name="ldname" id="ldname" readonly>
												</div>
											</div>
											<div class="item form-group row">
											 <label class="col-form-label col-md-4 col-sm-4 label-align">Lumber Dealer Address</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="Address" name="ldaddress" id="ldaddress" readonly>
												</div>
											</div>
		   									
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
								<div><a type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal4"></button>
																<i class="fa fa-search-plus"></i> View</a>

															 <!-- modal for evaluation -->
															  <?php
																require_once('modaleval3.php');
																?> 
															<!-- end modal for evaluation --> 
															</div>

	</div>
</div>
</div>
</div>
</div>
<div id="myModal4" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
								
	</div>
	  							
									<h2 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;Additional Client's Detail |</h2>
											
									
								
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">
			<embed src="endorsement.pdf" frameborder="1" width="100%" height="400px">
		    
	    	  
	  
		   <h2 class="text-warning"><strong>"Mayor's Permit Details"</strong></h2>
  		     
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Issued Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control" Date name="mpissued" id="mpissued" >
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Expiry Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control"  name="mpexpiry" id="expiry" >
												</div>
											</div>											
		   									
	  											      
   		</div>
		  </div>
		 
			  
	  <div class="row">
		  <div class="col-sm-12">
			<embed src="endorsement.pdf" frameborder="1" width="100%" height="400px">
		  
	    	   
	  
		   <h2 class="text-warning"><strong>"Department of Trade and Industry (DTI) Details"</strong></h2>
  		     
		   									<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Business Name Number</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="text" class="form-control" Date name="mpissued" id="mpissued" >
												</div>
											</div>
			  								<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Issued Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control"  name="dtissued" id="dtissued" >
												</div>
											</div>
			  								<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Expiry Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control"  name="dtiexpiry" id="dtiexpiry" >
												</div>
											</div>
		  </div>
	</div>
	  </div>
	  </div>
		<div class="modal-footer col-md-5 ms-auto">
			   <a class="btn btn-success" data-dismiss="modal">
				<i class="fas fa-thumbs-o-up"> </i>Save Details</a>
<!--
			   <a class="btn btn-danger" data-dismiss="modal">
				<i class="fas fa-thumbs-o-down"> </i>Disapprove</a>
			   
-->
		   </div>
	</div>
</div>
</div>
</div>
</div>