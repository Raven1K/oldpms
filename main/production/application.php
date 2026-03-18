
<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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


              $clientname = $lumber_ap_row['name'];
              $user_role = $lumber_ap_row['user_role_id'];
              $office_id = $lumber_ap_row['office_id'];


              $lumber_app = "SELECT * FROM office where office_id = $office_id";
              $lumber_app_qry = mysqli_query($con, $lumber_app);
              $lumber_ap_row2 = mysqli_fetch_assoc($lumber_app_qry);


              $station = $lumber_ap_row2['station'];
              $office_under = $lumber_ap_row2['office_under'];

?> 






<!DOCTYPE html>
<html lang="en">
  <head>


  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>OLDPMS - DENR R13</title>

<?php 
      require_once 'link.php';
  ?>
  </head>

  <?php 
      require_once 'navbar.php';
  ?>








<?php 


if (isset($_POST['remarks'])){

  $remarks = $_POST['Remarks'];
  

  


 echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
 echo '<div class="modal-dialog" role="document">';
 echo  '<div class="modal-content">';
 echo   '<div class="modal-header">' ;
 echo   '<h5 class="modal-title" id="exampleModalLabel">Remarks</h5>';
 echo    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
 echo    '<span aria-hidden="true">&times;</span>';
 echo    '</button>';
 echo    '</div>';
 echo    '<div class="modal-body">';
 echo    '<form method="post">';
 echo    '<div class="form-group">';

 echo       '<label for="message-text" class="col-form-label">Remarks:</label>';


 echo '<textarea class="form-control" id="message-text" name="'.$remarks.'" style="resize:none;overflow-y:scroll;" rows="5">'.$remarks.'</textarea>';

 echo      '</div>';

 echo    '</div>';
 echo     '<div class="modal-footer">';

 echo     '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';

//  echo     '<button type="submit" class="btn btn-primary" name="return" >Return FUU</button>';
 echo      '</form>';
        echo   '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';



        echo "<script>$(document).ready(function(){ $('#exampleModal').modal('show'); });</script>";

  
}

?>
       
        <div class="right_col" role="main">
					<div class="clearfix"></div>
					<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>For Action</h2>
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
                            <th> ID </th>
                            <th> UID </th>
                            <th> Name of Permittee </th>
                            <th> Reg Status </th>
                            <th> Address </th>
                            <th> Schedule for Site Validation</th>
                            <th> Date Filed </th>
                            <th> Date Received </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                  
                   <?php
                        require_once "../../processphp/config.php";
         


                   ?>
                        




                <?php


     function getFullMonthNameFromDate($date){
     $monthName = date('F d, Y', strtotime($date));
     return $monthName;
          }


          if (($user_role) == ('1')){

            $_1 = '1' ;
            $_3 = '3' ;
            $_4 = '4';
            $_6point3 = '6.3' ;
            $_6 = '6' ;

          $stmt = $connection->query("SELECT perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Office, Application_status, Remarks FROM lumber_application 
          where Office = '$station' && Flow_stat = '1' or  Office = '$station' && Flow_stat = '3' or  Office = '$station' && Flow_stat = '4' or  Office = '$station' &&  Flow_stat = '6' or  Office = '$station' && Flow_stat = '6.1' 
          or  Office = '$station' && Flow_stat = '6.2' or  Office = '$station' && Flow_stat = '6.3' or  Office = '$station' && Application_status = 'Return_FUU' ");

          }



          elseif (($user_role) == ('2')){

            $stmt = $connection->query("SELECT perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Office FROM lumber_application
             where Office = '$station' && Flow_stat = '2' ");
  
      
      
      
          }




          elseif (($user_role) == ('4')){

            $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application where Office = '$station' && Flow_stat = '0'");
  
          }

         elseif (($user_role) == ('7')){

          $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application where Office = '$station' &&  Flow_stat = '7'");

        }

         elseif (($user_role) == ('8')){

        $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application where Office = '$station' &&  Flow_stat = '8'");

         }

    // CENRO 
         elseif (($user_role) == ('9')){

          $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application 
          where Office = '$station' &&   Status = 'For Cenro Approval' or Status = 'For Cenro Order of Payment Approval'");

           }


    // CENRO 
         elseif (($user_role) == ('9.1')){

          $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application 
          where office_under = '$office_under' && Status = 'For Review PENRO FUU'  ");

           }


    elseif (($user_role) == ('10')){

          $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application 
          where office_under = '$office_under' &&  Flow_stat = '10' and Status = 'For RPS Chief PENRO' ");

    }

    






   elseif (($user_role) == ('11')){

    $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application 
    where office_under = '$office_under' &&  Flow_stat = '11' ");

    }

 
    elseif (($user_role) == ('12')){

  $stmt = $connection->query("SELECT   perm_lname, lumber_app_id, uniqid_lapp, perm_fname, full_address, application_type, Status, date_applied, date_recieve, Status_, Site_Validation_Schedule, Application_status, Remarks FROM lumber_application 
  where office_under = '$office_under' && Flow_stat = '12' ");

    }






          while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

          

    
                $for_acknowlege = 'For Acknowledgement' ;
                $on_process = 'On Process';
                $reevaluation = 'For reevaluation';
                $For_Re_apply = 'For Re-apply';
                $Payment = 'For Payment';
                $onsitevalidation = 'For On Site Validation';
                $id = $row['lumber_app_id'];
                $onClick = "document.forms.myform.id.value='$id';document.forms.myform.submit();";
                $validationinformaton = "For Validation Information";
                $forendorsement = 'For Endorsement';
                $crpsoivinitial = 'For Initial Chief RPS';
                $Recommending_Approval = 'Recommending Approval';
                $For_Cenro_Approval = 'For Cenro Approval';
                $For_Review_PENRO = 'For Review PENRO' ;
                $For_Recommend_PENRO = 'For Recommend PENRO';
                $Approve_PENRO = 'For Approve PENRO';
                $ValidateFUS = 'For Valitdate FUS';
                $Certification = 'For Certification';
                $For_receive_RO_FUS = 'For receive RO FUS';
                $For_Review_R_PENRO = 'For Review R-PENRO';
                $For_Review_R_CENRO = 'For Review R-CENRO';

                $For_Review_PENRO_FUU = 'For Review PENRO FUU';
                $For_RPS_Chief_PENRO = 'For RPS Chief PENRO' ;
                $Return = 'Return' ;



                echo "<tr><td>" ;
                echo(htmlentities($row['lumber_app_id']));
                echo("</td><td>");
                echo('<img src="https://api.qrserver.com/v1/create-qr-code/?size=50x50&data='.$row['uniqid_lapp'].'" class="img-fluid" alt="QR Not available"');
                

                echo("</td><td>");
                echo(htmlentities($row['perm_fname']) . ' ' . ($row['perm_lname']));
                echo("</td><td>");
                echo(htmlentities($row['Status_']));
                echo("</td><td>");
                echo(htmlentities($row['full_address']));
                echo("</td><td>");
                echo(htmlentities($row['Site_Validation_Schedule']));
                echo("</td><td>");



         
               
               $date = $row['date_applied'] ;
               echo getFullMonthNameFromDate($date);
               echo("</td><td>");

           


               if ((!$row['date_recieve'])) {
                echo 'Not Yet Recieve'; 
                echo("</td><td>");
              }else{
               $date = $row['date_recieve'] ;
               echo getFullMonthNameFromDate($date);
               echo("</td><td>");
               }


               if ($_SESSION['user_role_id'] <= 1 && ($row['Application_status']) == ('Return_FUU')){
           
         
                echo('<a class="badge badge-danger">' . (($row['Application_status'])) . '</a>');

                
                echo("</td><td>");
                // echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="reuturnUPDATE.php?lumber_app_id='.$row['lumber_app_id'].'">Comply</a>');
                echo '<div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item bg-warning text-white" href="reuturnUPDATE.php?lumber_app_id=' . htmlspecialchars($row['lumber_app_id']) . '">Comply</a></li>
                    <li><a class="dropdown-item bg-info text-white" href="#" data-bs-toggle="modal" data-bs-target="#remarksModal' . htmlspecialchars(urlencode($row['lumber_app_id'])) . '">Remarks</a></li>
                    <li><a class="dropdown-item bg-danger text-white" href="#" data-bs-toggle="modal" data-bs-target="#Certification' . htmlspecialchars(urlencode($row['lumber_app_id'])) . '">Edit Certification</a></li>
                    <li><a class="dropdown-item bg-danger text-white" href="#" data-bs-toggle="modal" data-bs-target="#editspeciesendorsment' . htmlspecialchars(urlencode($row['lumber_app_id'])) . '">Endorsement</a></li>

                    </ul>           
                   </div>';
            

                   echo '
                        <div class="modal fade" id="Certification' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '" tabindex="-1" aria-labelledby="viewCssLabel" aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 50%; height: 50vh;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Certification">Edit Certification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="Edit_certification.php?lumber_app_id=' . urlencode($row['lumber_app_id']) . '" style="width: 100%; height: 85vh; border: none;"></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>';             


                        echo '
                        <div class="modal fade" id="editspeciesendorsment' . htmlspecialchars($row['lumber_app_id'], ENT_QUOTES, 'UTF-8') . '" tabindex="-1" aria-labelledby="viewCssLabel" aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 50%; height: 50vh;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editspeciesendorsment">Edit Endorsement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="edit_endorsement.php?lumber_app_id=' . urlencode($row['lumber_app_id']) . '" style="width: 100%; height: 85vh; border: none;"></iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>';      



            // Modal
            echo '<div class="modal fade" id="remarksModal' . htmlspecialchars(urlencode($row['lumber_app_id'])) . '" tabindex="-1" aria-labelledby="remarksModalLabel' . htmlspecialchars(urlencode($row['lumber_app_id'])) . '" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="remarksModalLabel' . htmlspecialchars(urlencode($row['lumber_app_id'])) . '">View Remarks</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            <form action="addRemarks.php" method="post">
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="10" required>'. (($row['Remarks'])) .'</textarea>
                                </div>
                                <input type="hidden" name="lumber_app_id" value="' . htmlspecialchars($row['lumber_app_id']) . '">
                            </form>
                        </div>
                    </div>
                </div>
            </div>';


            

       

              }elseif (($row['Application_status'] == "Return_FUU")){
                echo('<a class="badge badge-danger" >Returned to FUU</a>');
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
                            echo('<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#evaluationModal'.$row['lumber_app_id'].'">View</button>');

                            echo '<div class="modal fade" id="evaluationModal' . htmlspecialchars($row['lumber_app_id']) . '" tabindex="-1" aria-labelledby="evaluationModalLabel' . htmlspecialchars($row['lumber_app_id']) . '" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="evaluationModalLabel' . htmlspecialchars($row['lumber_app_id']) . '">View Remarks</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="remarks" class="form-label">Remarks</label>
                                                <textarea class="form-control" id="remarks" name="remarks" rows="10" readonly>'. htmlspecialchars($row['Remarks']) .'</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
              
              
              
              }else{


              if (($row['Status']) == ($for_acknowlege)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a class="btn btn-warning" href="prc_recieved.php?lumber_app_id='.$row['lumber_app_id'].'">Receive</a>');
              }
                elseif (($row['Status']) == ($on_process)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a class="btn btn-warning" href="review.php?lumber_app_id='.$row['lumber_app_id'].'">Evaluate</a>');

              }
                elseif (($row['Status']) == ($For_Re_apply)){
                echo('<a class="badge badge-danger" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a class="btn btn-danger" href="modal_remarks.php?lumber_app_id='.$row['lumber_app_id'].'">For Re Apply</a>');

              }

                elseif (($row['Status']) == ($Payment)){
                // echo('<a class="badge badge-success" > '.$row['Status'].' </a>');
                echo('<a class="badge badge-success" >For Payment</a>');
                echo("</td><td>");
      
                // echo('<a class="btn btn-success" href="addpayment.php?lumber_app_id='.$row['lumber_app_id'].'">Request for Payment</a>');

                // echo('<a class="btn btn-success" href="orderofpayment.php?lumber_app_id='.$row['lumber_app_id'].'">Request for Payment</a>');
                
                echo('<a class="btn btn-success" href="orderofpayment.php?lumber_app_id='.$row['lumber_app_id'].'">Prepare Order Of Payment</a>');

              }


             elseif (($row['Status']) == ("For the bill collectors' review")){
                echo('<a class="badge badge-warning" >For review</a>');
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="orderofpayment.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
               
              }

              elseif (($row['Status']) == ("For Cenro Order of Payment Approval")){
                echo('<a class="badge badge-warning" >For Review</a>');
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="orderofpaymentview2.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
               
              }


      

              

              
                elseif (($row['Status']) == ($onsitevalidation)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-warning"  href="../modalcalendar.php?lumber_app_id='.$row['lumber_app_id'].'">Schedule</a>');


               
              }



              elseif (($row['Status']) == ('Returned')){
                echo('<a class="badge badge-danger text-white" >Document Return</a>');
                echo '<form method="post"> 
                
              

                <br>
               
                <input type="submit" name="remarks" value="See Remarks ..." style="border: none;" />
                <input type="text" value="'.$row['Remarks'].'" name="Remarks" hidden>
                
                
                
                </form>' ;
                echo("</td><td>");
                // echo('<a  name="Submit" type="Submit" class="btn btn-danger"  href="../modalcalendar.php?lumber_app_id='.$row['lumber_app_id'].'">Schedule</a>');
                echo('<a class="btn btn-danger" href="modal_remarks.php?lumber_app_id='.$row['lumber_app_id'].'">For Re Apply</a>');
              }

              


                elseif (($row['Status']) == ($validationinformaton)){
                // echo('<a class="badge badge-primary" > '.$row['Status'].' </a>');
                echo('<a class="badge badge-primary" >For Site Validation</a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-primary"  href="validation.php?lumber_app_id='.$row['lumber_app_id'].'">Validate</a>');
               
              }

                elseif (($row['Status']) == ($forendorsement)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-warning" href="modaltemp.php?lumber_app_id='.$row['lumber_app_id'].'">Endorse</a>');
               
              }

                elseif (($row['Status']) == ($crpsoivinitial)){
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo('<a class="badge badge-warning" >For review</a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="reviewrpschief.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
               
              }

                elseif (($row['Status']) == ($Recommending_Approval)){
                echo('<a class="badge badge-warning" > For Recommending Approval </a>');
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="reviewrDMOIV.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
               
              }

                elseif (($row['Status']) == ($For_Cenro_Approval)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="reviewrCENRO.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
               
              }

                elseif (($row['Status']) == ($For_Review_PENRO)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="reviewrPENRO.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
               
              }

                elseif (($row['Status']) == ($For_Recommend_PENRO)){
                echo('<a class="badge badge-warning" >For Recommending Approval</a>');
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="RecommendPENRO.php?lumber_app_id='.$row['lumber_app_id'].'">Recommend</a>');
               
              }

                elseif (($row['Status']) == ($Approve_PENRO)){
                echo('<a class="badge badge-warning" >For Approval</a>');
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="ApprovePENRO.php?lumber_app_id='.$row['lumber_app_id'].'">Approve</a>');
               
              }



                elseif (($row['Status']) == ($Certification)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                // echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="certification_GENNEW.php?lumber_app_id='.$row['lumber_app_id'].'">Prepare</a>');
                // echo '
                // <a class="dropdown-item bg-success text-white" href="#" data-bs-toggle="modal" data-bs-target="#prepareCertification' . $row['lumber_app_id'] . '">
                //     Prepare
                // </a>';
                
                echo "<div class='dropdown'>
                <button class='btn btn-success dropdown-toggle' type='button' id='dropdownMenuButton{$srfId}' data-bs-toggle='dropdown' aria-expanded='false'>
                    Action
                </button>
                <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton{$srfId}'>
                    <li><a class='dropdown-item bg-success text-white' href='#' data-bs-toggle='modal' data-bs-target='#prepareCertification" . $row['lumber_app_id'] . "'>
                        Prepare
                    </a></li>
                    <li><a class='dropdown-item bg-info text-white' href='#' data-bs-toggle='modal' data-bs-target='#showaddedspecies" . $row['lumber_app_id'] . "'>
                        View Species
                    </a></li>
                    <li><a class='dropdown-item bg-success text-white' href='#' data-bs-toggle='modal' data-bs-target='#nocertification" . $row['lumber_app_id'] . "'>
                        No Certification
                    </a></li>
                </ul>
            </div>";
            

          
            echo "
            <div class='modal fade' id='nocertification" . $row['lumber_app_id'] . "' tabindex='-1' aria-labelledby='nocertificationLabel" . $row['lumber_app_id'] . "' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='nocertificationLabel" . $row['lumber_app_id'] . "'>No Certification</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            Are you sure you want to proceed with no certification for application ID: " . $row['lumber_app_id'] . "?
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                            <form method='POST' action='process_no_certification.php' style='display:inline;'>
                                <input type='hidden' name='lumber_app_id' value='" . $row['lumber_app_id'] . "'>
                                <button type='submit' class='btn btn-danger'>Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
            


            
            echo '
            <div class="modal fade prepareCertificationModal" id="prepareCertification' . $row['lumber_app_id'] . '" tabindex="-1" aria-labelledby="prepareCertificationModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 50%; height: 50vh;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="prepareCertificationModalLabel">Prepare Certification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            <iframe src="certification_GENNEW.php?lumber_app_id=' . $row['lumber_app_id'] . '" style="width: 100%; height: 85vh; border: none;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';

                echo '
              <script>
              // Add an event listener for when ANY modal with the class "prepareCertificationModal" is closed
              document.querySelectorAll(".prepareCertificationModal").forEach(function(modal) {
                  modal.addEventListener("hidden.bs.modal", function () {
                      // Refresh the page
                      location.reload();
                  });
              });
              </script>';


                echo '
                <div class="modal fade" id="showaddedspecies' . $row['lumber_app_id'] . '" tabindex="-1" aria-labelledby="showAddedSpeciesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="max-width: 50%; height: 50vh;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showAddedSpeciesModalLabel">Show Added Species</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                             <div class="modal-body">
                                <iframe src="show_species.php?lumber_app_id=' . $row['lumber_app_id'] . '" style="width: 100%; height: 85vh; border: none;"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>';
                






              }


              
           
             
             

                elseif (($row['Status']) == ($For_receive_RO_FUS)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="//.php?lumber_app_id='.$row['lumber_app_id'].'">Validate</a>');
               
              }



              
                elseif (($row['Status']) == ($For_Review_R_PENRO)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="review_r_penro.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
               
              }


                elseif (($row['Status']) == ($For_Review_PENRO_FUU)){
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo('<a class="badge badge-warning" >For Review</a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="reviewrPENRO.php?lumber_app_id='.$row['lumber_app_id'].'">Review</a>');
               
              }


              // -----------------------------------------------------------------------------------------------------------------------------

                elseif (($row['Status']) == ($For_Review_R_CENRO)){
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo('<a class="badge badge-warning" > For Evaluation </a>');
                echo("</td><td>");
      
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="review_r_cenro.php?lumber_app_id='.$row['lumber_app_id'].'">Evaluate</a>');
               
              }

// chief rps penro

                elseif (($row['Status']) == ($For_RPS_Chief_PENRO)){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="review_rps_penro.php?lumber_app_id='.$row['lumber_app_id'].'">View</a>');
               
              }


                elseif (($row['Status']) == ('For Order of Payment')){
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo('<a class="badge badge-warning" >Request for Payment</a>');
                echo("</td><td>");
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="prc_recieve_orderpayment.php?lumber_app_id='.$row['lumber_app_id'].'">Recieve</a>');
               
              }

                elseif (($row['Status']) == ('Order Payment')){
                // echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                      echo('<a class="badge badge-warning" >Order Payment</a>');
                echo("</td><td>");
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="orderofpayment.php?lumber_app_id='.$row['lumber_app_id'].'">Prepare</a>');
               
              }

                elseif (($row['Status']) == ('Waiting for Payment Confirmation')){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="confirm_payment.php?lumber_app_id='.$row['lumber_app_id'].'">Confirm Payment</a>');
              }

              elseif (($row['Status']) == ('Waiting for Payment Confirmation')){
                echo('<a class="badge badge-warning" > '.$row['Status'].' </a>');
                echo("</td><td>");
                echo('<a  name="Submit" type="Submit" class="btn btn-success"  href="confirm_payment.php?lumber_app_id='.$row['lumber_app_id'].'">Confirm Payment</a>');
              }



          }
    
          
        }
                echo("</td></tr>\n");

   


                

           

                  ?>


<!-- <a href="#product_view" role="button" class="btn btn-large btn-primary" id="button2" data-toggle="modal"  >Open Bootsrap Modal</a> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->










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
  

      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php 
      require_once 'footer.php';
  ?>
      

  </body>
</html>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>






