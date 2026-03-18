<?php


// require_once('configmysqli.php');
session_set_cookie_params([
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
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

              
               $_SESSION['clientname'] = $clientname ;

               
               $user_role = $lumber_ap_row['user_role_id'] ;








?> 







  













<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OLDPMS Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>

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
        
      <div class="row">
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
      </div>
    
      <!-- End Top Summary -->

                    











  <!-- Add New User Modal Start 2 -->
  <div class="modal fade" tabindex="-1" id="addNewUserModal2">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h3 class="modal-title">Add New User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="add-user-form" class="p-2" novalidate>
              <div class="mb-3">
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" required>
                <div class="invalid-feedback">Name is required!</div>
              </div>

            <div class="mb-3">
            <select class="form-select form-control-lg" id="office_id" name="office_id">
                <option selected >- Select Office -</option>

                <?php
                $sql = "SELECT * FROM `office` ORDER BY office_id ASC";
                $office = mysqli_query($con,$sql);
                ?>

                <?php   
                  
                  $station = '0';
                
                while ($row = mysqli_fetch_array($office, MYSQLI_ASSOC)):;

                  if (($row["station"]) == ($station)) {

                  

                  }else{

                    echo '<option value=' . $row["office_id"] . '>' . $row["station"] . '</option>';
                        $station = $row["station"] ;
                  }



                 endwhile; 
                 
                 ?>


                <?php

                        // while ($row = mysqli_fetch_array($province,MYSQLI_ASSOC)):;
                              
                        // if(($row["station"])==($station)) { 

                        // }else{

                        //   echo '<option value="'.$row["office_id"].'">'.$row["station"].'</option>';
                        //   $station = $row["station"] ;
                        // }

                        // endwhile;
                        
                ?>


              <div class="invalid-feedback">Office is required!</div>
              </select>    
            </div>

            <div class="mb-3">
              <input type="text" name="contact_no" class="form-control form-control-lg" placeholder="Contact Number" required>
              <div class="invalid-feedback">Contact Number is required!</div>
            </div>

            <div class="mb-3">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
              <div class="invalid-feedback">Username is required!</div>
            </div>

            <div class="mb-3">
              <input autocomplete="off" type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
              <div class="invalid-feedback">Password is required!</div>
            </div>

            <div class="mb-3">
            <select class="form-select form-select-lg" id="Rolw_id2" name="Rolw_id2">
              <option selected >- User Role -</option>  
                <?php
                $sql = "SELECT * FROM `user_role` ORDER BY user_role_id ASC";
                $office = mysqli_query($con,$sql);
                ?>

                <?php   while ($row = mysqli_fetch_array($office, MYSQLI_ASSOC)):;?>
                <option value="<?php echo $row["Rolw_id2"];?>">  <?php echo $row["role"];?> </option>
                <?php endwhile;?>
              <div class="invalid-feedback">Role is required!</div>
            </select>
            </div>

            <div class="mb-3">
              <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add New User Modal End -->


































  <!-- Add New User Modal Start -->
  <div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h3 class="modal-title">Add New User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate>
              <div class="mb-3">
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" required>
                <div class="invalid-feedback">Name is required!</div>
              </div>

            <div class="mb-3">
            <select class="form-select form-control-lg" id="office_id" name="office_id">
                <option selected >- Select Office -</option>

                <?php
                $sql = "SELECT * FROM `office` ORDER BY office_id ASC";
                $office = mysqli_query($con,$sql);
                ?>

                <?php   while ($row = mysqli_fetch_array($office, MYSQLI_ASSOC)):;?>
                <option value="<?php echo $row["office_id"];?>">  <?php echo $row["office_name"];?> </option>
                <?php endwhile;?>
              <div class="invalid-feedback">Office is required!</div>
              </select>    
            </div>

            <div class="mb-3">
              <input type="text" name="contact_no" class="form-control form-control-lg" placeholder="Contact Number" required>
              <div class="invalid-feedback">Contact Number is required!</div>
            </div>

            <div class="mb-3">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
              <div class="invalid-feedback">Username is required!</div>
            </div>

            <div class="mb-3">
              <input autocomplete="off" type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
              <div class="invalid-feedback">Password is required!</div>
            </div>

            <div class="mb-3">
            <select class="form-select form-select-lg" id="Rolw_id2" name="Rolw_id2">
              <option selected >- User Role -</option>  
                <?php
                $sql = "SELECT * FROM `user_role` ORDER BY user_role_id ASC";
                $office = mysqli_query($con,$sql);
                ?>

                <?php   while ($row = mysqli_fetch_array($office, MYSQLI_ASSOC)):;?>
                <option value="<?php echo $row["Rolw_id2"];?>">  <?php echo $row["role"];?> </option>
                <?php endwhile;?>
              <div class="invalid-feedback">Role is required!</div>
            </select>
            </div>

            <div class="mb-3">
              <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add New User Modal End -->

  <!-- Edit User Modal Start -->
  <div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit This User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate>
              <div class="mb-3">
                <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" required>
                <div class="invalid-feedback">Name is required!</div>
              </div>

            <div class="mb-3">
            <select class="form-select form-control-lg" id="office_id" name="office_id">
                <option selected >- Select Office -</option>

                <?php
                $sql = "SELECT * FROM `office` ORDER BY office_id ASC";
                $office = mysqli_query($con,$sql);
                ?>

                <?php   while ($row = mysqli_fetch_array($office, MYSQLI_ASSOC)):;?>
                <option value="<?php echo $row["office_id"];?>">  <?php echo $row["office_name"];?> </option>
                <?php endwhile;?>
              <div class="invalid-feedback">Office is required!</div>
              </select>    
            </div>

            <div class="mb-3">
              <input type="text" name="contact_no" class="form-control form-control-lg" placeholder="Contact Number" required>
              <div class="invalid-feedback">Contact Number is required!</div>
            </div>

            <div class="mb-3">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
              <div class="invalid-feedback">Username is required!</div>
            </div>

            <div class="mb-3">
              <input autocomplete="off" type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
              <div class="invalid-feedback">Password is required!</div>
            </div>

            <div class="mb-3">
            <select class="form-select form-select-lg" id="user_role_id" name="user_role_id">
              <option selected >- User Role -</option>  
                <?php
                $sql = "SELECT * FROM `user_role` ORDER BY user_role_id ASC";
                $office = mysqli_query($con,$sql);
                ?>

                <?php   while ($row = mysqli_fetch_array($office, MYSQLI_ASSOC)):;?>
                <option value="<?php echo $row["user_role_id"];?>">  <?php echo $row["role"];?> </option>
                <?php endwhile;?>
              <div class="invalid-feedback">Role is required!</div>
            </select>
            </div>

            <div class="mb-3">
              <input type="submit" value="Update User" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit User Modal End -->




  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-primary">List of DENR Users</h4>
        </div>
        <div>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal2">Add New User</button>
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
          <table class="table table-striped table-bordered text-center">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Office</th>
                <th>Contact No.</th>
                <th>Username</th>
                <th>User Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
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
  </body>

</html>