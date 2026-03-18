m

<div id="myModal2" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			

	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">

		  <?php 

require_once "../processphp/config.php";

$Number_of_doc = '3';

$lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $id && Number_of_doc = $Number_of_doc";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];

// doc_status

// $lumber_app_id = $lumber_ap_row['lumber_app_id'];

$n ="../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;
?> 


			<embed  <?php  echo "src=$n"; ?> frameborder="0" width="100%" height="400px">
			<!-- <embed src="sample.pdf" frameborder="0" width="100%" height="400px"> -->
		    
	    </div>	   
	   											      
   </div>
</div>
</div>
</div>
</div>
</div>

<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->

<div id="myModal3" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			

	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">

		  <?php 

require_once "../processphp/config.php";

$Number_of_doc = '3';

$lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $id && Number_of_doc = $Number_of_doc";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];

// doc_status

// $lumber_app_id = $lumber_ap_row['lumber_app_id'];

$n ="../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;
?> 


			<embed  <?php  echo "src=$n"; ?> frameborder="0" width="100%" height="400px">
			<!-- <embed src="sample.pdf" frameborder="0" width="100%" height="400px"> -->
		    
	    </div>	   
	   											      
   </div>
</div>
</div>
</div>
</div>
</div>