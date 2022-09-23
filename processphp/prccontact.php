<?php 

    require_once('config.php');

    if(isset($_POST['btn']))
    {
        $full_name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];



        if(empty($full_name) || empty($email) || empty($subject) || empty($message))
        {
            // echo ' Please Fill in the Blanks ';
            // echo '<script>alert("Please Fill in the Blanks" )</script>';

            //    echo '<input type="button" class="btn" <a href="#" onclick="history.back();"> </a>';
            //   echo '<a href="#" onclick="history.back();"></a>';

            echo '<form action ="index.php" method = "POST">
            <script>alert("Please Fill in the Blanks" )</script>
            <button type="backpage" name="button"> Backpage </button>
            </form>';



            // echo '<a class="btn btn-primary" href="edit_old.php?user_id" </a>  ';
            // header("Location: index.php");
        }
        else
        {
         
 
            
                $query = "insert into contact_us (full_name,email,subject,message) values ('$full_name','$email','$subject','$message')";
                $result = mysqli_query($con,$query);
               

                if($result)
                {
                    // echo ' Your Record Has Been Saved in the Database ';
                   
                    echo '<a href="../index.php" onclick="history.back();">
                    <script>alert("Your Record Has Been Saved in the Database" ) </script>
                    <button type="backpage" name="button"> OK </button>
                    </form>';
                }
                else
                {
                    echo ' Please Check Your Query ';
                }
                
            }
        }
    


?>