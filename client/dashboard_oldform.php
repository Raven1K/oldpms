<?php
// Initialize the session

require_once "../processphp/config.php";
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: ../login.php");
    exit;



}



// if ( ! isset($_GET['email']) ) {
  // $_SESSION['error'] = "Missing user_id";

  $_SESSION["client_id"];
  // $em =  $_SESSION["client_id"];
  // header ("Location: ../processphp/univmodal.php?error=$em");
 
  // header('Location: ../index.php');
  // return;


{


  $id = $_SESSION["client_id"];

  $_SESSION["uniquid_lap"] =  uniqid();
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
  } else {


      // $password_hash = password_hash($password, PASSWORD_BCRYPT);

      // echo(htmlentities($result['password']));

      // $em = $result['email'];;
      // header ("Location: ../processphp/univmodal.php?error=$em");
      // echo(htmlentities($password_hash));

      // echo(htmlentities(password_verify($password, $result['password'])));
      $id = $result['client_id'];

      $_POST['fname'] = $id;
      // echo "<tr><td>" ;
      // echo  (htmlentities($id));
      // echo("</td><td>");</form
      // echo("</td></tr>\n");
  }


    }

?>

<!doctype html>
<html lang="en">
 <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>OLDPMS</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <link href="css/custom_styles.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="../main/css/sb-admin-2.css"> -->
  </head>
  

  
<body style="background: #ecedf0;">
<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
  <form action="../processphp/prc_logout.php"  method="post" role="form" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <div id="wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
              <div class="container-fluid">
                <a href="index.php"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <a class="navbar-brand" href="#"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
                </div>
              </div>
            </nav>

        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
        <?php
// Initialize the session
require_once "../processphp/config.php";


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
} else {


    // $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // echo(htmlentities($result['password']));

    // $em = $result['email'];;
    // header ("Location: ../processphp/univmodal.php?error=$em");
    // echo(htmlentities($password_hash));

    // echo(htmlentities(password_verify($password, $result['password'])));
    $clientname = $result['firstname'];

    $lastname = $result['lastname'];
    $email = $result['email'];
    $mobileno = $result['mobilenum'];

    $_POST['fname'] = $clientname;




    $sql = "SELECT * FROM `user_client`";
    $all_categories = mysqli_query($con,$sql);

    while ($category = mysqli_fetch_array(
      $all_categories,MYSQLI_ASSOC)):;

    endwhile;

    // echo "<tr><td>" ;
    // echo  (htmlentities($id));
    // echo("</td><td>");
    // echo("</td></tr>\n");

// with middle name
    
}



?>
     <ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" ><i class="fa-solid fa-circle-user"></i> <?php  echo  "<b>{$clientname}</b> </a>"; ?></div></div>
       <li><a href="dashboard_requirement.php">Requirements</a></li>
       <li><a href="dashboard_doclist.php">Document Status</a></li>
       <!-- <li><a href="doctracker.php" style="font-size: 15px;">Track your Application</a></li> -->
         <li style="padding-left: 30px;"><i style="color: white;" class="fa-solid fa-right-from-bracket"></i><button style="color: white;" class="btn"  name="btn" data-target="#logoutModal" data-toggle="modal">Logout</button></li><br><br>
     <?php
// Initialize the session
require_once "../processphp/config.php";


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
} else {


    // $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // echo(htmlentities($result['password']));

    // $em = $result['email'];;
    // header ("Location: ../processphp/univmodal.php?error=$em");
    // echo(htmlentities($password_hash));

    // echo(htmlentities(password_verify($password, $result['password'])));
    $clientname = $result['firstname'];

    $lastname = $result['lastname'];
    $email = $result['email'];
    $mobileno = $result['mobilenum'];

    $_POST['fname'] = $clientname;




    $sql = "SELECT * FROM `user_client`";
    $all_categories = mysqli_query($con,$sql);

    while ($category = mysqli_fetch_array(
      $all_categories,MYSQLI_ASSOC)):;

    endwhile;

    // echo "<tr><td>" ;
    // echo  (htmlentities($id));
    // echo("</td><td>");
    // echo("</td></tr>\n");

// with middle name
    
}



?> 
</form>
<div id='bodybox'>

  <h5 style="color: white; font-weight: 600; font-size: 15px; padding: 5px; text-align: center;"> OLDPMS Support</h5>
  <div id='chatborder'>
    <p id="chatlog7" class="chatlog">&nbsp;</p>
    <p id="chatlog6" class="chatlog">&nbsp;</p>
    <p id="chatlog5" class="chatlog">&nbsp;</p>
    <p id="chatlog4" class="chatlog">&nbsp;</p>
    <p id="chatlog3" class="chatlog">&nbsp;</p>
    <p id="chatlog2" class="chatlog">&nbsp;</p>
    <p id="chatlog1" class="chatlog">&nbsp;</p>

    <div class="scrollmenu" style="overflow: auto;
  white-space: nowrap; background: #ecedf0; padding: 5px;">
  <a type="button" onclick="myFunction()" id="suggest1" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">What is your name?</a>
  <a type="button" onclick="myFunction2()" id="suggest2" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">Can you help me?</a>
  <a type="button" onclick="myFunction3()" id="suggest3" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">How to file application?</a>
</div>
    <input type="text" name="chat" id="chatbox" placeholder="Hi there! Type here to talk to me." onfocus="placeHolder()">
  </div>
 
</div>

</nav>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                      <!-- START -->

                      <!-- CONTENT -->
                              <!-- END -->
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  

  <!-- <form action="#" class="form"> -->
  <form action="../processphp/clientupload/prc_clientdashboard_old.php" class="form" method="post" role="form"  enctype="multipart/form-data" >

  <input class="form-control" type="file" id="realfile" name="my_image"  hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile2" hidden="hidden" accept="Application/pdf" name="my_image2" value="upload"/>
    <input type="file" id="realfile3" hidden="hidden" name="my_image3" accept="Application/pdf" value=""/>
    <input type="file" id="realfile4" hidden="hidden" name="my_image4" accept="Application/pdf" value=""/>
    <input type="file" id="realfile5" hidden="hidden" name="my_image5" accept="Application/pdf" value=""/>
    <input type="file" id="realfile6" hidden="hidden" name="my_image6" accept="Application/pdf" value=""/>
    <input type="file" id="realfile7" hidden="hidden" name="my_image7" accept="Application/pdf" value=""/>
    <!-- <input type="file" id="realfile6" hidden="hidden" name="my_image6" accept="Application/pdf" value=""/> -->
    <!-- <input type="file" id="realfile7" hidden="hidden" name="my_image7" accept="Application/pdf" value=""/> -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
      

      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div
          class="progress-step progress-step-active"
          data-title="Basic Information"
        ></div>
        <div class="progress-step" data-title="Attachment"></div>
      </div>

      <!-- Requirements -->
      <div class="form-step form-step-active">
        <div class="input-group">
         <div class="container mt-3">
               <h3 class="text-center" style="font-family: system-ui; font-weight: 600;"><i class="fa-regular fa-user" style="margin-right: 15px; margin-left: 12px;"></i>Applicant's Basic Information</h3>
         <div class="row">
          <div class="col"><br>



          <!-- <div class="row"> -->
          <!-- <div class="col"> -->
          <!-- <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px;" name="application_type" > -->
              <!-- <option selected>Application Type</option> -->
              <!-- <option value="New">New</option> -->
              <!-- <option value="Renewal">Renewal</option> -->
            <!-- </select> -->
          <!-- </div> -->

          <input  style="width: 330px;" type="text" id="firstn" class="form-control" placeholder="First Name*" aria-label="First name"  name="perm_fname" >
          </div>
          <div class="col"><br>
          <input  style="width: 330px;" type="text" id="lastn" class="form-control" placeholder="Last Name*" aria-label="Last name"  name="perm_lname" >
          </div>
        </div>
         <div class="row">
          <div class="col">
          <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px;" name="permit_type">
              <option disabled selected>Permit Type</option>
              <option value="Individual">Individual</option>
              <option value="Association">Association</option>
            </select>
          </div>



          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" id="bname" placeholder="Business Name*" aria-label="Business name" name="bussiness_name">
          </div>
        </div>
          <div class="row">
          <div class="col">
          <select class="form-select" id="province" name="province" style="margin-top: 10px; width: 330px; ">
              <option disabled selected >Province</option>

              <?php           
              
              $sql = "SELECT * FROM `province` ORDER BY prov_name ASC";
              // user_client ORDER BY lastname ASC"; 
              $province = mysqli_query($con,$sql);
              ?>

             <?php   while ($row = mysqli_fetch_array($province,MYSQLI_ASSOC)):;?>

              <option value="<?php echo $row["prov_code"];?>">  <?php echo $row["prov_name"];?> </option>

              <?php endwhile;?>




            </select>

          </div>
          <div class="col">
          <select class="form-select" id="citymun" name="citymun" style="margin-top: 10px; width: 330px; ">
              <option disabled selected>City/Municipality</option>
            </select>
          </div>
        </div>
          <div class="row">
          <div class="col">
            <select class="form-select"  id="brgy" name="brgy" style="margin-top: 10px; width: 330px; ">
              <option disabled selected>Barangay</option>
            </select>
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" id="zip" name="zips"  type="text"  class="form-control" placeholder="Zip Code" aria-label="Zip code" readonly>
          </div>
          <script> 
              
              $('#province').on('change',function() {
                
                var province_id = this.value;
              // console.log(province_id);
            
              $.ajax({
                   
                   url:"provstate.php",
                   type:"POST",
                   data:{ 
                    province_data: province_id
                  },
                success:function(result){
                  $('#citymun').html(result);
                  console.log(result);
                }
              })

              });

              
              $('#citymun').on('change',function() {
                
               var citymun_id = this.value;
               console.log(citymun_id);
              

              $.ajax({
                   
                   url:"provmun.php",
                   type:"POST",
                   data:{ 
                    citymun_data: citymun_id
                  },
                success:function(result){
                  $('#brgy').html(result);
                  // console.log(result);
                }
              })

              });



              $('#citymun').on('change',function() {
                
                var zip_id = this.value;
              // console.log(zip_id);
              

              $.ajax({
                   
                   url:"provzip.php",
                   type:"POST",
                   data:{ 
                   zip_data: zip_id
                  },
                success:function(result){
 
               
                $('#zip').val(result);
                   console.log(result);
                }
              })
              });




              // $('#brgy').on('change',function() {
                
              //   var brgy_id = this.value;
              // // console.log(zip_id);
              

              // $.ajax({
                   
              //      url:"brgy_id.php",
              //      type:"POST",
              //      data:{ 
              //       brgy_data: brgy_id
              //     },
              //   success:function(result){
 
               
               
              //  $('#brgy').val(result);
                  
             
              //      console.log(result);
              //   }
              // })
              // });
              </script>
    

        </div>
          <div class="row">
          <div class="col">
          <input style="width: 685px; margin-top: 10px;" type="text" class="form-control" id="street"  placeholder="Street/Corner/Purok*" aria-label="Street/corner/purok" name="purok" >
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" id="mail"  placeholder="E-Mail (Optional)*" aria-label="Email" value="<?php echo $email; ?>" name="perm_email">
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" id="no" placeholder="Mobile No.*" aria-label="Mobile no" value="<?php echo $mobileno; ?>" name="perm_contact">
          </div>
        </div>

            </div>
          </div>
        <div class="">
          <center><a href="#" class="custom_btn btn-next width-50" style="font-family: system-ui; font-weight: 500; font-size: 16px;">Next<i class="fa-solid fa-circle-arrow-right" style="margin-left: 10px;"></i></a></center>
        </div>
      </div>

      <!-- Basic Information -->

 

      <div class="form-step">
        <div class="input-group">
          <div>
            <h3 style="font-family: system-ui; font-weight: 600"><i class="fa-regular fa-file" style="margin-right: 13px;"></i>Upload Documents (NEW)</h3>
            <label style="font-size: 17px;">Click "Browse" to upload document. <br><span style="color: red; font-size: 15px;"><i>Note: Only PDF File not larger than 10 MB is allowed.</i></span></label>
          </div>
    <table class="table table-bordered" style="margin-top: 10px;">
  <tr>
    <th colspan="2" style="background: #597EFB; color: #fff; font-weight: 300;">Required Documents</th>
    <th style="background: #597EFB; color: #fff; font-weight: 300;">File Size</th>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text" style="font-size: 13px; color: #808080;">1. Application form duly accomplished & sworn/notarized.<span style="color: red; font-weight: 500;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;" id="mb1"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text2" style="font-size: 12px; color: #808080;">2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealers.<span style="font-weight: 500; color: red;"><i> *Required</i></span><span style="font-weight: 500; color: black;"> (not required if the applicant is a mini-sawmill permittee)</span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button2" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image2">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px; "id="mb2"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text3" style="font-size: 13px; color: #808080;">3. Mayor's Permit/Business Permit and DTI Permit (Single PDF File)<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button3" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image3">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb3"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text4" style="font-size: 13px; color: #808080;">4. Annual Business Plan/Program<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button4" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image4">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb4"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text5" style="font-size: 13px; color: #808080;">5. Latest Income Tax Return<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button5" class="btn btn-primary btn-sm" style="width: 100px; height:30px;"name="my_image5">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb5"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text6" style="font-size: 13px; color: #808080;">6. Picture's of Establishment inspected/verified by CENRO concerned duly subscribed/sworn<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button6" class="btn btn-primary btn-sm" style="width: 100px; height:30px;"name="my_image6">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb6"></td>
  </tr>

  <!-- to remove -->
   <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text7" style="font-size: 13px; color: #808080;">7. Proof of Ownership of the lumberyard or consent/agreement with the owner<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button7" class="btn btn-primary btn-sm" style="width: 100px; height:30px;"name="my_image7">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb7"></td>
  </tr>
</table>
        </div>
        <div class="btns-group">
          <a href="#" class="custom_btn_prev custom_btn btn-prev">Back</a>
          <button type="button submit" class="btn btn-success" name="btn" data-toggle="modal" disabled="true" id="acceptBtn" >Submit</button>
          <!-- <button class="btn  btn-success"  name="btn" data-toggle="modal"> Submit </button> -->
        </div>
      </div>
            </form>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11;">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style=" background-color: #d1e7dd;">
    <div class="toast-header" style=" background-color: #DFF0FA; color: #5C7585">
      <strong class="me-auto"><i class="fa-solid fa-circle-check text: #5C7585;"></i> File Submitted!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
//   window.onbeforeunload = function() {
//   return "You sure you want to proceed?";
// };



  const realFileBtnAccept = document.getElementById("acceptBtn");
  const realFileBtn = document.getElementById("realfile");
  const realFileBtn2 = document.getElementById("realfile2");
  const realFileBtn3 = document.getElementById("realfile3");
  const realFileBtn4 = document.getElementById("realfile4");
  const realFileBtn5 = document.getElementById("realfile5");
  const realFileBtn6 = document.getElementById("realfile6");
  const realFileBtn7 = document.getElementById("realfile7");

  const customBtn = document.getElementById("custom-button");
  const customBtn2 = document.getElementById("custom-button2");
  const customBtn3 = document.getElementById("custom-button3");
  const customBtn4 = document.getElementById("custom-button4");
  const customBtn5 = document.getElementById("custom-button5");
  const customBtn6 = document.getElementById("custom-button6");
  const customBtn7 = document.getElementById("custom-button7");

  const customTxt = document.getElementById("custom-text");
  const customTxt2 = document.getElementById("custom-text2");
  const customTxt3 = document.getElementById("custom-text3");
  const customTxt4 = document.getElementById("custom-text4");
  const customTxt5 = document.getElementById("custom-text5");
  const customTxt6 = document.getElementById("custom-text6");
  const customTxt7 = document.getElementById("custom-text7");

  const customTxtMB = document.getElementById("mb1");
  const customTxtMB2 = document.getElementById("mb2");
  const customTxtMB3 = document.getElementById("mb3");
  const customTxtMB4 = document.getElementById("mb4");
  const customTxtMB5 = document.getElementById("mb5");
  const customTxtMB6 = document.getElementById("mb6");
  const customTxtMB7 = document.getElementById("mb7");



  customBtn.addEventListener("click", function() {
        realFileBtn.click();
  });
  realFileBtn.addEventListener("change", function(){
    let files = realFileBtn.files;
    var totalBytes = this.files[0].size;

    if (files.length > 0){
      for (var i = 0; i < this.files.length; i++){
         customTxt.style.color="red";
            customTxt.innerHTML = "<span style = 'color:black'>" + "1. Application form duly accomplished & sworn/notarized. <br>" + "</span>" + this.files.item(i).name;
            customBtn.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";
                  }
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB.innerHTML = 'File exceed 10 MB';
        customTxtMB.style.color = "red";
        customTxt.innerHTML = this.files.item(i).name;
        customTxt.style.color="red";
        return;
      }
    }
    if (totalBytes < 1000000){
      var _size = Math.floor(totalBytes/1000) + ' KB';
    }else {
      var _size = Math.floor(totalBytes/1000000) + ' MB'; 
    }
    
    customTxtMB.innerHTML = _size;
    customTxtMB.style.color = "#808080";
        if (realFileBtn.value) {
            customTxt.style.color = "#4285F4";
            customTxt.innerHTML = this.files.item(i).name;
        } else {
          customTxt.innerHTML = "1. Application form duly accomplished & sworn/notarized. ";
          customTxt.style.color = "#808080";
        }
  });

  customBtn2.addEventListener("click", function() {
        realFileBtn2.click();
  });
  realFileBtn2.addEventListener("change", function(){
    let files = realFileBtn2.files;
    var totalBytes2 = this.files[0].size;
 for (var i = 0; i < this.files.length; i++){
         customTxt2.style.color="red";
            customTxt2.innerHTML = "<span style = 'color:black'>" + "2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealers. (not required if the applicant is a mini-sawmill permittee)<br>" + "</span>" + this.files.item(i).name;
              customBtn2.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";;
      }

    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB2.innerHTML = 'File exceed 10 MB';
        customTxtMB2.style.color = "red";
        customTxt2.innerHTML = this.files.item(i).name;
        customTxt2.style.color="red";
        return;
      }
    }

       if (totalBytes2 < 1000000){
      var _size = Math.floor(totalBytes2/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes2/1000000) + ' MB'; 
    }

    customTxtMB2.innerHTML = _size;
    customTxtMB2.style.color = "#808080";
        if (realFileBtn2.value) {
            customTxt2.style.color = "#4285F4";
            customTxt2.innerHTML = this.files.item(i).name;
        } else {
          customTxt2.innerHTML = "2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealers. (not required if the applicant is a mini-sawmill permittee)";
          customTxt2.style.color = "#808080";
        }
  });

    customBtn3.addEventListener("click", function() {
        realFileBtn3.click();
  });
  realFileBtn3.addEventListener("change", function(){
    let files = realFileBtn3.files;
    var totalBytes3 = this.files[0].size;
    for (var i = 0; i < this.files.length; i++){
         customTxt3.style.color="red";
            customTxt3.innerHTML = "<span style = 'color:black'>" + "3. Mayor's Permit/Business Permit <br>" + "</span>" + this.files.item(i).name;
              customBtn3.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";;
      }
    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB3.innerHTML = 'File exceed 10 MB';
        customTxtMB3.style.color = "red";
        customTxt3.innerHTML = this.files.item(i).name;
        customTxt3.style.color="red";
        return;
      }
    }

       if (totalBytes3 < 1000000){
      var _size = Math.floor(totalBytes3/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes3/1000000) + ' MB'; 
    }

    customTxtMB3.innerHTML = _size;

    customTxtMB3.style.color = "#808080";
        if (realFileBtn3.value) {
            customTxt3.style.color = "#4285F4";
            customTxt3.innerHTML = this.files.item(i).name;
        } else {
          customTxt3.innerHTML = "3. Mayor's Permit/Business Permit ";
          customTxt3.style.color = "#808080";
        }
  });


   customBtn4.addEventListener("click", function() {
        realFileBtn4.click();
  });
  realFileBtn4.addEventListener("change", function(){
    let files = realFileBtn4.files;
     var totalBytes4 = this.files[0].size;

      for (var i = 0; i < this.files.length; i++){
         customTxt4.style.color="red";
            customTxt4.innerHTML = "<span style = 'color:black'>" + "4. Annual Business Plan/Program <br>" + "</span>" + this.files.item(i).name;
             customBtn4.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";;
      }

    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB4.innerHTML = 'File exceed 10 MB';
        customTxtMB4.style.color = "red";
        customTxt4.innerHTML = this.files.item(i).name;
        customTxt4.style.color="red";
        return;
      }
    }
    
       if (totalBytes4 < 1000000){
      var _size = Math.floor(totalBytes4/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes4/1000000) + ' MB'; 
    }

    customTxtMB4.innerHTML = _size;

    customTxtMB4.style.color = "#808080";
        if (realFileBtn4.value) {
            customTxt4.style.color = "#4285F4";
            customTxt4.innerHTML = this.files.item(i).name;
        } else {
          customTxt4.innerHTML = "4. Annual Business Plan/Program ";
          customTxt4.style.color = "#808080";
        }
  });

     customBtn5.addEventListener("click", function() {
        realFileBtn5.click();
  });
  realFileBtn5.addEventListener("change", function(){
    let files = realFileBtn5.files;
      var totalBytes5 = this.files[0].size;
        for (var i = 0; i < this.files.length; i++){
         customTxt5.style.color="red";
            customTxt5.innerHTML = "<span style = 'color:black'>" + "5. Latest Income Tax return <br>" + "</span>" + this.files.item(i).name;
             customBtn5.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";;
      }

    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB5.innerHTML = 'File exceed 10 MB';
        customTxtMB5.style.color = "red";
        customTxt5.innerHTML = this.files.item(i).name;
        customTxt5.style.color="red";
        return;
      }
    }
  
       if (totalBytes5 < 1000000){
      var _size = Math.floor(totalBytes5/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes5/1000000) + ' MB'; 
    }

    customTxtMB5.innerHTML = _size;
    customTxtMB5.style.color = "#808080";
        if (realFileBtn5.value) {
            customTxt5.style.color = "#4285F4";
            customTxt5.innerHTML = this.files.item(i).name;
        } else {
          customTxt5.innerHTML = "5. Latest Income Tax return ";
          customTxt5.style.color = "#808080";
        }
  });

     customBtn6.addEventListener("click", function() {
        realFileBtn6.click();});
  realFileBtn6.addEventListener("change", function(){
    let files = realFileBtn6.files;
      var totalBytes6 = this.files[0].size;
        for (var i = 0; i < this.files.length; i++){
         customTxt6.style.color="red";
            customTxt6.innerHTML = "<span style = 'color:black'>" + "6. Picture's of Establishment inspected/verified by CENRO concerned duly subscribed/sworn <br>" + "</span>" +  this.files.item(i).name;
             customBtn6.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";;
      }
    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB6.innerHTML = 'File exceed 10 MB';
        customTxtMB6.style.color = "red";
        customTxt6.innerHTML = this.files.item(i).name;
        customTxt6.style.color="red";
        return;
      }
    }
   
       if (totalBytes6 < 1000000){
      var _size = Math.floor(totalBytes6/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes6/1000000) + ' MB'; 
    }

    customTxtMB6.innerHTML = _size;
    customTxtMB6.style.color = "#808080";
        if (realFileBtn6.value) {
            customTxt6.style.color = "#4285F4";
            customTxt6.innerHTML = this.files.item(i).name;
        } else {
          customTxt6.innerHTML = "6. Picture's of Establishment inspected/verified by CENRO concerned duly subscribed/sworn ";
          customTxt6.style.color = "#808080";
        }
  });

  customBtn7.addEventListener("click", function() {
        realFileBtn7.click();});
  realFileBtn7.addEventListener("change", function(){
    let files = realFileBtn7.files;
      var totalBytes7 = this.files[0].size;
        for (var i = 0; i < this.files.length; i++){
         customTxt7.style.color="red";
            customTxt7.innerHTML = "<span style = 'color:black'>" + "7. Proof of ownership of the lumberyard or consent/agreement with the owner <br>" + "</span>" +  this.files.item(i).name;
             customBtn7.innerHTML = "<span style= 'font-size: 12px;'>" + "File uploaded.. " + "</span>";;
      }
    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB7.innerHTML = 'File exceed 10 MB';
        customTxtMB7.style.color = "red";
        customTxt7.innerHTML = this.files.item(i).name;
        customTxt7.style.color="red";
        return;
      }
    }
   
       if (totalBytes7 < 1000000){
      var _size = Math.floor(totalBytes7/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes7/1000000) + ' MB'; 
    }

    customTxtMB7.innerHTML = _size;
    customTxtMB7.style.color = "#808080";
        if (realFileBtn7.value) {
            customTxt7.style.color = "#4285F4";
            customTxt7.innerHTML = this.files.item(i).name;
        } else {
          customTxt7.innerHTML = "7. Proof of ownership of the lumberyard or consent/agreement with the owner ";
          customTxt7.style.color = "#808080";
        }
  });




 $(document).ready(function(){
  $('input[type="file"]').change(function(){
    if( $('#realfile').val() != '' && $('#realfile2').val() != '' && $('#realfile3').val() != ''  && $('#realfile4').val() != ''  
      && $('#realfile5').val() != '' )
    {
      $('#acceptBtn').attr('disabled', false);
    }    
         let files1 = realFileBtn.files;
         let files2 = realFileBtn2.files;
         let files3 = realFileBtn3.files;
         let files4 = realFileBtn4.files;
         let files5 = realFileBtn5.files;
        //  let files6 = realFileBtn6.files;
        //  let files7 = realFileBtn7.files;
             if (files1.length > 0){
              if(files1[0].size > 10 * 1024 * 1024){
               $('#acceptBtn').attr('disabled', true);
                return;
              }
            }
             if (files2.length > 0){
              if(files2[0].size > 10 * 1024 * 1024){
               $('#acceptBtn').attr('disabled', true);
                return;
              }
            }
            if (files3.length > 0){
              if(files3[0].size > 10 * 1024 * 1024){
               $('#acceptBtn').attr('disabled', true);
                return;
              }
            }
            if (files4.length > 0){
              if(files4[0].size > 10 * 1024 * 1024){
               $('#acceptBtn').attr('disabled', true);
                return;
              }
            }
            if (files5.length > 0){
              if(files5[0].size > 10 * 1024 * 1024){
               $('#acceptBtn').attr('disabled', true);
                return;
              }
            }
            // if (files6.length > 0){
            //   if(files6[0].size > 10 * 1024 * 1024){
            //    $('#acceptBtn').attr('disabled', true);
            //     return;
            //   }
            // }
            //  if (files7.length > 0){
            //   if(files7[0].size > 10 * 1024 * 1024){
            //    $('#acceptBtn').attr('disabled', true);
            //     return;
            //   }
            // }
  });
});
</script>

  <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
  </body>
</html>