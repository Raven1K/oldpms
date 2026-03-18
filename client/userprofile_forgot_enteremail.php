
<?php
//--------------------------Set these paramaters--------------------------




$ch = curl_init();
$parameters = array(
    'apikey' => '4adb66eb294c285396161e92407d55f5', //Your API KEY
    'number' => '09478984921',
    'message' => 'OTOS Notification: Hi there Mr/Ms. BERNARDINA  P. MORENO your TO application w/ ticket no. 4614811534A 2023/01/12 to 2023/01/13 has been APPROVED thank you.',
    'sendername' => 'SEMAPHORE'
);
curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close ($ch);

//Show the server response
echo $output;
                    

?>

<!-- 
<html>
	<head>
		<title>Sending SMS</title>
	</head>

	<body>
			<h3>Sending SMS</h3>
      <form method='GET' action="prc_sms.php">
				Phone <input type='phone' name = 'phone' autocomplete='off' > <br>
				Message <input type='text' name='message'><br>
				<input type='submit' value='Send' name="message"/>
			 </form>
	</body>
</html>
 -->


<?php

// require_once('configmysqli.php');
session_start();
include('../processphp/config.php');
// block if no log in 
          // if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          //   // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

          //     header("location: login.php");
          //     exit;
          //   }
          //   else{

         
          //   }

     




          //     $userid = $_SESSION["user_id"] ;

          //     $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
          //     $lumber_app_qry = mysqli_query($con, $lumber_app);
          //     $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


          //     echo $clientname = $lumber_ap_row['name'] ;
              
          //     echo $user_role = $lumber_ap_row['user_role_id'] ;








?> 




  













<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OLDPMS Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>

  <!-- Custom fonts for this template-->
    <!-- Bootstrap -->
  
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
      
    <!-- sidebar navigation -->        
      <?php

        // require_once('adminsidebar.php');
      ?>        
    <!-- /sidebar navigation -->
      
        <!-- top navigation -->
      
      <?php

        // require_once('adminnavbar.php');
      ?> 
      
        <!-- /top navigation -->

<!-- page content -->
      <div class="right_col" role="main">
        <div class="">
        
    <!-- Top Summary -->
        
     <!--  <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="x_content">
          <div class="top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fas fa-th-list"></i></div>
              <div class="count">50</div>
              </br>
              <h3 class="text-info">User Management</h3>
              <p>List of DENR Users</p>
            </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
            <div class="tile-stats">
              <div class="icon"><i class="fas fa-certificate"></i></div>
              <div class="count">42</div>
              </br>
              <h3 class="text-success">Client Management</h3>
              <p>Enrolled Users</p>
            </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-sort-amount-down-alt"></i></div>
              <div class="count">15</div>
              </br>
              <h3 class="text-primary">Office Management</h3>
              <p>No. of Office</p>
            </div>
            </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
              <div class="icon"><i class="fas fa-solid fa-cog fa-spin"></i></div>
              <div class="count">179</div>
              </br>
              <h3 class="text-warning">Manage Supplier</h3>
              <p>List of Supplier</p>
            </div>
            </div>
              </div>
          </div>
              </div>
            </div>
      </div> -->
    
      <!-- End Top Summary -->
      <?php




      ?>
                        


  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div style="width: 100%;"><br>
          <center>
            <p style="text-align: left; font-size: 25px; color: black; font-weight: 600">Forgot Password</p>
          <p style="margin-top: -15px; text-align: left; font-size: 15px; color: black; font-weight: 400; color: #808080;">Set your name, email, password and other information. <span><a style="color: 0096FF;" href='#';>Learn more.</a></span></p>
        </center>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">







<?php

$result = '0';

if ($result == '0') {

    echo '<form method="post" >';
    echo '<input type="email" class="email" id="email" name="email"  > Your E-mail Address</input>';
    echo '<br> <br>';
    echo '<button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="search">Find account</button>';
    echo '<br> <br>';
    echo '</form>';

    }

  else{

    echo '<form method="post" hidden >';
    echo '<input type="email" class="email" id="email" name="email" hidden > Your E-mail Address</input>';
    echo '<br> <br>';
    echo '<button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="search" hidden>Find account</button>';
    echo '<br> <br>';
    echo '</form>';

    }



?>



<?php

global $otp_val;

if (isset($_GET['message'])) {
  try {


    $email = $_GET['email'];
    $gen_otp = $_GET['gen_otp'];
    $message = isset($_GET['message']) ? $_GET['message'] : null;
    $phoneNumber = isset($_GET['phone']) ? $_GET['phone'] : null;

    if ($message != null && $phoneNumber != null) {
      $url = "http://192.168.50.64:8090/SendSMS?username=Sadiq&password=1234&phone=" . $phoneNumber . "&message=" . urlencode($message);
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $curl_response = curl_exec($curl);

      if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('Error occurred' . var_export($info));
      }

      curl_close($curl);

      $response = json_decode($curl_response);
      if ($response->status == 200) {
        echo 'OTP has been sent';


                echo '<br> <br>';
                echo '<form method="GET"><button type="submit" value="OLDPMS OTP Please use the verification code '.$gen_otp.' If you didnt request this, you can ignore this message" name="message" class="btn btn-danger" data-bs-dismiss="modal">Resend OTP</button></form>';
                echo '<br> <br>';      
                echo '<form method="post">';
                echo '<input type="text"  value="'.$email.'" maxlength="10" name="email_post"> Input (OTP) </input>';
                echo '<br><br>';
                echo '<input type="search" name="otp" maxlength="10" required> Input (OTP) </input>';
                echo '<br> <br>';
                echo '<input  type="text"  value="'.$gen_otp.'" maxlength="10" name="gen_otp" hidden></input>';
                echo '<br><br>';
                echo '<button type="submit" value="" name="change_pass" > Verify </button>';
                echo '</form>';
        
        

        $otp_val = '0';




        // header("Location: userprofile_forgot_enteremail.php");
      } else {
        echo 'Technical Problem';
      }

    }
  } catch (Exception $ex) {
    echo "Exception: " . $ex;
  }

}


?>








<?php


      global $gen_otp;
      global $mobilenumber;
      global $email;





if (isset($_POST['search'])){


   $email = $_POST['email'];

   $query = $connection->prepare("SELECT * FROM user_client WHERE email=:email");
   $query->bindParam("email", $email, PDO::PARAM_STR);
   $query->execute();
   $result = $query->fetch(PDO::FETCH_ASSOC);
   if (!$result) {
       // echo '<p class="error">Email and Password combination is wrong!</p>';

    //  echo "Email Account not Found!";

  } else {

    $email = $_POST['email'];

    function generateNumericOTP($n) {
      
      // Take a generator string which consist of
      // all numeric digits
      $generator = "1357902468";
    
      // Iterate for n-times and pick a single character
      // from generator and append it to $result
        
      // Login for generating a random character from generator
      //     ---generate a random number
      //     ---take modulus of same with length of generator (say i)
      //     ---append the character at place (i) from generator to result
    
      $result = "";
    
      for ($i = 1; $i <= $n; $i++) {
          $result .= substr($generator, (rand()%(strlen($generator))), 1);
      }
    
      // Return result
      return $result;
  }
    
  // Main program
  $n = 6;
  $gen_otp = (generateNumericOTP($n));










    $mobilenumber = $result['mobilenum'];

    echo '<form method="GET">';
    echo '<input hidden type="phone" name="phone" autocomplete="off" value='.$mobilenumber.' > <br>';
    echo '<input hidden type="text" name="message" value="Please use the verification code 89587 If you didnt request this, you can ignore this message"><br>' ;

    echo '<input type="text" name="email" value="'.$email.'" maxlength="10" ></input>';
    echo '<input type="text" name="gen_otp" value="'.$gen_otp.'" maxlength="10" ></input>';

    echo '<button type="submit" value="OLDPMS OTP Please use the verification code '.$gen_otp.' If you didnt request this, you can ignore this message" name="message" class="btn btn-danger" data-bs-dismiss="modal">Send OTP</button>';
    
    
    echo '<br> <br>' ;
    echo '</form>';

    $email = $_POST['email'];


    


  }




// $lumber_app = "SELECT * FROM user_client where email = '$email'";
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);


//  $_ID = $lumber_ap_row2['client_id'];

//   if (!$_ID) {
//     // echo '<p class="error">Email and Password combination is wrong!</p>';

//     echo "Account not found please try again";

//   }




$lumber_app = "SELECT * FROM user_client where email = '$email'";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$email = $lumber_ap_row['email'];




}





// if ($otp_val == '0') {

//   echo '<br> <br>';
//   echo '<form method="GET"><button type="submit" value="OLDPMS OTP Please use the verification code '.$gen_otp.' If you didnt request this, you can ignore this message" name="message" class="btn btn-danger" data-bs-dismiss="modal">Resend OTP</button></form>';
//   echo '<br> <br>';



//   echo '<form method="post">';
//   echo '<input type="text"  value="'.$email.'" maxlength="10" name="email_post"> Input (OTP) </input>';
//   echo '<input type="search" name="otp" maxlength="10" required> Input (OTP) </input>';
//   echo '<br> <br>';
//   echo '<button type="submit" value="" name="change_pass" > Verify </button>';

//   echo '</form>';


// }





?>


<?php

          if (isset($_POST['change_password'])) {

            $email = $_POST['email'];
            $cpass = $_POST['cpassword'];
            $pass = $_POST['password'];

       

            if (($cpass)==($pass) ){

              $password =  password_hash($pass, PASSWORD_BCRYPT);
              $sql = "UPDATE user_client SET password = :password
              WHERE email = '$email'";
              $stmt = $connection->prepare($sql);
              $stmt->execute(array(
             ':password' => $password,));
  
            }else{

              echo 'Password not match';

            }







            
          }


?>


<?php

    if(isset($_POST['change_pass'])){


    $email = $_POST['email_post'];

    $gen_otp = $_POST['gen_otp'];
    $otp = $_POST['otp'];

    if (($gen_otp) == ($gen_otp)) {

      echo '<form method="post">';
      echo '<br><br>';
      echo '<input  type="text"  value="' . $email . '" name="email">Email</input>';
      echo '<br><br>';
      echo '<input type="password" name="password" value="" >New Password</input>';
      echo '<br><br>';
      echo '<input type="password" value="" name="cpassword"  >Confirm Password</input>';
      echo '<br><br>';

      echo '<button type="submit" value="" name="change_password" > OK </button>';
      echo '</form>';



  } else {




    echo 'INVALID OTP';

  }



    }

?>




      <!-- <br>  <br>

      <input type="password" class="password" name="password" required> Your New password</input>
     
      <br>  <br>

      <label type="text" > To confirm your accout enter your contact number with corresponding (OTP) </label>

      <br>  <br>

      <input type="password" class="password" name="cpassword" required> Confirm Your New password</input>
     
     <br>  <br>

     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button> -->



      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
</div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>   
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>    
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
    <script src="main.js"></script>




  <?php 
      // require_once 'adminfooter.php';
  ?>
  <script type="text/javascript">
 document.getElementById("canceledit").style.visibility = "hidden";

  const realFileBtn = document.getElementById("realfileinput");
  const customBtn = document.getElementById("realfileBtn");
  const customTxt = document.getElementById("realfileTxt");

    customBtn.addEventListener("click", function() {
        realFileBtn.click();
  });

     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        } 
 
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })

function enable(){
  document.getElementById("fnames").disabled = false;
  document.getElementById("lastnames").disabled = false;
  document.getElementById("emails").disabled = false;
  document.getElementById("passwords").disabled = false;
  document.getElementById("cpasswords").disabled = false;
  document.getElementById("aboutmes").disabled = false;
  document.getElementById("canceledit").style.visibility = "visible";

  }

  function disable(){
  document.getElementById("fnames").disabled = true;
  document.getElementById("lastnames").disabled = true;
  document.getElementById("emails").disabled = true;
  document.getElementById("passwords").disabled = true;
  document.getElementById("cpasswords").disabled = true;
  document.getElementById("aboutmes").disabled = true;
  document.getElementById("canceledit").style.visibility = "hidden";
  }
    

  </script>
  </body>

</html>