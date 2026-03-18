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

   <title>Online Lumber Dealer Permitting and Monitoring System</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!--<link rel="stylesheet" href="../main/css/sb-admin-2.css"> -->
  </head>
  <!-- -----------------------------------------------------------------------------------------------------  Get form sumpay 1 -->
  <form action="../processphp/prc_logout.php"  method="post" role="form" >
  <!-- <form action="../main/outmodal.php"  method="post" role="form" > -->
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container-fluid ">
     <a href="index.php"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <a class="navbar-brand" href="index.php"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="#"></a>
           </li>
        </ul>
          <form class="d-flex">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown" style="margin-left: 880px; ">
          <a href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-circle-user text-white style"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="#">Profile</a>
              <button class="btn  btn-success"  name="btn" data-target="#logoutModal" data-toggle="modal"> Logout </button>
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
 
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" > <?php  echo  "<b>{$clientname}</b> </a>"; ?>   
         </form>
      </div>
    </div>
  </nav>
  


  <!-- <form action="#" class="form"> -->
  <form action="../processphp/clientupload/prc_clientdashboard.php" class="form" method="post" role="form"  enctype="multipart/form-data" >
   

  <input class="form-control" type="file" id="realfile" name="my_image"  hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile2" hidden="hidden" accept="Application/pdf" name="my_image2" value="upload"/>
    <input type="file" id="realfile3" hidden="hidden" name="my_image3" accept="Application/pdf" value=""/>
    <input type="file" id="realfile4" hidden="hidden" name="my_image4" accept="Application/pdf" value=""/>
    <input type="file" id="realfile5" hidden="hidden" name="my_image5" accept="Application/pdf" value=""/>
    <input type="file" id="realfile6" hidden="hidden" name="my_image6" accept="Application/pdf" value=""/>



      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div
          class="progress-step progress-step-active"
          data-title="Requirements"
        ></div>
        <div class="progress-step" data-title="Basic Information"></div>
        <div class="progress-step" data-title="Attachment"></div>
      </div>

      <!-- Requirements -->
      <div class="form-step form-step-active">
        <div class="input-group">
         <div class="container mt-3">
          <h2 class="text-center" style="font-family: system-ui; font-weight: 600"><i class="fa-regular fa-rectangle-list" style="margin-right: 15px;"></i>Requirements</h2><br>
            <center><p style="font-family: system-ui; background: #d1e7dd; word-wrap: normal;  width:100%; word-wrap:break-word; font-size: 15px; font-weight: 550;"><i>Please download and fill up the forms below. Print the completed forms for notarial purposes. Once<br>notarized, return to the system and locate the REQUIREMENTS FORM Browse to upload the scan copy.<br>you need to have pdf reader installed to open these files.</p></i><br>
            <p style="font-family: system-ui; font-weight: 400; text-align: justify; text-justify: inter-word; font-size: 17px;">
              1. Application form or duly accomplished & sworn/notarized. <a style="color: #0645AD;" href="#"><u>Download Fillable Form</u></a><br>
              2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer.<br>
              3. Mayor's Permit/Business Plan<br>
              4. Annual Business Plan<br>
              5. Latest Income Tax Return<br>
              6. Proof of ownership of the lumberyard or consent/agreement with the owner<br><br>
              <strong>Provided after DENR CENRO Personnel site inspection.</strong><br>
              1. Forestry Administrative Fees<br>
              2. Pictures of lumberyard/establishment</p><br></center>
               <center><h4 style="font-family: system-ui; font-weight: 500; font-size: 15px;">Click proceed if all requirements are completed and ready to upload.</h4></center>
            </div>
          </div>
        <div class="">
          <center><a href="#" class="custom_btn btn-next width-50" style="font-family: system-ui; font-weight: 500; font-size: 16px;">Proceed<i class="fa-solid fa-circle-arrow-right" style="margin-left: 10px;"></i></a></center>
        </div>
      </div>

      <!-- Basic Information -->
      <div class="form-step">
        <div class="input-group">
            <h3 class="text-center" style="font-family: system-ui; font-weight: 600;"><i class="fa-regular fa-user" style="margin-right: 15px; margin-left: 12px;"></i>Permittee's Basic Information</h3>
         <div class="row">
          <div class="col"><br>
          <input style="width: 330px;" type="text" class="form-control" placeholder="First Name*" aria-label="First name" value="<?php echo $clientname; ?>" name="perm_fname" >
          </div>
          <div class="col"><br>
          <input style="width: 330px;" type="text" class="form-control" placeholder="Last Name*" aria-label="Last name" value="<?php echo $lastname; ?>" name="perm_lname" >
          </div>
        </div>
         <div class="row">
          <div class="col">
          <select class="form-select" id="autoSizingSelect" style="margin-top: 10px; width: 330px;" name="application_type">
              <option selected>Application Type</option>
              <option value="Individual">Individual</option>
              <option value="Association">Association</option>
            </select>
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Business Name*" aria-label="Business name" name="bussiness_name">
          </div>
        </div>
          <div class="row">
          <div class="col">
          <select class="form-select" id="province" name="province" style="margin-top: 10px; width: 330px; ">
              <option selected >Province</option>

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
              <option selected>City/Municipality</option>

            </select>
          </div>
        </div>
          <div class="row">
          <div class="col">
            <select class="form-select"  id="brgy" name="brgy" style="margin-top: 10px; width: 330px; ">
              <option selected>Barangay</option>
            </select>
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" id="zip"  type="text"  class="form-control" placeholder="Zip Code" aria-label="Zip code" >
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



              $('#brgy').on('change',function() {
                
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

              
              
              
              
              </script>
    

        </div>
          <div class="row">
          <div class="col">
          <input style="width: 685px; margin-top: 10px;" type="text" class="form-control" placeholder="Street/Corner/Purok*" aria-label="Street/corner/purok" name="purok" >
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="E-Mail (Optional)*" aria-label="Email" value="<?php echo $email; ?>" name="perm_email">
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Mobile No.*" aria-label="Mobile no" value="<?php echo $mobileno; ?>" name="perm_contact">
          </div>
        </div>
        
        </div>
        <div class="btns-group">
          <a href="#" class="custom_btn_prev custom_btn btn-prev">Back</a>
          <a href="#" class="custom_btn_next custom_btn btn-next">Next<i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
        </div>
      </div>
      <!-- Attaching Required Documents -->
      <div class="form-step">
        <div class="input-group">
            <h3 class="text-center" style="font-family: system-ui; font-weight: 600"><i class="fa-regular fa-file" style="margin-right: 15px;"></i>Attaching Required Documents</h3>
            <label style="font-size: 17px;">Click "Browse" to select the corresponding electronic copy of the document. <br><span style="color: red; font-size: 15px;"><i>Note: Only PDF File not larger than 10 MB is allowed.</i></span></label>
    <table class="table table-bordered" style="margin-top: 10px;">
  <tr>
    <th colspan="2" style="background: #597EFB; color: #fff; font-weight: 300;">DOCUMENTS</th>
    <th style="background: #597EFB; color: #fff; font-weight: 300;">File Size</th>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text" style="font-size: 13px; color: #808080;">Application form or duly accompished & sworn/notarized.<span style="color: red; font-weight: 500;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;" id="mb1"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text2" style="font-size: 12px; color: #808080;">Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button2" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image2">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px; "id="mb2"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text3" style="font-size: 13px; color: #808080;">Mayor's Permit/Business Permit<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button3" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image3">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb3"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text4" style="font-size: 13px; color: #808080;">Annual Business Plan<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button4" class="btn btn-primary btn-sm" style="width: 100px; height:30px;" name="my_image4">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb4"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text5" style="font-size: 13px; color: #808080;">Latest Income Tax return<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button5" class="btn btn-primary btn-sm" style="width: 100px; height:30px;"name="my_image5">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb5"></td>
  </tr>

  <tr>
      <td style="border-right-color: #fff;">
      <span id="custom-text6" style="font-size: 13px; color: #808080;">Proof of ownership of the lumberyard or consent/agreement with the owner<span style="font-weight: 500; color: red;"><i> *Required</i></span></span>
      </td>
      <td align="center">
      <button type="button" id="custom-button6" class="btn btn-primary btn-sm" style="width: 100px; height:30px;"name="my_image6">Browse..</button>
      </td>
      <td align="center" style="color: #808080; font-size: 15px;"id="mb6"></td>
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
  </body>
</html>