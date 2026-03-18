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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
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
        <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" ><i class="fa-solid fa-circle-user"></i> <?php  echo  "<b>{$clientname}</b> </a>"; ?>   </div></div>
       <li><a href="dashboard_requirement.php">Requirements</a></li>
       <li><a href="dashboard_doclist.php">Document Status</a></li>
       <!-- <li><a href="doctracker.php" style="font-size: 15px;">Track your Application</a></li> -->
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
<div class="bodytime">
  <div class="card" style="width: 1000px;  padding: 0; align-items: center;display: flex;margin: auto;margin-top: 5%;">
  <div class="card-body">
  <center>
    <h2 class="text-center" style="font-family: system-ui; font-weight: 600">Status of Documents Uploaded</h2>
    <p style="font-family: system-ui; word-wrap: normal;  width:100%; word-wrap:break-word; font-size: 19px; font-weight: 350;">Click <b>'Details'</b> to select the corresponding electronic copy of document.<br></p><br></p>
  </center>

      <table class="table table-striped" style="width: 900px;">
        <tr>
          <th style="background: #597EFB; color: #fff; font-weight: 300;">DOCUMENTS</th>
           <th style="text-align: center; background: #597EFB; color: #fff; font-weight: 300;">Status</th>
            <th style="text-align: center; background: #597EFB; color: #fff; font-weight: 300;"></th>
          <th style="background: #597EFB; color: #fff; font-weight: 300;">File Size</th>
        </tr>
        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text" style="font-size: 13px; color: #808080;">Application form or duly accomplished & sworn/notarized.</span>
            </td>
            <td align="center" style="width: 50px;">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500; width: 90px;">Accepted <i class="fa-solid fa-check"></i></p>
            </td>
             <td align="center">
             <button hidden type="button" id="custom-button" class="btn btn-sm" data-bs-html="true" data-bs-toggle="popover" data-bs-content="<b>Application form or duly accomplished & sworn/notarized.</b><br><br>Hi Juan Dela Cruz<br><br>Your attached document is not match to your application business address. Please update your documents.<br><br>" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;" id="mb1">2 MB</td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text2" style="font-size: 12px; color: #808080;">Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer</span>
            </td>
           <td align="center">
             <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500; width: 90px;" >Accepted <i class="fa-solid fa-check"></i></p>
            </td>
             <td align="center">
                    <button hidden type="button" id="custom-button" class="btn btn-sm" data-bs-html="true" data-bs-toggle="popover" data-bs-content="<b>Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer</b><br><br>Hi Juan Dela Cruz<br><br>Your attached document is not match to your application business address. Please update your documents.<br><br>" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px; "id="mb2">4 MB</td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text3" style="font-size: 13px; color: #808080;">Mayor's Permit/Business Permit</span>
            </td>
            <td align="center">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500; width: 90px;">Accepted <i class="fa-solid fa-check"></i></p>
            </td>
             <td align="center">
                <button hidden type="button" id="custom-button" class="btn btn-sm" data-bs-html="true" data-bs-toggle="popover" data-bs-content="<b>Mayor's Permit/Business Permit</b><br><br>Hi Juan Dela Cruz<br><br>Your attached document is not match to your application business address. Please update your documents.<br><br>" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb3">6 MB</td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text4" style="font-size: 13px; color: #808080;">Annual Business Plan</span>
            </td>
             <td align="center">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500; width: 90px;">Accepted <i class="fa-solid fa-check"></i></p>
            </td>
             <td align="center">
       <button hidden type="button" id="custom-button" class="btn btn-sm" data-bs-html="true" data-bs-toggle="popover" data-bs-content="<b>Annual Business Plan</b><br><br>Hi Juan Dela Cruz<br><br>Your attached document is not match to your application business address. Please update your documents.<br><br>" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb4">8 MB</td>
        </tr>

        <tr>
            <td style="border-right-color: #fff; ">
            <span id="custom-text5" style="font-size: 13px; color: #808080;">Latest Income Tax Return</span>
            </td>
           <td align="center">
            <p  style="font-family: system-ui; background: red; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 12px; font-weight: 500; width: 90px;">Denied <i class="fa-solid fa-xmark "></i></p>
            </td>
             <td align="center">
          <button type="button" id="custom-button" class="btn btn-sm" data-bs-html="true" data-bs-toggle="popover" data-bs-content="<b>Latest Income Tax Return</b><br><br>Hi Juan Dela Cruz<br><br>Your attached document is not match to your application business address. Please update your documents.<br><br>" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb5">9 MB</td>
        </tr>

        <tr>
            <td style="border-right-color: #fff;">
            <span id="custom-text6" style="font-size: 13px; color: #808080;">Proof of ownership of the lumberyard or consent/agreement with the owner</span>
            </td>
            <td align="center">
            <p style="font-family: system-ui; background: #32CD32; border-radius: 3px; color: white; width:70px; word-wrap:break-word; font-size: 11px; font-weight: 500; width: 90px;">Accepted <i class="fa-solid fa-check"></i></p>
            </td>
             <td align="center">
      <button hidden type="button" id="custom-button" class="btn btn-sm" data-bs-html="true" data-bs-toggle="popover" data-bs-content="<b>Proof of ownership of the lumberyard or consent/agreement with the owner</b><br><br>Hi Juan Dela Cruz<br><br>Your attached document is not match to your application business address. Please update your documents.<br><br>" style="background: #ffaa00; color: white; font-size: 12px; width: 90px; height:30px; font-weight: 500;">Details</button>
            </td>
            <td align="center" style="color: #808080; font-size: 15px;"id="mb6">10 MB</td>
        </tr>
      </table>


  </div>
</div>
</div>


<script type="text/javascript">
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
  $(window).load(function(){
$('[data-bs-toggle="popover"]').popover();
$('body').on('click', function (e) {
    $('[data-bs-toggle="popover"]').each(function () {
        if (!$(this).is(e.target) && 
             $(this).has(e.target).length === 0 && 
             $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
});

 var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', function () {
    var toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}
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