

<!DOCTYPE html>
<html>
<body>



<h1>Show File-select Fields</h1>

<h3>Application form or duly accompished & sworn/notarized. *Required</h3>


<form action="Val_file1.php"
           method="post"
           enctype="multipart/form-data">

<h3>Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer *Required</h3>

           <input type="file" 
                  name="my_image1">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>


</body>
</html>


<?php


session_start();

include "../../processphp/config.php";

if ( isset($_POST['Submit'])) {    


$lumber_app_id = $_GET['lumber_app_id']; 


$Annual_Gross_Volume = $_POST['Annual_Gross_Volume']; 
$No_of_Employee_Male = $_POST['No_of_Employee_Male']; 
$No_of_Employee_Female = $_POST['No_of_Employee_Female']; 
$Kind_of_Equipment_used = $_POST['Kind_of_Equipment_used']; 
$State_Condition = $_POST['State_Condition']; 
$Previous_Cert_Reg_No = $_POST['Previous_Cert_Reg_No']; 
$Date_Issued = $_POST['Date_Issued']; 
$Application_Fee = $_POST['Application_Fee']; 
$Coordinates_Latitude = $_POST['Coordinates_Latitude']; 
$Coordinates_Longitude = $_POST['Coordinates_Longitude']; 


$Total_Value = $_POST['Total_Value']; 
$Total = $_POST['Total']; 
$Made = $_POST['Made']; 
$Size = $_POST['Size']; 
$Years_Operated = $_POST['Years_Operated']; 
$Date_Expired = $_POST['Date_Expired']; 
$Registration_Fee = $_POST['Registration_Fee']; 
$Oath_Fee = $_POST['Oath_Fee']; 
$Value = $_POST['Value']; 
$Cash_Bond = $_POST['Cash_Bond']; 

include 'Val_file1.php';
include 'Val_file2.php';

$query = $connection->prepare("INSERT INTO validation_form(
lumber_app_id,       
Annual_Gross_Volume,
No_of_Employee_Male,
No_of_Employee_Female,
Kind_of_Equipment_used,
State_Condition,
Previous_Cert_Reg_No,
Date_Issued,
Application_Fee,
Coordinates_Latitude,
Coordinates_Longitude,
Lumber_Dealer_Photo_File,
Upload_Verification_Report_File,
Total_Value,
Total,
Made,
Size,
Years_Operated,
Date_Expired,
Registration_Fee,
Oath_Fee,
Value,
Cash_Bond)

VALUES (
:lumber_app_id,       
:Annual_Gross_Volume,
:No_of_Employee_Male,
:No_of_Employee_Female,
:Kind_of_Equipment_used,
:State_Condition,
:Previous_Cert_Reg_No,
:Date_Issued,
:Application_Fee,
:Coordinates_Latitude,
:Coordinates_Longitude,
:Lumber_Dealer_Photo_File,
:Upload_Verification_Report_File,
:Total_Value,
:Total,
:Made,
:Size,
:Years_Operated,
:Date_Expired,
:Registration_Fee,
:Oath_Fee,
:Value,
:Cash_Bond
)");

$query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query->bindParam("Annual_Gross_Volume", $Annual_Gross_Volume, PDO::PARAM_STR);
$query->bindParam("No_of_Employee_Male", $No_of_Employee_Male, PDO::PARAM_STR);
$query->bindParam("No_of_Employee_Female", $No_of_Employee_Female, PDO::PARAM_STR);
$query->bindParam("Kind_of_Equipment_used", $Kind_of_Equipment_used, PDO::PARAM_STR);
$query->bindParam("State_Condition", $State_Condition, PDO::PARAM_STR);
$query->bindParam("Previous_Cert_Reg_No", $Previous_Cert_Reg_No, PDO::PARAM_STR);
$query->bindParam("Date_Issued", $Date_Issued, PDO::PARAM_STR);
$query->bindParam("Application_Fee", $Application_Fee, PDO::PARAM_STR);
$query->bindParam("Coordinates_Latitude", $Coordinates_Latitude, PDO::PARAM_STR);
$query->bindParam("Coordinates_Longitude", $Coordinates_Longitude, PDO::PARAM_STR);
$query->bindParam("Lumber_Dealer_Photo_File", $new_img_name, PDO::PARAM_STR);
$query->bindParam("Upload_Verification_Report_File", $new_img_name2, PDO::PARAM_STR);
$query->bindParam("Total_Value", $Total_Value, PDO::PARAM_STR);
$query->bindParam("Total", $Total, PDO::PARAM_STR);
$query->bindParam("Made", $Made, PDO::PARAM_STR);
$query->bindParam("Size", $Size, PDO::PARAM_STR);
$query->bindParam("Years_Operated", $Years_Operated, PDO::PARAM_STR);
$query->bindParam("Date_Expired", $Date_Expired, PDO::PARAM_STR);
$query->bindParam("Registration_Fee", $Registration_Fee, PDO::PARAM_STR);
$query->bindParam("Oath_Fee", $Oath_Fee, PDO::PARAM_STR);
$query->bindParam("Value", $Value, PDO::PARAM_STR);
$query->bindParam("Cash_Bond", $Cash_Bond, PDO::PARAM_STR);

$result = $query->execute();












       

}

 ?> 