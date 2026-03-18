<?php
// Initialize the session
$lumber_app_id = $_GET["lumber_app_id"];
require_once "../processphp/config.php";
session_start();


?>

<?php

$lumber_app = "SELECT * FROM endorsement_form_for_release where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$date_release = $lumber_ap_row['date'];

// echo $date_release ;


?>

<?php

$lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
$lumber_app_qry = mysqli_query($con, $lumber_app);
$lumber_ap_row = mysqli_fetch_assoc($lumber_app_qry);
$date_applied = $lumber_ap_row['date_applied'];
$clientname = $lumber_ap_row['perm_fname'] .' '. $lumber_ap_row['perm_lname'] ;
$control_number = 'R1300-'.' '.$lumber_ap_row['lumber_app_id'];



// echo $clientname; 
// echo $date_applied ;
// exit();
?>


<?php




if(isset($_POST['submit'])) {
  // code to execute if the submit button has been clicked

  $lumber_app_id = $_GET["lumber_app_id"];

                                    // $css_option1 = $_POST['responsiveness1'];
                                    // $css_option2 = $_POST['responsiveness12'];
                                    // $css_option3 = $_POST['responsiveness13'];
                                    // $css_option4 = $_POST['responsiveness14'];
                                    // $css_option5 = $_POST['responsiveness15'];
                                    // $css_option6 = $_POST['responsiveness16'];

                                  if(isset($_POST['responsiveness1']) && $_POST['responsiveness1'] != null) {
                                    $css_option1 = $_POST['responsiveness1'];
                                      // Run your code
                                  } else {
                                      // Do nothing - no error
                                      $css_option1 = "" ;
                                  }
                                 
                                  if(isset($_POST['responsiveness12']) && $_POST['responsiveness12'] != null) {
                                    $css_option2 = $_POST['responsiveness12'];
                                      // Run your code
                                  } else {
                                      // Do nothing - no error
                                      $css_option2 = "";
                                  }
                                 
                                  if(isset($_POST['responsiveness13']) && $_POST['responsiveness13'] != null) {
                                    $css_option3 = $_POST['responsiveness13'];
                                      // Run your code
                                  } else {
                                      // Do nothing - no error
                                      $css_option3 = "" ;
                                  }
                                 
                                  if(isset($_POST['responsiveness14']) && $_POST['responsiveness14'] != null) {
                                    $css_option4 = $_POST['responsiveness14'];
                                      // Run your code
                                  } else {
                                      // Do nothing - no error
                                      $css_option4 = "";
                                  }
                                 
                                  if(isset($_POST['responsiveness15']) && $_POST['responsiveness15'] != null) {
                                    $css_option5 = $_POST['responsiveness15'];
                                      // Run your code
                                  } else {
                                      // Do nothing - no error
                                      $css_option5 = "";
                                 
                                  }
                                 
                                  if(isset($_POST['responsiveness16']) && $_POST['responsiveness16'] != null) {
                                    $css_option6 = $_POST['responsiveness16'];
                                      // Run your code
                                  } else {
                                      // Do nothing - no error
                                      $css_option6 = "";
                                  }




                               echo $css_textbox1 = $_POST['comments1'];
                               echo $css_textbox2 = $_POST['comments2'];
                               echo $css_textbox3 = $_POST['comments3'];
                               echo $css_textbox4 = $_POST['comments4'];
                               echo $age = $_POST['age'];
                               echo $sex = $_POST['sex'];
                               echo $date_of_application = $_POST['date_application'];
                               echo $date_release = $_POST['date_release'];
                               echo $agreed = $_POST['agree'];
                               echo $type_of_application = $_POST['type_of_application']; 
                               echo $name_and_signature = $_POST['name_and_signature'];       
                               echo $name = $_POST['name'];                            



                                    // $css_option1 = $_POST['responsiveness1'];
                                    // $css_option2 = $_POST['responsiveness12'];
                                    // $css_option3 = $_POST['responsiveness13'];
                                    // $css_option4 = $_POST['responsiveness14'];
                                    // $css_option5 = $_POST['responsiveness15'];
                                    // $css_option6 = $_POST['responsiveness16'];

                            $query = $connection->prepare("INSERT INTO dummy_css(

                                lumber_app_id,
                                css_option1,
                                css_option2,
                                css_option3,
                                css_option4,
                                css_option5,
                                css_option6,
                                css_textbox1,
                                css_textbox2,
                                css_textbox3,
                                css_textbox4,
                                date_of_application,
                                name,
                                age,
                                sex,
                                Agreed,
                                date_release,
                                type_of_application

                            
                            )
                            VALUES (
                                :lumber_app_id,
                                :css_option1,
                                :css_option2,
                                :css_option3,
                                :css_option4,
                                :css_option5,
                                :css_option6,
                                :css_textbox1,
                                :css_textbox2,
                                :css_textbox3,
                                :css_textbox4,
                                :date_of_application,
                                :name,
                                :age,
                                :sex,
                                :Agreed,
                                :date_release,
                                :type_of_application
      
                            
                            )");
                            
                            $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
                            $query->bindParam("css_option1", $css_option1, PDO::PARAM_STR);
                            $query->bindParam("css_option2", $css_option2, PDO::PARAM_STR);
                            $query->bindParam("css_option3", $css_option3, PDO::PARAM_STR);
                            $query->bindParam("css_option4", $css_option4, PDO::PARAM_STR);
                            $query->bindParam("css_option5", $css_option5, PDO::PARAM_STR);
                            $query->bindParam("css_option6", $css_option6, PDO::PARAM_STR);
                            $query->bindParam("css_textbox1", $css_textbox1, PDO::PARAM_STR);
                            $query->bindParam("css_textbox2", $css_textbox2, PDO::PARAM_STR);
                            $query->bindParam("css_textbox3", $css_textbox3, PDO::PARAM_STR);
                            $query->bindParam("css_textbox4", $css_textbox4, PDO::PARAM_STR);
                            $query->bindParam("date_of_application", $date_of_application, PDO::PARAM_STR);
                            $query->bindParam("name", $name, PDO::PARAM_STR);
                            $query->bindParam("age", $age, PDO::PARAM_STR);
                            $query->bindParam("sex", $sex, PDO::PARAM_STR);
                            $query->bindParam("Agreed", $agreed, PDO::PARAM_STR);
                            $query->bindParam("date_release", $date_release, PDO::PARAM_STR);
                            $query->bindParam("type_of_application", $type_of_application, PDO::PARAM_STR);
                            $result = $query->execute();
                            



                            

$sql = "UPDATE lumber_application SET Rating = :Rating
WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(

':Rating' => 'Rated',));







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



   $Title = 'Client  ';
   $Details = 'Accomplished Client Satisfaction Survey (CSS)'.'<br><br>'.'
   Acknowledged'.'<br><br>'.'
   Downloaded and Printed E-Permit';
   

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



// header("Location: docstatus_released.php?lumber_app_id=");

// header( "Location: docstatus_released.php?lumber_app_id=$lumber_app_id" ) ;

function function_alert($message) {
  $lumber_app_id = $_GET["lumber_app_id"];        
  // Display the alert box 
  // echo "<script type='text/javascript'>alert('Successfully Rated'); window.location.href=docstatus_released.php?lumber_app_id="$lumber_app_id";</script>";
  echo "<script type='text/javascript'>alert('Successfully Rated'); window.location.href='docstatus_released.php?lumber_app_id=".$lumber_app_id."';</script>";
}


// Function call
function_alert("Successfully Acknowleged!");


}



?>


<!doctype html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="-1" />
            
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>OLDPMS</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../fonts/css/all.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  
  
<body style="background: #ecedf0;">
  <div id="wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 5px;"> 
              <div class="container-fluid">
                <a href="#"><img src="../images/oldpmslogo.png" alt="oldpms" height="40"></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <a class="navbar-brand" href="#"><strong>ONLINE LUMBER DEALER PERMITTING & MONITORING SYSTEM</strong></a>
                </div>
              </div>
            </nav>

        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
          <a class="navbar-brand" style="font-family:Trebuchet MS; color:#312f31; font-size:20px; color: #fff; font-weight: bold;" ><i class="fa-solid fa-circle-user"></i> <?php  echo  "<b>{$clientname}</b> </a>"; ?> </div></div>
       <li><a href="dashboard_requirement.php">Requirements</a></li>
       <li><a href="dashboard_doclist.php">Document Status</a></li>
       <li><a href="doctracker.php" style="font-size: 15px;">Track your Application</a></li>
       <li><a href="#logout" name="Log-out">Logout</a></li><br><br>
   
<div id='bodybox'>
  <h5 style="color: white; font-weight: 600; font-size: 15px; padding: 5px; text-align: center;"> OLDPMS Support</h5>
  <div id='chatborder'>
    <p id="chatlog7" class="chatlog">&nbsp;</p>
    <p id="chatlog6" class="chatlog">&nbsp;</p>
    <p id="chatlog5" class="chatlog">&nbsp;</p>
    <p id="chatlog4" class="chatlog">&nbsp;</p>
    <p id="chatlog3" class="chatlog">&nbsp;</p>
    <p id="chatlog2" class="chatlog">&nbsp;</p>
    <p id="chatlog1" class="chatlog">&nbsp;</p>

    <div class="scrollmenu" style="overflow: auto;
  white-space: nowrap; background: #ecedf0; padding: 5px;">
  <a type="button" onclick="myFunction()" id="suggest1" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">What is your name?</a>
  <a type="button" onclick="myFunction2()" id="suggest2" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">Can you help me?</a>
  <a type="button" onclick="myFunction3()" id="suggest3" style="display: inline-block; text-decoration: none; color: #0078d4; background: #fff; padding: 5px; border-radius: 15px; font-weight: 600; font-size: 12px;">How to file application?</a>
</div>
    <input type="text" name="chat" id="chatbox" placeholder="Hi there! Type here to talk to me." onfocus="placeHolder()">
  </div>
 
</div>

</nav>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                      <!-- START -->

                      <!-- CONTENT -->
                              <!-- END -->
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    




    <form method="POST">
    <div class="bodytime">
        <div id="Page1">
    <a>
      <div style="height: auto; width: 750px; margin: 20px; padding: 10px;">
            <div style="background: white; width: 100%; height: 100%; padding: 10px;">
              <div>
                <!-- <label style="background-image: url('img/emoticon.png'); height: 285px; width: 700px;">&nbsp;</label> -->
                <img src="img/clientcss.png" alt="image description">
                <img src="img/emoticon.png" alt="image description">
              </div>
                <table class="table">

                  <tbody>
                  
                     <tr>
                      <th style=" text-justify: inter-word; padding: 10px; margin-left: 150px;" scope="row"><span style="font-weight: 500; font-size: 11px;">Fast and smooth transaction</span><br><span style="color: #008135; font-weight: 500; font-size: 11px;">(Paspas ug hapsay nga transaksyon)
                          &nbsp;</span>
                      </th>
            
                      <td style="text-align: center; vertical-align: middle;">
                        <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness1" value="value1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness1" value="value2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness1" value="value3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness1" value="value4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness1" value="value5"  id="flexRadioDefault5">
                      </td>
                    </tr>

                     <tr>
                       <th style="text-justify: inter-word; padding: 10px; margin-left: 150px;" scope="row"><span style="font-weight: 500; font-size: 11px;">Friendly Customer Service</span><br><span style="color: #008135; font-weight: 500; font-size: 11px;">(Mahigalaon nga serbisyo sa kustomer)

                          &nbsp;</span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness12" value="value1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness12" value="value2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness12" value="value3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness12" value="value4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness12" value="value5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                       <th style="text-justify: inter-word; padding: 10px; margin-left: 150px;" scope="row"><span style="font-weight: 500; font-size: 11px;">Quick turn around time</span><br><span style="color: #008135; font-weight: 500; font-size: 11px;">(Dali nga pagbalik sa transaksyon)
                          &nbsp;</span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness13" value="value1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness13" value="value2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness13" value="value3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness13" value="value4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness13" value="value5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                      <tr>
                       <th style="text-justify: inter-word; padding: 10px; margin-left: 150px;" scope="row"><span style="font-weight: 500; font-size: 11px;">User-friendly platform</span><br>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness14" value="value1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness14" value="value2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness14" value="value3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness14" value="value4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness14" value="value5"  id="flexRadioDefault5">
                      </td>
                    </tr>
                     <tr>
                       <th style="text-justify: inter-word; padding: 10px; margin-left: 150px;" scope="row"><span style="font-weight: 500; font-size: 11px;">Transparent and traceable procedure</span><br><span style="color: #008135; font-weight: 500; font-size: 11px;">(Klaro ug masubay nga pamaagi)

                          &nbsp;</span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness15" value="value1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness15" value="value2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness15" value="value3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness15" value="value4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness15" value="value5"  id="flexRadioDefault5">
                      </td>
                    </tr>

                     <tr>
                       <th style="text-justify: inter-word; padding: 10px; margin-left: 150px;" scope="row"><span style="font-weight: 700; font-size: 11px;">OVERALL satisfaction using the OLDPMS</span><br><span style="color: #008135; font-weight: 700; font-size: 11px;">(Kinatibuk-ang katagbawan sa paggamit sa OLDPMS)

                          &nbsp;</span>
                      </th>
                        <td style="text-align: center; vertical-align: middle;">
                        <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness16" value="value1"  id="flexRadioDefault1">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness16" value="value2"  id="flexRadioDefault2">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);" type="radio" name="responsiveness16" value="value3"  id="flexRadioDefault3">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness16" value="value4"  id="flexRadioDefault4">
                      </td>
                       <td style="text-align: center; vertical-align: middle;">
                         <input style="-ms-transform: scale(2.0); /* IE 9 */-webkit-transform: scale(2.0); /* Chrome, Safari, Opera */transform: scale(2.0);"  type="radio" name="responsiveness16" value="value5"  id="flexRadioDefault5">
                      </td>
                    </tr>

                     <tr >
                       <th style="border-bottom-color: #fff;" colspan="6" >
                         <label style="background-image: url('img/sc.jpg'); height: 32px; width: 100%;"></label>
                      </th>                   
                    </tr>

                      <tr>
                       <th scope="row"><p style="line-height: 150%;"><span style="line-height: 150%; font-weight: 500; font-size: 11px;">How long did it take you to obtain your lumber dealer permit? Please specify the number of days, hours, or minutes.</span>
                        <span style="line-height: 150%; color: #008135; font-weight: 500; font-size: 11px;"> (Unsa ka dugay nimo nakuha ang   
                      imong lumber dealer permit? Palihug iasoy ang kadugayon sa adlaw, oras, o minuto.)&nbsp;</span></p>
                      </th>
                       <td colspan="5" >
                         <input type="text-area" name="comments1" id="comments" style="font-family:sans-serif;font-size:13px; width: 290px; height: 100px; border-width: thin; border-color: black; border-radius: 5px;"></textarea>
                        </td>
                    </tr>

                      <tr>
                       <th scope="row"><p style="line-height: 150%;"><span style="line-height: 150%; font-weight: 500; font-size: 11px;">How many times have you interacted with DENR employees, and in what stages and offices?</span>
                        <span style="line-height: 150%; color: #008135; font-weight: 500; font-size: 11px;"> (Base sa imong kasinatian, kapila ka nakig-interaksyon sa mga empleyado sa DENR, ug sa unsang mga yugto ug mga opisina?)&nbsp;</span></p>
                      </th>
                       <td colspan="5" >
                         <textarea name="comments2" id="comments" style="font-family:sans-serif;font-size:13px; width: 290px; height: 100px; border-width: thin; border-color: black; border-radius: 5px;"></textarea>
                      </td>
                    </tr>

                      <tr>
                       <th scope="row"><p style="line-height: 150%;"><span style="line-height: 150%; font-weight: 500; font-size: 11px;">What are the problems you encountered with the app permitting system? </span>
                        <span style="line-height: 150%; color: #008135; font-weight: 500; font-size: 11px;">  (Unsa ang mga problema nga imong nasugatan sa permitting sistem app?)&nbsp;</span></p>
                      </th>
                       <td colspan="5" >
                         <textarea name="comments3" id="comments" style="font-family:sans-serif;font-size:13px; width: 290px; height: 100px; border-width: thin; border-color: black; border-radius: 5px;"></textarea>
                      </td>
                    </tr>

                      <tr>
                       <th scope="row"><p style="line-height: 150%;"><span style="line-height: 150%; font-weight: 500; font-size: 11px;">What are your suggestions to improve the system?</span>
                        <span style="line-height: 150%; color: #008135; font-weight: 500; font-size: 11px;"> (Unsa ang imong mga sugyot aron mapaayo ang system?)&nbsp;</span></p>
                      </th>
                       <td colspan="5" >
                         <textarea name="comments4" id="comments" style="font-family:sans-serif;font-size:13px; width: 290px; height: 100px; border-width: thin; border-color: black; border-radius: 5px;"></textarea>
                      </td>
                    </tr>

                      <tr >
                       <th style="border-bottom-color: #fff;" colspan="6" >
                         <label style="background-image: url('img/cprofile.jpg'); height: 32px; width: 100%;"></label>
                      </th>                   
                    </tr>

                      <tr style="border-bottom-color: white;">
                       <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-weight: 500; font-size: 11px;">Petsa sa Aplikasyon <span style="color: #008135; font-weight: 500; font-size: 11px;">(Date of Application)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 160px;" name="date_application" value="<?php echo $date_applied ; ?>"> </textarea>
                        </div>

                        <td colspan="5" style="text-align: center;" >
                          <label style="font-weight: 500; font-size: 11px;">Type of Client: <span style="color: #008135; font-weight: 500; font-size: 11px;">(Klase sa kliyente)</span></label>
                      </td>
                      </tr>

                       <tr style="border-bottom-color: white;">
                       <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-weight: 500; font-size: 11px;">Petsa sa pagtuman sa Produkto o serbisyo<br><span style="color: #008135; font-weight: 500; font-size: 11px;">(Date of Release of Products/Services)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 160px;" name="date_release" value="<?php echo $date_release ; ?>"> </textarea>
                        </div>



<script>
    function uncheckCheckbox2() {
      var checkbox1 = document.getElementById("myCheckboxId1");
      var checkbox2 = document.getElementById("myCheckboxId2");
      
      if (checkbox1.checked == true) {
        checkbox2.checked = false;
      } else {
        checkbox2.checked = true;
        checkbox1.checked = false;
      }
      
    }
  </script>
                         <td colspan="5" style="text-align: center;"  >
                          <div style="display: inline-flex; align-items: center;">
                          <input style="height: 20px; width: 20px; margin: 20px;" id="myCheckboxId1" type="checkbox" name="type_of_application" value="Individual"  id="Checkbox1" onchange="uncheckCheckbox2();">
                          <label for="myCheckboxId1" style="font-size: 11px; font-weight: 600;">Individual</span>
                          </label>
                        </div>
                      </td>
                      </tr>



                        <tr style="border-bottom-color: white;">
                       <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-weight: 500; font-size: 11px;">Pangalan<br><span style="color: #008135; font-weight: 500; font-size: 11px;">(Name)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input style="height: 30px; width: 285px;" name="name" value="<?php echo $clientname ; ?>"> </textarea>
                        </div>

                         <td colspan="5" style="text-align: center;" >
                           <div style="display: inline-flex; align-items: center;">
                          <input style="height: 20px; width: 20px; margin: 20px;" id="myCheckboxId2" type="checkbox" name="type_of_application" value="Association"  id="Checkbox1" onchange="uncheckCheckbox2();"> 
                          <label for="myCheckboxId1" style="font-size: 11px; font-weight: 600;">Association</span>
                          </label>
                        </div>
                      </td>
                      </tr>





                      <script>
    function uncheckCheckbox2sex() {
      var checkbox1 = document.getElementById("myCheckboxId1male");
      var checkbox2 = document.getElementById("myCheckboxId2female");
      
      if (checkbox1.checked == true) {
        checkbox2.checked = false;
      } else {
        checkbox2.checked = true;
        checkbox1.checked = false;
      }
      
    }
  </script>

                        <tr>
                       <th>
                        <div style="display: inline-flex; align-items: center;">
                          <label style="font-weight: 500; font-size: 11px;">Edad <span style="color: #008135; font-weight: 500; font-size: 11px;">(Age)</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <textarea maxlength="3" style="height: 30px; width: 40px;" name="age"> </textarea>  &nbsp;&nbsp;&nbsp;



                          <label style="font-weight: 500; font-size: 11px;">Kasarian <span style="color: #008135; font-weight: 500; font-size: 11px;">(Sex)</span></label>&nbsp;&nbsp;&nbsp;
                        <div style="display: inline-flex; align-items: center;">

                          <input style="height: 20px; width: 20px; margin: 20px;" id="myCheckboxId1male" type="checkbox" name="sex" value="male"  id="Checkbox1" onchange="uncheckCheckbox2sex();">
                          <label for="myCheckboxId1" style="font-size: 11px; font-weight: 600;">Lalaki</span>
                          </label>
                        </div>
                            
                        <div style="display: inline-flex; align-items: center;">
                          <input style="height: 20px; width: 20px; margin: 20px;" id="myCheckboxId2female" type="checkbox" name="sex" value="female"  id="Checkbox2" onchange="uncheckCheckbox2sex();">
                          <label for="myCheckboxId2"style="font-size: 11px; font-weight: 600;">Babae</span>
                          </label>
                        </div>

                        </div>

                         <td colspan="5" >
                         
                      </td>
                      </tr>

                      <tr >
                       <th style="border-bottom-color: #fff;" colspan="6" >
                         <label style="background-image: url('img/cprofile.jpg'); height: 4px; width: 100%;"></label>
                      </th>                   
                      </tr>

                      <tr>
                       <th scope="row" colspan="6" style="text-align: center; border-bottom-color: white;">
                        <div style="display: inline-flex; align-items: center;">

                          <input style="height: 20px; width: 20px; margin: 20px;" id="myCheckboxId3" type="checkbox" name="agree" value="agree"  id="Checkbox3">

                          <label for="myCheckboxId3"style="font-size: 11px; font-weight: 600;">Gitugotan nako ang DENR sa pagkolekta, pagproseso, pagpadala ug pagtipig sa datos nga gihatag<br>dinhi ubos sa mga lagda ug regulasyon nga gitakda sa Republic Act No. 10713, o nailhan nga Data<br>Privacy Act of 2012.<br>
                          </span><span style="color: #008135; font-weight: 500; font-size: 11px;">(I hereby consent DENR to collect, process, transmit and store the data provided herein subject to the<br> rules and regulations set by Republic Act No. 10713, otherwise known as the Data Privacy Act of 2012.)</span><br><br><span>
                          </span>
                          </label>
                        </div>
                      </th>
                    </tr>

                       <tr>
                       <th scope="row" colspan="6" style="text-align: center;">
                            <textarea style="height: 60px; width: 300px; text-align: center; vertical-align: middle;" name="name_and_signature"> </textarea>
                              <label style="font-weight: 600; font-size: 11px;">Pangalan ug Pirma <span style="color: #008135; font-weight: 600; font-size: 11px;">(Name and Signature)</span></label>
                      </th>
                    </tr>

                  </tbody>
             
                  
              </table>
              <input type="submit" style="background-color: mintgreen;"  name="submit" value="Submit" />
</form>








</div>
</div>
</a>
</div>
    
 
  </body>
</html>