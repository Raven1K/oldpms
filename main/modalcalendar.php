
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
        $("#product_view").modal('show');


   $("#myBtn").click(function(){
    $("#myCalendar").modal("hide");
  });
  
  $("#product_view").on('hide.bs.modal', function(){
    // alert('The modal is about to be hidden.');
    history.back();
  });






      });
    </script>

<div class="modal fade product_view" id="product_view" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" >ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>




        <!-- <h5 class="modal-title">I want to show the event id here <span></span></h5> -->

      

      <!-- <h5 class="modal-title"> <span id="event_id" ></span> </h5> -->

        <a href="#" data-dismiss="modal" class="class pull-right"><span
                            class="glyphicon glyphicon-remove"></span></a>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h3 class="modal-title">I want to show the event id here <span id="event_id" ></span></h3> -->

 



	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">
			<div class="x_content">


      <?php
  

  //   if ( isset($_POST['lumber_app_id'])) {
     
      //   $variable = $_GET['navigateTest2'];
    // include 'univ_var.php';
    
      //   require_once "../../processphp/config.php";
        require_once "../processphp/config.php";
    // echo  $variable ;
    
    
    // echo '<script> $("#mycalendar").modal(\'show\');</script>';
    
    
      // echo $_GET['lumber_app_id'];
  
       $l_id = $_GET['lumber_app_id'];
    
    
    $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $l_id ";
    $lumber_app_qry = mysqli_query($con, $lumber_app);
    $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
    $lumber_ap_show_name = $lumber_ap_row['perm_fname'] . ' ' . $lumber_ap_row['perm_lname'] ;
    
    $bussiness_name = $lumber_ap_row['bussiness_name'];
    
     
    
  //    }
    

    
    
    if ( isset($_POST['submit'])) {
    
  
    
    
    
       



    // $time2 = date('h:i:sa' , $time);
    // $time2  = date("h:i:sa")

            $lumber_app_id = $l_id;
            $Permittee_Name = $_POST['name'];
            $Business_Name = $_POST['occupation'];
            $Remarks = $_POST['message'];
            // $date = $_POST['date_1'];
            $time = ($_POST['time']) ;
            $Date_from = $_POST['date_1'];
            $Date_to = $_POST['date_1'];

            if (empty($time) || empty($Date_from) || empty($Date_to)) {
              // If any of the variables is empty, display an alert
              echo '<script>alert("Please fill in all the required fields."); window.location.href = "modalcalendar.php?lumber_app_id=' . urlencode($l_id) . '";</script>';
              exit();
            }
            $action_tk = '0';
            
            
            
    
    
    
            $query = $connection->prepare("INSERT INTO calendar_sitevisit_db(Permittee_Name,Business_Name,Remarks,Date_from,Date_to,lumber_app_id,action_tk, time)
            VALUES (:Permittee_Name, :Business_Name, :Remarks, :Date_from, :Date_to, :lumber_app_id, :action_tk, :time)");
            $query->bindParam("Permittee_Name", $Permittee_Name, PDO::PARAM_STR);
            $query->bindParam("Business_Name", $Business_Name, PDO::PARAM_STR);
            $query->bindParam("Remarks", $Remarks, PDO::PARAM_STR);
            $query->bindParam("Date_from", $Date_from, PDO::PARAM_STR);
            $query->bindParam("Date_to", $Date_to, PDO::PARAM_STR);
            $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
            $query->bindParam("action_tk", $action_tk, PDO::PARAM_STR);
            $query->bindParam("time", $time, PDO::PARAM_STR);
            $result = $query->execute();




            $stat_uss = 'For Client Schedule Confirmation';
            $Flow_stats = '0';
            
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



            $date3 = $date2 ;
            getFullMonthNameFromDate($date3);



            $Title = 'On Site Validation Schedule';
            $Details = 'The on-site validation will be '.' on '.($Date_from). ' at ' .($time). ' ' .($Remarks). ' '.'<br>'.' Kindly affirm the set schedule.
            
            '.'<br>'.' If NO, please indicate the reason in the remarks box.';

            date_default_timezone_set("Asia/Manila");
            $Time = date("h:i:sa");


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
            $query->bindParam("lumber_app_id", $l_id, PDO::PARAM_STR);
            $query->bindParam("Date", $date2, PDO::PARAM_STR);
            $query->bindParam("Title", $Title, PDO::PARAM_STR);
            $query->bindParam("Details", $Details, PDO::PARAM_STR);
            $query->bindParam("Time", $Time, PDO::PARAM_STR);


            $result = $query->execute();

// -------------------------------------------------------------------------


            $Site_Validation_Schedule = $Date_from .' at '. $time ;

            $sql = "UPDATE lumber_application SET Site_Validation_Schedule = :Site_Validation_Schedule 
            WHERE lumber_app_id = $lumber_app_id";
            $stmt = $connection->prepare($sql);
            $stmt->execute(array(
            // -- ':Site_Validation_Schedule' => $stat_uss,
            ':Site_Validation_Schedule' => $Site_Validation_Schedule,));



      header( 'Location: production/application.php' ) ;
      return;
    
    }  
    ?>
  


                                    <form class="" action="" method="post" novalidate>                                        
                                        <span class="section">Client Detail</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Permittee Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="ex. John f. Kennedy" required="required" value="<?php echo $lumber_ap_show_name; ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Business Trade Name<span class="required"  >*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="occupation" data-validate-length-range="10,100" type="text" value="<?php echo $bussiness_name; ?>" readonly /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required" required>*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="date_1" required>
                                                <!-- <input type="date" class="form-control" name="date_1"></div> -->
                                        </div>

                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Time<span class="required">*</span></label>
                                          <div class="col-md-6 col-sm-6">
                                              <input class="form-control" class='time' type="time" name="time" pattern="(?:[01]\d|2[0123]):(?:[012345]\d):(?:[012345]\d)" title="Please enter a valid time (HH:MM:SS)" required>
                                          </div>
                                      </div>



                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9">
                                                <textarea required="required" name='message' rows="4" cols="120" style="max-width:100%;"></textarea></div>
                                        </div>
                 




                                </div>
		    <div class="modal-footer">
			   <!-- <a class="btn btn-success" data-dismiss="modal"> -->

         <button type="submit" class="btn btn-success ms-3" name="submit">Schedule</button>


				<!-- <i class="fas fa-thumbs-o-up"> </i>Accept</a> -->
			  <a class="btn btn-danger"  data-dismiss="modal" href="production/application.php" >


				<i class="fas fa-thumbs-o-down"  href="production/application.php"> </i>Back</a>
                </form>
		    </div>
	    </div>	   
	   									      
   </div>
</div>
</div>
</div>
</div>
</div>