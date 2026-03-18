
<?php

error_reporting(0);
// require_once('configmysqli.php');
session_start();
include('../../processphp/config.php');
// block if no log in 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    header("location: ../../admin/login.php");
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

    $lumber_app = "SELECT * FROM user_role where Rolw_id2 = $user_role";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);
    $user_role_name = $lumber_ap_row2['role'] ;




    



    // echo $clientname ;
    // echo $user_role ;

?> 



<div class="col-md-3 left_col">
<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: #22782c">
              <a href="records.php" class="sidebar-brand d-flex align-items-center" ><img class="img-fluid img-overlay" src="../production/images/oldpmslogo.png" alt="logo"/></a>
            </div>
			<br />
		 	<br />
		 	<br />
		 	<br />
		 	<br />
			<br />
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <!-- <img src="../production/images/user.png" alt="..." class="img-circle profile_img"> -->
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
				<h2><?php echo  $user_role_name ; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          		<div class="menu_section">
            		<h3>General</h3>
            			<ul class="nav side-menu">
						  <li><a href="records.php"><i class="fas fa-fw fa-home text-white"></i> Dashboard </a></li>
						  <li><a href="action.php"><i class="fas fa-fw fa-edit"></i> For Action </a></li>
						  <li><a><i class="fas fa-fw fa-solid fa-file-text"></i> Report <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="table1.php" class="text-white">Existing Lumber Dealers</a></li>
									<li><a href="table2.php" class="text-white">Issued Certificates</a></li>
								</ul>				
			  			  </li>              			
			  			  <li><a href="maps.php"><i class="fas fa-fw fa-map-marked-alt"></i> Maps </a></li>
                <li><a href="list_released_permit.php"><i class="fas fa-fw fa-file-text"></i> List of Released E-Permit </a></li>
                		</ul>
                 </div>
              </div>
            <!-- /sidebar menu -->
</div>
</div>