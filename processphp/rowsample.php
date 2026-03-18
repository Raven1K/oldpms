<?php

require_once "config.php";
session_start();



$id = $_SESSION["client_id"];
// $email = $_POST['email'];
// $password = $_POST['password'];

$query = $connection->prepare("SELECT * FROM user_client WHERE client_id=:client_id");
$query->bindParam("client_id", $id, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
if (!$result) {
    // echo '<p class="error">Email and Password combination is wrong!</p>';

    $em = "Email and Password combination is wrong!";
    header ("Location: univmodal.php?error=$em");
} else



if ($result > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <select name="storage_location[]" required>
            <option value=""></option>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['storage_name']; ?></option>
        </select>



<?php } } ?> 