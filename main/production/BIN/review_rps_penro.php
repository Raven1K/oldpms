
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>

<?php 



require_once "../../processphp/config.php";
session_start();


        $l_id = $_GET['lumber_app_id'];

        $number = '2';
        // for Barangay Code 


        $lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id && Number_of_doc = $number  ";
        $lumber_app_qry = mysqli_query($con, $lumber_app);
        $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
        $lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];


        

        // echo $lumber_ap_show_applicationform;
        // echo $lumber_supply_contract;
        // $n ="../../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;
        // $n1 ="../../processphp/clientupload/uploads/" .'/'. $lumber_supply_contract;
        // $n2 ="../../processphp/clientupload/uploads/" .'/'. $mayor_permit;
        // $n3 ="../../processphp/clientupload/uploads/" .'/'. $annual_bus_plan;
        // $n4 ="../../processphp/clientupload/uploads/" .'/'. $latest_income_tax;
        // $n5 ="../../processphp/clientupload/uploads/" .'/'. $proof_ownership;
        // $n1 ="sample.pdf"



 



?> 

<?php

$datavastr = '0';
$datavastr2 = '2';

$stmt = $connection->query("SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 

{


if (($row['doc_app_ind']) == ($datavastr)) {

  // echo $row['doc_app_ind'];
// return 0;


}
elseif (($row['doc_app_ind']) == ($datavastr2)) {

  // echo $row['doc_app_ind'];


}

else {


}

}



?>


<?php

$datavastr = '0';
$datavastr2 = '2';
$str_trt1 = '1';
$str_trt = '0';




$stmt = $connection->query("SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id && doc_app_ind = $datavastr");
if ($stmt->rowCount() == 0) 
{

echo 'Zero not Existing';


$stmt = $connection->query("SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id && doc_app_ind = $datavastr2");
if ($stmt->rowCount() == 0) {
  echo 'Disapprove Not Existing';

  
 
  // $stat_uss = 'For Cenro Approval';
  // $Flow_stats = '9';
  
  // $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
  // WHERE lumber_app_id = $l_id";
  // $stmt = $connection->prepare($sql);
  // $stmt->execute(array(
  // ':Status' => $stat_uss,
  // ':Flow_stat' => $Flow_stats,));



  echo ' Approved';
}else

{

  $stat_uss = 'For Re-apply';
  $Flow_stats = '3';
  
  $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
  WHERE lumber_app_id = $l_id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  ':Status' => $stat_uss,
  ':Flow_stat' => $Flow_stats,));



}





}







while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 

{
  echo $row['doc_app_ind'];
// return 0;
}

?>








<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS - DENR R13</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard.php" class="sidebar-brand d-flex align-items-center" ><img class="img-fluid img-overlay" src="images/oldpmslogo.png" alt="logo"/></a>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="application.php"><i class="fa fa-edit"></i> Evaluation </a></li>
                  <li><a href="payment.php"><i class="fa fa-paypal"></i> Payment </a></li>
                  <li><a href="validation.php"><i class="fa fa-location-arrow"></i> Validation </a></li>
                  <li><a href="sitevalidated.php"><i class="fa fa-map-marker"></i> Site Validated </a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              </div>
            <!-- /sidebar menu -->

             <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
           <div class="nav_menu navbar-dark" style="background: #222222">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
              <div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
              <a href="dashboard.php"><h5>ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5></a>
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/faces/face28.png" alt="" ><span style="color: green">FUU - CENRO</span>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="javascript:;"> Message</a>                   
                      <a class="dropdown-item"  href="javascript:;">
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1>Review Uploaded Documents</h1>
                    <h2>Click the Document Status to View</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <tr>
                            <th> Doc No. </th>
                            <th> Document Name </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                         
  


                        <?php
                        require_once "../../processphp/config.php";
                        // session_start();
                        
                   ?>
                        

                <?php


          $stmt = $connection->query("SELECT * FROM lumber_app_doc_erow where lumber_app_id = $l_id");
          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
          
          {

              $Review = 'Approved';
              $Review2 = 'For Review';
              $For_Review_FG = 'For Review (FG)';
              $ApprovedFG = 'Approved (FG)';
              $For_Review_CG = 'For Review (CG)' ;
              $Approved_CG = 'Approved (CG)';

                echo "<tr><td>" ;
                echo(htmlentities($row['Number_of_doc']));
                echo("</td><td>");
                echo(htmlentities($row['doc_type_name']));
                echo("</td><td>");
                echo(htmlentities ($row['doc_status']) );
                // echo('<a class="btn btn-warning" "'($row['doc_type_name'])'"");
                // echo(htmlentities($row['doc_status']) . '' . ($row['perm_lname']));
                echo("</td><td>");


       
                // echo(htmlentities($row['application_type']));
                // echo("</td><td>");
                if (($row['doc_status']) == ($Review))
                echo('<a class="btn btn-warning" href="modal_reviewdrpschief.php?upload_id_doc='.$row['upload_id_doc'].'">View </a>');
                
      
                // echo('<a class="btn btn-warning" data-toggle="modal" data-target="#myModal1" >Review </a>');
              
                if (($row['doc_status']) == ($Review2))
                echo('<a class="btn btn-warning" href="modaltempVIEWER.php?lumber_app_id='.$row['lumber_app_id'].'">Review </a>');

                if (($row['doc_status']) == ($For_Review_FG))
                echo('<a class="btn btn-warning" href="modaltempVIEWER.php?lumber_app_id='.$row['lumber_app_id'].'">Review </a>');

                if (($row['doc_status']) == ($ApprovedFG))
                echo('<a class="btn btn-warning" href="modaltempVIEWER.php?lumber_app_id='.$row['lumber_app_id'].'">View </a>');

                if (($row['doc_status']) == ($For_Review_CG))
                echo('<a class="btn btn-warning" href="generates_view_pdf_DMOIV.php?lumber_app_id='.$row['lumber_app_id'].'">View </a>');

                if (($row['doc_status']) == ($Approved_CG))
                echo('<a class="btn btn-warning" href="generates_view_pdf2.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');





                
          }
                // echo('<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$row['user_id'].'" class="img-fluid" alt="QR Not available"  width="50" height="50t"');
    
 
                echo("</td></tr>\n");


                // include 'modal_review.php';

                  ?>
          








                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php 

if ( isset($_POST['Approve_All'])) {

 
  // $stat_uss = 'For Review PENRO';
  $stat_uss = 'For Recommend PENRO';



  $Flow_stats = '11';
  
  $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
   WHERE lumber_app_id = $l_id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  ':Status' => $stat_uss,
  ':Flow_stat' => $Flow_stats,));



 // -------------------------------------------------------------------------------


 $date2 = date('m/d/y');

 function getFullMonthNameFromDate($date3){
  $monthName = date('F d, Y', strtotime($date3));
  return $monthName;
       }
 
 
      //  $date = $row['date_recieve'] ;
      $date3 = $date2 ;
             getFullMonthNameFromDate($date3);
 
 
 
 
 date_default_timezone_set("Asia/Manila");
 $Time = date("h:i:sa");
 
 
 
    $Title = 'PENRO FUU check and received';
    $Details = 'PENRO FUU check and received the CSW application from CENRO';
    
 
    $query = $connection->prepare("INSERT INTO client_client_document_history(
     lumber_app_id,
     Date,
     Title,
     Details,
     Time
 
     )
    VALUES (
     :lumber_app_id,
     :Date,
     :Title,
     :Details,
     :Time
     
     )");
    $query->bindParam("lumber_app_id", $nshow, PDO::PARAM_STR);
    $query->bindParam("Date", $date2, PDO::PARAM_STR);
    $query->bindParam("Title", $Title, PDO::PARAM_STR);
    $query->bindParam("Details", $Details, PDO::PARAM_STR);
    $query->bindParam("Time", $Time, PDO::PARAM_STR);
 
    
    $result = $query->execute();
    
 
 
 
 
 
 // ------------------------------------------------------------------------------------------------
   // header( 'Location: review.php' ) ;
 


  function function_alert($message) {
      
    // Display the alert box 
	echo "<script type='text/javascript'>alert('successfully Added');location='application.php';</script>";
}
  
  
// Function call
function_alert("Successfully Submitted!");



  }

?>



           <Form method="POST" > <input  class="btn btn-Success" type="submit" value="Approve" name="Approve_All"> </Form>

      </div>
    </div>
  </div>
</div>
</div>
</div>



<!-- footer content -->
<footer class="footer-dark" style="background: #222222">
<div class="copyright text-white my-auto border-top-0 d-sm-flex align-items-center justify-content-between mb-4">
						<h6>Department of Environment and Natural Resources - CARAGA Region <h/6> 
						<h5>DENR Regional ICT Caraga </h5> 
                        <h6>&copy; Copyright 2022. All Rights Reserved </h6>
                    </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
      

  </body>
</html>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>