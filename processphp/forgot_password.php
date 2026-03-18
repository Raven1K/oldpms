<?php

session_set_cookie_params([
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

include('config.php');

if (isset($_POST['send_code'])) {
    $email = $_POST['email'];

    // --- Rate Limiting (1 request per 60 seconds) ---
    if (isset($_SESSION['last_reset_time']) && time() - $_SESSION['last_reset_time'] < 60) {
        header("Location: ../forgot_password.php?error=" . urlencode("Please wait a minute before requesting another code."));
        exit();
    }
    $_SESSION['last_reset_time'] = time();

    // --- Verify reCAPTCHA ---
    $recaptcha_secret = '6LeTIY0sAAAAAHPR6a4KnPDoFVaeu0Jb-0UoO37G';
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $verify_response = @file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret.'&response='.$recaptcha_response);
    $response_data = json_decode($verify_response);
    
    if(!$response_data || !$response_data->success) {
        header("Location: ../forgot_password.php?error=" . urlencode("reCAPTCHA validation failed."));
        exit();
    }

    // Check if the email exists in the database
    $query = $connection->prepare("SELECT email, password_unhashed FROM user_client WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Check if the password_unhashed column has a value
        if (!empty($user['password_unhashed'])) {
            // Generate a verification code
            $verification_code = rand(100000, 999999);

            // Store the verification code in the session
            $_SESSION['verification_code'] = $verification_code;
            $_SESSION['email'] = $email;

            // Send the verification code to the user's email
            $to = $email;
            $subject = "Password Reset Verification Code";
            $message = "Your verification code is: " . $verification_code;
            $headers = "From: noreply@yourdomain.com\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
            $yourname = 'O-LDPMS PASSWORD';

            // Construct the URL correctly
            $url = 'https://o-ldpms.denr.gov.ph/sendemail/send.php?send=1&email=' . urlencode($email) . '&Subject=' . urlencode($subject) . '&message=' . urlencode($message) . '&yourname=' . urlencode($yourname);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification for testing
            $response = curl_exec($ch);
            curl_close($ch);
        }
    } 

    // GENERIC RESPONSE: Protects against Email Enumeration
    header("Location: ../forgot_password.php?code=1&email=" . urlencode($email) . "&success=" . urlencode("If the email exists, a verification code has been sent."));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['code'])) {
    if ($_SESSION['verification_code'] == $_POST['code']) {
        // Redirect to the forgot_password.php page with a query parameter
        header("Location: ../forgot_password.php?showModal=true&email=");
        exit();
    } else {
        header("Location: ../forgot_password.php?error=" . urlencode("Error Verification Code."));
    }
}
?>