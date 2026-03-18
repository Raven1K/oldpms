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
    <!--<link rel="stylesheet" href="../main/css/sb-admin-2.css"> -->
  </head>
  
<body style="background: #ecedf0;">
  <form action="../processphp/prc_logout.php"  method="post" role="form" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <div id="wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
              <div class="container-fluid">
                <a href="#"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <a class="navbar-brand" href="#"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
                </div>
              </div>
            </nav>

        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a href="#" style="text-decoration: none; font-weight: 700; color; #fff;"><i class="fa-solid fa-circle-user"></i> JUAN</a></div></div>
       <li><a href="http://localhost/oldpms_feny/client/dashboard_requirement.php">Requirements</a></li>
       <li><a href="http://localhost/oldpms_feny/client/docstatus.php">Document Status</a></li>
       <li><a href="http://localhost/oldpms_feny/client/dashboard_doclist.php" style="font-size: 15px;">Track your Application</a></li>
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
<ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
        <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" ><i class="fa-solid fa-circle-user"></i> <?php  echo  "<b>{$clientname}</b> </a>"; ?>   </div></div>
       <li><a href="http://localhost/oldpms_feny/client/dashboard_requirement.php">Requirements</a></li>
       <li><a href="http://localhost/oldpms_feny/client/docstatus.php">Document Status</a></li>
       <li><a href="http://localhost/oldpms_feny/client/doctracker.php" style="font-size: 15px;">Track your Application</a></li>
       <li style="padding-left: 30px;"><i style="color: white;" class="fa-solid fa-right-from-bracket"></i><button style="color: white;" class="btn"  name="btn" data-target="#logoutModal" data-toggle="modal">Logout</button></li><br><br>
     </ul>
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
  <form action="../processphp/clientupload/prc_clientdashboard.php" class="form" method="post" role="form"  enctype="multipart/form-data" >

  <input class="form-control" type="file" id="realfile" name="my_image"  hidden="hidden" accept="Application/pdf" value=""/>
    <input type="file" id="realfile2" hidden="hidden" accept="Application/pdf" name="my_image2" value="upload"/>
    <input type="file" id="realfile3" hidden="hidden" name="my_image3" accept="Application/pdf" value=""/>
    <input type="file" id="realfile4" hidden="hidden" name="my_image4" accept="Application/pdf" value=""/>
    <input type="file" id="realfile5" hidden="hidden" name="my_image5" accept="Application/pdf" value=""/>
    <input type="file" id="realfile6" hidden="hidden" name="my_image6" accept="Application/pdf" value=""/>

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
            <h3 class="text-center" style="font-family: system-ui; font-weight: 600;"><i class="fa-regular fa-user" style="margin-right: 15px; margin-left: 12px;"></i>Permittee's Basic Information</h3>   <label class="text-center" style="font-family: system-ui; color: #ff0000; font-weight: 600; font-size: 20px;"><i>(For Renewal)</i></label>
      <p id="refno" style="font-size: 14px; color: red;"><i>Please enter the reference no.<i></p>
            <!-- <input autofocus type="text" id="lumberd" name="lumberdealerno" onkeypress="return isNumberKey(event)"  style="width: 330px; margin-top: 15px;" type="text" class="form-control" placeholder="Lumber Dealer Registration No." aria-label="Enter Lubmber Dealer No." name="Enter Lubmber Dealer No." > -->
            <input autofocus type="text" id="lumberd" name="lumberdealerno"   style="width: 330px; margin-top: 15px;" type="text" class="form-control" placeholder="Lumber Dealer Registration No." aria-label="Enter Lubmber Dealer No." name="Enter Lubmber Dealer No." >
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

          <input readonly style="width: 330px;" type="text" class="form-control" placeholder="First Name*" aria-label="First name" name="fname" >
          </div>
          <div class="col"><br>
          <input readonly style="width: 330px;" type="text" class="form-control" placeholder="Last Name*" aria-label="Last name">
          </div>
        </div>
         <div class="row">
          <div class="col">
            <input readonly style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Permit Type*" aria-label="Application Type">
          </div>
          <div class="col">
          <input readonly style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Business Name*" aria-label="Business name">
          </div>
        </div>
          <div class="row">
          <div class="col">
             <input readonly style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Province*" aria-label="Province">
          </div>
          <div class="col">
                  <input readonly style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="City/Municipality*" aria-label="City/Municipality">
          </div>
        </div>
          <div class="row">
          <div class="col">
            <input readonly style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Barangay*" aria-label="Barangay">
          </div>
          <div class="col">
          <input readonly style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Zip Code*" aria-label="Zip code">
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input readonly style="width: 685px; margin-top: 10px;" type="text" class="form-control" placeholder="Street/Corner/Purok*" aria-label="Street/corner/purok" >
          </div>
        </div>
          <div class="row">
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="E-Mail (Optional)" aria-label="Email" >
          </div>
          <div class="col">
          <input style="width: 330px; margin-top: 10px;" type="text" class="form-control" placeholder="Mobile No.*" aria-label="Mobile no">
          </div>
        </div>

            </div>
          </div>
        <div class="">
          <center><a href="#" class="custom_btn new-btn width-50" style="font-family: system-ui; font-weight: 500; font-size: 16px;">Proceed<i class="fa-solid fa-circle-arrow-right" style="margin-left: 10px;"></i></a></center>
        </div>
      </div>

      <!-- Basic Information -->

 

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
      <!-- Attaching Required Documents -->
      <div class="form-step">
       
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
<script type="text/javascript">
    function isNumberKey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode != 45  && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }
</script>
  </body>
</html>