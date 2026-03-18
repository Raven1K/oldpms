<?php


// require_once('configmysqli.php');
session_start();
include('../processphp/config.php');
// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              header("location: login.php");
              exit;
            }
            else{

         
            }

  
              $userid = $_SESSION["user_id"] ;
              $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
              $clientname = $lumber_ap_row['name'] ;
              $user_role = $lumber_ap_row['user_role_id'] ;
              $user_id = $lumber_ap_row['user_id'] ;
              $name = $lumber_ap_row['name'] ;
              $username = $lumber_ap_row['username'] ;
              $usertype = $lumber_ap_row['usertype'] ;
              $contact_no = $lumber_ap_row['contact_no'] ;
              $office_id  = $lumber_ap_row['office_id'] ;
              $user_role_id  = $lumber_ap_row['user_role_id'] ;

              
              if ($user_role_id != 99) {
                header("Location: login.php");
                exit(); // Ensure script stops execution after redirection
            } else {
                // Code for users with role ID 99
            }
            



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

        #signatureContainer {
            width: 300px;
            height: 150px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        #uploadButton {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-align: center;
        }
        #uploadButton input {
            display: none;
        }
  
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
        require_once('adminsidebar.php');
      ?>        
    <!-- /sidebar navigation -->
      
        <!-- top navigation -->
      
      <?php
        require_once('adminnavbar.php');
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

                  

  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div style="width: 100%;"><br>
          <center>
            <p style="text-align: left; font-size: 25px; color: black; font-weight: 600">My Profile</p>
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
       
     
         <!-- start edit profile -->    
          <div class="card" style="width: 600px; height: 650px;">
            <h5 class="card-header">Profile</h5>
            <div class="card-body">
             
            <!-- userprofile -->           
             <div class="card mb-3" style="max-width: 540px; border: none; margin-left: 15px;">

              <!-- edit part -->
              <form class="row g-3">
                    <div class="col-auto">
                      <p type="button" onclick="enable()" style="font-size: 14px; color: #0096FF; width: 25px;" id="editfield"><u>Edit</u></p>
                    </div>
                    <div class="col-auto">
                       <p type="button" onclick="disable()" style="font-size: 14px; color: red; width: 45px;" id="canceledit"><u>Cancel</u></p>
                    </div>
              </form>
              <!-- end edit part -->
             
              <div class="row g-0">
                <div class="col-md-4" style=" border: 2px solid dimgray;">

                 <p style="font-size: 100px; vertical-align: middle; text-align: center; margin-top: 30px;"><i class="fa-solid fa-user-secret"></i></p>
                </div>
                <div class="col-md-8">
                  <div class="card-body">

                    <div >
                      <label for="validationDefault01" class="form-label" style="font-weight: 500; font-size: 14px; margin-bottom: -2px; color: #444444;">First name</label>
                      <input disabled type="text" class="form-control" placeholder="" id="name" value="<?php echo is_null($name) ? '' : $name; ?>" name="name">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- enduserprofile -->

            <!-- aboutme -->
            
                  <div class="row mb-3"  style="font-weight: 500; font-size: 14px; width: 540px; margin-left: 5px; color: #444444">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input disabled type="email" class="form-control" id="emails" placeholder="jawa999" value="<?php echo is_null($username) ? '' : $username; ?>">
                    </div>
                  </div>

                   <div class="row mb-3"  style="font-weight: 500; font-size: 14px; width: 540px; margin-left: 5px; color: #444444">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                      <input disabled type="email" class="form-control" id="passwords" placeholder="Enter your current password">
                    </div>
                  </div>

                  <div class="row mb-3"  style="font-weight: 500; font-size: 14px; width: 540px; margin-left: 5px; color: #444444">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input disabled type="email" class="form-control" id="cpasswords" placeholder="Enter a new password">
                    </div>
                  </div>

                  <div class="form-floating" style="width: 530px; margin-left: 5px; color: #808080">
                    <textarea disabled class="form-control" placeholder="Leave a comment here" id="aboutmes" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">About me</label>
                    <br><br>
                    <button type="button" class="btn btn-primary" style="margin-left: 435px; width: 100px;">Save</button>
                  </div><br>
         



                 <h1>Signature</h1>
    
                        <!-- Signature Uploader -->
                        <form action="userprofile_uploadhandler.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="signature" accept="image/*" id="fileInput">
                            <input type="text"  value="<?php echo is_null($userid) ? '' : $userid; ?>" name="id" hidden>
                            <input type="submit" name="uploadEsig" class=" btn-primary" value="Upload">
                        </form>
                        
                        <!-- Signature Viewer -->
                        <div id="signatureContainer"></div>

                        <script>
                            document.getElementById('fileInput').addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        const signatureContainer = document.getElementById('signatureContainer');
                                        signatureContainer.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; max-height: 100%;" />`;
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>


            <!-- aboutme -->
            </div>
          </div>
        <!-- end edit profile -->   

        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Signature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div style="padding: 10px;">

            <form class="row g-3" >
            <div class="col-auto">
                <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Official Station">
                <select style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
                  <option selected disabled>Select Station</option>
                  <option style="font-weight: 600">Station 1</option>
                  <option style="font-weight: 600">Station 2</option>
                </select>
            </div>
            </form>

           <form class="row g-3" >
            <div class="col-auto">
                <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Signature Type">
                <select style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
                  <option selected disabled>Select Signature Type</option>
                  <option style="font-weight: 600">Type 1</option>
                  <option style="font-weight: 600">Type 2</option>
                </select>
            </div>
            </form>

            <form class="row g-3" >
            <div class="col-auto">
                <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Signature Order">
                <select style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
                  <option selected disabled>Select Signature Order</option>
                  <option style="font-weight: 600">Order 1</option>
                  <option style="font-weight: 600">Order 2</option>
                </select>
            </div>
            </form>

        <form class="row g-3">
          <div class="col-auto">
            <input readonly style="font-size: 20px;" type="text" class="form-control-plaintext" id="staticEmail2" value="Upload Signature">
            <input hidden onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" type="file" id="realfileinput" accept="Application/pdf" name="my_imageinput" value="upload"/>
             <button type="button" id="realfileBtn" class="btn btn-primary btn-sm" style="width: 100px; height:30px; font-size: 11px;" name="my_imageinput">Browse Image..</button>
          </div>
        </form>

          <span class="form-control" style="width: 475px; height: 200px; margin-bottom: 5px;">
             <p id="realfileTxt" style="vertical-align: middle; text-align: center; font-size: 12px; color: #808080; margin-top: 20px;">
               <img id="blah" alt="No image available" src="images/noimg.jpg" >
             </p>
          </span> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
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
      require_once 'adminfooter.php';
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