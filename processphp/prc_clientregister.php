<?php
    session_start();
    include('config.php');
    if (isset($_POST['btn'])) {


        echo "<pre>";
        print_r($_FILES['my_image1']);
        echo "</pre>";


        $firstname = $_POST['firstname'];
        $middlename = $_POST['mid_name'];
        $lastname = $_POST['lastname'];
        $mobilenum = $_POST['mobilenum'];
        $email = $_POST['email'];
        $Cemail = $_POST['Cemail'];
        $password = $_POST['password'];
        $CPassword = $_POST['Cpassword'];
        


        $img_name = $_FILES['my_image1']['name'];
        $img_name2 = $_FILES['my_image2']['name'];
        $img_name3 = $_FILES['my_image3']['name'];

        $img_size = $_FILES['my_image1']['size'];
        $tmp_name = $_FILES['my_image1']['tmp_name'];
        $error = $_FILES['my_image1']['error'];

        $File1 =  $img_name;
        $File2 =  $img_name2;
        $File3 =  $img_name3;
    
    }
    else {
        header("Location: ../Register.php");
    }

    




        if(empty($firstname) || empty($lastname) || empty($email) || empty($Cemail)  || empty($password) || empty($CPassword) || empty($File1) 
        || empty($File2) || empty($File3))
        {
            // echo ' Please Fill in the Blanks ';
            // echo '<script>alert("Please Fill in the Blanks" )</script>';

            //    echo '<input type="button" class="btn" <a href="#" onclick="history.back();"> </a>';
            //   echo '<a href="#" onclick="history.back();"></a>';

           


            echo '<form action ="../Register.php" method = "POST">
            <script>alert("Please Fill in the Blanks" )</script>
            <button type="backpage" name="button"> Backpage </button>
            </form>';
        }
        else
        {
            if($password!=$CPassword)
            {
                echo ' Password Not Matched ' ;
             
            }
            elseif($Cemail!=$email)
            {
                echo '<script>alert("Confirm Email Not Match")</script>';
            }
            else
            
            {

               


  
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM user_client WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO user_client(firstname,mid_name,lastname,mobilenum,password,email,comp_id_upload,govt_id_upload,auth_letter)
             VALUES (:firstname,:mid_name,:lastname,:mobilenum,:password_hash,:email,:comp_id_upload, :govt_id_upload, :auth_letter)");
            $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
            $query->bindParam("mid_name", $middlename, PDO::PARAM_STR);
            $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
            $query->bindParam("mobilenum", $mobilenum, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            




          

            // echo '<script src="php/prc_image2.php"></script>';
       


            
        if ($error === 0) {
            if ($img_size > 1125000) 
            {
                $em = "Sorry, your file is too large.";
                header("Location: ../Register.php?error=$em");

            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png" ,"pdf"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("PDF-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    
        include 'prc_image2.php';
        include 'prc_image3.php';

                    $query->bindParam("comp_id_upload", $new_img_name, PDO::PARAM_STR);
                    $query->bindParam("govt_id_upload", $new_img_name2, PDO::PARAM_STR);
                    $query->bindParam("auth_letter", $new_img_name3, PDO::PARAM_STR);

                    $result = $query->execute();
// not functional insertion post in another provided 

                    // Insert into Database
                    // $sql = "INSERT INTO user_client(comp_id_upload) VALUES('$new_img_name')";
                    // mysqli_query($conn, $sql);
                    // header("Location: ../Register.php");
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: ../Register.php?error=$em");
                }
            }
        }else 
        
        {
            $em = "unknown error occurred!";
            header ("Location: ../Register.php?error=$em");
        }




            if ($result) {
                echo '<p class="success" > Your registration was successful!</p>';

                

            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
}
    // }


    // note for modal make a universal page for modal erros success and other warning 

?>