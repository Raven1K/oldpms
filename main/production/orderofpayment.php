						
										<!DOCTYPE html>
										<html>
										<head>
							
										</head>
													<style>

															.checkbox {
															/* Add your custom styles for checkboxes here */
															/* For example: */
															border: 50px solid #ccc;
															padding: 5px;
															/* ... */
															}

													</style>





<?php 

// error_reporting(0);

function numberTowords($num)
{

$ones = array(
0 =>"",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
); /*limit t quadrillion */
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */

$rettxt .= $ones[$i]; 

}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}
extract($_POST);
if(isset($convert))
{
// echo "<p align='center' style='color:blue'>".numberTowords("$num").' PESO(s) ONLY'."</p>";

$val_words = numberTowords("$num").''.' PESO(s) ONLY' ;

}
?>





<?php


if (session_status() == PHP_SESSION_NONE) {
	session_start();
   }
require_once "../../processphp/config.php";

// if (isset($_POST['Submit'])) {

$lumber_app_id = $_GET['lumber_app_id'];




$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
// && Number_of_doc = $number  
$lumber_app_qry = mysqli_query($con, $lumber_app);
$result = mysqli_fetch_assoc($lumber_app_qry);

$fullname = $result['perm_fname'] .' '. $result['perm_lname'];
$mun_code = $result['muncity_code'];
$Address_Office_of_Payor = $result['full_address'];

$Status_ = $result['Status_'];



         
$mun_code = mysqli_real_escape_string($con, $mun_code);

$lumber_app2 = "SELECT * FROM muncity WHERE mun_code = '$mun_code'";
// Uncomment this line if needed: AND Number_of_doc = '$number'
$lumber_app_qry2 = mysqli_query($con, $lumber_app2);

if ($lumber_app_qry2) {
    $result2 = mysqli_fetch_assoc($lumber_app_qry2);
    if ($result2) {
        $office_cover = $result2['office_cover'];
		$_SESSION['Entity_Name'] = $result2['office_cover'];
    } else {
        echo "No records found.";
    }
} else {
    echo "Error in query: " . mysqli_error($con);
}





?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		
		input[type="radio"] {
            margin-right: 10px;
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #4caf50;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
        }

        input[type="radio"]:checked {
            background-color: #4caf50;
        }

	</style>

    <title>OLDPMS - DENR R13</title>

<?php 
      require_once 'link.php';
  ?>
  </head>

  <?php 
      require_once 'navbar.php';
  ?>

			<div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>ORDER OF PAYMENT </h2>
									
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
									<br />									
		
	<!-- <script>
      function onChangeValue2(){


		
        var checkbox1 = document.getElementById("appfee").checked;
		var checkbox2 = document.getElementById("regfee").checked;
		var checkbox3 = document.getElementById("oatfee").checked;
		var checkbox4 = document.getElementById("processing_fee").checked;

        var value = document.getElementById("cash").value;
        // var value2 = document.getElementById("textbox2").value;
		var value2 = document.getElementById("appfee").value;
		var value3 = document.getElementById("regfee").value;
		var value4 = document.getElementById("oatfee").value;
		var value5 = document.getElementById("processing_fee").value;

		
          document.getElementById("result").value = parseInt(value) + parseInt(value2) + parseInt(value3) + parseInt(value4) + parseInt(value5);
          document.getElementById("result2").value = parseInt(value) + parseInt(value2) + parseInt(value3) + parseInt(value4) + parseInt(value5);


      }
    </script> -->


															<?php
																
																	$currentTimestamp = time();

																
																	$randomNumber = mt_rand(1000, 9999);

																
																	$uniqueIdentifier = "123"; 

																	$transactionNumber = date("mdy", $currentTimestamp) . "-" . $randomNumber . "-" . $uniqueIdentifier;

															?>






<?php 


$lumber_app_id = $_GET['lumber_app_id'] ;


$desired_lumber_app_id = $lumber_app_id; // Replace with the desired ID

// SQL query to select data from the table for the specified ID
$query = "SELECT lumber_app_id, Entity_Name, Serial_No, Date_Issued, Name_of_Payor, Address_Office_of_Payor, Amount_Decimal, payment_transaction, purpose, Bill_No, Dated, Bank_no, Name_of_Bank, Amount, Application_Fee, Registration_Fee, Oath_Fee, cash, processing_fee, FundCluster FROM order_of_payment WHERE lumber_app_id = ?";

// Prepare the SQL query
$stmt = mysqli_prepare($con, $query);

if ($stmt) {
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $desired_lumber_app_id);

    // Execute the SQL query
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch data
            $row = mysqli_fetch_assoc($result);
            
            // $lumber_app_id = $row['lumber_app_id'];
            // $Entity_Name = $row['Entity_Name'];
            $Serial_No = $row['Serial_No'];
            // $Date_Issued = $row['Date_Issued'];
            // $Name_of_Payor = $row['Name_of_Payor'];
            // $Address_Office_of_Payor = $row['Address_Office_of_Payor'];
            $Amount_Decimal = $row['Amount_Decimal'];
            $payment_transaction = $row['payment_transaction'];
            $purpose = $row['purpose'];
            $Bill_No = $row['Bill_No'];
			

			// bill counter changes to bill where the client id represent to a bill counter

			$FundCluster = $row['FundCluster'];
            // $Dated = $row['Dated'];
            // $Bank_no = $row['Bank_no'];
            // $Name_of_Bank = $row['Name_of_Bank'];
            // $Amount = $row['Amount'];
            // $Application_Fee = $row['Application_Fee'];
            // $Registration_Fee = $row['Registration_Fee'];
            // $Oath_Fee = $row['Oath_Fee'];
            $cash = $row['cash'];
            // $processing_fee = $row['processing_fee'];


        } else {
            // echo "No records found for the specified ID.";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($con);
}




?>

									<!-- <form class="form-label-left input_mask" method="POST" enctype="multipart/form-data" > -->
									<!-- <form  method="POST"  enctype="multipart/form-data" > -->
									<form class="form-label-left input_mask" method="post" action="post_orderofpayment.php" >

								  	<input type="text" class="form-control" placeholder="lumber_app_id" name="lumber_app_id" value="<?php echo $lumber_app_id ; ?>" hidden>
									
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Entity Name:</label>
											<div class="col-md-4 col-sm-4 ">
											<input type="text" class="form-control" placeholder="Entity Name" name="Entity_Name" value="<?php echo $_SESSION['Entity_Name']; ?>" required readonly>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Transaction No.:</label>
											<div class="col-md-3 col-sm-3 ">
											<?php
											if ($_SESSION['user_role_id'] == '2') {
												echo '<input type="text" class="form-control" placeholder="Serial No." value="' . $Serial_No . '" name="Serial_No">';

											}elseif ($_SESSION['user_role_id'] == '9') {

												echo '<input type="text" class="form-control" placeholder="Serial No." value="' . $Serial_No . '" name="Serial_No">';

											}else{

												echo '<input type="text" class="form-control" placeholder="Serial No." value="' . $transactionNumber . '" name="Serial_No">';
											}
											?>



												</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Fund Cluster:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Fund Cluster" name="Fund_Cluster" value="<?php echo '01101101' ; ?>" >
											</div>
											<label class="col-form-label col-md-1 col-sm-1 ">Date Issued</label>
											<div class="col-md-2 col-sm-2 ">
												<input name="Date_Issued" class="date-picker form-control"  type="text" required="required" type="text"  value="<?php echo date('m/d/y') ; ?>" readonly>
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Name of Payor:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Name of Payor" name="Name_of_Payor" value="<?php echo $fullname ; ?>" readonly >
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Address:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Address/Office of Payor" name="Address_Office_of_Payor" value="<?php echo $Address_Office_of_Payor ; ?>" readonly >
											</div>
										</div>



										<!-- <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Amount in Words:</label>
											<div class="col-md-4 col-sm-4 ">
											<div type="text" class="form-control" id="word"  name="Amount_Word" readonly></div>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Amount in Figures (PHP):</label>
											<div class="col-md-4 col-sm-4 ">
											<input type="text" name="number" id="result" class="form-control input" onmousedown="word.innerHTML=numberToEnglish(this.value)" data-inputmask="'mask': '99-999999'" onchange="onChangeValue2()"/>
											</div>
										</div> -->



										
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Purpose :</label>
											<div class="col-md-4 col-sm-4 ">
												<!-- <input type="text" class="form-control" placeholder="Payment of Transaction" name="payment_transaction" value="<?php echo $payment_transaction ; ?>"> -->
												<input type="text" class="form-control" name="payment_transaction" value="Payment of Lumber Dealer Permit" readonly>
									
												<label>
										
												<!-- <input type="radio" name="payment_transaction" value="cash" <?php echo ($payment_transaction == 'cash') ? 'checked' : ''; ?>> Cash -->
												</label>
												<label>
												<!-- <input type="radio" name="payment_transaction" value="check" <?php echo ($payment_transaction == 'check') ? 'checked' : ''; ?>> Check -->
												</label>
											</div>

											

                                            <label class="col-form-label col-md-1 col-sm-1 ">Registration Status:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Purpose" name="purpose" value="<?php echo strtoupper($Status_) ;?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Bill No.:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Bill No." name="Bill_No" value="<?php echo $_BILLCOUNTER = date('Ym') . $lumber_app_id; ; ?>">
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Dated:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Date" name="Dated" value="<?php echo date('m/d/y') ; ?>" readonly>
											</div>
										</div>
										<div class="ln_solid"></div>

										<!-- <form method="post" action=""> ------------------------------------------------------------------------>


										<label>Payment Details:</label>

										<p style="padding: 5px;">
										<!-- <input type="checkbox"  value="100" id="appfee" name="Application_Fee" required class="flat" onclick="onChangeValue2(this)" checked />&nbsp; 100 - Processing Fee
										<br /><br /> -->
										<input type="checkbox" value="600" id="regfee" name="Registration_Fee" class="flat" onclick="onChangeValue2(this)" checked />&nbsp; 600 - Registration Fee
										<br /><br />
										<input type="checkbox" value="480" id="permfee" name="permfee" class="flat" onclick="onChangeValue2(this)" checked />&nbsp; 480 - Permit Fee
										<br /><br />
										<input type="checkbox" value="36" id="oatfee" name="Oath_Fee" class="flat" onclick="onChangeValue2(this)" checked />&nbsp; 36 - Oath Fee
										<br /><br />
										<input type="hidden"  value="0" class="flat" placeholder="" name="processing_fee" id="processing_fee" onclick="onChangeValue2(this)" checked  />&nbsp; 
										<br /><br />	
										<b>Sub Total: <span id="totalValue">0</span></b>

										<script>

										// Function to calculate total value using AJAX
										function onChangeValue2(checkbox) {
											const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
											const values = Array.from(checkboxes).map(cb => cb.value);
											
											fetch('calculateTotal.php', {
												method: 'POST',
												headers: {
													'Content-Type': 'application/json',
												},
												body: JSON.stringify({ checkboxes: values }),
											})
											.then(response => response.json())
											.then(data => {
												document.getElementById('totalValue').textContent = data.total.toFixed(2);
											})
											.catch(error => {
												console.error('Error:', error);
											});


										}


																						// Function to calculate total value from checkboxes
												function calculateTotal() {
													let total = 0;
													const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

													checkboxes.forEach((cb) => {
														total += cb.checked ? parseFloat(cb.value) || 0 : 0;
													});

													return total;
												}

												// Function to handle 'cash' and 'result' inputs and calculate the final result
												function calculateFinalResult() {
													let total = calculateTotal();
													let cashValue = parseFloat(document.getElementById('cash').value) || 0;
													let resultValue = parseFloat(document.getElementById('result').value) || 0;

													if (!isNaN(cashValue) && !isNaN(resultValue)) {
														
														let finalResult = total + cashValue 
														document.getElementById('result').value = finalResult.toFixed(2);
													}
												}

												// Function triggered by checkbox changes to update the total value
												function onChangeValue2() {
													let total = calculateTotal();
													document.getElementById('totalValue').textContent = total.toFixed(2);
													
													calculateFinalResult(); // Calculate the final result based on 'cash' and 'result' inputs
												}


									</script>




										<div class="form-group row">
											<label class="col-form-label col-md-1 col-sm-1 ">Cash Bond:</label>
											<div class="col-md-1 col-sm-1 ">
											<input type="text" class="form-control" value="<?php echo $cash ; ?>" placeholder="" name="cash" id="cash" required onChange="onChangeValue2()" checked/>
										

										</p>	

						
										<br/>
											</div>
												</div>


<!-- New  -->
										<div class="ln_solid"></div>

											<div class="form-group row">


											<label class="col-form-label col-md-1 col-sm-1 ">Amount in Figures (PHP):</label>
											<div class="col-md-4 col-sm-4 ">
											<input type="text" value="<?php echo $Amount_Decimal;?>" name="number" id="result" class="form-control input" onmousemove="word.innerHTML=numberToWords(this.value)" data-inputmask="'mask': '99-999999'" onchange="onChangeValue2()"/>

											</div>

											<label class="col-form-label col-md-2 col-sm-2 ">Amount in Words:</label>
											<div class="col-md-4 col-sm-4 ">
											<div type="text" class="form-control" id="word"  name="Amount_Word" readonly></div>
											</div>



									    	</div>


														<?php

																if ($_SESSION['user_role_id'] == "2") {
																	require_once 'orderofpaymentcomponent.php';
																} else {
																		
																	
																}

														?>


											<!-- <div class="ln_solid"></div>
												<p> Please deposit the collection under Bank Account/s:
												<div class="form-group row">
													<label class="col-form-label col-md-1 col-sm-1 ">No.:</label>
													<div class="col-md-2 col-sm-2 ">
														<input type="text" class="form-control" placeholder="Bank Number" name="Bank_no" >
													</div>
													<label class="col-form-label col-md-1 col-sm-1 ">Name of Bank:</label>
													<div class="col-md-2 col-sm-2 ">
														<input type="text" class="form-control" placeholder="Name of Bank" name="Name_of_Bank">
													</div>
													<label class="col-form-label col-md-1 col-sm-1 ">Amount (PHP):</label>
													<div class="col-md-2 col-sm-2 ">
														<input type="text" class="form-control" id="result2" placeholder="Amount" name="Amount" onchange="onChangeValue2()">
													</div>
												</div> -->




								

												<?php
												if ($_SESSION['user_role_id'] == "2") {

													require_once 'orderofpaymentcomponent.php';
												}elseif ($_SESSION['user_role_id'] == "9") {


									
													// require_once "orderofpaymentview.php";
													
													echo '<form method="POST" action="updatepayment.php">';
													echo '<input type="text" name="lumber_app_id" value="' . $lumber_app_id . '" hidden>' ;
													echo '<button type="button" class="btn btn-primary">Cancel</button>';
													echo '<button type="submit" class="btn btn-success" id="Submit" name="Approve">Approve</button>';
													echo '<a href="orderofpaymentview.php?lumber_app_id='. $lumber_app_id .'" class="btn btn-success" id="OpenDocument">Open Document</a>';
													echo '</div>';
													echo '</div>';
													// Close the form if it was opened before
													echo '</form>';


												} else {
													// HTML code for the "else" block
													echo '<br/><br/>';
													echo '<div class="form-group row">';
													echo '<div class="col-md-5 col-sm-5 offset-md-5">';
													echo '<button type="button" class="btn btn-primary">Cancel</button>';
													echo '<button type="submit" class="btn btn-success" id="Submit" name="Submit">Generate</button>';
													echo '</div>';
													echo '</div>';
													// Close the form if it was opened before
													echo '</form>';
												}
												?>


								
	

							
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
      

  </body>
</html>

<script>
const numbersToWords = {
  0: "zero",
  1: "one",
  2: "two",
  3: "three",
  4: "four",
  5: "five",
  6: "six",
  7: "seven",
  8: "eight",
  9: "nine",
  10: "ten",
  11: "eleven",
  12: "twelve",
  13: "thirteen",
  14: "fourteen",
  15: "fifteen",
  16: "sixteen",
  17: "seventeen",
  18: "eighteen",
  19: "nineteen",
  20: "twenty",
  30: "thirty",
  40: "forty",
  50: "fifty",
  60: "sixty",
  70: "seventy",
  80: "eighty",
  90: "ninety",
};


const numberToWords = function(number) {
  if (number < 0) {
    throw new Error("Invalid number: " + number);
  } else if (number === 0) {
    return "zero";
  } else if (number < 100) {
    if (number < 20) {
      return numbersToWords[number];
    } else {
      const tensDigit = Math.floor(number / 10);
      const onesDigit = number % 10;
      return numbersToWords[tensDigit * 10] + "-" + numbersToWords[onesDigit];
    }
  } else if (number < 1000) {
    const hundredsDigit = Math.floor(number / 100);
    const remainder = number % 100;
    let result = numbersToWords[hundredsDigit] + " hundred";
    if (remainder > 0) {
      result += " and " + numberToWords(remainder);
    }
    return result;
  } else if (number < 10000) {
    const thousandsDigit = Math.floor(number / 1000);
    const remainder = number % 1000;
    let result = numbersToWords[thousandsDigit] + " thousand";
    if (remainder > 0) {
      result += " and " + numberToWords(remainder);
    }
    return result;
  } else {
    throw new Error("Unsupported number: " + number);
  }
};

console.log(numberToWords(1234)); // Test case: should output 'one thousand two hundred and thirty-four'


</script>

</body>
</html>

