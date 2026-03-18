

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




                  // Collect the necessary data from your form or elsewhere
                  $merchantCode = "1512";
  
                  // ... (collect other parameters as needed)

                  // Concatenate the parameters
                  $concatenatedParams = $trxnamt . $merchantCode . $trxndetails . $trandetail1 . $trandetail2 . $trandetail3 . $trandetail4 . $trandetail5 . $trandetail6 . $trandetail7 . $trandetail8 . $trandetail9 . $trandetail10 . $trandetail11 . $trandetail12 . $trandetail13 . $trandetail14 . $trandetail15 . $trandetail16 . $trandetail17 . $trandetail18 . $trandetail19; /* Concatenate other parameters */;
                  // Append username, password, and secret key
                  $username = "username";
                  $password = "password";
                  $secretKey = "N\\HWJUKFHQX"; // Ensure proper escape characters if needed

                  echo $concatenatedParams .= $username . $password . $secretKey;

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





  <h1>LBP Transaction Details</h1>

  <form name="form1" action="" enctype="multipart/form-data" method="post">
 

  <!-- <form action="http://58.71.22.7/testegps/LinkbizCaptureServlet?lbpinst=zVUlX9ss%2F8b75VRejK42sDU15bMGhK%2Fl7kroLw5CTwN5vKNkk6smVLI8B2qDAD4%2FiigKzH00JmuoousB1FQtsSGNoeqECyXCJ6Bu8rHxPCvx84baqBdGV5%2BdHIPlbC2x%2BKEskKribIJH%2BuwzqnvAN6flLjx%2FgET%2FcLiGX7IjMer0vGsyQVaW8hyF2hr0%2B8Q%2B95BNXoOl3UWE1rs50E3NEfwS8IM4H15UiuEHVQCnrrknKQV%2BwQGkHz%2FJq3krorsLoM0pljOOdyqlFabUwtmdciOGVomkzeV7Eshl%2BKZiymjDWW7J73Ku9mOdrsVEdaKU6Cb2hWRlR3A8liEdb4G4bUkLP7gY2KwB%2BdfvEitem%2B4RtipgJ2abhRCru5gATiUWXjle6OHdYIH0h6th%2Bx1YDS1Wws%2B33%2F287TZpCc1XJF4z0LkaWYzr%2BSzfUtdlQKt4hO2kvNjGnhRLKvh64y4dSg%3D%3D" target="_blank" method="POST"> -->
    
    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="trxnamt" value="<?php echo $trxnamt; ?>"><br><br>
    <label for="amount">SHA:</label>
    <input type="text" name="checksum" value="<?php echo $checksumHex; ?>">

    <label for="merchant_code">Assigned Merchant Code for DENR CARAGA:</label>
    <input type="text" id="merchant_code" name="merchantcode" value="<?php echo $merchantcode; ?>"><br><br>
    
    <label for="bank_code">Bank Code:</label>
    <input type="text" id="bank_code"  value="<?php echo $bankcode; ?>" name="bankcode" ><br><br>
    
    <label for="transaction_type">Transaction Type:</label>
    <input type="text" id="transaction_type"  name="trxndetails"  value="<?php echo $trxndetails; ?>"><br><br>
    
    <label for="merchant_ref_number">Merchant Reference Number:</label>
    <input type="text" id="merchant_ref_number"  name="trandetail1" value="<?php echo $trandetail1; ?>"><br><br>
    
    <label for="client_name">Name of Client/Payor Name:</label>
    <input type="text" id="client_name" name="trandetail2" value="<?php echo $trandetail2; ?>"><br><br>
    
    <label for="email">Email address:</label>
    <input type="email" id="email" name="trandetail3" value="<?php echo $trandetail3; ?>" required><br><br>
    
    <label for="Business_address">Address Business/Address:</label>
    <input type="text" id="Business_address" name="trandetail4" value="<?php echo $trandetail4; ?>"><br><br>

    <label for="lumber_dealer_name">Lumber Dealer Trade Name:</label>
    <input type="text" id="lumber_dealer_name" name="trandetail5" value="<?php echo $trandetail5; ?>"><br><br>

    <label for="denr_fund_cluster">DENR FUND CLUSTER:</label>
    <input type="text" id="denr_fund_cluster" name="trandetail6" value="<?php echo $trandetail6; ?>"><br><br>
    
    <label for="responsibility_center">Responsibility Center:</label>
    <input type="text" id="responsibility_center" name="trandetail7" value="<?php echo $trandetail7; ?>"><br><br>

    <label for="trandetail8">Detail 8:</label>
    <input type="text" id="trandetail8" name="trandetail8" value="<?php echo $trandetail8; ?>"><br><br>
    
    <label for="trandetail9">Detail 9:</label>
    <input type="text" id="trandetail9" name="trandetail9" value="<?php echo $trandetail9; ?>"><br><br>
    
    <label for="trandetail10">Detail 10:</label>
    <input type="text" id="trandetail10" name="trandetail10" value="<?php echo $trandetail10; ?>"><br><br>

    <label for="trandetail11">Detail 11:</label>
    <input type="text" id="trandetail11" name="trandetail11" value="<?php echo $trandetail11; ?>"><br><br>

    <label for="trandetail12">Detail 12:</label>
    <input type="text" id="trandetail12" name="trandetail12" value="<?php echo $trandetail12; ?>"><br><br>

    <label for="trandetail13">Detail 13:</label>
    <input type="text" id="trandetail13" name="trandetail13" value="<?php echo $trandetail13; ?>"><br><br>

    <label for="trandetail14">Detail 14:</label>
    <input type="text" id="trandetail14" name="trandetail14" value="<?php echo $trandetail14; ?>"><br><br>

    <label for="trandetail15">Detail 15:</label>
    <input type="text" id="trandetail15" name="trandetail15" value="<?php echo $trandetail15; ?>"><br><br>

    <label for="trandetail16">Detail 16:</label>
    <input type="text" id="trandetail16" name="trandetail16" value="<?php echo $trandetail16; ?>"><br><br>

    <label for="trandetail17">Detail 17:</label>
    <input type="text" id="trandetail17" name="trandetail17" value="<?php echo $trandetail17; ?>"><br><br>

    <label for="trandetail18">Detail 18:</label>
    <input type="text" id="trandetail18" name="trandetail18" value="<?php echo $trandetail18; ?>"><br><br>

    <label for="trandetail19">Detail 19:</label>
    <input type="text" id="trandetail19" name="trandetail19" value="<?php echo $trandetail19; ?>"><br><br>

    <label for="trandetail20">Detail 20:</label>
    <input type="text" id="trandetail20" name="trandetail20" value="<?php echo $trandetail20; ?>"><br><br>

    
    <label for="callbackurl">Callback URL:</label>
    <input type="text" id="callbackurl" name="callbackurl" value="https://denrcaraga-infosys.online/oldpms/client/callbackurl.php"><br><br>


    <label for="username">username:</label>
    <input type="text" id="username" name="username" value="username" ><br><br>

    <label for="password">password:</label>
    <input type="text" id="password" name="password" value="password"><br><br>

    
  <input type="submit" value="Pay" name="submit"><br><br>

  </form>

  <?php


if (isset($_POST['submit'])) {

    error_reporting(E_ALL);
ini_set('display_errors', 0);

    echo 'TEST' ;

  $trxnamt = $_POST["trxnamt"];
  $checksumHex = $_POST["checksum"];
  $merchantcode = $_POST["merchantcode"];
  $bankcode = $_POST["bankcode"];
  $trxndetails = $_POST["trxndetails"];
  $trandetail1 = $_POST["trandetail1"];
  $trandetail2 = $_POST["trandetail2"];
  $trandetail3 = $_POST["trandetail3"];
  $trandetail4 = $_POST["trandetail4"];
  $trandetail5 = $_POST["trandetail5"];
  $trandetail6 = $_POST["trandetail6"];
  $trandetail7 = $_POST["trandetail7"];
  $trandetail8 = $_POST["trandetail8"];
  $trandetail9 = $_POST["trandetail9"];
  $trandetail10 = $_POST["trandetail10"];
  $trandetail11 = $_POST["trandetail11"];
  $trandetail12 = $_POST["trandetail12"];
  $trandetail13 = $_POST["trandetail13"];
  $trandetail14 = $_POST["trandetail14"];
  $trandetail15 = $_POST["trandetail15"];
  $trandetail16 = $_POST["trandetail16"];
  $trandetail17 = $_POST["trandetail17"];
  $trandetail18 = $_POST["trandetail18"];
  $trandetail19 = $_POST["trandetail19"];
  $trandetail20 = $_POST["trandetail20"];
  $callbackurl = $_POST["callbackurl"];
  $username = $_POST["username"];
  $password = $_POST["password"];

$callbackurl = "https://denrcaraga-infosys.online/oldpms/client/callbackurl.php";
$username = "username";
$password = "password";

// Create an array with the data
$data = array(
  'trxnamt' => $trxnamt,
  'checksumHex' => $checksumHex,
  'merchantcode' => $merchantcode,
  'trxndetails' => $trxndetails,
  'trandetail1' => $trandetail1,
  'trandetail2' => $trandetail2,
  'trandetail3' => $trandetail3,
  'trandetail4' => $trandetail4,
  'trandetail5' => $trandetail5,
  'trandetail6' => $trandetail6,
  'trandetail7' => $trandetail7,
  'trandetail8' => $trandetail8,
  'trandetail9' => $trandetail9,
  'trandetail10' => $trandetail10,
  'trandetail11' => $trandetail11,
  'trandetail12' => $trandetail12,
  'trandetail13' => $trandetail13,
  'trandetail14' => $trandetail14,
  'trandetail15' => $trandetail15,
  'trandetail16' => $trandetail16,
  'trandetail17' => $trandetail17,
  'trandetail18' => $trandetail18,
  'trandetail19' => $trandetail19,
  'trandetail20' => $trandetail20,
  'callbackurl' => $callbackurl,
  'username' => $username,
  'password' => $password
);

// Define the URL
$url = 'http://222.127.109.129:8080/LBP-LinkBiz-RS/rs/postpayment';

// Create HTTP header
$options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($data) // Encode data as URL-encoded query string
    )
);

// Create a stream context
$context  = stream_context_create($options);

// Make the POST request and get the response
$response = file_get_contents($url, false, $context);

// Check for errors
if ($response === false) {
    // There was an error with the request
    $error_message = 'Error occurred while fetching data from URL: ' . $url;
    echo '<p>' . $error_message . '</p>';
} else {
    // Output the response
    echo $response;
}


}

  ?>


  <?php

                // if (isset($_POST['submit'])) {




                    // $callbackurl = "https://denrcaraga-infosys.online/oldpms/client/callbackurl.php";
                    // $username = "username";
                    // $password = "password";
                    
                    // // Create an array with the data
                    // $data = array(
                    //     'trxnamt' => $trxnamt,
                    //     'checksumHex' => $checksumHex,
                    //     'merchantcode' => $merchantcode,
                    //     'trxndetails' => $trxndetails,
                    //     'trandetail1' => $trandetail1,
                    //     'trandetail2' => $trandetail2,
                    //     'trandetail3' => $trandetail3,
                    //     'trandetail4' => $trandetail4,
                    //     'trandetail5' => $trandetail5,
                    //     'trandetail6' => $trandetail6,
                    //     'trandetail7' => $trandetail7,
                    //     'trandetail8' => $trandetail8,
                    //     'trandetail9' => $trandetail9,
                    //     'trandetail10' => $trandetail10,
                    //     'trandetail11' => $trandetail11,
                    //     'trandetail12' => $trandetail12,
                    //     'trandetail13' => $trandetail13,
                    //     'trandetail14' => $trandetail14,
                    //     'trandetail15' => $trandetail15,
                    //     'trandetail16' => $trandetail16,
                    //     'trandetail17' => $trandetail17,
                    //     'trandetail18' => $trandetail18,
                    //     'trandetail19' => $trandetail19,
                    //     'trandetail20' => $trandetail20,
                    //     'callbackurl' => $callbackurl,
                    //     'username' => $username,
                    //     'password' => $password
                    // );
                    
                    // // Initialize cURL session
                    // $curl = curl_init();
                    
                    // // Set cURL options
                    // curl_setopt($curl, CURLOPT_URL, 'http://222.127.109.129:8080/LBP-LinkBiz-RS/rs/postpayment');
                    // curl_setopt($curl, CURLOPT_POST, true);
                    // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as string
                    
                    // // Execute cURL request
                    // $response = curl_exec($curl);
                    
                    // // Check for errors
                    // if(curl_errno($curl)){
                    //     echo 'cURL error: ' . curl_error($curl);
                    // }
                    
                    // // Close cURL session
                    // curl_close($curl);
                    
                    // // Redirect to callback URL or handle response as needed
                    // // For example, if the response contains a redirection URL, you can use header("Location: ...") to redirect
                    // // header("Location: " . $response);
                
                    

                // 
?>






    <form action="echo.php" method="get">
       <h2>Perform Echo</h2>
        <label for="inputString">Enter String:</label>
        <input type="text" id="inputString" name="inputString" required>
        <button type="submit">Perform Echo</button>
    </form>


<form method="post">
  <input type="submit" name="redirectButton" value="Redirect to LBP Page">
</form>









  <?php 

        if ($Payment_Status == 'Paid') {

        } else {
          echo '<form method="POST" class="form-container">';
          echo '<button style="height: 35px; width: 70px; font-size: 12px;" type="button" class="btn btn-danger">Cancel</button>';
          echo '<button style="margin-left: 15px; height: 35px; width: 70px; font-size: 12px;" type="submit" class="custom-btnGreen" name="pay">Pay</button>';
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










