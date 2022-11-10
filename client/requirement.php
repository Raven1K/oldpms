<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: ../login.php");
    exit;
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
  </head>
  
<body style="background: #ecedf0;">

  <div id="wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
              <div class="container-fluid">
                <a href="index.php"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <a class="navbar-brand" href="index.php"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
                </div>
              </div>
            </nav>

        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a href="#" style="text-decoration: none; font-weight: 700; color; #fff;"><i class="fa-solid fa-circle-user"></i> JUAN</a></div></div>
       <li><a href="http://localhost/oldpms/client/requirement.php">Requirements</a></li>
       <li><a href="#doctracker">Document Status</a></li>
       <li><a href="#docstatus">Track your Application</a></li>
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
  

    <form action="#" class="form">
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
              6. Proof of ownership of the lumberyard or consent/agreement with the owner<br>
              7. Proof of ownership of the lumberyard or consent/agreement with the owner<br>
              8. Proof of ownership of the lumberyard or consent/agreement with the owner<br><br>
              <strong>Provided after all documents are evaluated by DENR CENRO Personnel site inspection.</strong><br>
              1. Forestry Administrative Fees<br>
              2. Pictures of lumberyard/establishment</p><br></center>
               <center><h4 style="font-family: system-ui; font-weight: 500; font-size: 15px;">Click proceed if all requirements are completed and ready to upload.</h4></center>
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
         <label style="font-size: 16px; font-weight: 500;"><i>Please select data from dropdown below</i></label>
            <form method="POST">
                   <select id="info">
                    <option selected disabled>Select data..</option>
                    <option value="New" id="isNew">New</option>
                    <option value="ForRenewal" id="isRenew">For Renewal</option>
                   </select>
            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit" class="btn btn-success">Submit</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  
$(document).ready(function() {
            $("#submit").click(function() {
                var isNew = document.getElementById("isNew").selected;
                var isRenew = document.getElementById("isRenew").selected;
                if (isNew == true) {     
                  location.href = "http://localhost/oldpms/client/clientnew.php";
                }
                else  if (isRenew == true) {     
                  location.href = "http://localhost/oldpms/client/clientrenewal.php";
                }  else {     
                  alert('Nothing is selected'); }
              }
            );
        });

  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
  })
</script>

  </body>
</html>