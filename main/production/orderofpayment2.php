<?php 

error_reporting(0);

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


session_start();
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
									<h2>ORDER OF PAYMENT   | Form - Appendix 28 <?php echo strtoupper($Status_) ; ?></h2>
									
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
		
									<!-- <form class="form-label-left input_mask" method="POST" enctype="multipart/form-data" > -->
									<!-- <form  method="POST"  enctype="multipart/form-data" > -->
									<form class="form-label-left input_mask" method="post" action="post_orderofpayment.php" target="_blank">

								  	<input type="text" class="form-control" placeholder="lumber_app_id" name="lumber_app_id" value="<?php echo $lumber_app_id ; ?>" hidden>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Entity Name:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Entity Name" name="Entity_Name" value="<?php echo $office_cover ; ?>" readonly>
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Serial No.:</label>
											<div class="col-md-3 col-sm-3 ">
												<input type="text" class="form-control" placeholder="Serial No." name="Serial_No">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Fund Cluster:</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" class="form-control" placeholder="Fund Cluster" name="Fund_Cluster" >
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
                                        <div class="ln_solid"></div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 "></label>
                                            <label class="col-form-label col-md-2 col-sm-2 "></label>
                                            <label class="col-form-label col-md-3 col-sm-3 "><h1>ORDER OF PAYMENT</h1></label>
											</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2">The Collecting Officer</label>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">PENRO Tandag, Surigao del Sur</label>
										</div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Cash/Treasury Unit</label>
										</div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 "></label>
                                            <label class="col-form-label col-md-2 col-sm-2 "></label>
											<div class="col-md-2 col-sm-2 ">
                                            <label>Please issue Official Receipt in favor of</label>
											</div>
											<div class="col-md-3 col-sm-3 ">
												<input type="text" class="form-control" placeholder="Name of Payor" name="name" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-1 col-sm-1 ">Address/Office of Payor</label>
											<div class="col-md-3 col-sm-3 ">
												<input type="text" class="form-control" placeholder="Address/Office of Payor" name="name" readonly>
											</div>
                            			</div>
										<div class="form-group row">
                                            <label class="col-form-label col-md-1 col-sm-1 ">Purpose:</label>
											<div class="col-md-10 col-sm-10 ">
												<input type="text" class="form-control" placeholder="Purpose" name="purpose">
											</div>
                                            </div>
                                            <div class="form-group row">
											<label class="col-form-label col-md-1 col-sm-1 ">Bill No.:</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Bill No." name="Bill_No" >
											</div>
                                            <label class="col-form-label col-md-1 col-sm-1 ">Dated:</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Date" name="Dated" value="<?php echo date('m/d/y') ; ?>" readonly>
											</div>
										</div>
										<div class="ln_solid"></div>
										<p> Please deposit the collection under Bank Account/s:
										<div class="form-group row">
											<label class="col-form-label col-md-1 col-sm-1 ">Bank No.:</label>
											<div class="col-md-2 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Bank Number" name="Bank_no" >
											</div>
                                            <label class="col-form-label col-md-1 ">Name of Bank:</label>
											<div class="col-md-2 col-sm-2 ">
												<input type="text" class="form-control" placeholder="Name of Bank" name="Name_of_Bank">
											</div>
											<label class="col-form-label col-md-1 col-sm-1 ">Check Date:</label>
											<div class="col-md-1 col-sm-1 ">
											<input type="text" class="form-control" placeholder="Date" name="Dated" value="<?php echo date('m/d/y') ; ?>" >
											</div>
											<label class="col-form-label col-md-1 col-sm-1 ">Amount (PHP):</label>
											<div class="col-md-1 col-sm-1 ">
												<input type="text" class="form-control" placeholder="Amount" name="Amount" readonly>
											</div>
										</div>
                                        <br/>
										<br/>
                                        <br/>
										<br/>
                                        <div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 "></label>
                                            <label class="col-form-label col-md-2 col-sm-2 "></label>
                                            <label class="col-form-label col-md-2 col-sm-2 "></label>
											<div class="col-md-2 col-sm-2 ">
                                            <label></label>
											</div>
											<div class="col-md-3 col-sm-3 ">
												<input type="text" class="form-control" placeholder="Division Unit/Authorized Official" name="name" readonly>
											</div>
                            			</div>
										<br/>
										<br/>
										<div class="form-group row">
											<div class="col-md-5 col-sm-5  offset-md-5">
												<button type="button" class="btn btn-primary" >Cancel</button>

											<button type="submit" class="btn btn-success" id="Submit" name="Submit">Generate</button> 





											
											
											</form>
											
								
	

							
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

