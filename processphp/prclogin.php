<?php
    session_start();
    include('config.php');
    if (isset($_POST['btn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $connection->prepare("SELECT * FROM user_client WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">email password combination is wrong!</p>';
        } else {


            // $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // echo(htmlentities($result['password']));


            // echo(htmlentities($password_hash));

            // echo(htmlentities(password_verify($password, $result['password'])));

            $hash =  $result['password'];

// if ($result['password'] == $password) 
if (password_verify($password, $result['password']))
{
    $_SESSION['user_id'] = $result['client_id'];
    
    echo 'Password is valid!';
    

} 
else 
{
    echo 'Invalid password.';
}

            // if (password_verify($password, $result['password'])) {
                // $_SESSION['user_id'] = $result['id'];
                // echo '<p class="success">Congratulations, you are logged in!</p>';
            // } else {
                // echo '<p class="error">Username password combination is wrong! 1</p>';
            // }
        }
    }
?>


