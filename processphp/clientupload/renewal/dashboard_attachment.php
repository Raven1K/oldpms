<?php


    if (isset($_POST['btn'])) {




        $img_name = $_FILES['my_image']['name'];
        $img_name2 = $_FILES['my_image']['name'];
 


        // $middlename = $_POST['Lastname'];
     
        // $mobilenum = $_POST['mobilenum'];
        // $email = $_POST['email'];
   


        $id = $_SESSION["client_id"];

   


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

    




        if(empty($uniqid_lap) || empty($uniqid_lap) )
        {
            // echo ' Please Fill in the Blanks ';
            // echo '<script>alert("Please Fill in the Blanks" )</script>';

            //    echo '<input type="button" class="btn" <a href="#" onclick="history.back();"> </a>';
            //   echo '<a href="#" onclick="history.back();"></a>';

           


            // echo '<form action ="../Register.php" method = "POST">
            // <script>alert("Please Fill in the Blanks" )</script>
            // <button type="backpage" name="button"> Backpage </button>
            // </form>';

            // $em = "REGISTERED ID NOT FOUND";
            // header ("Location: ../univmodal.php?error=$em");



        }
        else
        {





    
            $query = $connection->prepare("SELECT * FROM lumber_app_doc WHERE uniqid_lapp=:uniqid_lapp");
            $query->bindParam("uniqid_lapp", $uniqid_lap, PDO::PARAM_STR);
            // $query->execute();
            if ($query->rowCount() > 0) {
                // echo '<p class="error">The email address is already registered!</p>';
                
                // $em = "The File is already registered!";
                // header("Location: univmodal.php?error=$em");
    
    
    
            }


        
         
        if ($query->rowCount() == 0) {

            include 'lumberappid.php';

            $name_app_doc1 = 'Application form or duly accomplished & sworn/notarized.';
            $doc_status = 'For Review';
            $date =  date("d/m/Y") ; 
            $no_doc = '1';
            $doc_app_ind = '0';

            $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(uniqid_lapp,name_app_doc,doc_type_name,lumber_app_id,doc_status,date_applied,Number_of_doc,doc_app_ind)
            VALUES(:uniqid_lapp,:name_app_doc,:doc_type_name,:lumber_app_id,:doc_status,:date_applied,:Number_of_doc,:doc_app_ind)");
            $query->bindParam("uniqid_lapp", $uniqid_lap, PDO::PARAM_STR);
            $query->bindParam("name_app_doc", $new_img_name, PDO::PARAM_STR);
            $query->bindParam("doc_type_name", $name_app_doc1, PDO::PARAM_STR);
            $query->bindParam("lumber_app_id", $idkeylumber, PDO::PARAM_STR);
            $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);
            $query->bindParam("date_applied", $date, PDO::PARAM_STR);
            $query->bindParam("Number_of_doc", $no_doc, PDO::PARAM_STR);
            $query->bindParam("doc_app_ind", $doc_app_ind, PDO::PARAM_STR);
            

            // $query->bindParam("application_form", $new_img_name, PDO::PARAM_STR);
            // $query->bindParam("lumber_supply_contract", $new_img_name2, PDO::PARAM_STR);
            // $query->bindParam("mayor_permit", $new_img_name3, PDO::PARAM_STR);
            // $query->bindParam("annual_bus_plan", $new_img_name4, PDO::PARAM_STR);
            // $query->bindParam("latest_income_tax", $new_img_name5, PDO::PARAM_STR);
            // $query->bindParam("proof_ownership", $new_img_name6, PDO::PARAM_STR);


            // $query->bindParam("inspection_val_id", $id, PDO::PARAM_STR);
            // $query->bindParam("validation_info_id", $id, PDO::PARAM_STR);
            
            
            // $query->bindParam("validator_id", $id, PDO::PARAM_STR);
            $result = $query->execute();
            // $result = $query->execute();
          
        include 'd_attachment2.php';
        include 'd_attachment3.php';
        include 'd_attachment4.php';
        include 'd_attachment5.php';
        include 'd_attachment6.php';
        include 'd_attachment6.1.php';
            // echo '<script src="php/prc_image2.php"></script>';
       


      
    
                    
        include 'file1.php';
        include 'file2.php';
        include 'file3.php';
        include 'file4.php';
        include 'file5.php';
        include 'file6.php';
        include 'file6.1.php';
        // include 'prc_image3.php';

          
// not functional insertion post in another provided 

                    // Insert into Database
                    // $sql = "INSERT INTO user_client(comp_id_upload) VALUES('$new_img_name')";
                    // mysqli_query($conn, $sql);
                    // header("Location: ../Register.php");


                             // -------------------------------------------------------------------------------


$date2 = date('m/d/y');

function getFullMonthNameFromDate($date3){
 $monthName = date('F d, Y', strtotime($date3));
 return $monthName;
      }


     //  $date = $row['date_recieve'] ;
     $date3 = $date2 ;
            getFullMonthNameFromDate($date3);




date_default_timezone_set("Asia/Manila");
$Time = date("h:i:sa");



   $Title = 'Application successfully submitted subject for evaluation.';
   $Details = 'Note: Your application will be evaluated. Complete and correct documents will be officially received and processed,
    while incomplete documents will be returned and end the transaction. You will be notified of the status of your application thru SMS 
    and to your O-LDPMS registered account. For the return application, it is indicated in the notification either lacks requirements or correction of 
    the wrong data entry in the required documents. Upon compliance, you may reapply using the registered O-LDPMS account. ';
 
   $query2 = $connection->prepare("INSERT INTO client_client_document_history(
    lumber_app_id,
    Date,
    Title,
    Details,
    Time

    )
   VALUES (
    :lumber_app_id,
    :Date,
    :Title,
    :Details,
    :Time
    
    )");
   $query2->bindParam("lumber_app_id", $idkeylumber, PDO::PARAM_STR);
   $query2->bindParam("Date", $date2, PDO::PARAM_STR);
   $query2->bindParam("Title", $Title, PDO::PARAM_STR);
   $query2->bindParam("Details", $Details, PDO::PARAM_STR);
   $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result2 = $query2->execute();



// ------------------------------------------------------------------------------------------------



    // function function_alert($message) {
                              
    // echo "<script type='text/javascript'>alert('successfully Saved');location='../../../client/dashboard_doclist.php';</script>";
    // }
    
    // function_alert("Successfully Saved");

      




             
        }
        else 
        
        {
            // $em = "unknown error occurred!";
            // header ("Location: ../clientupload/univmodal.php?error=$em");
        }




             if ($result) {
                echo '<p class="success" > Your registration was successful!</p>';

                

             } else {
                echo '<p class="error">Something went wrong!</p>';
             }
         }
    

 
    

    // note for modal make a universal page for modal erros success and other warning 

?>