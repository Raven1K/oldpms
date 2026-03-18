<!-- mao ni akong code para mo redirect pero e testing pa nato sa server side -->

<?php
   
    error_reporting(E_ALL);
    ini_set('display_errors', 0);

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


        $response = str_replace('00|', '', $response);
            echo 'Response: ' . $response;
        echo "<script>window.location.href = '$response';</script>";

        // echo "<button onclick=\"window.location.href = '$response';\">Click here to redirect</button>";



        exit; // Ensure that subsequent code is not executed after redirection
    
    }

    // Close cURL session
    curl_close($curl);

}


?>


