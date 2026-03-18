
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>




<script>
  $(document).ready(function(){
    $("#myModal").modal('show');

      
	$("#myBtn").click(function(){
    $("#myModal").modal("hide");
  });
  
  $("#myModal").on('hide.bs.modal', function(){
    history.back();
  });


  });

</script>

</head>
<body>

<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-fullscreen">
  <div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">ONLINE LUMBER DEALER PERMITTING AND MONITORING SYSTEM</h5>










			<button name="submit" type="button" class="close" data-dismiss="modal" >&times;</button>
			<!-- <form method="POST"><input type="submit" value="Accept" class="btn btn-success ms-3" name="submit"/> </form> -->


	</div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
  	    <div class="col-sm-12">
			<div class="x_content">
                                 





<!-- <a   type="submit" value="OK" class="btn btn-primary btn-lg mt-3 mb-4" href = "javascript:history.back()">OK</a> -->
<!-- <input type="submit" value="OK" class="btn btn-primary btn-lg mt-3 mb-4" name="btn" data-loading-text="Loading..."> -->

<?php 

$nshow = $_GET['upload_id_doc'];


include "../../processphp/config.php";





$lumber_app = "SELECT * FROM lumber_app_doc_erow where upload_id_doc = $nshow";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$lumber_ap_show_applicationform = $lumber_ap_row['name_app_doc'];

// doc_status

$lumber_app_id = $lumber_ap_row['lumber_app_id'];

$n ="../../processphp/clientupload/uploads/" .'/'. $lumber_ap_show_applicationform;



?> 






    



<form class="form-control" method="post">


<input type="hidden" name="name_app_doc" value="<?php $lumber_ap_row['name_app_doc']  ?>">

<input <?php  $Approved = 'Approved'; 

if (($lumber_ap_row['doc_status']) == ($Approved))  { 

echo 'type="hidden"' ; 
}
else{

// echo 'type="show"' ;

} 
?>  class="btn btn-success" type="submit" value="Approve"  name="Approve">




<input type="hidden" name="name_app_doc" value="<?php $lumber_ap_row['name_app_doc'] ?>">
<!-- <input  class="btn btn-danger" type="submit" value="Disapprove" name="Disapprove"> -->



<!-- <a href="index.php" class="btn btn-secondary" type="button">Cancel</a> -->









</div>
    </form>


    <embed id="fileViewer" <?php echo "src='$n'"; ?> frameborder="0" width="100%" height="700px"></embed>
    
    <script>
        // Get the embed element
        const fileViewer = document.getElementById('fileViewer');

        // Set the delay for the single refresh in milliseconds (e.g., 3000ms = 3 seconds)
        const refreshDelay = 100;

        // Auto-refresh once after the delay
        setTimeout(() => {
            // Append a timestamp to prevent caching
            fileViewer.src = '<?php echo $n; ?>' + '?t=' + new Date().getTime();
        }, refreshDelay);
    </script>

<?php

// require_once "../../processphp/config.php";


$date =  date("m/d/Y") ; 
$inddoc = '1';
$inddoc2 = '2';
$docstat = 'Approved';
$docstat2 = 'Disapproved';
// $id_name = '36';
$dtdis = "";

if ( isset($_POST['Approve']) && isset($_POST['name_app_doc']) ) {
  $sql = "UPDATE lumber_app_doc_erow SET date_approved = :date_approved, date_disapprove = :date_disapprove,
  doc_app_ind = :doc_app_ind, doc_status = :doc_status
  WHERE upload_id_doc  = $nshow";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':date_approved' => $date,
':date_disapprove' => $dtdis,
':doc_app_ind' => $inddoc,
':doc_status' => $docstat,));
// $_SESSION['success'] = 'Record updated';

// header( 'Location: review.php' ) ;

  // return;

  header( "Location: reviewrpschief.php?lumber_app_id=$lumber_app_id" ) ;
  echo 'Successfully Approved';
  return; 
}

if ( isset($_POST['Disapprove']) && isset($_POST['Disapprove']) ) 

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

  header( "Location: reviewrpschief.php?lumber_app_id='$lumber_app_id'" ) ;
      
  echo 'Successfully Approved';
  return; 

}

?>

  









<div id="responseMessage"></div>

    <h1>Upload and Update File</h1>
    <form id="uploadForm" enctype="multipart/form-data">
        <label for="fileInput">Choose a file:</label>
        <input type="file" id="fileInput" name="file" required>
        <input type="text" id="file_name" name="file_name" Value="<?php echo $lumber_ap_show_applicationform; ?>" >
        <button type="submit">Upload</button>
    </form>

 

    <script>
        const form = document.getElementById('uploadForm');
        const responseDiv = document.getElementById('responseMessage');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);

            try {
                const response = await fetch('updatefile.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                responseDiv.textContent = result.message;
            } catch (error) {
                responseDiv.textContent = 'An error occurred: ' + error.message;
            }
        });
    </script>


</main>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
  </body>
</html>

   <!-- <div><a  type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal"></button> -->
        <!-- <i class="fa fa-search-plus"> </i> Review</a> -->



