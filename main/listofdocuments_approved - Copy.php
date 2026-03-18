<?php

error_reporting(0);
                        require_once "../processphp/config.php";
                        // session_start();
						$l_id = $_GET['lumber_app_id'];
            // include 'prc_approve_modal/evaluationlRORecommender.php';


            include 'production/cenro_cert_r.php';
            include 'production/cenro_endorsement_r.php';

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
                    <h2 class="text-info">Juan Dela Cruz<small> | No1knows Lumber Dealer</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<div class="row justify-content-center">

							 
       
                

									   <span class="text align-content-center text-white"><strong>Approve</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-check-to-slot text-white"></i>
										</span>
							  </li></a>
							  <li><a href="production/list_released_permit.php" class="btn-secondary btn-sm btn-round btn ml-0">                                       				 
									   <span class="text align-content-center text-white"><strong>Back</strong></span>
										<span class="icon ml-2">
											   <i class="fas fa-circle-chevron-left text-white"></i>
										</span>
							  </li></a>
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

if ( isset($_POST['Approve'])) {

        $stat_uss = 'For Client';
        $Flow_stats = '17';
        
        $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $l_id";
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



   $Title = 'Regional Executive Director';
   $Details = 'Final document review, approval of the Lumber Dealer E-Permit, Memorandum informing concerned PENROs and CENROs of the approved endorsed lumber dealer application and the acknowledgment letter for the applicant confirming that the e-permit was received.'.'<br><br>'.'
  
   Approved E-Permit and Acknowledgement Letter forwarded to Records Unit to release the documents.
   ';
   

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
   $query2->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
   $query2->bindParam("Date", $date2, PDO::PARAM_STR);
   $query2->bindParam("Title", $Title, PDO::PARAM_STR);
   $query2->bindParam("Details", $Details, PDO::PARAM_STR);
   $query2->bindParam("Time", $Time, PDO::PARAM_STR);

   
   $result2 = $query2->execute();

//   Forward the Approved e-Certificate of Registration and acknowledgement letter to the Records for releasing 
   

                // $Title = 'Forward the Approved e-Certificate';
                // $Details = 'Forward the Approved e-Certificate of Registration and acknowledgement letter to the Records for releasing.';
                

                // $query2 = $connection->prepare("INSERT INTO client_client_document_history(
                //   lumber_app_id,
                //   Date,
                //   Title,
                //   Details,
                //   Time

                //   )
                // VALUES (
                //   :lumber_app_id,
                //   :Date,
                //   :Title,
                //   :Details,
                //   :Time
                  
                //   )");
                // $query2->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
                // $query2->bindParam("Date", $date2, PDO::PARAM_STR);
                // $query2->bindParam("Title", $Title, PDO::PARAM_STR);
                // $query2->bindParam("Details", $Details, PDO::PARAM_STR);
                // $query2->bindParam("Time", $Time, PDO::PARAM_STR);

                
                // $result2 = $query2->execute();
                
   

// ------------------------------------------------------------------------------------------------

  









  $date =  date("m/d/Y") ; 

  $doc_type_name = 'Release Certification';
  $date_applied =  $date ;
  $Number_of_doc = '14';
  $doc_app_ind = '0';
  $doc_status = 'View Certificaton to Release';
  
  
  $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(
	  lumber_app_id,
	  doc_type_name,
	  date_applied,
	  doc_status,
	  Number_of_doc,
	  doc_app_ind
  
	  )
  VALUES (
	  :lumber_app_id,
	  :doc_type_name,
	  :date_applied,
	  :doc_status,
	  :Number_of_doc,
	  :doc_app_ind
  
  
  )");
  $query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
  $query->bindParam("doc_type_name", $doc_type_name, PDO::PARAM_STR);
  $query->bindParam("date_applied", $date, PDO::PARAM_STR);
  $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);
  $query->bindParam("Number_of_doc", $Number_of_doc, PDO::PARAM_STR);
  $query->bindParam("doc_app_ind", $doc_app_ind, PDO::PARAM_STR);
  
  $result = $query->execute();








  
  function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');location='action.php';</script>";
}

function_alert("Successfully Approved!");
  // header( "Location: ../evaluationlRORecommender.php?lumber_app_id='$l_id'" ) ;
  
  // echo 'Successfully Approved';
  return; 
}


?>


                <?php


$stmt = $connection->query("SELECT * FROM lumber_app_doc_erow WHERE lumber_app_id = $l_id ORDER BY Number_of_doc");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
{
    // Define review status variables
    $Review = 'Approved';
    $For_Review_FG = 'For Review (FG)';
    $ApprovedFG = 'Approved (FG)';
    $For_Generate_Endorsement = 'For Generate Endorsement';
    $For_Review_FG_RED = 'For Review (FG) RED';
    $For_Review_CG = 'For Review (CG)';
    $Approved_CG = 'Approved (CG)';
    $For_Gen_EN_Red = 'For Review (LPDD)';
    $For_Review_LPDD_CF = 'For Review (LPDD) CF';

    echo "<tr><td>" ;
    echo(htmlentities($row['Number_of_doc']));
    echo("</td><td>");
    echo(htmlentities($row['doc_type_name']));
    echo("</td><td>");

    // Check document status and type to determine the next actions
    if ($row['doc_status'] == $Review) {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-warning" href="modal_review_ROFUS.php?upload_id_doc='.htmlentities($row['upload_id_doc']).'">View</a>');

    } elseif ($row['doc_status'] == $ApprovedFG) {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-warning" href="production/modaltempVIEWER.php?lumber_app_id='.htmlentities($row['lumber_app_id']).'">View</a>');

    } elseif ($row['doc_type_name'] == 'Certification') {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-warning" target="_blank" href="production/generates_view_pdf2.php?lumber_app_id='.htmlentities($row['lumber_app_id']).'">View</a>');

    } elseif ($row['doc_type_name'] == 'Endorsement for PENRO') {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-warning" target="_blank" href="production/endorsement_PENRO_modal.php?lumber_app_id='.htmlentities($row['lumber_app_id']).'">View</a>');

    } elseif ($row['doc_type_name'] == 'Endorsement for RED') {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-warning" target="_blank" href="production/penro_endorsement/endorsement_PENRO_modal.php?lumber_app_id='.htmlentities($row['lumber_app_id']).'">View</a>');

    } elseif ($row['doc_status'] == $For_Gen_EN_Red) {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-success" href="modaltemp_RED.php?lumber_app_id='.htmlentities($row['lumber_app_id']).'">View</a>');

    } elseif ($row['doc_status'] == $For_Review_LPDD_CF) {
        echo(htmlentities('Reviewed'));
        echo("</td><td>");
        echo('<a class="btn btn-success" target="_blank" href="generate_viewLumberEdealer.php?lumber_app_id='.htmlentities($row['lumber_app_id']).'">View</a>');

    } else {
        echo(htmlentities('Status unknown'));
        echo("</td><td>");
        echo('No actions available');
    }
    
    echo("</td></tr>\n");
}


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
