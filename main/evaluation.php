<?php


error_reporting(0);

require_once "../processphp/config.php";
$l_id = $_GET['lumber_app_id'];


$lumber_app_id = $_GET['lumber_app_id'];

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id ";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row3 = mysqli_fetch_assoc($lumber_app_qry);
$username = $lumber_ap_row3['perm_fname'].' '.$lumber_ap_row3['perm_lname'];
$bussiness_name = $lumber_ap_row3['bussiness_name'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OLDPMS | DENR R13</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css">
       
    <!-- Datatables -->
    
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
	  
	<style>
		.btn {
 			 width:80%;
			 }
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
		  
        		<!-- sidebar navigation -->        
          			<?php
						require_once('sidebar.php');
					?>        
				<!-- /sidebar navigation -->
		
         		<!-- top navigation -->
		  
					<?php
						require_once('topbar.php');
					?> 
		  
        		<!-- /top navigation -->

        
        <!-- page content -->
    <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
				  <h3 class="text-success"><strong>For Evaluation</strong> <small>  | Lumber Dealers of Caraga Region</small></h3>
              </div>              
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="text-info"><?php echo $username; ?> <small> | <?php echo $bussiness_name ; ?> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<div class="row justify-content-center">

							  <li><a href="action.php" class="btn-secondary btn-sm btn-round btn ml-0">                                       				 
									   <span class="text align-content-center text-white"><strong>Back</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-circle-chevron-left text-white"></i>
										</span>
							  </li></a>

                <!-- <li>
                  <a href="#" class="btn-secondary btn-sm btn-round btn ml-0" data-toggle="modal" data-target="#exampleModal" style="visibility:visible;background-color:blue;color:white;">
                      <span class="text align-content-center text-white"><strong>Return</strong></span>
                      <span class="icon ml-2">
                          <i class="fas fa-circle-chevron-left text-white"></i>
                      </span>
                  </a>
              </li> -->


              <?php include 'return.php'; ?>
             <!-- <button type="button" class="btn btn-return" data-toggle="modal" data-target="#exampleModal" style="visibility:visible;background-color:blue;color:white;">Return</button> -->

             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="post">
                                <div class="form-group">

                                <label for="message-text" class="col-form-label">Remarks:</label>
                                <textarea class="form-control" id="message-text" name="message-text" required ></textarea>

                              </div>

                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary" name="return" >Return FUU</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>






                    <?php
    if (isset($_POST['return'])){

      $lumber_app_id = $_GET['lumber_app_id'];
      $Remarks = "From: " . $_SESSION['user_role_name'] . " > " . $_POST['message-text'];


      
$_10 = '10';
$_9 = '9';
$_8 = '8';
$_7 = '7';

      $sql = "DELETE FROM lumber_app_doc_erow WHERE lumber_app_id = $lumber_app_id && Number_of_doc IN ($_10, '$_9', '$_8', '$_7')";

      $result = mysqli_query($con, $sql);

if($result) {

} else {

}

  

      $Flow_stat = '4';
      $Status = 'Returned';
      $Application_status = 'Return' ;
   
      
  
      

      $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat, Remarks = :Remarks, Application_status = :Application_status WHERE        	lumber_app_id = $lumber_app_id";
      $stmt = $connection->prepare($sql);
      $stmt->execute(array(

      ':Application_status' => $Application_status, 
      ':Status' => $Status,
      ':Flow_stat' => $Flow_stat,
      ':Remarks' => $Remarks,));


      $Title = 'Document Returned by ' . ' ' . $_SESSION['user_role_name'];

		  $Details = 'We are sorry to hear that your documents were returned to CENRO FUU due to 
      a mistake in some of the documents. We will make sure all documents are correct before sending them back.
       Thank you for your understanding and consideration.    
		  ';


      $date2 = date('m/d/y');

      function getFullMonthNameFromDate($date3){
     $monthName = date('F d, Y', strtotime($date3));
     return $monthName;
        }
      
      
     
       $date3 = $date2 ;
            getFullMonthNameFromDate($date3);
      
      
      
      
      date_default_timezone_set("Asia/Manila");
      $Time = date("h:i:sa");
    
      
      $query2 = $connection->prepare("INSERT INTO client_client_document_history(
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
       $query2->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
       $query2->bindParam("Date", $date2, PDO::PARAM_STR);
       $query2->bindParam("Title", $Title, PDO::PARAM_STR);
       $query2->bindParam("Details", $Details, PDO::PARAM_STR);
       $query2->bindParam("Time", $Time, PDO::PARAM_STR);
      
       
       $result2 = $query2->execute();

      echo "<script type='text/javascript'>alert('Successfully Return'); window.location.href='application.php?lumber_app_id=".$lumber_app_id."';</script>";


  }
    ?>





					    </div>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
        						<table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
								   <thead class="bg-primary text-white">                        	
										  <tr>
											  <th> No. </th>
											  <th> Document Name </th>
											  <th> Status </th>
											  <th> Action </th>
										  </tr>
								   </thead>
										   <tbody>
											
					<?php




            include 'production/cenro_cert_r.php';
            include 'production/cenro_endorsement_r.php';



                        
                   ?>
                        

                <?php


          $stmt = $connection->query("SELECT * FROM lumber_app_doc_erow  where lumber_app_id = $l_id ORDER BY doc_type_name");
          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
          
          {

              $Review = 'Approved';
              $Review2 = 'For Review';
              $For_Review_FG = 'For Review (FG)';
              $ApprovedFG = 'Approved (FG)';
              $For_Generate_Endorsement = 'For Generate Endorsement';
              $For_Review_FG_RED = 'For Review (FG) RED';
              $For_Review_CG = 'For Review (CG)' ;
              $Approved_CG = 'Approved (CG)';
              $ApprovedFG = 'Approved (FG)';
              $For_Review_FG_RED = 'For Review (FG) RED';
              $For_Generate_RED_E = 'For Generate RED Endorsement';
              $For_Generate_Lumber_Dealer_EPermit = 'For Generate Lumber Dealer E-Permit';


                echo "<tr><td>" ;
                echo(htmlentities($row['Number_of_doc']));
                echo("</td><td>");
                echo(htmlentities($row['doc_type_name']));
                echo("</td><td>");



       
                // echo(htmlentities($row['application_type']));
                // echo("</td><td>");
                if (($row['doc_status']) == ($Review)) {
                echo (htmlentities('Reviewed'));
                echo ("</td><td>");
                echo ('<a class="btn btn-warning" href="modal_review_ROFUS.php?upload_id_doc=' . $row['upload_id_doc'] . '">View </a>');
                }
                                
                elseif (($row['doc_type_name']) == ('Certification')){
                  echo (htmlentities('Reviewed'));
                  // echo (htmlentities($row['doc_status']));
                  echo ("</td><td>");
                echo('<a class="btn btn-warning" href="production\generates_view_pdf2.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
                }

                elseif (($row['doc_type_name']) == ('Endorsement for PENRO ')){
                  echo (htmlentities('Reviewed'));
                echo ("</td><td>");
                echo('<a class="btn btn-warning" href="production\generate-pdf.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
                }

                elseif (($row['doc_type_name']) == ('Endorsement for RED')){
                  echo (htmlentities('Reviewed'));
                  echo ("</td><td>");
                echo('<a class="btn btn-warning" href="production\penro_endorsement\endorsement_PENRO_modal.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
                }
                elseif (($row['doc_status']) == ($ApprovedFG)) {
                  echo (htmlentities($row['doc_status']));
                  echo ("</td><td>");
                echo('<a class="btn btn-warning" href="production\modaltempVIEWER.php?lumber_app_id='.$row['lumber_app_id'].'">View </a>');
                }
                // if (($row['doc_status']) == ($For_Review_FG_RED))
                // echo('<a class="btn btn-warning" href="production/generates_view_pdf2.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');

                elseif (($row['doc_status']) == ($For_Generate_RED_E)){
                  echo (htmlentities($row['doc_status']));
                  echo ("</td><td>");
                echo('<a class="btn btn-danger" href="endorsement3.php?lumber_app_id='.$row['lumber_app_id'].'">Prepare</a>');
                }

                elseif (($row['doc_status']) == ($For_Generate_Lumber_Dealer_EPermit)){
                  echo (htmlentities($row['doc_status']));
                  echo ("</td><td>");
                  echo('<a class="btn btn-danger" href="endorsement1.php?lumber_app_id='.$row['lumber_app_id'].'">Prepare</a>');
                
                 } elseif (($row['doc_type_name']) == ('For Initial Generated RED Endorsement')){
                  echo (htmlentities($row['doc_status']));
                  echo ("</td><td>");
                  echo('<button type="disabled" class="btn btn-success"  target="_blank" href="endorsement1.php?lumber_app_id='.$row['lumber_app_id'].'" >Prepared</button>');
                }

                
               elseif (($row['doc_status']) == ('For Review (LPDD) CF')){
                echo (htmlentities($row['doc_status']));
                echo ("</td><td>");
                echo('<button type="disabled" class="btn btn-success"  target="_blank" href="endorsement1.php?lumber_app_id='.$row['lumber_app_id'].'" >Prepared</button>');
              }
                
      
                // echo('<a class="btn btn-warning" data-toggle="modal" data-target="#myModal1" >Review </a>');




          }
                // echo('<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$row['user_id'].'" class="img-fluid" alt="QR Not available"  width="50" height="50t"');
    
 
                echo("</td></tr>\n");


                // include 'modal_review.php';

                  ?>







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
        </div>	
        <!-- /page content -->

        <!-- footer content -->
        <?php
		   require_once("footer.php")
		  ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>

  </body>
</html>
