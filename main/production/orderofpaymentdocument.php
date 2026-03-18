

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



         
$lumber_app2 = "SELECT * FROM muncity where mun_code = $mun_code";
// && Number_of_doc = $number  
$lumber_app_qry2 = mysqli_query($con, $lumber_app2);
$result2 = mysqli_fetch_assoc($lumber_app_qry2);

$office_cover = $result2['office_cover'];





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



		/* CSS for the modal */
			.modal {
				display: none;
				position: fixed;
				z-index: 1;
				left: 0;
				top: 0;
				width: 75%;
				height: 100%;
				background-color: rgba(0, 0, 0, 0.5);
			}

			.modal-content {
				background-color: #fff;
				margin: 10% auto;
				padding: 20px;
				border: 1px solid #888;
				width: 60%;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			}

			.close {
				color: #aaa;
				float: right;
				font-size: 28px;
			}

			.close:hover {
				color: black;
				text-decoration: none;
				cursor: pointer;
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
									<h2>ORDER OF PAYMENT   | Client Registration Status : <?php echo strtoupper($Status_) ; ?></h2>
									
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
		
	<script>
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
    </script>


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


									
													// require_once 'orderofpaymentview.php';

													echo '<form method="POST" action="updatepayment.php">';
													echo '<input type="text" name="lumber_app_id" value="' . $lumber_app_id . '" hidden>' ;
													echo '<button type="button" class="btn btn-primary">Cancel</button>';
													echo '<button type="submit" class="btn btn-success" id="Submit" name="Approve">Approve</button>';
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

									<div id="myModal" class="modal">
											<div class="modal-content">
												<span class="close" id="closeModalButton">&times;</span>
												<h2>Modal Title</h2>
												<!-- <div id="modalContent">Loading...</div> -->
												<?php 
													require_once 'orderofpaymentview.php';
												?>


											</div>
										</div>


								<script>
											document.addEventListener("DOMContentLoaded", function () {
												// Get references to the modal and buttons
												const modal = document.getElementById("myModal");
												const openModalButton = document.getElementById("openModalButton");
												const closeModalButton = document.getElementById("closeModalButton");
												const modalContent = document.getElementById("modalContent");

												// Open the modal when the page loads
												modal.style.display = "block";

												// Close the modal when the close button is clicked
												closeModalButton.addEventListener("click", function () {
													modal.style.display = "none";
												});

												// Close the modal if the user clicks outside the modal
												window.addEventListener("click", function (event) {
													if (event.target == modal) {
														modal.style.display = "none";
													}
												});

												// Load content via AJAX (example URL)
												const ajaxURL = "example_content.html";

												const xhr = new XMLHttpRequest();
												xhr.open("GET", ajaxURL, true);
												xhr.onreadystatechange = function () {
													if (xhr.readyState == 4 && xhr.status == 200) {
														modalContent.innerHTML = xhr.responseText;
													}
												};
												xhr.send();
											});
								</script>
	

							
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
function numberToEnglish(n, custom_join_character) {

var string = n.toString(),
	units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words;

var and = custom_join_character || 'and';

/* Is number zero? */
if (parseInt(string) === 0) {
	return 'zero';
}

/* Array of units as words */
units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];

/* Array of tens as words */
tens = ['', '', 'Twenty', 'Thirty', 'Torty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

/* Array of scales as words */
scales = ['', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion', 'Sextillion', 'Septillion', 'Octillion', 'Nonillion', 'Decillion', 'Undecillion', 'Duodecillion', 'Tredecillion', 'Quatttuor-Decillion', 'Quindecillion', 'Sexdecillion', 'Septen-Decillion', 'Octodecillion', 'Novemdecillion', 'Vigintillion', 'Centillion'];

/* Split user arguemnt into 3 digit chunks from right to left */
start = string.length;
chunks = [];
while (start > 0) {
	end = start;
	chunks.push(string.slice((start = Math.max(0, start - 3)), end));
}

/* Check if function has enough scale words to be able to stringify the user argument */
chunksLen = chunks.length;
if (chunksLen > scales.length) {
	return '';
}

/* Stringify each integer in each chunk */
words = [];
for (i = 0; i < chunksLen; i++) {

	chunk = parseInt(chunks[i]);

	if (chunk) {

		/* Split chunk into array of individual integers */
		ints = chunks[i].split('').reverse().map(parseFloat);

		/* If tens integer is 1, i.e. 10, then add 10 to units integer */
		if (ints[1] === 1) {
			ints[0] += 10;
		}

		/* Add scale word if chunk is not zero and array item exists */
		if ((word = scales[i])) {
			words.push(word);
		}

		/* Add unit word if array item exists */
		if ((word = units[ints[0]])) {
			words.push(word);
		}

		/* Add tens word if array item exists */
		if ((word = tens[ints[1]])) {
			words.push(word);
		}

		/* Add 'and' string after units or tens integer if: */
		if (ints[0] || ints[1]) {

			/* Chunk has a hundreds integer or chunk is the first of multiple chunks */
			if (ints[2] || !i && chunksLen) {
				words.push(and);
			}

		}

		/* Add hundreds word if array item exists */
		if ((word = units[ints[2]])) {
			words.push(word + ' Hundred');
		}

	}

}

return words.reverse().join(' ');

}
</script>

