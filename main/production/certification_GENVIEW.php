
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    
    
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

<script>
      $(document).ready(function(){
        $("#opencertification").modal('show');

  
	$("#myBtn").click(function(){
    $("#opencertification").modal("hide");
  });
  
  $("#opencertification").on('hide.bs.modal', function(){
    // alert('The modal is about to be hidden.');
    history.back();
  });






      });



</script>


                          <!-- Modal -->

                          <?php           

                                session_start();
                                include "../../processphp/config.php";
                                
                                $office_id = "CENRO";
                                $sql = "SELECT * FROM office ORDER BY office_name ASC";
                                $province = mysqli_query($con,$sql);
                                $nshow = $_GET['lumber_app_id'];
                                $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $nshow";
                                $lumber_app_qry = mysqli_query($con, $lumber_app);
                                $result = mysqli_fetch_assoc($lumber_app_qry);
                                $Office_1 = $result['Office'];    

                                echo '
                                <div class="modal fade" id="opencertification" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true" >
                                      <div class="modal-dialog" style="max-width: 80%; height: 50vh;">                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="printModalLabel">GENERATE CERTIFICATION</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="generates_view_pdf.php?lumber_app_id=' . $result['lumber_app_id'] . '" style="width: 100%; height: 70vh; border: none;"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                            <form class="form-control" method="post">
                                                <input  class="btn btn-Success" type="submit" value="Approve" name="Approve">
                                                <input  class="btn btn-Danger" type="submit" value="Disapprove" name="Disapprove">
                                                 </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                           
                                                </div>
                                        </div>
                                    </div>
                                </div>';


                          
                          ?>



                    







                          <div class="modal fade" id="myModal1" role="dialog">
                                   <div class="modal-dialog modal-lg">
                                 <!-- Modal content-->
                                    <div class="modal-content">
                                     <div class="modal-header">
                                     <h4 class="modal-title">GENERATE CERTIFICATION</h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       </div>
                                       <div class="modal-body">
                                       <form class="form-label-left input_mask" method="post" action="generates_view_pdf.php" target="_blank">

                  


                                <input type="text" class="form-control has-feedback-left" required="required"  placeholder="Permitee" name="lumber_app_id" id="lumber_app_id" value="<?php echo $result['lumber_app_id']; ?>" hidden  >

                               
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                  <div class="col-md-9 col-sm-9  offset-md-4">
                                    <button type="submit" class="btn btn-success">View Certification</button>
                                  </div>
                                </div>
                            </form>
                   <div class="modal-footer">
                    <!-- END MODAL -->




<?php
if ( isset($_POST['Approve'])) {

  $lumber_app_id = $nshow ;

if ($Office_1 == 'SIPLAS') {

  $stat_uss = 'For Cenro Approval';
  $Flow_stats = '9';
  
  $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  ':Status' => $stat_uss,
  ':Flow_stat' => $Flow_stats,));

}else{
  

  $stat_uss = 'Recommending Approval';
  $Flow_stats = '8';
  
  $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat WHERE lumber_app_id = $lumber_app_id";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  ':Status' => $stat_uss,
  ':Flow_stat' => $Flow_stats,));
}
  
  $numberofdoc = '9';
  $docstatus = 'Approved (CG)';
  
  $sql = "UPDATE lumber_app_doc_erow SET doc_status = :doc_status WHERE lumber_app_id = $lumber_app_id && Number_of_doc = $numberofdoc";
  $stmt = $connection->prepare($sql);
  $stmt->execute(array(
  ':doc_status' => $docstatus,));


  // return;











  // -------------------------------------------------------------------------------


date_default_timezone_set("Asia/Manila");

$Time = date("h:i:sa");

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



  //  $Title = 'Chief RPS Prepared the Endorsement';
  //  $Details = 'Chief RPS prepared the endorsement for recommending approval of DMO IV.';
   

  //  $query = $connection->prepare("INSERT INTO client_client_document_history(
  //   lumber_app_id,
  //   Date,
  //   Title,
  //   Details,
  //   Time

  //   )
  //  VALUES (
  //   :lumber_app_id,
  //   :Date,
  //   :Title,
  //   :Details,
  //   :Time
    
  //   )");
  //  $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
  //  $query->bindParam("Date", $date2, PDO::PARAM_STR);
  //  $query->bindParam("Title", $Title, PDO::PARAM_STR);
  //  $query->bindParam("Details", $Details, PDO::PARAM_STR);
  //  $query->bindParam("Time", $Time, PDO::PARAM_STR);

   
  //  $result = $query->execute();
   





// -------------------------------------------------------------------------------







  // header( "Location: reviewrpschief.php?lumber_app_id=$lumber_app_id" ) ;

  echo "<script>window.location.href = 'reviewrpschief.php?lumber_app_id={$lumber_app_id}';</script>";
      
  echo '<script>alert("Successfully Approved"); window.location.href = "reviewrpschief.php?lumber_app_id=' . $lumber_app_id . '";</script>';
  return; 

}


if ( isset($_POST['Disapprove'])) 

{
$sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
doc_app_ind = :doc_app_ind, doc_status = :doc_status
WHERE upload_id_doc  = $nshow";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':date_approved' => $dtdis,
':date_disapprove' => $date,
':doc_app_ind' => $inddoc2,
':doc_status' => $docstat2,));
// $_SESSION['success'] = 'Record updated';
// header( 'Location: review.php' ) ;

  // return;











  header( "Location: reviewrpschief.php?lumber_app_id=$lumber_app_id" ) ;
      
  echo 'Successfully Approved';
  return; 

}

?>




                <form class="form-control" method="post">

                   <input  class="btn btn-Success" type="submit" value="Approve" name="Approve">
                   <input  class="btn btn-Danger" type="submit" value="Disapprove" name="Disapprove">

                   <form>
    
                                </div>
                                      
                                    </div>
                                  </div>
                                </div>
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

</html>
