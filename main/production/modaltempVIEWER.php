
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
        $("#openendorsement").modal('show');

  
	$("#myBtn").click(function(){
    $("#openendorsement").modal("hide");
  });
  
  $("#openendorsement").on('hide.bs.modal', function(){
    // alert('The modal is about to be hidden.');
    history.back();
  });


      });
</script>






<div id="myCalendar" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>










			<button name="submit" type="button" class="close" onclick="closeTab()" >&times;</button>
			<!-- <form method="POST"><input type="submit" value="Accept" class="btn btn-success ms-3" name="submit"/> </form> -->


<script>
    function closeTab() {
        window.close(); // Close the current tab
    }
</script>



	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">
			<div class="x_content">
                                    





	<?php	if ( isset($_POST['submit'])) {     header( 'Location: sitevalidated.php' ) ;
    return; } ?>



<?php  
session_start();
require_once "../../processphp/config.php";






	if ( isset($_POST['Accept'])) {    
    


    // header( 'Location: reviewrpschief.php' ) ;
  return; 




} 






?> 











          <?php     

              $l_id = $_GET['lumber_app_id'];

          ?> 






                        


<!-- 
<script>
    window.onload = function() {
        setTimeout(function() {
            document.getElementById("autoClickButton").click();
        }, 5000); // Timer set to 5000 milliseconds (5 seconds)
    };
</script> -->


</head>
<body>

<form method="POST" action="9_Endorsement_view.php?lumber_app_id=<?php echo $l_id ; ?>">
    <div class="Header">
        <button aria-setsize="50" class="btn btn-info" name="Accept" id="autoClickButton">View Endorsement</button>
    </div>
</form>










<?php 

$nshow = $_GET['lumber_app_id'];


// include "../../processphp/config.php";


$documnetnumber = '10' ;


$lumber_app = "SELECT * FROM lumber_app_doc_erow where lumber_app_id = $nshow && Number_of_doc = $documnetnumber";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


// doc_status





?> 





                                </div>
		    <div class="modal-footer">
	
    <form method="POST" action="modaltempVIEWER_POST.php"> 
      <input type="text" class="form-control" required="required" placeholder="lumber_app_id" name="lumber_app_id" id="lumber_app_id" value="<?php echo $l_id;?>" hidden>   
            <input <?php $Approved = 'Approved (FG)'; 
            if (($lumber_ap_row['doc_status']) == ($Approved))  { 

            echo 'type="hidden"' ; 
            }
            else{

            echo 'type="submit"' ; 
            } 
            ?>  class="btn btn-success ms-3" type="submit" value="Approve"  name="Accept"/>
      </form>

		    </div>
	    </div>	   
	   									      
   </div>
</div>
</div>
</div>
</div>
</div>



<?php 

if(isset($_GET['lumber_app_id'])) {
  $lumber_app_id = intval($_GET['lumber_app_id']);
} elseif(isset($_POST['lumber_app_id'])) {
  $lumber_app_id = intval($_POST['lumber_app_id']);
}


echo '
<div class="modal fade" id="openendorsement" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true" >
      <div class="modal-dialog" style="max-width: 80%; height: 50vh;">                                        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">ENDORSEMENT</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <iframe src="9_Endorsement_view.php?lumber_app_id=' . $lumber_app_id . '" style="width: 100%; height: 70vh; border: none;"></iframe>
            </div>
            <div class="modal-footer">
     
';

?>



    <form method="POST" action="modaltempVIEWER_POST.php"> 
          <input type="text" class="form-control" required="required" placeholder="lumber_app_id" name="lumber_app_id" id="lumber_app_id" value="<?php echo $l_id;?>" hidden>   
                <input <?php $Approved = 'Approved (FG)'; 
                if (($lumber_ap_row['doc_status']) == ($Approved))  { 

                echo 'type="hidden"' ; 
                }
                else{

                echo 'type="submit"' ; 
                } 
                ?>  class="btn btn-success ms-3" type="submit" value="Approve"  name="Accept"/>
      </form>


      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
           </div>
    </div>
</div>
</div>