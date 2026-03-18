<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../client/index.php");
    exit;
}

include('config.php');

// We use $_SERVER['REQUEST_METHOD'] === 'POST' because JS form.submit() doesn't send the button 'name'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // --- 1. Account Lockout Check ---
    if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
        $wait = $_SESSION['lockout_time'] - time();
        header("Location: ../login.php?error=" . urlencode("Account locked due to too many failed attempts. Try again in $wait seconds."));
        exit();
    }

    // --- 2. Verify reCAPTCHA ---
    $recaptcha_secret = '6LeTIY0sAAAAAHPR6a4KnPDoFVaeu0Jb-0UoO37G';
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $verify_response = @file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret.'&response='.$recaptcha_response);
    $response_data = json_decode($verify_response);
    
    if(!$response_data || !$response_data->success) {
        header("Location: ../login.php?error=" . urlencode("reCAPTCHA validation failed."));
        exit();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM user_client WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    // Check if the query execution was successful
    $result = false;
    if ($query) {
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Check if a row was fetched
        if ($result !== false) {
            if ($result['Status'] == 0) {
                header("Location: ../login.php?error=Your account is being validated.");
                exit();
            }
        }
    }

    if (!$result) {
        // --- Track Failed Attempts for missing user ---
        $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
        if ($_SESSION['login_attempts'] >= 5) {
            $_SESSION['lockout_time'] = time() + 300; // 5 minute lockout
        }
        $attempts_left = 5 - $_SESSION['login_attempts'];
        
        header("Location: ../login.php?error=" . urlencode("Email and Password combination is wrong! $attempts_left attempts remaining."));
        exit();
    } else {
        $id = $result['client_id'];
        $hash = $result['password'];

        if (password_verify($password, $result['password'])) {
            // Success! Clear lockout tracking
            unset($_SESSION['login_attempts']);
            unset($_SESSION['lockout_time']);

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["client_id"] = $id;
            $_SESSION["email"] = $email;

            header("Location: ../client/index.php?success=You have been logged in successfully.");
            exit();
        } else {
            // --- Track Failed Attempts for wrong password ---
            $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
            if ($_SESSION['login_attempts'] >= 5) {
                $_SESSION['lockout_time'] = time() + 300; // 5 minute lockout
            }
            $attempts_left = 5 - $_SESSION['login_attempts'];
            
            header("Location: ../login.php?error=" . urlencode("Invalid password! $attempts_left attempts remaining."));
            exit();
        }
    }
} else {
    // Redirect back to login if someone accesses this file via GET directly
    header("Location: ../login.php");
    exit();
}
?>