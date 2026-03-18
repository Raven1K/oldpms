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
        <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" ><i class="fa-solid fa-circle-user"></i> <?php  echo  "<b>{$clientname}</b> </a>"; ?>   </div></div>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard_requirement.php">Requirements</a></li>
       <li><a href="dashboard_doclist.php">Document Status</a></li>
      <!--  <li><a href="doctracker.php" style="font-size: 15px;">Track your Application</a></li> -->
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
 </form>
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

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
 
<div class="bodytime">
  <form action="../processphp/clientupload/prc_clientdashboard.php" class="form" method="post" role="form"  enctype="multipart/form-data" >

    <form action="#" class="form">
      <!-- Requirements -->
      <div class="form-step form-step-active">
        <div class="input-group">
         <div class="container mt-3">
         <table class="table table-success table-striped">
  <thead>
     <h2 class="text-center" style="font-family: system-ui; font-weight: 600"><i class="fa-regular fa-rectangle-list" style="margin-right: 15px;"></i>List of Requirements</h2><br>
            <center><p style="font-family: system-ui; background: #d1e7dd; word-wrap: normal; color: black;  width:100%; word-wrap:break-word; font-size: 15px; font-weight: 550;"><i>Please download and fill out the Application Form below.<br>The Accomplished Application Form needs to be notarized. Upload it in a PDF File</p></i><br>
           </center>
    <tr>
      <th style="background: #01390c; color: white; font-weight: 600; font-size: 13px;" colspan="2" scope="col">Document Name</th>
       <th style="background: #01390c; color: white; font-weight: 600; font-size: 13px; width: 140px;" scope="col"><i>New Application</i></th>
      <th style="background: #01390c; color: white; font-weight: 600;  font-size: 13px; width: 130px;" scope="col"><i>For Renewal</i></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">1. Application form duly accomplished & sworn/notarized. <a style="color: #0645AD;" href="documents/Application_Form_Lumber_Dealer.docx"><u>Download</u></a></td>
      <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
      <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
    <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">2. Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer. <span style="color: red;"><i>(not required if the applicant is a mini-sawmill permittee)</i></span></td>
       <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
       <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
     <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">3. Mayor's Permit/Business Permit and Certificate (Single PDF File)</td>
     <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
       <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
       <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">4. Annual Business Plan</td>
      <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
      <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
      <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">5. Latest Income Tax Return</td>
       <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
       <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
     <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">6. Pictures of the Establishment inspected/verified by CENRO concerned duly subscribed/sworn</td>
       <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
       <td style="text-align: center; font-size: 15px;">&nbsp;</td>
    </tr>
     <tr">
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">7. Ending stocked inventory report duly subscribed/sworn</td>
      <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;">&nbsp;</td>
      <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
      <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">8. Proof of ownership of the lumberyard or consent/agreement with the owner</td>
       <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
       <td style="text-align: center; font-size: 15px;">&nbsp;</td>
    </tr>
      <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">9. Summary reports showing the monthly lumber purchases, production, disposition/sales ending inventory report and other relevant information within the tenure of the permit duly attested by CENRO concerned.</td>
      <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;">&nbsp;</td>
      <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
      <tr>
      <td style="color: black; font-family: system-ui; font-weight: 600; text-align: left; text-justify: inter-word; font-size: 12px;" colspan="2" scope="row">10. Forestry Administrative Fees</td>
       <td style="border-left-color: white; border-right-color: white; border-width: thin; text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
       <td style="text-align: center; font-size: 15px;"><i style="color: #18A558;" class="fa-solid fa-circle-check"></i></td>
    </tr>
  </tbody>
</table>
             </div>
          </div>
        <div class="">
          <center><a type="button" class="btn btn-primary custom_btn width-50" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" style="font-family: system-ui; font-weight: 500; font-size: 16px;">Proceed<i class="fa-solid fa-circle-arrow-right" style="margin-left: 10px;"></i></a></center>
        </div>
      </div>
    </form>

</div>
</div>



<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <label style="font-size: 20px; font-weight: 700; color: black;"><span style="color:#222222;"><span style="font-weight: 500; font-size: 20px;">Apply for</span> <i><span style="font-weight: 600">New Application</span></i></span> or <span style="color:#222222;"><i><span style="font-weight: 600">For Renewal?</span></i></span><i><span style="color: #7f7f7f; font-weight: 400; font-size: 13px;"><br> (select type of application from dropdown below)</span></i></label>
            <form method="POST">
                   <select class="btn-primary" id="info" style="padding: 5px; color: white; border-radius: 5px;">
                    <option selected disabled>Select Type of Application </option>
                    <option value="New" id="isNew" style="font-weight: 600">New Application</option>
                    <option value="ForRenewal" id="isRenew" style="font-weight: 600">Renew Application</option>
                   </select>
            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                <button type="submit" id="submit" class="btn btn-success">Next</button>
      </div>
        </form>

    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
            $("#submit").click(function() {
                var isNew = document.getElementById("isNew").selected;
                var isRenew = document.getElementById("isRenew").selected;
                if (isNew == true) {     
                  location.href = "dashboard_clientnew.php";
                }
                else  if (isRenew == true) {     
                  location.href = "dashboard_clientrenew.php#";
                }  else {     
                  alert('Please select application'); }
              }
            );
        });

  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
  })
</script>
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