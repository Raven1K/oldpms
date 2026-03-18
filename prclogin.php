<?php
session_set_cookie_params([
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../client/index.php");
    exit;
}

include('config.php');
if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM user_client WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    // Check if the query execution was successful
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
        header("Location: ../login.php?error=Email and Password combination is wrong!");
        exit();
    } else {
        $id = $result['client_id'];
        $hash = $result['password'];

        if (password_verify($password, $result['password'])) {
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
            header("Location: ../login.php?error=Invalid password!");
            exit();
        }
    }
}
?>