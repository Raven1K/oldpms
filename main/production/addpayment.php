<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Fontawesome Icons-->
    <link rel="stylesheet" href="fonts/css/all.css">

    <!-- Cuztomize Styles-->
    <link rel="stylesheet" href="css/mystyle.css">

    <title>OLDPMS Confirm Payment</title>
  </head>
  <body>






  





  <?php 

require_once "../../processphp/config.php";
session_start();


$nshow = $_GET['lumber_app_id'];
$Flow_stat = '6.1' ;
$payment_Status = 'Fully Paid';

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $nshow  ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$lumber_ap_show_perm_name = $lumber_ap_row['perm_fname'] . ' ' . $lumber_ap_row['perm_lname']; 



?>

<?php
// include('../../processphp/config.php');
if ( isset($_POST['Send'])) {



$date = date('m/d/y');
$Account_Number = $_POST['Account_Number']; 
$Account_Name = $_POST['Account_Name']; 
$Reference_Number = $_POST['Reference_Number']; 
$totamount = $_POST['To_amount']; 
// $Total_Amount1 =  $_POST['To_amount']; 





// $lumber_app = "SELECT * FROM lumber_app_doc_erow where upload_id_doc = $nshow";
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
// $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];



$query = $connection->prepare("INSERT INTO payment_feny(Account_Number, Account_Name, Reference_Number, Total_Amount, lumber_app_id, Flow_stat, Name_of_Permitte, Payment_Status, Date_payment)
VALUES (:Account_Number, :Account_Name, :Reference_Number, :Total_Amount, :lumber_app_id, :Flow_stat, :Name_of_Permitte, :Payment_Status, :Date_payment)");
$query->bindParam("Account_Number", $Account_Number, PDO::PARAM_STR);
$query->bindParam("Account_Name", $Account_Name, PDO::PARAM_STR);
$query->bindParam("Reference_Number", $Reference_Number, PDO::PARAM_STR);
$query->bindParam("Total_Amount", $totamount, PDO::PARAM_STR);
$query->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
$query->bindParam("Flow_stat", $Flow_stat, PDO::PARAM_STR);
$query->bindParam("Name_of_Permitte", $lumber_ap_show_perm_name, PDO::PARAM_STR);
$query->bindParam("Payment_Status", $payment_Status, PDO::PARAM_STR);
$query->bindParam("Date_payment", $date, PDO::PARAM_STR);

$result = $query->execute();










$stat_uss = 'For On Site Validation';
$Flow_stats = '6';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
WHERE lumber_app_id = $nshow";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));


header ("Location: application.php");






}



// $n ="../../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;


?> 






<div class="container">
  <div class="row">
    <div class="col-sm-4">
        <b><h1 class="mt-3 mb-3">ADD PAYMENTS</h1></b>

        <form method='POST'>
        
          <div class="mb-3 ms-3 me-3">
            <label for="inputpayfrom" class="form-label">Account Number</label>
            <input type="text" class="form-control" id="inputpayfrom" name="Account_Number">
          </div>
          <div class="mb-3 ms-3 me-3">
            <label for="inputaccname" class="form-label">Account Name</label>
            <input type="text" class="form-control" id="inputaccname" aria-describedby="payfromHelp" name="Account_Name">
            <div id="payfromHelp" class="form-text">We'll never share your account information with anyone else.</div>
          </div>
        </span>
          <div class="mb-3 ms-3 me-3" style="width: 60%">
            <label for="inputrefnum" class="form-label">Reference Number</label>
            <input type="text" class="form-control" id="inputrefnum" name="Reference_Number">
          </div>
          <div class="ms-3 me-3">
            <label for="paymentfor" class="form-label">Payment For</label>
          </div>          
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="processingfee" checked disabled>
            <label class="form-check-label" for="processingfee">Processing Fee</label>
          </div>
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="application" checked disabled>
            <label class="form-check-label" for="application">Application Fee</label>
          </div>
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="regfee" checked disabled>
            <label class="form-check-label" for="regfee">Registration Fee</label>
          </div>
          <div class="ms-3 me-5 form-check">
            <input type="checkbox" class="form-check-input" id="oathfee" checked disabled>
            <label class="form-check-label" for="oathfee">Oath Fee</label>
          </div>
          <div class="mb-3 ms-3 form-check">
            <input type="checkbox" class="form-check-input" id="cashbond" checked disabled>
            <label class="form-check-label" for="cashbond">Cash Bond</label>
          </div>
          <div class="mb-3 ms-3 me-3" style="width: 60%">
            <label for="inputreftnum" class="form-label">Total Amount</label>
            <input type="text" class="form-control" id="inputreftnum" value="2,216.00" name="To_amount" readonly >
            <!-- <input type="text" class="form-control" id="inputreftnum" value="2,216.00" name="To_amount" disabled > -->
          </div>
            <!-- <button type="submit" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#rusure">Submit</button> -->
            <input type="submit" value="Send" class="btn btn-primary ms-3" name="Send"/> 
        </form>



    </div>

    <div class="col-sm-4">
      <legend>Payment Confirmation</legend>
      <img src="images/collector.jpg" class="img-fluid mt-3 mb-3 ms-3" alt="collector" >  
    </div>
  </div>
</div> 


<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered" id="rusure" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-body">
        <h2><b>Are you sure?</h2></b>
        <p>Do you really want to confirm payment? This process cannot be undone.</p>
    </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Proceed</button>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
