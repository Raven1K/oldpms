
<?php 


require_once "../../processphp/config.php";

$l_id = $_GET['lumber_app_id'];


$lumber_app = "SELECT * FROM lumber_application where lumber_app_id  = $l_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$lumber_app_name = $lumber_ap_row['perm_fname'].' '.$lumber_ap_row['perm_lname'];

$address =  $lumber_ap_row['full_address'] ;

$Status_ =  $lumber_ap_row['Status_'] ;

$perm_contact = $lumber_ap_row['perm_contact'] ;

$bussiness_name = $lumber_ap_row['bussiness_name'] ;




?>

<?php
$lumber_app_id = $_GET['lumber_app_id'];

$lumber_app = "SELECT * FROM order_of_payment where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

$Amount = $lumber_ap_row['Amount'];

$Application_Fee = $lumber_ap_row['Application_Fee'];
$Registration_Fee	 = $lumber_ap_row['Registration_Fee'];
$Oath_Fee = $lumber_ap_row['Oath_Fee'];
$cash = $lumber_ap_row['cash'];
$processing_fee = $lumber_ap_row['processing_fee'];

$Dated = $lumber_ap_row['Dated'];
$Amount_Decimal = $lumber_ap_row['Amount_Decimal'];
$Entity_Name = $lumber_ap_row['Entity_Name'];
$Payment_Reference_Number = $lumber_ap_row['Payment_Reference_Number'];
$Payment_Status = $lumber_ap_row['Payment_Status'];

$Payment_Status = $lumber_ap_row['Payment_Status'];

$Serial_No = $lumber_ap_row['Serial_No'];

$Payment_Reference_Number = $lumber_ap_row['Serial_No'];

if ($Payment_Status == 'Paid') {

} else {
 

	header('Location: Cforlbpiq.php?lumber_app_id=' . $lumber_app_id);
    exit; // It's good practice to exit after a header redirect
}






?>

<?php
// insert payment 

if ( isset($_POST['Forward'])) {

  



		$Account_Number = 'N/A' ;
		$Account_Name =  'N/A' ;
		$Reference_Number = $_POST['Reference_Number'];
		$Total_Amount  = 'N/A';
		$Flow_stat = 'N/A';
		$Name_of_Permitte = $lumber_app_name ;
		$Payment_Status = 'PAID';
		$Date_payment = date('m/d/y') ;
 

       $query = $connection->prepare("INSERT INTO payment_feny(
       lumber_app_id,       
       Account_Number,
       Account_Name,
       Reference_Number,
       Total_Amount,
       Flow_stat,
       Name_of_Permitte,
       Payment_Status,
       Date_payment

       )
       VALUES (
       :lumber_app_id,      
       :Account_Number,
       :Account_Name,
       :Reference_Number,
       :Total_Amount,
       :Flow_stat,
       :Name_of_Permitte,
       :Payment_Status,
       :Date_payment
 

       )");
       
       $query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
	   $query->bindParam("Account_Number", $Account_Number, PDO::PARAM_STR);
	   $query->bindParam("Account_Name", $lumber_app_name, PDO::PARAM_STR);
	   $query->bindParam("Reference_Number", $Reference_Number, PDO::PARAM_STR);
	   $query->bindParam("Total_Amount", $Total_Amount, PDO::PARAM_STR);
	   $query->bindParam("Flow_stat", $Flow_stat, PDO::PARAM_STR);
	   $query->bindParam("Name_of_Permitte", $Name_of_Permitte, PDO::PARAM_STR);
	   $query->bindParam("Payment_Status", $Payment_Status, PDO::PARAM_STR);
	   $query->bindParam("Date_payment", $Date_payment, PDO::PARAM_STR);

       
       $result = $query->execute();



	//    $onsitevalidation = 'For On Site Validation';

	   $stat_uss = 'For On Site Validation';
	   $Flow_stats = '4';
	   $date_ref = date('m/d/y') ;
	   
	   $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat, date_recieve = :date_recieve
	   WHERE lumber_app_id = $l_id";
	   $stmt = $connection->prepare($sql);
	   $stmt->execute(array(
	   ':Status' => $stat_uss,
	   ':date_recieve' => $date_ref,
	   ':Flow_stat' => $Flow_stats,));










	   $date2 = date('m/d/y');

	   function getFullMonthNameFromDate($date3){
		$monthName = date('F d, Y', strtotime($date3));
		return $monthName;
			 }
	   
	   
			//  $date = $row['date_recieve'] ;
			$date3 = $date2 ;
				   getFullMonthNameFromDate($date3);
	   
	   
	   
	   
	   date_default_timezone_set("Asia/Manila");
	   $Time = date("h:i:sa");
	   
	   
	   
		  $Title = 'Credit Officer';
		  $Details = 'Payment confirmed
		  Application forwarded to FUU for the on-site validation. The schedule will be sent to you for your affirmation.    
		  ';
		  
	   
		  $query2 = $connection->prepare("INSERT INTO client_client_document_history(
		   lumber_app_id,
		   Date,
		   Title,
		   Details,
		   Time
	   
		   )
		  VALUES (
		   :lumber_app_id,
		   :Date,
		   :Title,
		   :Details,
		   :Time
		   
		   )");
		  $query2->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
		  $query2->bindParam("Date", $date2, PDO::PARAM_STR);
		  $query2->bindParam("Title", $Title, PDO::PARAM_STR);
		  $query2->bindParam("Details", $Details, PDO::PARAM_STR);
		  $query2->bindParam("Time", $Time, PDO::PARAM_STR);
	   
		  
		  $result2 = $query2->execute();
	   
	   
	

	//    header( 'Location: application.php') ;
	   header( "Location: application.php" ) ;
	   }


//        // insert payment 

?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    
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
        $("#myModal3").modal('show');

  
	$("#myBtn").click(function(){
    $("#myModal3").modal("hide");
  });
  
  $("#myModal3").on('hide.bs.modal', function(){
    // alert('The modal is about to be hidden.');
    history.back();
  });
      });
</script>






<div id="myModal3" class="modal fade" role="dialog">
<div class="modal-dialog modal-md">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
								
	</div>
	  							
	<h2 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;Payment Confirmation</h2>
											
									
								
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-md-12 ms-auto">
<!--			<embed src="endorsement.pdf" frameborder="0" width="100%" height="300px">-->
		<form method="POST"  >   
<!--	    </div>	   -->
<!--	   <div class="col-md-5 ms-auto">-->
		   <h2><strong>"Payment Details"</strong></h2>
  		     
		   <div class="item form-group row">
    <label class="col-form-label col-md-4 col-sm-4 label-align">Transaction Number</label>
    <div class="col-md-8 col-sm-8">
        <input type="text" class="form-control font-weight-bold" placeholder="Transaction Number" name="transnumber" id="transnumber" value="<?php echo $lumber_app_id; ?>" readonly>
    </div>
</div>

<div class="item form-group row">
    <label class="col-form-label col-md-4 col-sm-4 label-align">Client Name</label>
    <div class="col-md-8 col-sm-8">
        <input type="text" class="form-control font-weight-bold" placeholder="Client Name" name="client_name" id="client_name" value="<?php echo $lumber_app_name; ?>" readonly>
    </div>
</div>

<div class="item form-group row">
    <label class="col-form-label col-md-4 col-sm-4 label-align">Business Name</label>
    <div class="col-md-8 col-sm-8">
        <input type="text" class="form-control font-weight-bold" placeholder="Business Name" name="business_name" id="business_name" value="<?php echo $bussiness_name; ?>" readonly>
    </div>
</div>


												<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Reference Number</label>
												<div class="col-md-8 col-sm-8 ">
													<input type="text" class="form-control" placeholder="" id="Reference_Number" name="Reference_Number" required  value="<?php echo $Payment_Reference_Number ; ?>">
												</div>
												</br>
												</br>
												<div class="d-flex justify-content-between mt-2">
													<span class="fw-500">Contact Number:</span>
													<span><?php echo "<strong>" . $perm_contact . "</strong>"; ?></span>
												</div>
												</div>
												<div class="item form-group row">
											
												
												<label class="col-form-label col-md-4 col-sm-4 label-align" style="font-size: 14px; font-weight: bold; color: green;">Payment Details: <h1> <?php echo $Payment_Status; ?> </h1> </label>

												
												
												<div class="modal-body">
													<div class="d-flex justify-content-between mt-2"> <span class="fw-500">Registration Fee</span> <span>P600.00</span> </div>
													<div class="d-flex justify-content-between mt-2"> <span class="fw-500">Permit Fee</span> <span>P480.00</span> </div>
													<div class="d-flex justify-content-between mt-2"> <span class="fw-500">Oath Fee</span> <span>P36.00</span> </div>
													<div class="d-flex justify-content-between mt-2"> <span class="fw-500">Cash Bond </span> <span>P1,000.00</span> </div>
													<hr>
													<div class="d-flex justify-content-between mt-2"> <span class="fw-500">Total </span> <span class="text-success"><b><?php echo "P ".$Amount_Decimal."" ; ?></b></span> </div>
													<hr>													
													</br>
													</br>
													
													</div>
												</div>
											</div>

		   									
	   </div>											      
   </div>

		<div class="modal-footer">
			   <button class="btn btn-success"  name="Forward">
				<i class="fa fa-check"> </i> Confirm</button>


			

				<button onclick="takeScreenshot()" id="captureButton" class="btn btn-success">
						<i class="fa fa-camera"></i> Capture Screenshot
					</button>

					<script>
						function takeScreenshot() {
							html2canvas(document.body).then(function(canvas) {
								var imgData = canvas.toDataURL('image/png');
								var link = document.createElement('a');
								link.download   
							= 'screenshot.png';
								link.href = imgData;
								link.click();
							});
						}
					</script>


	</form>

		   </div>
	</div>
</div>
</div>
</div>
</div>

