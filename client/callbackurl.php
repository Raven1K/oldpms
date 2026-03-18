<?php
// Your callback handling script (e.g., callback.php)

// Retrieving parameters from the GET request
$LBPRefNum = $_GET['LBPRefNum'];
$MerchantRefNum = $_GET['MerchantRefNum']; // This corresponds to trandetail1
$TrxnAmount = $_GET['TrxnAmount'];
$LBPConfNum = $_GET['LBPConfNum'];
$LBPConfDate = $_GET['LBPConfDate'];
$ErrorCode = $_GET['ErrorCode'];
$Checksum = $_GET['Checksum'];

// You can perform further processing or validation with these parameters here

// Example: Outputting the received parameters (for demonstration purposes)
// echo "LBPRefNum: $LBPRefNum <br>";
// echo "MerchantRefNum: $MerchantRefNum <br>";
// echo "TrxnAmount: $TrxnAmount <br>";
// echo "LBPConfNum: $LBPConfNum <br>";
// echo "LBPConfDate: $LBPConfDate <br>";
// echo "ErrorCode: $ErrorCode <br>";
// echo "Checksum: $Checksum <br>";
$dateString = $LBPConfDate;

// Convert the date string to a DateTime object
$dateObj = DateTime::createFromFormat('Ymd', $dateString);

// Format the DateTime object as desired
$formattedDate = $dateObj->format('F j, Y');



// Database connection parameters
require_once "../processphp/config.php";




// Filter condition (replace this with your specific condition)
$filter_condition = $MerchantRefNum;

// SQL query to select distinct Serial_No values from the order_of_payment table based on the filter condition
$sql = "SELECT DISTINCT lumber_app_id, ID, Name_of_Payor, Serial_No, Entity_Name, Address_Office_of_Payor FROM order_of_payment WHERE Serial_No = '$filter_condition'";


$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $Name_of_Payor = $row["Name_of_Payor"] ;
        $Address_Office_of_Payor = $row["Address_Office_of_Payor"];
        $ID = $row["lumber_app_id"];
        $lumber_app_id = $row["lumber_app_id"];
    }
} else {
    echo "0 results";
}



// Here, you can handle the logic for validating the parameters, processing the payment confirmation, etc.
// Ensure to implement security measures like checksum validation to prevent tampering.
?>


<!DOCTYPE html>
<html>
<head>
    <title>Transaction Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        p {
            margin: 10px 0;
            font-size: 16px;
            color: #666;
        }
        strong {
            font-weight: bold;
            color: #000;
        }
        .status {
        font-size: 20px; /* Adjust the font size as desired */
        color: #228B22; /* Change the color if needed */
        font-weight: bold; /* Makes the text bold */
        }

        .status {
        font-size: 20px; /* Adjust the font size as desired */
        color: #228B22; /* Change the color if needed */
        font-weight: bold; /* Makes the text bold */
        }

        .status2 {
        font-size: 20px; /* Adjust the font size as desired */
        color: red; /* Change the color if needed */
        font-weight: bold; /* Makes the text bold */
        }

        button {
    background-color: #4CAF50; /* Green color */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transaction Details</h1>
        <div>
            <p><strong>Name of Payor:</strong> <?php echo $Name_of_Payor; ?></p>
            <p><strong>Address Office of Payor:</strong> <?php echo $Address_Office_of_Payor; ?></p>
            <p><strong>Land Bank Reference Number:</strong> <?php echo $LBPRefNum; ?></p>
            <p><strong>Merchant Reference Number:</strong> <?php echo $MerchantRefNum; ?></p>
            <p><strong>Transaction Ammount:</strong> <?php echo $TrxnAmount; ?></p>
            <p><strong>LBP Confirmation Number:</strong> <?php echo $LBPConfNum; ?></p>
            <p><strong>LBP Confirmation Date:</strong> <?php echo $formattedDate; ?></p>
            <!-- <p><strong>ErrorCode:</strong> <?php echo $ErrorCode; ?></p> -->
            <?php if ($ErrorCode === '0000'): ?>
                <p class="status"><strong>Status:</strong> Successfully Paid</p>
                <button type="button" onclick="printPage()">Print</button>
                <button type="button" onclick="window.location.href='doctracker.php?lumber_app_id=<?php echo $ID; ?>'">Track Application</button>

            <?php elseif ($ErrorCode === '0214'): ?>
                <p class="status2"><strong>Status:</strong> Payment was Unsuccessful</p>
                <button type="button" onclick="window.location.href='clientpayment.php?lumber_app_id=<?php echo $ID; ?>'">Proceed to Payment</button>

                <?php // SQL query to filter rows based on lumber_app_id and details

                     
                        $details = "Mr/Ms ANTHONIE FENY CATALAN you may now proceed to payment.";
                        $sql = "SELECT * FROM client_client_document_history WHERE lumber_app_id = '$ID' AND Details = '$details'";

                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            // Update the filtered rows with new details
                            $new_details = "Mr/Ms ANTHONIE FENY CATALAN <h3>Your payment was unsuccessful.</h3>"; // Example - replace this with the new details you want to update
                            $update_sql = "UPDATE client_client_document_history SET Details = '$new_details' WHERE lumber_app_id = '$lumber_app_id' AND Details = '$details'";
                            
                            if ($con->query($update_sql) === TRUE) {
                                echo "Details updated successfully.";
                            } else {
                                echo "Error updating details: " . $con->error;
                            }
                            } else {
                                // echo "No rows found for the given lumber_app_id and details.";
                            }
                    ?>
                
            <?php endif; ?>

        </div>
    </div>
</body>
</html>



<script>
        function printPage() {
            window.print();
        }

</script>






<?php
// // Your callback handling script (e.g., callback.php)

// // Retrieving parameters from the GET request
// $LBPRefNum = $_GET['LBPRefNum'];
// $MerchantRefNum = $_GET['MerchantRefNum']; // This corresponds to trandetail1
// $TrxnAmount = $_GET['TrxnAmount'];
// $LBPConfNum = $_GET['LBPConfNum'];
// $LBPConfDate = $_GET['LBPConfDate'];
// $ErrorCode = $_GET['ErrorCode'];
// $Checksum = $_GET['Checksum'];

// // Additional parameters for Bancnet and PCHC Gateway
// $LbpConf = $_GET['lbpconf'];

// // Example: Outputting the received parameters (for demonstration purposes)
// echo "LBPRefNum: $LBPRefNum <br>";
// echo "MerchantRefNum: $MerchantRefNum <br>";
// echo "TrxnAmount: $TrxnAmount <br>";
// echo "LBPConfNum: $LBPConfNum <br>";
// echo "LBPConfDate: $LBPConfDate <br>";
// echo "ErrorCode: $ErrorCode <br>";
// echo "Checksum: $Checksum <br>";

// // Additional output for Bancnet and PCHC Gateway
// echo "LbpConf: $LbpConf <br>";

// // Here, you can handle the logic for validating the parameters, processing the payment confirmation, etc.
// // Ensure to implement security measures like checksum validation to prevent tampering.

// // Decryption for Bancnet and PCHC Gateway
// // Use the same secret key used during checksum generation in PostPayment
// $secretKey = 'N\HWJUKFHQX'; 

// // Decrypting the "lbpconf" parameter using AES-256-CBC
// $decryptedLbpConf = openssl_decrypt(base64_decode($LbpConf), 'aes-256-cbc', $secretKey, 0, $secretKey);

// // Parsing the decrypted values
// $confirmationDetails = json_decode($decryptedLbpConf, true);

// // Output the decrypted values
// echo "<br><br>Decrypted Confirmation Details:<br>";
// print_r($confirmationDetails);
?>
