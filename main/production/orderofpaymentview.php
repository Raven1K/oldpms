<?php


              if (session_status() == PHP_SESSION_NONE) {
                session_start();
                }

              require_once "../../processphp/config.php";

              // if (isset($_POST['Submit'])) {

              $lumber_app_id = $_GET['lumber_app_id'];

              $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $result = mysqli_fetch_assoc($lumber_app_qry);
              $fullname = $result['perm_fname'] .' '. $result['perm_lname'];
              $mun_code = $result['muncity_code'];
              $Address_Office_of_Payor = $result['full_address'];
              $Status_ = $result['Status_'];
              $Office = $result['Office'];



                      
              $lumber_app2 = "SELECT * FROM muncity where mun_code = $mun_code";

              $lumber_app_qry2 = mysqli_query($con, $lumber_app2);
              $result2 = mysqli_fetch_assoc($lumber_app_qry2);

              $office_cover = $result2['office_cover'];

?>




<?php


$query = "SELECT code, acronym, description FROM reponsibilitycenters WHERE Office = ?";
$stmt = mysqli_prepare($con, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $Office);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $code = $row['code'];
            $acronym = $row['acronym'];
            $description = $row['description'];
            
            // Now you can use $code, $acronym, and $description as needed.
        } else {
            echo "No records found for the specified Office.";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($con);
}





?>




<!doctype html>
<html lang="en">





  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  
    <title>View Order of Payment</title>


  </head>

 
  </head>


  <?php 

$query = "SELECT lumber_app_id, Entity_Name, Serial_No, Date_Issued, Name_of_Payor, Address_Office_of_Payor, Amount_Decimal, payment_transaction, purpose, Bill_No, Dated, Bank_no, Name_of_Bank, Amount, Application_Fee, Registration_Fee, Oath_Fee, cash, processing_fee, FundCluster FROM order_of_payment WHERE lumber_app_id = ?";

// Prepare the SQL query
$stmt = mysqli_prepare($con, $query);

if ($stmt) {
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $lumber_app_id);

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
            $Entity_Name = $row['Entity_Name'];
            $Serial_No = $row['Serial_No'];
            $Date_Issued = $row['Date_Issued'];

            $Date_Issued = $row['Date_Issued']; // Assuming $Date_Issued contains the date in 'YYYY-MM-DD' format
            $formattedDate = date("F j, Y", strtotime($Date_Issued));
            

            $Name_of_Payor = $row['Name_of_Payor'];
            $Address_Office_of_Payor = $row['Address_Office_of_Payor'];
            $Amount_Decimal = $row['Amount_Decimal'];
            $payment_transaction = $row['payment_transaction'];
            $purpose = $row['purpose'];
            $Bill_No = $row['Bill_No'];
			      $FundCluster = $row['FundCluster'];
            // $Dated = $row['Dated'];
            // $Bank_no = $row['Bank_no'];
            $Name_of_Bank = $row['Name_of_Bank'];
            $Amount = $row['Amount'];
            $Amount2 = $row['Amount'];
            $formattedAmount = number_format($Amount, 2); // Format as currency with 2 decimal places

            // Now you can echo the formatted amount
             "P" . $formattedAmount;

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



    $formattedAmount2 = number_format($Amount2, 2); // Format as currency with 2 decimal places

    // Function to convert a number to words for values up to a thousand
    function numberToWords($number) {
        $words = array(
            '0' => 'Zero',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
            '10' => 'Ten',
            '11' => 'Eleven',
            '12' => 'Twelve',
            '13' => 'Thirteen',
            '14' => 'Fourteen',
            '15' => 'Fifteen',
            '16' => 'Sixteen',
            '17' => 'Seventeen',
            '18' => 'Eighteen',
            '19' => 'Nineteen',
            '20' => 'Twenty',
            '30' => 'Thirty',
            '40' => 'Forty',
            '50' => 'Fifty',
            '60' => 'Sixty',
            '70' => 'Seventy',
            '80' => 'Eighty',
            '90' => 'Ninety'
        );
    
        if ($number < 21) {
            return $words[$number];
        } elseif ($number < 100) {
            $tens = $words[10 * floor($number / 10)];
            $units = $number % 10;
            return $tens . ($units ? ' ' . $words[$units] : '');
        } elseif ($number < 1000) {
            $hundreds = $words[floor($number / 100)] . ' Hundred';
            $remainder = $number % 100;
            if ($remainder) {
                $hundreds .= '  ' . numberToWords($remainder);
            }
            return $hundreds;
        } elseif ($number < 10000) {
            $thousand = $words[floor($number / 1000)] . ' Thousand';
            $remainder = $number % 1000;
            if ($remainder) {
                $thousand .= '  ' . numberToWords($remainder);
            }
            return $thousand;
        } else {
            return 'Number too large to convert';
        }
    }
    
    $amountInWords = numberToWords((int)$Amount2); // Convert the amount to words
    
    // Now you can echo the amount in words along with "pesos"
    $FullamountInWords = "Amount: $formattedAmount2 (PHP $amountInWords pesos)";
    
    














    ?>

  <body>
  <div class="container mt-5 border border-dark border-3 p-3 w-50">
    <div class="container mt-1">

                <?php


            echo '<form method="POST" action="updatepayment.php">';
            echo '<input type="text" name="lumber_app_id" value="' . $lumber_app_id . '" hidden>' ;
            echo '<a href="application.php" class="btn btn-primary" id="OpenDocument">Cancel</a>';
            echo '<button type="submit" class="btn btn-success" id="Submit" name="Approve">Approve</button>';
            // echo '<a href="orderofpaymentview.php?lumber_app_id='. $lumber_app_id .'" class="btn btn-success" id="OpenDocument">Open Document</a>';

            echo '<br><br>'

            ?>



      <div class="row">
        <div class="col-7"><strong>Entity Name :</strong><?php echo "<u>" . $Entity_Name . "   " . "</u>"; ?></div>

        <div class="col-5"><strong>Serial No. :</strong><?php echo "<u>" . $Serial_No . "</u>"; ?></div>

        <!-- Force next columns to break to new line
        <div class="w-100 mb-3"></div> -->

        <div class="col-7"><strong>Fund Cluster :</strong><?php echo "<u>" . $FundCluster . "</u>"; ?></div>
        <div class="col-5"><strong>Date :</strong><b><u><?php echo " " . $formattedDate ; ?></b></u></div>

        <div class="col-12"><strong>Responsibility Center :</strong><?php echo "<u>" . $code . "</u>"; ?></div>

        <h3 class="text-center mt-4 mb-3"><strong>ORDER OF PAYMENT</strong></h3>

        <p class><strong>The Collecting Officer</strong>
        <br>Cash/Treasury Unit</p>

        <!-- Force next columns to break to new line -->
        <div class="w-100 mb-3"></div>
        
        <div class="col-1"> </div>
        <div class="col-11">Please issue Official Receipt in favor of <?php echo "<b><u>   "   . "    " . $Name_of_Payor .    "   </u></b>"; ?></div>
        <div class="col-6"> </div>
        <div class="text-center col-0">(Name of Payor) </div>

        <!-- Force next columns to break to new line -->
        <div class="w-100 mb-3"></div>

        <div class="text-center col-0"><?php echo "<u>" . $Address_Office_of_Payor . "</u>"; ?></div>
        <div class="text-center col-0">(Address/Office of Payor)</div>

        <!-- Force next columns to break to new line -->
        <div class="w-100 mb-3"></div>

        <div>in the amount of <u><?php echo "_________" . $amountInWords. "_Peso(s)________" ; ?></u>(PHP<?php echo "<b><u>" . " ". $formattedAmount . "</u></b>"; ?>)

        <!-- Force next columns to break to new line -->
        <div class="w-100 mb-3"></div>
        <div class="row">

        <div class="col-2">for payment of </div>
        <div class="col-6"> <b><u> Lumber Dealer Permit </u></b> </div>
        <div class="col-4"> </div>
        </div>

        <div class="col-2"></div>
        <div class="text-center col-6"> <u> (Purpose)</u> </div>
        <div class="col-4"></div>

        <!-- Force next columns to break to new line -->
        <div class="w-100 mb-3"></div>

        <div>per Bill No. ________________________________ dated ___________________________.

        <!-- Force next columns to break to new line -->
        <div class="w-100 mb-3"></div>
        <br><p> Please deposit the collections under Bank Account/s:</p><br>

        <div class="row">
          <div class="text-center col-3 mb-3"><u>No.</u></div>
          <div class="text-center col-6"><u>Name of Bank</u></div>
          <div class="text-center col-3"><u>Amount</u></div>
        </div>
        <div class="row">
          <div class="text-center col-3 mb-3"><b><u>_____3402284420_____</u></b></div>
          <div class="text-center col-6"><b><u>BTr-Regular Fund/DENR Regional Office XIII</u></b></div>
          <div class="text-center col-3">P<?php echo "<b><u>" . "_______". $formattedAmount . "______" . "</u></b>"; ?></div>
        </div>
        <div class="row">
          <div class="text-center col-3 mb-3">_______________________</div>
          <div class="text-center col-6">______________________________________________</div>
          <div class="text-center col-3">   ________________________</div>
        </div>
        <div class="row">
          <div class="text-center col-3 mb-3">_______________________</div>
          <div class="text-center col-6">______________________________________________</div>
          <div class="text-center col-3"> ________________________</div>
        </div>
        <div class="row">
          <div class="text-center col-3 mb-5"><strong>Total</strong></div>
          <div class="text-center col-6"> </div>
          <div class="text-center col-3"><strong>P<?php echo "<b><u>" . "_______". $formattedAmount . "______" . "</u></b>"; ?></strong></div>
        </div>
        <div class="row">
          <div class="text-center col-6"></div>
          <div class="text-center col-6">____________________________________________________</div>
          <div class="text-center col-6"></div>
          <div class="text-center col-6">Signature over Printed Name Head of Accounting</div>
          <div class="text-center col-6"></div>
          <div class="text-center col-6">Division/Unit/Authorized Official</div>
        </div>
      </div>
    </div>
  </div>
<br><br>



  </body>
</html>





<?php


?>