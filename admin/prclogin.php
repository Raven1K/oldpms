<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
      
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        exit;
    }

    include('../processphp/config.php');
    
    if (isset($_POST['btn'])) {

        // --- Account Lockout Check ---
        if (isset($_SESSION['admin_lockout_time']) && time() < $_SESSION['admin_lockout_time']) {
            $wait = $_SESSION['admin_lockout_time'] - time();
            echo "<script type='text/javascript'>alert('Account locked due to too many failed attempts. Try again in $wait seconds.');location='login.php';</script>";
            exit();
        }

        // --- Verify reCAPTCHA (Only if attempts >= 3) ---
        if (isset($_SESSION['admin_login_attempts']) && $_SESSION['admin_login_attempts'] >= 3) {
            $recaptcha_secret = '6LeTIY0sAAAAAHPR6a4KnPDoFVaeu0Jb-0UoO37G';
            $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
            $verify_response = @file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret.'&response='.$recaptcha_response);
            $response_data = json_decode($verify_response);
            
            if(!$response_data || !$response_data->success) {
                echo "<script type='text/javascript'>alert('reCAPTCHA validation failed. Please check the box.');location='login.php';</script>";
                exit();
            }
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $connection->prepare("SELECT * FROM denr_users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $_SESSION['admin_login_attempts'] = ($_SESSION['admin_login_attempts'] ?? 0) + 1;
            if ($_SESSION['admin_login_attempts'] >= 5) {
                $_SESSION['admin_lockout_time'] = time() + 300; 
            }
            $attempts_left = 5 - $_SESSION['admin_login_attempts'];

            echo "<script type='text/javascript'>alert('Username and Password combination is wrong! $attempts_left attempts remaining.');location='login.php';</script>";
        } else {
            $id = $result['user_id'];
            $hash =  $result['password'];
            $_SESSION["user_role_id"] =  $result['user_role_id'];
            $name =  $result['name'];
  
            if (password_verify($password, $result['password'])) {

                // Clear login attempts tracking
                unset($_SESSION['admin_login_attempts']);
                unset($_SESSION['admin_lockout_time']);
            
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $id;
                $_SESSION["username"] = $username;   
                $_SESSION["name"] = $name;
                $_SESSION["user_role_id"] =  $result['user_role_id'];
                
                if (($result['user_role_id']) == ('99')){
                    header("location: index.php");
                }
                if (($result['user_role_id']) == ('1') || ($result['user_role_id']) == ('2') || ($result['user_role_id']) == ('4') || ($result['user_role_id']) == ('7') || ($result['user_role_id']) == ('8') || ($result['user_role_id']) == ('9') || ($result['user_role_id']) == ('9.1') || ($result['user_role_id']) == ('10') || ($result['user_role_id']) == ('11') || ($result['user_role_id']) == ('12')){
                    header("location: ../main/production/application.php");
                }
                if (($result['user_role_id']) == ('12.5') || ($result['user_role_id']) == ('13') || ($result['user_role_id']) == ('14') || ($result['user_role_id']) == ('15') || ($result['user_role_id']) == ('16')){
                    header("location: ../main/action.php");
                }
                if (($result['user_role_id']) == ('17')){
                    header("location: ../main/records/action.php");
                }
                if (($result['user_role_id']) == ('19')){
                    header("location: ../main/tableic.php");
                }
            } 
            else 
            {
                $_SESSION['admin_login_attempts'] = ($_SESSION['admin_login_attempts'] ?? 0) + 1;
                if ($_SESSION['admin_login_attempts'] >= 5) {
                    $_SESSION['admin_lockout_time'] = time() + 300; 
                }
                $attempts_left = 5 - $_SESSION['admin_login_attempts'];

                echo "<script type='text/javascript'>alert('Invalid Password. $attempts_left attempts remaining.');location='login.php';</script>";
            }
        }
    }
?>