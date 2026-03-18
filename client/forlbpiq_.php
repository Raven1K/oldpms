

<?php
$selectedRowId = $_GET['lumber_app_id'];

require_once "../processphp/config.php";

$sql = "SELECT * FROM order_of_payment WHERE lumber_app_id = '$selectedRowId'"; // Replace 'lumber_app_id' with your column name

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $Amount_Decimal = $row['Amount_Decimal']; // Amount
        $payment_transaction = $row['payment_transaction']; // Transaction Type
        $Serial_No = $row['Serial_No']; // Merchant Reference Number 
        $Address_Office_of_Payor = $row['Address_Office_of_Payor']; // Office Address
        $Name_of_Payor = $row['Name_of_Payor']; // Office Address
        $Entity_Name = $row['Entity_Name']; // Entity Name
        $FundCluster = $row['FundCluster']; // Fund Cluster
        $Payment_Status = $row['Payment_Status'];

    }
} else {
    echo "No results found for the selected ID";
}




 //Read the lumber owner details centers code 
$sql = "SELECT bussiness_name FROM lumber_application WHERE lumber_app_id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 's', $selectedRowId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Fetch the filtered data
while ($row = mysqli_fetch_assoc($result)) {
    $bussiness_name =  $row['bussiness_name'] ;

}

// Close the statement and connection
mysqli_stmt_close($stmt);






  //Read the responsibility centers code 
$query = "SELECT code, acronym, description FROM reponsibilitycenters WHERE Office = ?";
$stmt = mysqli_prepare($con, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $Entity_Name);
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






  $trxnamt = $Amount_Decimal; // Amount
  $merchantcode = "1512" ; //Assigned Merchant Code for DENR CARAGA: 1512
  $bankcode = "B000" ; // LBP = B000 (Fixed) 
  $trxndetails = $payment_transaction; // Transaction Type
  $trandetail1 = $Serial_No; // Merchant Reference Number 
  $trandetail2 = $Name_of_Payor; // Name_of_client/Payorname 
  $trandetail3 = "venzonanthonie@gmail.com" ; // Email address
  $trandetail4 = $Address_Office_of_Payor; // Business Address
  $trandetail5 = $bussiness_name ; // Lumber Dealer Trade Name 
  $trandetail6 = $FundCluster ; // DENR FUND CLUSTER   
  $trandetail7 = $code; // Responsibility Center
  $trandetail8 = null ;
  $trandetail9 = null ;
  $trandetail10 = null ;
  $trandetail11 = 0 ;
  $trandetail12 = 0 ;
  $trandetail13 = 0 ;
  $trandetail14 = 0 ;
  $trandetail15 = 0 ;
  $trandetail16 = 0 ;
  $trandetail17 = 0 ;
  $trandetail18 = 0 ;
  $trandetail19 = 0 ;
  $trandetail20 = null ;

  $trxndetailsblank = null ;


                  // Collect the necessary data from your form or elsewhere
                  $merchantcode = " ";
  
                  // ... (collect other parameters as needed)

                  // Concatenate the parameters
                  $concatenatedParams = $merchantcode . $trxndetailsblank . $trandetail1; /* Concatenate other parameters */;
                  // Append username, password, and secret key
                  $username = "username";
                  $password = "password";
                  $secretKey = "N\\HWJUKFHQX"; // Ensure proper escape characters if needed

                  $concatenatedParams .= $username . $password . $secretKey;

                  // Apply SHA-256 hash algorithm
                  $checksum = hash('sha256', $concatenatedParams);

                  // Convert the checksum to hexadecimal
                  $checksumHex = strtoupper($checksum);

                  // Use $checksumHex in your form submission or wherever required

                  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transaction Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    input[type="text"] {
      width: calc(100% - 12px);
      padding: 8px;
      margin-bottom: 15px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    input[type="email"] {
      width: calc(100% - 12px);
      padding: 8px;
      margin-bottom: 15px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }


        table {
            border-collapse: collapse;
            width: 90%;
            
        }

        table, th, td {
            border: 1px solid #ccc;
        
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            background-color: green;
            color: #fff;
        }

        .custom-btnGreen {
          color: white;
          background-color: #28a745;
          border-color: #28a745;
          /* Add any additional styles here */
        }

        .custom-btnGreen {
          color: white;
          background-color: #28a745;
          border-color: #28a745;
          /* Add any additional styles here */
        }



  </style>
</head>
<body>





<form id="myForm" method="post" hidden>
 
 <!-- <h1>InquireStatus</h1> -->

 <!-- <label for="merchantcode">Merchant Code:</label> -->
 <input type="text" id="merchantcode" name="merchantcode" value="<?php echo $merchantcode; ?>" hidden><br><br>

 <!-- <label for="merchant_ref_number">Merchant Reference Number:</label> -->
 <input type="text" id="merchant_ref_number"  name="refnum" value="<?php echo $trxndetailsblank; ?>" hidden><br><br>

 <!-- <label for="trandetail1">Trand Detail 1:</label> -->
 <input type="text" id="trandetail1"  name="trandetail1" value="<?php echo $trandetail1; ?>" hidden><br><br>
 
 <!-- <label for="checksum">checksum SHA:</label> -->
 <input type="text" name="checksum" value="<?php echo $checksumHex; ?>" hidden>

 <!-- <label for="username">username:</label> -->
 <input type="text" id="username" name="username" value="username" hidden><br><br>

 <!-- <label for="password">password:</label> -->
 <input type="text" id="password" name="password" value="password" hidden><br><br>

 <input type="submit" value="Pay" hidden><br><br>

</form>

  <script type="text/javascript">
    // Submit the form when the page loads
    window.onload = function() {
        document.getElementById("myForm").submit();
    };
</script>






  <?php
if (isset($_POST['redirectButton'])) {
    // Output JavaScript to open a new tab with the redirection link
    echo '<script>window.open("https://www.lbp-eservices.com/egps/portal/index.jsp", "_blank");</script>';
}
?>






    <!-- <form action="echo.php" method="get">
       <h2>Perform Echo</h2>
        <label for="inputString">Enter String:</label>
        <input type="text" id="inputString" name="inputString" required>
        <button type="submit">Perform Echo</button>
    </form> -->


<!-- <form method="post">
  <input type="submit" name="redirectButton" value="Redirect to LBP Page">
</form> -->









  <?php 

        if ($Payment_Status == 'Paid') {

        } else {
          // echo '<form method="POST" class="form-container">';
          echo '<form id="paymentForm" method="POST" class="form-container">';
          echo '<button style="height: 35px; width: 70px; font-size: 12px;" type="button" class="btn btn-danger" hidden>Cancel</button>';
          // echo '<button style="margin-left: 15px; height: 35px; width: 70px; font-size: 12px;" type="submit" class="custom-btnGreen" name="pay">Pay</button>';
          echo '<button id="payButton" style="margin-left: 15px; height: 35px; width: 70px; font-size: 12px;" type="submit" class="custom-btnGreen" name="pay" hidden>Pay</button>';

          echo '</form>';
        }
                                
  ?>

  





<?php


  if(isset($_POST['pay'])) {
  // code to execute if the submit button has been clicked

  $lumber_app_id = $_GET["lumber_app_id"];
  


  $sql = "UPDATE client_client_document_history SET Details = :Details, Title = :Title
  WHERE lumber_app_id = $lumber_app_id && Title = 'Bill  Collector' ";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  

  ':Title' => 'Bill  Collector (Successfully Paid)',
  ':Details' => 'Successfully Paid',));




  
  $sql = "UPDATE order_of_payment SET Payment_Status = :Payment_Status
  WHERE lumber_app_id = $lumber_app_id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  
  ':Payment_Status' => 'Paid',));


  $referenceNumber = uniqid(); 


  $sql = "UPDATE order_of_payment SET Payment_Status = :Payment_Status, Payment_Reference_Number = :Payment_Reference_Number
  WHERE lumber_app_id = $lumber_app_id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(


  ':Payment_Reference_Number' => $referenceNumber,
  ':Payment_Status' => 'Paid',));



  function function_alert($message) {
    $lumber_app_id = $_GET["lumber_app_id"];        
    // Display the alert box 
    // echo "<script type='text/javascript'>alert('Successfully Rated'); window.location.href=docstatus_released.php?lumber_app_id="$lumber_app_id";</script>";
    echo "<script type='text/javascript'>alert('Successfully Paid'); window.location.href='doctracker.php?lumber_app_id=".$lumber_app_id."';</script>";
  }
  
  
  // Function call
  function_alert("Successfully Paid!");
  
  
  }



?>


</body>
</html>





<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $formData = $_POST;

  // Assuming 'server.php' is the server-side script handling the form submission
  $serverUrl = 'http://222.127.109.129:8080/LBP-LinkBiz-RS/rs/inquirestatus/';

  // Initialize cURL session
  $curl = curl_init();

  // Set cURL options
  curl_setopt($curl, CURLOPT_URL, $serverUrl);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($formData));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  // Execute cURL session
  $response = curl_exec($curl);

  // Check for errors
  if ($response === false) {
      echo 'Error: ' . curl_error($curl);
  } else {
      // Output response

      echo "Redirecting ........" ;
      // $response = str_replace('00|', '', $response);
      // echo 'O-LDPMS Redirecting...' ;

        echo   'Response: ' . $response;
      // echo "<script>window.location.href = '$response';</script>";

      // echo "<button onclick=\"window.location.href = '$response';\">Click here to redirect</button>";


    echo '<br><br>';
      

      // Explode the response string by '|' and take the first two parts
      $response_parts = explode('|', $response, 3); // Limit to 3 parts to avoid unnecessary splits
      
      // Concatenate the first two parts with the '|' delimiter
      $first_part = $response_parts[0] . '|' . $response_parts[1];
      
       $first_part; // Output: 00|0000
      
   // Check if the first part is "00|0000"
    if ($first_part === "00|0000") {
       "Payment Success";


          

      $lumber_app_id = $_GET["lumber_app_id"];
  


      $sql = "UPDATE client_client_document_history SET Details = :Details, Title = :Title
      WHERE lumber_app_id = $lumber_app_id && Title = 'Bill  Collector' ";
      $stmt = $connection->prepare($sql);
      $stmt->execute(array(
      
    
      ':Title' => 'Bill  Collector (Successfully Paid)',
      ':Details' => 'Successfully Paid',));
    
    
    
    
      
      $sql = "UPDATE order_of_payment SET Payment_Status = :Payment_Status
      WHERE lumber_app_id = $lumber_app_id";
      $stmt = $connection->prepare($sql);
      $stmt->execute(array(
      
      ':Payment_Status' => 'Paid',));
    
    
      $referenceNumber = uniqid(); 
    
    
      $sql = "UPDATE order_of_payment SET Payment_Status = :Payment_Status, Payment_Reference_Number = :Payment_Reference_Number
      WHERE lumber_app_id = $lumber_app_id";
      $stmt = $connection->prepare($sql);
      $stmt->execute(array(
    
    
      ':Payment_Reference_Number' => $referenceNumber,
      ':Payment_Status' => 'Paid',));
    
    
    
      function function_alert($message) {
        $lumber_app_id = $_GET["lumber_app_id"];        
        // Display the alert box 
        // echo "<script type='text/javascript'>alert('Successfully Rated'); window.location.href=docstatus_released.php?lumber_app_id="$lumber_app_id";</script>";
        echo "<script type='text/javascript'>alert('You have already paid successfully'); window.location.href='doctracker.php?lumber_app_id=".$lumber_app_id."';</script>";
      }
      
      
      // Function call
      function_alert("You have already paid successfully!");



  

            
 
    } else {
      echo "Payment Unsuccessful";

      echo "<script>window.location.href='clientpayment.php?lumber_app_id=" . $selectedRowId . "';</script>";


    }
      exit; // Ensure that subsequent code is not executed after redirection
  
  }

  // Close cURL session
  curl_close($curl);

}


?>




