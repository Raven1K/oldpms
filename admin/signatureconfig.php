

<?php


// require_once('configmysqli.php');
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
               $user_role = $lumber_ap_row['user_role_id'] ;


              if  (($user_role) == ('99')){

              }else{

               header('Location: prc_logout.php'); 

              } 





?> 







  













<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OLDPMS Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> -->

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }

  /* Style the modal window, image, and close button */
.modal {
  display: none; /* Initially hidden */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Transparent black background */
}

/* Modal Content */
.modal-content {
  margin: 15% auto; /* Add some margin to the modal content */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Set a width */
  background-color: #fff; /* White background */
  position: relative; /* Needed for close button positioning */
}

/* Close Button */
.close-btn {
  color: #fff;
  position: absolute;
  top: 15px;
  right: 35px;
  font-large: 35px;
  font-weight: bold;
  cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
  color: red;
}

/* Modal Image */
.modal-image {
  display: block;
  width: 100%;
  max-width: 700px; /* Set a maximum width for the image */
  margin-left: auto;
  margin-right: auto;
}

</style>

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
        
        
<?php 

if (isset($_POST['submit'])) {



  // echo $_POST['official_station'];
  // echo '<br>' ;
  // echo $_POST['signature_type'];
  // echo '<br>' ;
  // echo $_POST['signature_order'];
  // echo '<br>' ;

  // echo  $_FILES['signature_file']['name'];
  // echo '<br>' ;
  // echo $_FILES['signature_file']['tmp_name'];
  // echo '<br>' ;
  // echo  $_FILES['signature_file']['name'];
  // echo '<br>' ;
  echo $_FILES['signature_file']['tmp_name'];
  // echo '<br>'; 
  // echo $_FILES['signature_file']['size'];




  $official_station = $_POST['official_station'];
  $signature_type = $_POST['signature_type'];
  $signature_order = $_POST['signature_order'];

	$img_name = $_FILES['signature_file']['name'];
	$img_size = $_FILES['signature_file']['size'];
	$tmp_name = $_FILES['signature_file']['tmp_name'];


		if ($img_size > 1125000) {
      echo "Sorry, your file is too large.";

		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
       
                      
                        $query = $connection->prepare("INSERT INTO signatory_managerdb(
                          official_station,
                          signature_type,
                          signature_order,
                          signature_file

                          )
                      VALUES (
                          :official_station,
                          :signature_type,
                          :signature_order,
                          :signature_file


                      )");
                      
                      $query->bindParam("official_station", $official_station, PDO::PARAM_STR);
                      $query->bindParam("signature_type", $signature_type, PDO::PARAM_STR);
                      $query->bindParam("signature_order", $signature_order, PDO::PARAM_STR);
                      $query->bindParam("signature_file", $new_img_name, PDO::PARAM_STR);
                      $result = $query->execute();



            function function_alert($message) {
              echo "<script type='text/javascript'>alert('Successfully Saved');</script>";
            }function_alert('Successfully Saved');



			}else {

			echo "You can't upload files of this type" ;

			}

    }
  
}





if (isset($_POST['delete'])) {

  $delete = $_POST['idnumber'];


  


  $sql = "DELETE FROM signatory_managerdb WHERE id=$delete" ;


            if ($con->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $con->error;
            }
            
  // $con->close();


}


?>


                  

  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div style="width: 100%;"><br>
          <center><h4 style="text-align: center; font-size: 30px; color: black;">Manage Signatures</h4></center>
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
        
          <button style="width: 100px; background: #4074B6; color: white; font-weight: 500;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
      <form class="table-responsive" method="post">
      <br><br>
          <button style="width: 100px; background: #4074B6; color: white; font-weight: 500;" type="submit" class="btn btn-primary" name="search">Search</button>
          <!-- <input type="text" value="" name="search" placeholder="Enter Field to Search" class="text-info"></input> -->


          <!-- <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Official Station"> -->
          <select name="search" style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
    <option disabled>Select Station</option>
    <option value="SHOW_All" <?php if(isset($_POST['search']) && $_POST['search'] == 'SHOW_All') echo 'selected'; ?>>Show All</option>

    <?php
    $sql = "SELECT * FROM `office` ORDER BY station ASC";
    $province = mysqli_query($con, $sql);

    $station = ""; // Initialize $station variable
    $selectedStation = isset($_POST['search']) ? $_POST['search'] : ''; // Capture the selected value

    while ($row = mysqli_fetch_array($province, MYSQLI_ASSOC)) {
        $selected = ($row["station"] == $selectedStation) ? 'selected' : ''; // Check if this option was selected
        if ($row["station"] != $station) {
            echo '<option value="'.$row["station"].'" '.$selected.'>'.$row["station"].'</option>';
            $station = $row["station"];
        }
    }
    ?>
</select>

      </form>


          <table class="table table-striped table-bordered text-center">
            <thead style="background: #4074B6; color: white;">
              <tr>
                <th>Official Station</th>
                <th>Type</th>
                <th>Order</th>
                <th>Signature</th>
                <th>Update</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php


// Define the default search query
$search = isset($_POST['search']) ? $_POST['search'] : (isset($_SESSION['search']) ? $_SESSION['search'] : 'SHOW_All');

// Store the search query in session
$_SESSION['search'] = $search;

// Construct the SQL query based on the search query
$sql = ($search == 'SHOW_All') ?
    "SELECT * FROM `signatory_managerdb` ORDER BY official_station ASC" :
    "SELECT * FROM `signatory_managerdb` WHERE official_station = '$search' ORDER BY official_station ASC";

// Execute the SQL query
$province = mysqli_query($con, $sql);

// Output the results
while ($row = mysqli_fetch_array($province, MYSQLI_ASSOC)):
?>
<tr style="text-align: left; background-color: #D5E2F3; font-weight: 500;">
  <td><?php echo $row['official_station']; ?></td>
  <td><?php echo $row['signature_type']; ?></td>
  <td><?php echo $row['signature_order']; ?></td>



<td style="text-align: center;">
  <a href="#" id="image-link" data-image-path="uploads/<?php echo $row['signature_file']; ?>" style="color: #0096FF">
    <u>Click to view</u>
  </a>
</td>


<td style="text-align: center;">
  <form action="upload_image.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" id="image" accept="image/*">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="submit" value="Upload" name="submit" class="btn btn-warning">
  </form>
</td>



  <!-- <td style="text-align: center;">
    <form method="post">
      <input hidden type="text" name="idnumber" value="<?php echo $row['id']; ?>"></input>
      <button type="submit" class="btn btn-danger" name="delete" value="Delete">Delete</button>
    </form>
  </td>
</tr> -->

<td style="text-align: center;">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Action
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        <li>
            <a class="dropdown-item bg-success text-white" href="#" data-bs-toggle="modal" data-bs-target="#duplicateborrower<?php echo $row['id']; ?>">Duplicate Row</a>
        </li>

        <li>
            <a class="dropdown-item bg-warning text-white" href="#" data-bs-toggle="modal" data-bs-target="#updateborrower<?php echo $row['id']; ?>">Edit</a>
        </li>
            <li>
                <a class="dropdown-item bg-danger text-white" href="#" data-bs-toggle="modal" data-bs-target="#deleteborrower<?php echo $row['id']; ?>">Delete</a>
            </li>
        </ul>
    </div>
</td>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteborrower<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="delete_sig.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                    <input type="hidden" name="idnumber" value="<?php echo $row['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="updateborrower<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="edit_script.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idnumber" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="dateStarted" class="form-label">Date Started</label>
                        <input type="date" class="form-control" id="dateStarted" name="date_started" value="<?php echo $row['date_started']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dateEnded" class="form-label">Date Ended</label>
                        <input type="date" class="form-control" id="dateEnded" name="date_ended" value="<?php echo $row['date_ended']; ?>" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit" class="btn btn-warning">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Duplicate Modal -->
<div class="modal fade" id="duplicateborrower<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="duplicateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="duplicate_script.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="duplicateModalLabel">Confirm Duplicate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to duplicate this record?</p>
                    <input type="hidden" name="idnumber" value="<?php echo $row['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="duplicate" class="btn btn-success">Duplicate</button>
                </div>
            </form>
        </div>
    </div>
</div>








<?php endwhile; ?>


<div id="image-modal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <img class="modal-image" alt="Signature">
  </div>
</div>

            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
// Get the modal and close button elements
const imageModal = document.getElementById('image-modal');
const closeBtn = document.querySelector('.close-btn');
const modalImage = document.querySelector('.modal-image');

// Function to update and show the modal for a clicked image link
const showImageModal = function(imagePath) {
  modalImage.src = imagePath;
  imageModal.style.display = 'block';
};

// Add click event listeners to all image links dynamically
document.querySelectorAll('a[data-image-path]').forEach(function(link) {
  link.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior

    // Get the image path from the data-image-path attribute
    const imagePath = this.dataset.imagePath; // Use "this" to refer to the clicked link

    showImageModal(imagePath); // Call the function with the correct image path
  });
});

// Add a click event listener to the close button
closeBtn.addEventListener('click', function() {
  imageModal.style.display = 'none';
});

// Add a click event listener (outside the modal) to close it on click
window.addEventListener('click', function(event) {
  if (event.target === imageModal) {
    imageModal.style.display = 'none';
  }
});


</script>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Signature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div style="padding: 10px;">

      <!-- post --------------------------------------------------------------------------------------------------------  -->
       <form method="post" enctype="multipart/form-data" class="row g-4">
    
            <div class="col-auto">
                <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Official Station">
                <select  name="official_station" style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
                  <option selected disabled>Select Station</option>
      <?php 

     $sql = "SELECT * FROM `office` ORDER BY station ASC";
     // user_client ORDER BY lastname ASC"; 
     $province = mysqli_query($con,$sql);

     ?>

    <?php   while ($row = mysqli_fetch_array($province,MYSQLI_ASSOC)):;
      
            if(($row["station"])==($station)) { 

            }else{

              echo '<option value="'.$row["station"].'">'.$row["station"].'</option>';
              $station = $row["station"] ;
            }

    endwhile;

    ?>



     </select>
            </div>
   

            <div class="col-auto">
                <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Signature Type">
                <select name="signature_type" style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
                  <option selected disabled>Select Signature Type</option>
                  <option style="font-weight: 600" value="Certification" >Certification</option>
                  <option style="font-weight: 600" value="Endorsement" >Endorsement</option>
                  <option style="font-weight: 600" value="Permit" >Permit</option>
                </select>
                </div>
          

  
            <div class="col-auto">
                <input readonly style="font-size: 15px; font-weight: 500;" type="text" class="form-control-plaintext" id="staticEmail2" value="Signature Order">
                <select name="signature_order" style="border-radius: 5px; border: 1px solid black; width: 210px; height: 30px; margin-top: 5px;">
                  <option selected disabled>Select Signature Order</option>
                  <option style="font-weight: 600" value="1" >Order 1</option>
                  <option style="font-weight: 600" value="2" >Order 2</option>
                  <option style="font-weight: 600" value="3" >Order 3</option>
                </select>
            </div>


   
          <div class="col-auto">
            <input readonly style="font-size: 20px;" type="text" class="form-control-plaintext" id="staticEmail2" value="Upload Signature">
            <input hidden onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" type="file" id="realfileinput" accept="Application/pdf" name="signature_file" value="upload"/>
             <button type="button" id="realfileBtn" class="btn btn-primary btn-sm" style="width: 100px; height:30px; font-size: 11px;" name="signature_file">Browse Image..</button>
          </div>
          <!-- <input type="file" 
                  name="signature_file"> -->

          <span class="form-control" style="width: 475px; height: 200px; margin-bottom: 5px;">
             <p id="realfileTxt" style="vertical-align: middle; text-align: center; font-size: 12px; color: #808080; margin-top: 20px;">
               <img id="blah" alt="No image available" src="images/noimg.jpg" >
             </p>
          </span> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </form>


      <!-- post --------------------------------------------------------------------------------------------------------  -->


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
  <script type="text/javascript">
  const realFileBtn = document.getElementById("realfileinput");
  const customBtn = document.getElementById("realfileBtn");
  const customTxt = document.getElementById("realfileTxt");

    customBtn.addEventListener("click", function() {
        realFileBtn.click();
  });

     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        } 
 
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })

    

  </script>

  </body>

</html>








<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Y</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>

      </div>
    </div>
  </div>
</div>