
<?php
// $lumber_app_id = $_GET['lumber_app_id'];

// require_once('configmysqli.php');
session_start();
include('../processphp/config.php');
// block if no log in 
          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

              // header("location: ../admin/login.php");
              // exit;
            }
            else{

         
            }

     




              // $userid = $_SESSION["user_id"] ;

              // $lumber_app = "SELECT * FROM denr_users where user_id = $userid";
              // $lumber_app_qry = mysqli_query($con, $lumber_app);
              // $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);


              // $clientname = $lumber_ap_row['name'] ;
              
              // $user_role = $lumber_ap_row['user_role_id'] ;

              // // echo $clientname ;
              // echo $user_role ;





              // $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
              // $lumber_app_qry = mysqli_query($con, $lumber_app);
              // $lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);

              // $l_dealername =  $lumber_ap_row["bussiness_name"];
              // $l_dealertype =  $lumber_ap_row["Permit_Type"];

              $longitude = "";
              $latitude = "";

              
  $latDegrees = "" ;
  $latMinutes = "" ;
  $latSeconds = "" ;

  $lonDegrees = "" ;
  $lonMinutes = "" ;
  $lonSeconds = "" ;


?> 

<h3></h3>

<?php

// $stmt = $connection->query("SELECT lumber_app_id, Latitude, Longitude
// FROM geogrphic_coordinates 

// -- where lumber_app_id  = $lumber_app_id

// ");


//            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

//              $locations3 = "['Butuan', ".$row['Latitude'].", ".$row['Longitude']."]," ;

//            }

// $locations = "['Butuan', 9.2000, 125.5630]," ;
// $locations2 = "['Butuan', 9.3000, 125.5630]" ;


// echo "<script>";

// echo "  var locations = [

//   $locations3 

// ] " ; 



//  echo "</script>" ;          
?>



<?php
$stmt = $connection->prepare("SELECT * FROM geogrphic_coordinates");
$stmt->execute();

echo "<script>";

echo "  var locations = ["; 

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo "['', ".$row['Latitude'].", ".$row['Longitude'].", '".$row['imgurl']."','".$row['lumberdealer_name']."','".$row['type_of_permit']."','".$row['address']."','".$row['date_approve']."','".$row['date_expiry']."','".$row['Status']."',],";
}

echo "] "; 

echo "</script>";


?>


<?php 

if(isset($_POST["save"])){



  $lumber_app_id = $_GET['lumber_app_id'];
  $decimalLatitude = $_POST['decimalLatitude'];
  $decimalLongitude = $_POST['decimalLongitude'];



include("Val_file1.php");


  $query = $connection->prepare("INSERT INTO geogrphic_coordinates(

    lumber_app_id,	
    Latitude,
    Longitude,
    imgurl
)
    VALUES (
    :lumber_app_id,	
    :Latitude,
    :Longitude,
    :imgurl
    )");
    

    $uploads = 'uploads/'.$new_img_name ; 
    $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
    $query->bindParam("Latitude", $decimalLatitude, PDO::PARAM_STR);
    $query->bindParam("Longitude", $decimalLongitude, PDO::PARAM_STR);
    $query->bindParam("imgurl", $uploads, PDO::PARAM_STR);
    $result = $query->execute();

    function function_alert($message) {
      
      // Display the alert box 
    //echo "<script type='text/javascript'>alert('Successfully Submitted');location='application.php';</script>";\
    echo "<script type='text/javascript'>alert('Successfully Submitted');</script>";
  }
    
    
  // Function call
  function_alert("Successfully Submitted!");
  
  


}



if(isset($_POST["compute"])){


  $latDegrees = $_POST["latDegrees"];
  $latMinutes = $_POST["latMinutes"];
  $latSeconds = $_POST["latSeconds"];

  $dlatMinutes = $latMinutes / 60 ; 
  $dlatSeconds =   $latSeconds / 3600 ;

  $latitude = $latDegrees + $dlatMinutes + $dlatSeconds ;


  $lonDegrees = $_POST["lonDegrees"];
  $lonMinutes = $_POST["lonMinutes"];
  $lonSeconds = $_POST["lonSeconds"];

  $dlonMinutes = $lonMinutes / 60 ; 
  $dlonSeconds =   $lonSeconds / 3600 ;

  $longitude = $lonDegrees + $dlonMinutes + $dlonSeconds ;




}


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Fontawesome Icons-->
    <link rel="stylesheet" href="../fonts/css/all.css">

    <!-- Cuztomize Styles-->
    <link rel="stylesheet" href="../css/mystyle.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="mapstyle.css" />
    <script type="module" src="mapindex_2.js"></script>



    

    <title>DENR Caraga OLDPMS</title>
  </head>

<body>
  <?php require_once '../navbar.php';?>









<!-- <input type="text" id="butuanLat" placeholder="Enter Latitude for Butuan" onchange="initMap()">
<input type="text" id="butuanLong" placeholder="Enter Longitude for Butuan" onchange="initMap()">
<input type="text" id="caragaLat" placeholder="Enter Latitude for Caraga" onchange="initMap()">
<input type="text" id="caragaLong" placeholder="Enter Longitude for Caraga" onchange="initMap()"> -->



    
    <div class="col ms-5 mt-5 mb-5 bg-dark text-light text-center">
      <h5 class="mt-2">View on Map</h5>
        <!--The div element for the map -->
        <div id="map" class="rounded-3 border border-dark border border-2 mb-2"></div>
    </div>
  </div>
</div>
<br>
<?php require_once '../footer.php';?>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSc2YUdNcRGl4JfkaUm5LDg0VmVg58FN4&callback=initMap"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

