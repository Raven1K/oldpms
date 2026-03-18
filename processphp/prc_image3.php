<?php
  
   
    if (isset($_POST['btn'])) 
    
    {


        // echo "<pre>";
        // print_r($_FILES['my_image3']);
        // echo "</pre>";

        $img_name = $_FILES['my_image3']['name'];
        $img_size = $_FILES['my_image3']['size'];
        $tmp_name = $_FILES['my_image3']['tmp_name'];
        $error = $_FILES['my_image3']['error'];

        $File1 =  $img_name;

        if ($error === 0) {
            // if ($img_size > 1125000) 
                                // if ($img_size > 10 * 1024 * 1024) {
                                    if ($img_size > 100000000) {
                                    // $em = "Sorry, your file is too large.";
                                    // header("Location: ../Register2.php?error=$em");

                                    function function_alert($message) {
                      
                                        // Display the alert box 
                                        echo "<script type='text/javascript'>alert('Sorry, your Authentication Letter file is too large');location='../Register2.php';</script>";
                                    }
                                      
                                      
                                    // Function call
                                    function_alert("Sorry, your file is too large");

                                }
                                else {
                                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                    $img_ex_lc = strtolower($img_ex);
                        
                                    $allowed_exs = array("jpg", "jpeg", "png" , "pdf"); 
                        
                                    if (in_array($img_ex_lc, $allowed_exs)) {
                                        $new_img_name3 = uniqid("PDF-", true).'.'.$img_ex_lc;
                                        $img_upload_path = 'uploads/'.$new_img_name3;
                                        move_uploaded_file($tmp_name, $img_upload_path);
                        

                    // not functional insertion post in another provided 

                                        // Insert into Database
                                        // $sql = "INSERT INTO user_client(comp_id_upload) 
                                                // VALUES('$new_img_name3')";
                                        // mysqli_query($conn, $sql);
                                        // header("Location: ../Register.php");
                                        
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: ../Register.php?error=$em");
                }
            }

        }else {
            $em = "unknown error occurred!";
            header ("Location: ../Register.php?error=$em");
        }
    
    // }else {
    //     header("Location: ../Register.php");
    }



    // note for modal make a universal page for modal erros success and other warning 

?>