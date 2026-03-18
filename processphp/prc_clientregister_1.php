<?php


    session_start();




    include('config.php');
    if (isset($_POST['btn'])) {


        // echo "<pre>";
        // print_r($_FILES['my_image1']);
        // echo "</pre>";


        $firstname = $_POST['firstname'];
        $middlename = $_POST['mid_name'];
        $lastname = $_POST['lastname'];
        $mobilenum = $_POST['mobilenum'];
        $email = $_POST['email'];
        $Cemail = $_POST['Cemail'];
        $password = $_POST['password'];
        $CPassword = $_POST['Cpassword'];

        $province = $_POST['province'];
        $citymun = $_POST['citymun'];
        $brgy = $_POST['brgy'];
        $zips = $_POST['zips'];
        

        $lumber_app = "SELECT * FROM muncity where mun_code = $citymun";
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
        $office_cover = $lumber_ap_row3['office_cover'] ;




        $img_name = $_FILES['my_image1']['name'];
        // $img_name2 = $_FILES['my_image2']['name'];
        $img_name3 = $_FILES['my_image3']['name'];

        $img_size = $_FILES['my_image1']['size'];
        $tmp_name = $_FILES['my_image1']['tmp_name'];
        $error = $_FILES['my_image1']['error'];

        $File1 =  $img_name;
        $File2 =  'FILE';
        $File3 =  $img_name3;


    
    }
    // else {

   
    //     header("Location: ../Register.php");
    // }

    



        if(empty($firstname) || empty($lastname) || empty($email)  || empty($password) || empty($CPassword) || empty($File1) || empty($File3))
        {
            // echo ' Please Fill in the Blanks ';
            // echo '<script>alert("Please Fill in the Blanks" )</script>';

            //    echo '<input type="button" class="btn" <a href="#" onclick="history.back();"> </a>';
            //   echo '<a href="#" onclick="history.back();"></a>';

           


            // echo '<form action ="../Register.php" method = "POST">
            // <script>alert("Please Fill in the Blanks" )</script>
            // <button type="backpage" name="button"> Backpage </button>
            // </form>';

            $em = "Please Fill in the Blanks";
            header ("Location: univmodal.php?error=$em");



        }
        else
        {
            if($password!=$CPassword)
            {
                // echo ' Password Not Matched ' ;

                $em = "Password Not Matched";
                header ("Location: univmodal.php?error=$em");
    
             
            }
            elseif($Cemail!=$email)
            {


                $em = "Confirm Email Not Match";
                header ("Location: univmodal.php?error=$em");


            }
            else
            
            {

               


  
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = $connection->prepare("SELECT * FROM user_client WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            // echo '<p class="error">The email address is already registered!</p>';
            
            $em = "The email address is already registered!";
            header("Location: univmodal.php?error=$em");



        }




        elseif ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO user_client (firstname, mid_name, lastname, mobilenum, password, email, comp_id_upload, auth_letter, password_unhashed, province, citymun, brgy, zips)
            VALUES (:firstname, :mid_name, :lastname, :mobilenum, :password_hash, :email, :comp_id_upload, :auth_letter, :password_unhashed, :province, :citymun, :brgy, :zips)");
        
            $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
            $query->bindParam(":mid_name", $middlename, PDO::PARAM_STR);
            $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
            $query->bindParam(":mobilenum", $mobilenum, PDO::PARAM_STR);
            $query->bindParam(":password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->bindParam(":comp_id_upload", $comp_id_upload, PDO::PARAM_STR);
            $query->bindParam(":auth_letter", $auth_letter, PDO::PARAM_STR);
            $query->bindParam(":password_unhashed", $password, PDO::PARAM_STR);
            $query->bindParam(":province", $province, PDO::PARAM_STR);
            $query->bindParam(":citymun", $citymun, PDO::PARAM_STR);
            $query->bindParam(":brgy", $brgy, PDO::PARAM_STR);
            $query->bindParam(":zips", $office_cover, PDO::PARAM_STR);




          

            // echo '<script src="php/prc_image2.php"></script>';
       


            
        if ($error === 0) {
            // if ($img_size > 1125000) 
            if ($img_size > 100000000) 
            
            {
                // $em = "Sorry, your file is too large.";
                // header("Location: ../Register2.php?error=$em");

                function function_alert($message) {
                      
                    // Display the alert box 
                    echo "<script type='text/javascript'>alert('Sorry, your ID file is too large');location='../Register2.php';</script>";
                }
                  
                  
                // Function call
                function_alert("Sorry, your file is too large");


            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png" ,"pdf"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("PDF-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    
        // include 'prc_image2.php';
        include 'prc_image3.php';

                    $query->bindParam("comp_id_upload", $new_img_name, PDO::PARAM_STR);
                    // $query->bindParam("govt_id_upload", $new_img_name2, PDO::PARAM_STR);
                    $query->bindParam("auth_letter", $new_img_name3, PDO::PARAM_STR);

                    $result = $query->execute();
// not functional insertion post in another provided 

                    // Insert into Database
                    // $sql = "INSERT INTO user_client(comp_id_upload) VALUES('$new_img_name')";
                    // mysqli_query($conn, $sql);
                    // header("Location: ../Register.php");
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: ../Register2.php?error=$em");
                }
            }
        }else 
        
        {


            // function function_alert($message) {
                      
            //     // Display the alert box 
            //     echo "<script type='text/javascript'>alert('Successfully Registered');location='../login.php';</script>";
            // }

            // function_alert("Successfully Registered!");
 // Your registration was successful. Now, please await confirmation from the administrators to validate the documents you've uploaded.


 
        }




            if ($result) {
              
              
                // echo '<p class="success" > Your registration was successful!</p>';

                
                // $em = "Your registration was successful!";
                // header ("Location: univmodal.php?error=$em");



                // Alertbox

                function function_alert($message) {
                      
                    // Display the alert box 
                    echo "<script type='text/javascript'>alert('Your registration is successful. Please wait for administrator confirmation to validate your uploaded documents.'); location='../login.php';</script>";

                }
                  
                  
                // Function call
                function_alert("Successfully Registered!");
                
                // header ("Location: ../login.php.php");


            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
}
    // }


    // note for modal make a universal page for modal erros success and other warning 

?>