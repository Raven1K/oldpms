
<?php
    session_start();
    include('../config.php');
    if (isset($_POST['btn'])) {




        $perm_fname = $_POST['perm_fname'];
        $perm_lname = $_POST['perm_lname'];
        $perm_email = $_POST['perm_email'];
        $perm_contact =  $_POST['perm_contact'];
        // $permit_type = $_POST['permit_type'];
        // $application_type = $_POST['application_type'];


        if(isset($_POST['permit_type'])) {
            $permit_type = $_POST['permit_type'];
            
            if (empty($permit_type)) {
                echo '<script>alert("Permit type is empty!");</script>';
            }
        } else {
            echo '<script>alert("Permit type is not set!");</script>';
            echo 'history.back();</script>';
        }


        
        



        // $application_type = $_POST['application_type'];
        $bussiness_name = $_POST['bussiness_name'];

    


        $purok = $_POST['purok'];

        include 'uniqid.php';


        
        // $middlename = $_POST['Lastname'];
     
        // $mobilenum = $_POST['mobilenum'];
        // $email = $_POST['email'];
   


        $id = $_SESSION['client_id'];
 

         $id;


         $prove_code = $_POST['province'] ?? '';
         $idmuncity = $_POST['citymun'] ?? '';
         $brgycode_search = $_POST['brgy'] ?? '';
         
         // Check if any of the variables are empty
         if (empty($prove_code) || empty($idmuncity) || empty($brgycode_search)) {
            echo '<script>alert("Something went Wrong Please Check your Address"); window.location.href = "../../client/dashboard_clientnew.php";</script>';

             exit();
         }
       
         

        // for Barangay Code 

        $citymun = "SELECT * FROM brgy where brgy_code = $brgycode_search";
        $citymun_qry = mysqli_query($con, $citymun);
        $citymun_row = mysqli_fetch_assoc($citymun_qry);
        $brgycode = $citymun_row['brgy_code'];
        $brgy_str = $citymun_row['brgy_name'];


         $purok;
         $brgy_str;

        // for Muncity Code 

        $citymunstr = "SELECT * FROM muncity where mun_code = $idmuncity";
        $citymunstr_qry = mysqli_query($con, $citymunstr);
        $citymunstr_row = mysqli_fetch_assoc($citymunstr_qry);
        $citymunstr_show = $citymunstr_row['muncity_name'];
        $citymunstrOfficecover_show = $citymunstr_row['office_cover'];



        $citymunstr = "SELECT * FROM office where station = '$citymunstrOfficecover_show'";
        $citymunstr_qry = mysqli_query($con, $citymunstr);
        $citymunstr_row2 = mysqli_fetch_assoc($citymunstr_qry);
        $office_under = $citymunstr_row2['office_under'];






        //  $citymunstr_show;
        //  $citymunstrOfficecover_show;

 
        // for Province Code 
        $provincestr = "SELECT * FROM province where prov_code  = $prove_code";
        $provincestr_qry = mysqli_query($con, $provincestr);
        $provincestr_row = mysqli_fetch_assoc($provincestr_qry);
        $provincestrstr_show = $provincestr_row['prov_name'];

         $provincestrstr_show;


  


        
        // $citymun = $_POST['email'];
        // $barangay = $_POST['email'];
        // $zipcode = $_POST['email'];
        // $streetprk = $_POST['email'];
        // $img_name = $_FILES['my_image']['name'];



        // $idmun = '10';




    }
    else 
    {
        header("Location: ../Register.php");
    }

    




        if(empty($perm_fname) || empty($perm_lname) )
        {
            // echo ' Please Fill in the Blanks ';
            // echo '<script>alert("Please Fill in the Blanks" )</script>';

            //    echo '<input type="button" class="btn" <a href="#" onclick="history.back();"> </a>';
            //   echo '<a href="#" onclick="history.back();"></a>';

           


            // echo '<form action ="../Register.php" method = "POST">
            // <script>alert("Please Fill in the Blanks" )</script>
            // <button type="backpage" name="button"> Backpage </button>
            // </form>';

            $em = "Please Fill in the Blanks |";
            header ("Location: ../univmodal.php?error=$em");



        }
        else
        {





    
            $query = $connection->prepare("SELECT * FROM lumber_application WHERE perm_email=:perm_email");
            $query->bindParam("perm_email", $perm_email, PDO::PARAM_STR);
            // $query->execute();
            if ($query->rowCount() > 0) {
                // echo '<p class="error">The email address is already registered!</p>';
                
                $em = "The email address is already registered!";
                header("Location: univmodal.php?error=$em");
    
    
    
            }


        
         
            if ($query->rowCount() == 0) {

            $date =  date("m/d/Y") ; 
            
             $c = ($purok) . ', ' . ($brgy_str) . ', ' . ($citymunstr_show) . ', ' . ($provincestrstr_show) ;

            // echo $c;
            $Status_ = 'New' ;
            $Flow_stat = '1' ;

            // $stat_str = 'For Acknowledgement';

            $stat_str = 'For Review R-CENRO';
            $Application_status = 'On Process';


            $query = $connection->prepare("INSERT INTO lumber_application(full_address, uniqid_lapp, bussiness_name,Permit_Type,perm_contact,perm_fname,perm_lname,prov_code,brgy_code,muncity_code,client_id,purok,perm_email,Status, Flow_stat, date_applied, Status_, Application_status, Office, office_under)
            VALUES(:full_address,:uniqid_lapp,:bussiness_name,:Permit_Type,:perm_contact,:perm_fname,:perm_lname,:prov_code,:brgy_code,:muncity_code,:client_id,:purok,:perm_email, :Status, :Flow_stat, :date_applied, :Status_, :Application_status, :Office, :office_under)");

            $query->bindParam("client_id", $id, PDO::PARAM_STR);
            $query->bindParam("perm_fname", $perm_fname, PDO::PARAM_STR);
            $query->bindParam("perm_lname", $perm_lname, PDO::PARAM_STR);
            $query->bindParam("prov_code",$prove_code, PDO::PARAM_STR);
            $query->bindParam("muncity_code", $idmuncity, PDO::PARAM_STR);
            $query->bindParam("brgy_code", $brgycode, PDO::PARAM_STR);
            $query->bindParam("perm_email", $perm_email, PDO::PARAM_STR);
            $query->bindParam("purok", $purok, PDO::PARAM_STR);
            $query->bindParam("perm_contact", $perm_contact, PDO::PARAM_STR);
            $query->bindParam("Permit_Type", $permit_type, PDO::PARAM_STR);
            $query->bindParam("bussiness_name", $bussiness_name, PDO::PARAM_STR);
            $query->bindParam("uniqid_lapp", $uniqid_lap, PDO::PARAM_STR);
            $query->bindParam("full_address", $c, PDO::PARAM_STR);
            $query->bindParam("Status", $stat_str, PDO::PARAM_STR);
            $query->bindParam("Flow_stat", $Flow_stat, PDO::PARAM_STR);
            $query->bindParam("date_applied", $date, PDO::PARAM_STR);
            $query->bindParam("Status_", $Status_, PDO::PARAM_STR);
            $query->bindParam("Application_status", $Application_status, PDO::PARAM_STR);
            $query->bindParam("Office", $citymunstrOfficecover_show, PDO::PARAM_STR);
            $query->bindParam("office_under", $office_under, PDO::PARAM_STR);


            
     
            

        
            $result = $query->execute();
            // $result = $query->execute();
          

            // echo '<script src="php/prc_image2.php"></script>';
       


      
    
                    
        include 'file1.php';
        include 'file2.php';
        include 'file3.php';
        include 'file4.php';
        include 'file5.php';
        include 'file6.php';
        include 'file6.1.php';


        // include 'prc_image3.php';
        include 'dashboard_attachment.php';

          
// not functional insertion post in another provided 

                    // Insert into Database
                    // $sql = "INSERT INTO user_client(comp_id_upload) VALUES('$new_img_name')";
                    // mysqli_query($conn, $sql);
                    // header("Location: ../Register.php");





                                                                                                            function function_alert($message) {

                                                                                                                echo "<script type='text/javascript'>alert('successfully Submitted');location='../../client/dashboard_doclist.php';</script>";
                                                                                                                                }
                                                                                                                function_alert("Successfully Submitted");





                     
                    // header( "Location: ../../client/dashboard_doclist.php" ) ;
             
        }
        else 
        
        {
            $em = "unknown error occurred!";
            header ("Location: ../clientupload/univmodal.php?error=$em");
        }




             if ($result) {

             } else {
                echo '<p class="error">Something went wrong!</p>';
             }
         }
    




?>