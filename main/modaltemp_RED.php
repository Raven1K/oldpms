
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
        $("#myModal1").modal('show');

  
                $("#myBtn").click(function(){
                  $("#myModal1").modal("hide");
                });
                
                $("#myModal1").on('hide.bs.modal', function(){
                  // alert('The modal is about to be hidden.');
                  history.back();
                });

      });



</script>




<div id="myModal1" class="modal fade" role="dialog">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>

    

			<button name="submit" type="button" class="close" data-dismiss="modal" >&times;</button>
			<!-- <form method="POST"><input type="submit" value="Accept" class="btn btn-success ms-3" name="submit"/> </form> -->


	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-8">
			<div class="x_content">
                                    





	<?php	if ( isset($_POST['submit'])) {     header( 'Location: sitevalidated.php' ) ;
    return; } ?>



<?php  
session_start();
require_once "../processphp/config.php";






	if ( isset($_POST['Accept'])) {    
    
    
    



    
    
  header( 'Location: application.php' ) ;
  return; 







} 






?> 




<?php


if(isset($_POST['delete_row'])){

  $delete = $_POST['delete_row'];



      
  $sql = "DELETE FROM supp_contdetails WHERE ID = '$delete' " ;


  if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $con->error;
  }
  


 }

?>






<?php     


$l_id = $_GET['lumber_app_id'];

// echo $l_id  ;

$lumber_app0 = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id && Number_of_doc = '2'";
$lumber_app_qry0 = mysqli_query($con, $lumber_app0);
$lumber_ap_row0 = mysqli_fetch_assoc($lumber_app_qry0);
$lumber_ap_show_applicationform0 = $lumber_ap_row0['name_app_doc'];

// doc_status

$lumber_app_id = $lumber_ap_row0['lumber_app_id'];

$n ="../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform0;

// $lumber_app = "SELECT * FROM payment_feny where lumber_app_id = $l_id  ";
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['Name_of_Permitte'];

$lumber_app = "SELECT * FROM payment_feny where lumber_app_id = $l_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);



$lumber_app1 = "SELECT * FROM lumber_application where lumber_app_id = $l_id  ";
$lumber_app_qry1 = mysqli_query($con, $lumber_app1);
$lumber_ap_row1 = mysqli_fetch_assoc($lumber_app_qry1);
$lumber_ap_show_applicationform = $lumber_ap_row1['perm_fname'] .' '. $lumber_ap_row1['perm_lname'] ;
$bussiness_name = $lumber_ap_row1['bussiness_name'] ;
$full_address = $lumber_ap_row1['full_address'] ;


 $mun_code =  $lumber_ap_row1['muncity_code'];
 $_Office = $lumber_ap_row1["Office"];


$lumber_app2 = "SELECT * FROM validation_form where lumber_app_id = $l_id  ";
$lumber_app_qry2 = mysqli_query($con, $lumber_app1);
$lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry1);


$lumber_app3 = "SELECT * FROM muncity where mun_code = $mun_code  ";
$lumber_app_qry3 = mysqli_query($con, $lumber_app3);
$result3 = mysqli_fetch_assoc($lumber_app_qry3);

$prov_code = $result3['prov_code'];
$office_id = $result3['mun_code'];
$office_cover = $result3['office_cover'];
$office_id = $result3['office_id'];




$lumber_app4 = "SELECT * FROM office where station = '$_Office'";
$lumber_app_qry4 = mysqli_query($con, $lumber_app4);
$lumber_ap_row4 = mysqli_fetch_assoc($lumber_app_qry4);

$_office_address = $lumber_ap_row4["office_address"];


$lumber_app5 = "SELECT * FROM province where prov_code = $prov_code";
$lumber_app_qry5 = mysqli_query($con, $lumber_app5);
$result5 = mysqli_fetch_assoc($lumber_app_qry5);
// require_once "modaltempextension.php";
$prov_name = $result5["prov_name"];

$lumber_app6 = "SELECT * FROM office where office_id = $office_id";
$lumber_app_qry6 = mysqli_query($con, $lumber_app6);
$result6 = mysqli_fetch_assoc($lumber_app_qry6);
// require_once "modaltempextension.php";
$office_under = $result6["office_under"];
// $station = $result6["station"];

$lumber_app7 = "SELECT * FROM office where station = '$office_under'";
$lumber_app_qry7 = mysqli_query($con, $lumber_app7);
$result7 = mysqli_fetch_assoc($lumber_app_qry7);
// require_once "modaltempextension.php";
$office_address = $result7["office_address"];



$lumber_app10 = "SELECT * FROM payment_feny where lumber_app_id = '$l_id'";
$lumber_app_qry10 = mysqli_query($con, $lumber_app10);
$result10 = mysqli_fetch_assoc($lumber_app_qry10);
// require_once "modaltempextension.php";
$Reference_Number = $result10["Reference_Number"];

$lumber_app11 = "SELECT * FROM supp_contdetails where lumber_app_id = '$l_id'";
$lumber_app_qry11 = mysqli_query($con, $lumber_app11);
$result11 = mysqli_fetch_assoc($lumber_app_qry11);
// require_once "modaltempextension.php";


 ?> 


<?php 


if (isset($_POST['Submit_supplier'])) {  
  // ini_set('display_startup_errors', 1);
$lumber_app_id = $_POST['lumber_app_id'];
$bname = $_POST['bname'];
$Saddress = $_POST['Saddress'];
$ownername = $_POST['ownername'];
$ptadd = $_POST['ptadd'];
$exdate = $_POST['exdate'];
$office_cover = $_POST['office_cover'];
$validity_val = $_POST['validity_val'];
$other = $_POST['other'] . ' ' . $_POST['others']  ; 

// $falcu = $_POST['falcu'];


if (isset($_POST['falcu'])) {
  $falcu = $_POST['falcu'] ;
  $str_Species_falcu = 'Falcata' ;
}else{ 
  $falcu = '';
  $str_Species_falcu = '' ;
}

// $macu = $_POST['macu'];

if (isset($_POST['macu'])) {
  $macu = $_POST['macu'] ;
  $str_Species_macu = 'Mahogany';
}else{
  $macu = '';
  $str_Species_macu = '';
}

// $gecu = $_POST['gecu'];

if (isset($_POST['gecu'])) {
  $gecu = $_POST['gecu'] ;
  $str_Species_gecu = 'Gemelina';
}else{
  $gecu = '';
  $str_Species_gecu = '';
}

// $cacu = $_POST['cacu'];

if (isset($_POST['cacu'])) {
  $cacu = $_POST['cacu'] ;
  $str_Species_cacu = 'Caimito';
}else{
  $cacu = '';
  $str_Species_cacu = '';
}

// $mancu = $_POST['mancu'];

if (isset($_POST['mancu'])) {
  $mancu = $_POST['mancu'] ;
  $str_Species_mancu = 'Mango';
}else{
  $mancu = '';
  $str_Species_mancu = '';
}

$Species = $str_Species_falcu .', '. $str_Species_macu .', '. $str_Species_gecu . ', ' . $str_Species_cacu . ', ' . $str_Species_mancu ;

echo $Species ;

$result = $_POST['result'];
$Type_contracts = $_POST['Type_contracts'];

          // echo $lumber_app_id ;
          // echo $bname ;
          // echo $Saddress ;
          // echo $ownername ;
          // echo $exdate ;
          // echo $falcu ;
          // echo $macu ;
          // echo $gecu ;
          // echo $cacu ;
          // echo $mancu ;
          // echo $result ;
          // echo $Type_contracts;
          // echo $validity_val ;

$query = $connection->prepare("INSERT INTO supp_contdetails(
  
              lumber_app_id, 
              bname,
              Saddress,
              ownername,
              ptadd,
              exdate,
              office_cover,
              falcu,
              macu,
              gecu,
              cacu,
              mancu,
              result,
              Type_contracts,
              Species,
              validity_val,
              other

)
VALUES
(
  
              :lumber_app_id, 
              :bname,
              :Saddress,
              :ownername,
              :ptadd,
              :exdate,
              :office_cover,
              :falcu,
              :macu,
              :gecu,
              :cacu,
              :mancu,
              :result,
              :Type_contracts,
              :Species,
              :validity_val,
              :other

)");




$query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query->bindParam("bname", $bname, PDO::PARAM_STR);
$query->bindParam("Saddress", $Saddress, PDO::PARAM_STR);
$query->bindParam("ownername", $ownername, PDO::PARAM_STR);
$query->bindParam("ptadd", $ptadd, PDO::PARAM_STR);
$query->bindParam("exdate", $exdate, PDO::PARAM_STR);
$query->bindParam("office_cover", $office_cover, PDO::PARAM_STR);
$query->bindParam("falcu", $falcu, PDO::PARAM_STR);
$query->bindParam("macu", $macu, PDO::PARAM_STR);
$query->bindParam("gecu", $gecu, PDO::PARAM_STR);
$query->bindParam("cacu", $cacu, PDO::PARAM_STR);
$query->bindParam("mancu", $mancu, PDO::PARAM_STR);
$query->bindParam("result", $result, PDO::PARAM_STR);
$query->bindParam("Type_contracts", $Type_contracts, PDO::PARAM_STR);
$query->bindParam("validity_val", $validity_val, PDO::PARAM_STR);
$query->bindParam("other", $other, PDO::PARAM_STR);

if (empty($falcu)) {
  $_strfalcu  = '';
}else {
  $_strfalcu  = 'Falcata: ' .' '.$falcu ;
}

if (empty($macu)) {
  $_strmacu = '';
}else {
  $_strmacu  = 'Mahogany: ' .' '.$macu ;
}

if (empty($gecu)) {
  $_strgecu  = '';
}else {
  $_strgecu  = 'Gemelina: ' .' '.$gecu ;
}

if (empty($cacu)) {
  $_strcacu  = '';
}else {
  $_strcacu  = 'Cacao: ' .' '.$cacu ;
}


if (empty($mancu)) {
  $_strmancu = '';
}else {
  $_strmancu  = 'Mango: ' .' '.$mancu ;
}




$Species_str = $_strfalcu .' '. $_strmacu .' '. $_strgecu .' '. $_strcacu .' '.  $_strmancu   ;

$query->bindParam("Species", $Species_str, PDO::PARAM_STR);

$result = $query->execute();






  }
?>



<style>
    .line-separator {
      width: 100%;
      height: 1px;
      background-color: black;
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>

<div class="col-sm-auto">
	<!-- <embed src="<?php echo $n ; ?>" frameborder="0" width="100%" height="700px"> -->
  <embed src="../main/generate_VIEW.php?lumber_app_id=<?php echo $lumber_app_id; ?>" frameborder="0" width="100%" height="700px">
	<div class="ln_solid"></div>
</div>

<br>  
<div class="line-separator"></div>
<br> 

<div class="col-sm-auto">
	<embed src="../main/generate_viewLumberEdealer.php?lumber_app_id=<?php echo $lumber_app_id; ?>" frameborder="0" width="150%" height="700px">
	<div class="ln_solid"></div>
</div>



			</div>
</div>                        



<!--
    <form method="POST">
    <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Name_of_Permittee" placeholder="Name of Permittee" value="<?php // echo $lumber_ap_row["Name_of_Permitte"];?>" readonly>

        <p> Name of Permittee:</p>
      </div>
      <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Reference_No" placeholder="Reference No" value="<?php // echo $lumber_ap_row["Reference_Number"];?>" readonly>
        <p> Reference No:</p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Total_Payment" placeholder="Total Payment" value="<?php //  echo $lumber_ap_row["Total_Amount"];?>" readonly>
        <p> Total Payment:</p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Payment_Status" placeholder="Payment Status" value="<?php  // echo $lumber_ap_row["Payment_Status"];?>" readonly>   
        <p> Payment Status:</p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Application_Date" placeholder="Application Date" value="<?php // echo $lumber_ap_row1["date_applied"];?>" readonly>    
        <p> Application_Date: </p>
        </div>
        <div class="col-md-6 col-sm-6  form-group has-feedback">
    <input type="text" name="Status" placeholder="Status" value="For Endorsement">    
        <p> Status: </p>
        </div>
    </form>
-->



  


<div class="col-sm-4">

<h2 class="modal-title text-warning"><strong>View Supplier Contract Details:</strong></h2>
<br/>

<!-- <form class="form-label-left input_mask" method="post" action="generate-pdf.php" target="_blank" > -->
<form class="form-label-left input_mask" method="post" >

<input type="text" class="form-control" required="required" placeholder="lumber_app_id" name="lumber_app_id" id="lumber_app_id" value="<?php echo $l_id;?>" hidden>
<!-- $l_id = $_GET['lumber_app_id']; -->
<input type="text" name="_office_address" placeholder="_office_address" value="<?php echo $_office_address;?>" hidden>

<div class="col-md-12 col-sm-12  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" placeholder="Supplier Business Trade Name" name="bname" id="bname" value="<?php echo $lumber_ap_row["Name_of_Permitte"];?>" readonly>
    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>
<div class="col-md-12 col-sm-12  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Plantation Address" name="Saddress" id="Saddress" value="<?php echo $lumber_ap_row1["full_address"];?>" readonly>
    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>
<div class="col-md-12 col-sm-12  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Supplier Owner Name" name="ownername" id="ownername" value="<?php   echo "Supplier Owner Name: " . $lumber_ap_row["Name_of_Permitte"];?>" readonly>
    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>
<div class="col-md-12 col-sm-12  form-group has-feedback">
  <!-- <input type="text" class="form-control has-feedback-left" required="required" placeholder="Total Contracted Volume" name="result" id="result"  readonly> -->

  <input type="text" class="form-control has-feedback-left" required="required" placeholder="Total Contracted Volume" name="result" id="result" value="<?php echo "Total Contracted Volume: " . $result11["result"];?>" readonly>
    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-12 col-sm-12  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left" required="required" placeholder="Type-Contracts" value="<?php echo "Type-Contracts: " . $result11["Type_contracts"];?>" name="result" id="result" readonly>
    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<div class="col-md-12 col-sm-12  form-group has-feedback">
<!--  <label type="text" class="control-label has-feedback-left"  required="required" placeholder="PTPOC/PTPR Holder" name="ptpoc" id="ptpoc"></label>-->
  <!-- <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
	<select type="text" class="select2_single form-control" tabindex="-1" name="Type_contracts">
	<option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type of Contracts</option>
	<option value="PTPOC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Private Tree Plantation Ownership Certificate(PTPOC)</option>
	<option value="PTPR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Private Tree Plantation Registration(PTPR)</option>
  <option value="CTPO">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Certificate of Tree Plantation Ownership(CTPO)</option> ownername
	</select> -->


</div>
<div class="col-md-12 col-sm-12  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left"  required="required" placeholder="PTPOC/PTPR Number" name="ptadd" id="ptadd" value="<?php echo "PTPOC/PTPR Number: " . $result11["ptadd"];?>" readonly>
  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>

<label class="col-form-label col-md-4 col-sm-4 label-align"><strong>Date Issued</strong></label>
<div class="col-md-8 col-sm-8  form-group has-feedback">
  <input type="date" class="form-control input"  required="required" placeholder="Expiration Date" name="exdate" id="exdate" date_format="m/d/Y" value="<?php echo $result11["exdate"];?>" readonly>
</div>
	
<div class="col-md-12 col-sm-12  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left"  placeholder="# Year of Validity" name="validity_val" id="ptadd" value="<?php echo "Year of Validity ". $result11["validity_val"] . " Year/s";?>" readonly>
  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>
<!--
<div class="col-md-6 col-sm-6  form-group has-feedback">
  <input type="text" class="form-control has-feedback-left"  required="required" placeholder="Municipality Beneficiary" name="bene" id="bene">
  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
</div>
-->
<div class="col-md-12 col-sm-12  form-group has-feedback">
<input type="text" class="form-control" id="select" value="<?php echo $result3['office_cover']; ?>" name="office_cover" hidden >
</div>





   
  <label class="col-form-label col-md-3 col-sm-2 label-align" hidden>Total :</label>
  <div class="col-md-3 col-sm-3 ">


    <!-- <input class="form-control input" name="result" id="result" readonly hidden/> -->
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



<div class="form-group row">
  <div class="col-md-5 col-sm-5  ">
    <!-- <button type="submit" class="btn btn-success" name="Submit_supplier">Approve</button> -->
  </div>
  <div class="col-md-7 col-sm-7  ">
	<!-- <button type="submit" class="btn btn-primary" name="Add Details" data-toggle="modal" data-target="#exampleModal">Add Other Details</button> -->
  </div>
</div>


</form>

<div class="form-group row">
  
</div>

</div>
</div>
		</div>
<div class="modal-footer">
	<div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-auto col-md-12">
			<div class="x_content">
	



  <div class="col-md-10 col-sm-10">

    <form class="form-label-left input_mask" method="post" action="generate-pdf.php" target="_blank" >


    <input hidden type="text" value="<?php echo $lumber_app_id ; ?>" name="lumber_app_id">
    <input hidden type="text" value="<?php echo $_office_address ; ?>" name="office_address">
    <input hidden type="text" value="<?php echo $office_address ; ?>" name="penroaddress">
    <input hidden type="text" value="<?php echo $office_under ; ?>" name="office_under">
    <input hidden type="text" value="<?php echo $prov_name ; ?>" name="province">
    <input hidden type="text" value="<?php echo $bussiness_name ; ?>" name="bussiness_name">
    <input hidden type="text" value="<?php echo $full_address ; ?>" name="full_address">
    <input hidden type="text" value="<?php echo $lumber_ap_show_applicationform ; ?>" name="full_name">
    <input hidden type="text" value="<?php echo $Reference_Number ; ?>" name="Reference_Number">
 



    <?php 
 if(isset($_POST["Save"])){

  $mpissued = $_POST['mpissued'];
  $mpexpiry = $_POST['mpexpiry'];

  $bnissued = $_POST['bnissued'];
  $dtissued = $_POST['dtissued'];
  $dtiexpiry = $_POST['dtiexpiry'];

  echo '<input hidden type="text" value='.$mpissued.' name="mpissued">' ;
  echo '<input hidden type="text" value='.$mpexpiry.' name="mpexpiry">' ;
  echo '<input hidden type="text" value='.$bnissued.' name="bnissued">' ;
  echo '<input hidden type="text" value='.$dtissued.' name="dtissued">' ;
  echo '<input hidden type="text" value='.$dtiexpiry.' name="dtiexpiry">' ;

 }
?>


    <!-- <button type="submit" class="btn btn-primary" >Endorse Lumber Dealer</button> -->


   </form>

  </div>
<div class="col-md-12 col-sm-12">

 <h2 class="text-warning"><strong>Supplier Contract <small>(Details) |</small></strong></h2>
	 <div class="row">
		 <div class="col-md-12 ms-auto">
		 <div class="col-md-12 col-sm-12 ">
			 <div class="card-box table-responsive">
        						<table id="datatable-responsive" class="table table-striped table-bordered center">
								   <thead class="bg-primary text-white">       

                   <tr>
											  <th> Owner Name </th>
											  <th> Suppliers Address</th>
											  <!-- <th> Tree Species / Volume </n> (bd.ft)  </th> -->
											  <th> Particulars </th>
											  <th> Supply Contract Type </n> (PTPOC/PTPR) </th>
											  <th> Tree Species / Volume </n> (bd.ft) </th>
											  <th> Expiration Date </th>
			 								  <th> Validity </th>
                         					  <th> Total Contracted Volume </th>
			 								  <!-- <th> For Action </th>	 -->
										  </tr>
  
  


  <?php 


      $stmt = $connection->query("SELECT ID, lumber_app_id, ownername, Saddress, falcu, macu, gecu, cacu, mancu, Type_contracts, Species, Type_contracts, exdate, yearvalidity, validity_val, result FROM supp_contdetails  
      where lumber_app_id = $l_id ");

    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

     echo  '</thead>' ;
     echo  '<tbody>' ;
     echo  '<tr>' ;
     echo   '<td style="text-align: center"><strong>'.$row['ownername'].'</strong></td>' ;
     echo   '<td style="text-align: center">'.$row['Saddress'].'</td>' ;
    //  echo    '<td style="text-align: center">'.$row['Species'].'</td>' ;
     echo    '<td style="text-align: center">Chainsaw Cut Lumber</td>' ;
     echo    '<td style="text-align: center">'.$row['Type_contracts'].'</td>' ;
     echo   '<td style="text-align: center">' .$row['Species'].'</td>' ;
     echo   '<td style="text-align: center">'.$row['exdate'].'</td>' ;
     echo   '<td style="text-align: center">'.$row['validity_val']. ' Year/s'. '</td>' ;
     echo   '<td style="text-align: center">'.$row['result'].'</td>' ;
    //  echo    '<td style="text-align: center">'.$row['yearvalidity'].'</td>' ;

    //  echo   '<form method="post">
    //  <td style="text-align: center">
    //  <input hidden type="text" name="delete_row"  value="'.$row['ID'].'" > </input>
    // <button  type="submit" class="btn btn-warning"> Delete </button>
  
	 	// 	 </td>    </form>' ;

     echo   '</tr>' ;
     echo   '</tbody>' ;



    }                      
  ?>


		 </div>

		
<div class="modal-footer">
                    <!-- END MODAL -->
                   <!-- <a hidden class="btn btn-success" data-dismiss="modal" >Endorse to DMO IV</a>
                                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a> -->
                                </div>
                                      <!-- target="_blank" -->
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

</html>







<!-- <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Details
</button> -->



<?php
$lumber_app8 = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id && Number_of_doc = '3'";
$lumber_app_qry8 = mysqli_query($con, $lumber_app8);
$lumber_ap_row8 = mysqli_fetch_assoc($lumber_app_qry8);
$lumber_ap_show_applicationform8 = $lumber_ap_row8['name_app_doc'];

// doc_status

// $lumber_app_id = $lumber_ap_row8['lumber_app_id'];

$n3 ="../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform8;


$lumber_app9 = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id && Number_of_doc = '4'";
$lumber_app_qry9 = mysqli_query($con, $lumber_app9);
$lumber_ap_row9 = mysqli_fetch_assoc($lumber_app_qry9);
$lumber_ap_show_applicationform9 = $lumber_ap_row9['name_app_doc'];

// doc_status

// $lumber_app_id = $lumber_ap_row8['lumber_app_id'];

$n4 ="../../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform9;


?>


<!-- MODAL -->
<div id="exampleModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>
			<button type="button" class="close" data-dismiss="modal" id="exampleModalhide2">&times;</button>
								
	</div>
	  							
									<h2 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;Additional Client's Detail |</h2>
									<form method="POST"> 			
									
								
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">
			<embed src="<?php echo $n3 ; ?>" frameborder="1" width="100%" height="400px">
		    

         
	  
		   <h2 class="text-warning"><strong>"Mayor's Permit Details"</strong></h2>
  		     
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Issued Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control" Date name="mpissued" id="mpissued" name="mpissued" required>
												</div>
											</div>
											<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Expiry Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control"  name="mpexpiry" id="expiry" name="mpexpiry" required>
												</div>
											</div>											
		   									
	  											      
   		</div>
		  </div>
		 
			  
	  <div class="row">
		  <div class="col-sm-12">

		  
	    	   
	  
		   <h2 class="text-warning"><strong>"Department of Trade and Industry (DTI) Details"</strong></h2>
  		     
		   									<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align" >Business Name Number</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="text" class="form-control" Date name="bnissued" id="bnissued" name="bnissued" required>
												</div>
											</div>
			  								<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Issued Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control"  name="dtissued" id="dtissued" required>
												</div>
											</div>
			  								<div class="item form-group row">
												<label class="col-form-label col-md-4 col-sm-4 label-align">Expiry Date</label>
												<div class="col-md-5 col-sm-5 ">
													<input type="date" class="form-control"  name="dtiexpiry" id="dtiexpiry" required >
												</div>
											</div>
		  </div>
	</div>
	  </div>
	  </div>
		<div class="modal-footer col-md-5 ms-auto">
		  <button class="btn btn-success" name="Save">
				<i class="fas fa-thumbs-o-up"> </i>Save Details</button> 
      
      </form>
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

