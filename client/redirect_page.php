<?php

    // Retrieve form data
    $trxnamt = $_POST['trxnamt'];
    $checksum = $_POST['checksum'];
    $merchantcode = $_POST['merchantcode'];
    $bankcode = $_POST['bankcode'];
    $trxndetails = $_POST['trxndetails'];
    $trandetail1 = $_POST['trandetail1'];
    $trandetail2 = $_POST['trandetail2'];
    $trandetail3 = $_POST['trandetail3'];
    $trandetail4 = $_POST['trandetail4'];
    $trandetail5 = $_POST['trandetail5'];
    $trandetail6 = $_POST['trandetail6'];
    $trandetail7 = $_POST['trandetail7'];
    $trandetail8 = $_POST['trandetail8'];
    $trandetail9 = $_POST['trandetail9'];
    $trandetail10 = $_POST['trandetail10'];
    $trandetail11 = $_POST['trandetail11'];
    $trandetail12 = $_POST['trandetail12'];
    $trandetail13 = $_POST['trandetail13'];
    $trandetail14 = $_POST['trandetail14'];
    $trandetail15 = $_POST['trandetail15'];
    $trandetail16 = $_POST['trandetail16'];
    $trandetail17 = $_POST['trandetail17'];
    $trandetail18 = $_POST['trandetail18'];
    $trandetail19 = $_POST['trandetail19'];
    $trandetail20 = $_POST['trandetail20'];
    $callbackurl = $_POST['callbackurl'];
    $username = $_POST['username'];
    $password = $_POST['password'];



// URL of the server
$server_url = 'http://222.127.109.129:8080/LBP-LinkBiz-RS/rs/postpayment/';

// Sample data (replace these with actual values)

// Data to be sent in the POST request
$post_data = [
    'trxnamt' => $trxnamt,       // Add name parameter using the variable $name
    'checksum' => $checksum, // Add address parameter using the variable $address
    'merchantcode' => $merchantcode, // Add age parameter using the variable $age
    'bankcode' => $bankcode, 
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







    // Add more parameters as needed
];

// Initialize cURL session
$ch = curl_init($server_url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_TIMEOUT, 300); // Set timeout to 30 seconds (adjust as needed)

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Display the response from the server
echo $response;


    // Process the form data as needed
    // For example, you can save it to a database or perform other actions

    // After processing, you can redirect the user to a success page
    // header("Location: success_page.php");
    // exit();

?>
