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

    $lumber_app_id = $_GET['lumber_app_id'];

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


    $em = "Email and Password combination is wrong!";
    header ("Location: univmodal.php?error=$em");
} else {



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


<?php

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$date_applied = $lumber_ap_row['date_applied'];
$clientname = $lumber_ap_row['perm_fname'] .' '. $lumber_ap_row['perm_lname'] ;
$control_number = 'R1300-'.' '.$lumber_ap_row['lumber_app_id'];

$lumber_app = "SELECT * FROM endorsement_form_for_release where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$date_release = isset($lumber_ap_row['date']) && $lumber_ap_row['date'] !== null ? $lumber_ap_row['date'] : "";



?>



<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="-1" />
            
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>OLDPMS</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  
  
<body style="background: #ecedf0;">
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
          <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" ><i class="fa-solid fa-circle-user"></i> <?php  echo  "<b>{$clientname}</b> </a>"; ?> </div></div>
       <li><a href="dashboard_requirement.php">Requirements</a></li>
       <li><a href="dashboard_doclist.php">Document Status</a></li>
       <li><a href="dashboard_doclist.php" style="font-size: 15px;">Track your Application</a></li>
       <li><a href="#logout" name="Log-out">Logout</a></li><br><br>
   
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
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <div class="bodytime">
        <div id="Page1">
    <a>
      <div style="height: auto; width: 750px; margin: 20px; padding: 10px;">
            <div style="background: white; width: 100%; height: 100%; padding: 10px;">
              <div>
                <label style="background-image: url('img/clientcss.png'); height: 70px;">&nbsp;</label>
                <label style="background-image: url('img/emoticon.png'); height: 105px; margin-top: 20px; margin-bottom: -20px;">&nbsp;</label>
              </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 400px;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                    </tr>
                  </thead>

                  <tbody>
                  </form>
                    <tr>
                      <th scope="row" ><span style="background-color: green; color: white;">&nbsp;&nbsp;Responsiveness&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Ang among mga kawani nagpakita sa kaandam sa paghatag og serbisyo/ produkto.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Our staff showed willingness to provide service/ product.)&nbsp;</span></span>
                      </th>
                      <form method="POST" action="clientcss_post.php">

                      <input type="text" name="lumber_app_id" value="<?php echo $lumber_app_id; ?>" hidden>

                      <td style="text-align: center; vertical-align: middle;">
						   <p><b>1</b></p></n>
                        <input type="radio" name="responsiveness" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>2</b></p></n>
                        <input type="radio" name="responsiveness" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>3</b></p></n>
                        <input type="radio" name="responsiveness" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>4</b></p></n>
                        <input type="radio" name="responsiveness" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>5</b></p></n>
                        <input type="radio" name="responsiveness" value="5"  id="flexRadioDefault5">
                      </td>
             
      

                    </tr>
                     <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Gidawat ug giproseso dayon sa among mga kawani ang
                          imong gipangayo nga serbisyo/ produkto.</span><br><span style="color: #0BDA51; font-weight: 600; font-size: 13px;">&nbsp;(Our staff promptly received and processed your
                          requested service/ product.)
                          &nbsp;</span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="responsiveness1" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="responsiveness1" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="responsiveness1" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="responsiveness1" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="responsiveness1" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                     <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Reliability (Quality)&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Nadawat ang makanunayong pag-alagad.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Service received is consistent.)
                      &nbsp;</span></span>
                      </th>
                          <td style="text-align: center; vertical-align: middle;">
							  <p><b>1</b></p></n>
                        <input type="radio" name="Rq" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>2</b></p></n>
                        <input type="radio" name="Rq" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>3</b></p></n>
                        <input type="radio" name="Rq" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>4</b></p></n>
                        <input type="radio" name="Rq" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>5</b></p></n>
                        <input type="radio" name="Rq" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Ang serbisyo nga nadawat tukma sa oras ug panahon.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Service received is timely.)
                      &nbsp;</span></span>
                      </th>
                          <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq1" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq1" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq1" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq1" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq1" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Maayo nga kalidad ang serbisyo/produkto nga nadawat<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Service/product received is of good quality.)
                      &nbsp;</span></span>
                      </th>
                         <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq2" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq2" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq2" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq2" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="Rq2" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                     <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Access & Facilities&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Daghang pasilidad ang naa sa DENR aron masiguro nga komportable ang mga transaksyon.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Ample amenities are available in the DENR to ensure comfortable transactions.)&nbsp;</span></span>
                      </th>
                             <td style="text-align: center; vertical-align: middle;">
								 <p><b>1</b></p></n>
                        <input type="radio" name="af" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>2</b></p></n>
                        <input type="radio" name="af" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>3</b></p></n>
                        <input type="radio" name="af" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>4</b></p></n>
                        <input type="radio" name="af" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>5</b></p></n>
                        <input type="radio" name="af" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Adunay klaro ug masabtan ang mga karatula ang gibutang sa DENR aron mahatagan ug tabang o giya.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Clear signages/signs are posted in DENR to provide assistance or guidance.)&nbsp;</span></span>
                      </th>
                            <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="af1" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="af1" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="af1" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="af1" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="af1" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                    <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Communication&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Ang among mga kawani naghatag og klaro nga tubag
                        sa bisan unsa sa imong mga pangutana bahin sa mga
                        serbisyo/ produkto sa DENR.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Our staff provided clear responses to any of your inquiries regarding DENR services/ products.)
                        &nbsp;</span></span>
                      </th>
						
                        <td style="text-align: center; vertical-align: middle;">
							<p><b>1</b></p></n>
                        <input type="radio" name="co" value="1"  id="flexRadioDefault1">
                        </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>2</b></p></n>
                        <input type="radio" name="co" value="2"  id="flexRadioDefault2">
                        </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>3</b></p></n>
                        <input type="radio" name="co" value="3"  id="flexRadioDefault3">
                       </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>4</b></p></n>
                        <input type="radio" name="co" value="4"  id="flexRadioDefault4">
                       </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>5</b></p></n>
                        <input type="radio" name="co" value="5"  id="flexRadioDefault5">
                       </td>
                    </tr>
                      <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Ang among mga kawani mo-istorya o mupasabot sa masinabtanon ug maayu nga paagi.
                      <br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Our staff communicated in an understandable manner.)
                      &nbsp;</span></span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co1" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co1" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co1" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co1" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co1" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Ang among opisina andam mudawat og sa bisan unsang
                      feedback (komento, sugyot o reklamo).<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Our office is open to receive feedback (comments, suggestions or complaints).)
                        &nbsp;</span></span>
                      </th>
                      <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co2" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co2" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co2" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co2" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="co2" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                  </tbody>

                </table>
                  <button href="#" onclick="return show('Page2','Page1');" id="page1_button" type="button">Next</button>
</div>
</div>
</a>
</div>
    
  <div id="Page2" style="display:none">
    <a>

       <div class="timeline" style="height: auto; width: 780px; margin: 20px; padding: 10px;">
            <div style="background: white; width: 100%; height: 100%;">
             <!--  <div>
                <label style="background-image: url('img/clientcss.png'); height: 70px;">&nbsp;</label>
              </div> -->
                <table class="table">
                  <thead>
                      <tr>
                      <th style="width: 400px;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                      <th style=" text-align: center; vertical-align: middle;" scope="col"></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <th scope="row" ><span style="background-color: green; color: white;">&nbsp;&nbsp;Cost&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Makatarungan ang pagasto/pagbayad sa pagkuha sa serbisyo o produkto.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Cost/charges incurred on availing service or product are reasonable.)&nbsp;</span></span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
							<p><b>1</b></p></n>
                        <input type="radio" name="cos_s" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>2</b></p></n>
                        <input type="radio" name="cos_s" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>3</b></p></n>
                        <input type="radio" name="cos_s" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>4</b></p></n>
                        <input type="radio" name="cos_s" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
						   <p><b>5</b></p></n>
                        <input type="radio" name="cos_s" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>

                     <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Integrity&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Ang among kawani nagpakita og pagka mitinud-anon sa pag-atubang sa kliyente.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Our staff showed honesty in dealing with clients.)
                      &nbsp;</span></span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                      <th scope="row"><span style="font-weight: 600; font-size: 13px;">Ang among kawani nagpakita og patas og makiangayon nga pagtratar sa mga kliyente.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;((Our staff showed fairness in dealing with clients.)
                      &nbsp;</span></span>
                      </th>
                         <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int1_in" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int1_in" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int1_in" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int1_in" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="int1_in" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                     <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Assurance&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Ang among kawani adunay katakus sa paghatag og serbisyo/ produkto.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Our staff is competent in rendering service/ product.)&nbsp;</span></span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="assu" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="assu" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="assu" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="assu" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="assu" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                    <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Outcome&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Natuman ra ang serbisyo/produkto nga imong gipaabot ug gikinahanglan.<br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Service/product received meets your expectations and needs.)&nbsp;</span></span>
                      </th>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="outc" value="1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="outc" value="2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="outc" value="3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="outc" value="4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                        <input type="radio" name="outc" value="5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                       <tr>
                      <th scope="row"><span style="background-color: green; color: white;">&nbsp;&nbsp;Suggestions/Comments&nbsp;&nbsp;</span><br><span style="font-weight: 600; font-size: 13px;">Palihug sa paghatag ug bisan unsang mga sugyot o komento kabahin sa serbisyo nga nadawat. <br><span style="color: #0BDA51; font-weight: 600;">&nbsp;(Please provide any suggestions, comments or concerns regarding the service received.)&nbsp;</span></span>
                      </th>
                      <td colspan="5" style="text-align: center; vertical-align: middle;">
                         <textarea style="border-color: black;" class="form-control" id="exampleFormControlTextarea1" name="Suggestions_Comments" rows="3"></textarea>
                       </td>
                    </tr>
                    
                    <tr>
                       <th colspan="6" scope="row"> <p style="vertical-align: middle; background-color: green; height: 30px; color: white; font-weight: 500; padding: 5px;">Client Profile</p>
                      </th> 
                    </tr>

                    <?php
                       
                      $date_applied2 = $date_applied ;
                       // Format the date
                       $formatted_date_date_applied = date("F j, Y", strtotime($date_applied2));
                       // Output the formatted date
                       echo $formatted_date_date_applied; // Output: January 26, 2023
                      ?>

                    <tr>
                      <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-size: 12px;">Petsa sa Aplikasyon<br><span style="color: #0BDA51;">(Date of Application)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 280px;" name="Date_of_Application" value="<?php echo $formatted_date_date_applied ; ?>" readonly > </input>
                        </div>
                      </th>

                         <td colspan="5">
                        <div style="display: inline-flex; align-items: center;">
                          <input style="height: 20px; width: 20px; margin: 20px;" class="checkbox__input" id="myCheckboxId1" type="checkbox" name="Lungsuranon_Indibidwal_Representante" value="Yes">
                          <label for="myCheckboxId1" style="font-size: 12px; font-weight: 600;">Lungsuranon/ Indibidwal/Representante<br><span style="font-weight: 400;">(Pribado nga lungsuranon isip nag transaksyon sa publiko)</span>
                          </label>
                        </div>
                      </td>
                    </tr>

                     <tr>
                      <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-size: 12px;">Petsa sa pagtuman sa produkto o serbisyo<br><span style="color: #0BDA51;">(Date of Release of Product/Services)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 200px;" value="<?php echo $date_release ; ?>"> </input>
                        </div>
                      </th>

                         <td colspan="5">
                         <div style="display: inline-flex; align-items: center;">
                          <input style="height: 15px; width: 15px; margin: 20px;" class="checkbox__input" id="myCheckboxId2" type="checkbox" name="Negosyo_Kompanya">
                          <label for="myCheckboxId2" style="font-size: 12px; font-weight: 600;">Negosyo/ Kompanya<br><span style="font-weight: 400;">(Representante sa negosyo/kompanya)</span>
                          </label>
                        </div>
                      </td>
                    </tr>

                     <tr>
                      <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-size: 12px;">Pangalan<br><span style="color: #0BDA51;">(Name)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 300px;" value="<?php echo $clientname ; ?>"> </inputs>
                        </div>
                      </th>

                           <td colspan="5">
                         <div style="display: inline-flex; align-items: center;">
                          <input style="height: 15px; width: 15px; margin: 20px;" class="checkbox__input" id="myCheckboxIds" type="checkbox" name="myCheckboxname_Kapunungan_PO" value="Yes">
                          <label for="myCheckboxIds" style="font-size: 12px; font-weight: 600;">Kapunungan/PO<br><span style="font-weight:400;">(Representante sa kapunungan)</span>
                          </label>
                        </div>
                      </td>
                    </tr>

                     <tr>
                      <th>
                        <div class="checksbox" style="align-items: center;">
                         <label style="font-size: 12px;">Edad<br><span style="color: #0BDA51;">(Age)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 100px;" name="Edad"> </input>
                       <label style="margin: 20px;">Kasarian: </label>






                       <script>
                        function uncheckCheckbox2sex() {
                          var checkbox1 = document.getElementById("myCheckboxId1male");
                          var checkbox2 = document.getElementById("myCheckboxId2female");
                          
                          if (checkbox1.checked) {
                            checkbox1.checked = true;
                            checkbox2.checked = false;
                          } else if (checkbox2.checked) {
                            checkbox1.checked = false;
                            checkbox2.checked = true;
                          }
                        }
                      </script>


<!-- 
                         <div class="checksbox">
                           <input style="margin: 5px;" class="checkbox__input2" id="myCheckboxId1male" type="checkbox" name="chksexlalaki" value="Lalaki" id="Checkbox1" onclick="uncheckCheckbox2sex();">
                          <label for="myCheckboxId4" style="font-size: 12px; text-align: justify; margin-top: 9px;">Lalaki
                          </label>
                         </div>

                          <div class="checksbox">
                           <input style="margin: 5px;" class="checkbox__input2" id="myCheckboxId2female" type="checkbox" name="chkbabae" value="Babae" id="Checkbox2" onclick="uncheckCheckbox2sex();"> 
                          <label for="myCheckboxId5" style="font-size: 12px; text-align: justify; margin-top: 9px;">Babae
                          </label>
                         </div> -->


                         
                         <div class="checksbox">
                           <input style="margin: 5px;" class="checkbox__input2" id="myCheckboxId1male" type="checkbox" name="chksexlalaki" value="Lalaki" id="Checkbox1" onclick="uncheckCheckbox2sex();">
                          <label for="myCheckboxId4" style="font-size: 12px; text-align: justify; margin-top: 9px;">Lalaki
                          </label>
                         </div>

                          <div class="checksbox">
                           <input style="margin: 5px;" class="checkbox__input2" id="myCheckboxId2female" type="checkbox" name="chkbabae" value="Babae" id="Checkbox2" onclick="uncheckCheckbox2sex();"> 
                          <label for="myCheckboxId5" style="font-size: 12px; text-align: justify; margin-top: 9px;">Babae
                          </label>
                         </div>




                        </div>
                      </th>

                      <td colspan="5">
                         <div style="display: inline-flex; align-items: center;">
                          <input style="height: 20px; width: 20px; margin: 20px;" class="checkbox__input" id="myCheckboxId" type="checkbox" name="myCheckboxname_gobyerno">
                          <label for="myCheckboxId" style="font-size: 12px; font-weight: 600;">Gobyerno<br><span style="font-weight: 400;">(Representante sa ubang ahensya sa gobyerno lakip na ang mga GOCC)</span>
                          </label>
                        </div>
                      </td>
                    </tr>

                     <tr>
                      <th>
                          <div>
                              <div class="row">
                                <div class="col-6 col-sm-3" style="font-size: 12px; width: 200px; font-weight: 700;"><span style="font-weight: 400; font-size: 10px;">Alang sa Awtorisadong kawani sa DENR</span><br>Control Number<br><input style="border-color: black; height: 40px; width:200px;" rows="3" value="<?php echo $control_number; ?>"></input><br><br> <center><span style="font-weight: 600px; font-size: 13px;">English - Cebuano version</span><br><span style="font-weight: 400; font-size:10px;">2022 DENR CSS Form Version 1 (January 2022)</span> </center></div>
                              </div>

                            </div>
                      </th> 

         

         
             

                        <td colspan="5">
                         <div style="display: inline-flex; align-items: center;">
                          <input style="height: 100px; width: 100px; margin: 20px;" class="checkbox__input" id="myCheckboxId" type="checkbox" name="myCheckboxnames_Gitugotan">
                          <label for="myCheckboxIdlast" style="font-size: 12px;">
                            Gitugotan nako ang DENR sa pagkolekta, pagproseso, pagpadala ug pagtipig sa datos nga gihatag
                            dinhi ubos sa mga lagda ug regulasyon nga gitakda sa Republic Act No. 10173, o nailhan nga Data
                            Privacy Act of 2012.<br><span style="color: #0BDA51;">
                            (I hereby consent DENR to collect, process, transmit and store the data provided herein subject to the
                            rules and regulations set by Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012.)
                            </span><center>
                            <div class="col-6 col-sm-3" style="font-size: 12px; width: 200px; font-weight: 700;"><br><br><textarea style="border-color: black; height: 40px; width:200px;" rows="3"><?php echo $clientname ; ?></textarea><br><center><span style="font-weight: 600px; font-size: 12px;">Pangalan og Pirma<br></span><span style="font-size: 10px; color: #0BDA51;">(Name and Signature)</span><br></center></div>
                          </label>
                          </center>
                        </div>
                      </td>
                    </tr> 
                  </tbody>
                </table>

                <center></div><button href="#" onclick="return show('Page1','Page2');" id="page2_button" type="button">Back</button></center>
                <br>    <br>
                <button type="submit" class="btn btn-success">Submit Rating</button>

</form>
              </div>

          </div>
      </a>
  </div>
  

                 
                


    <script>
function show(shown, hidden) {
  document.getElementById(shown).style.display='block';
  document.getElementById(hidden).style.display='none';
  return false;
}

$('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script>
  </body>
</html>