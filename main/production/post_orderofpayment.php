<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
   }
  
require_once "../../processphp/config.php";

// if (isset($_POST['Submit'])) {




$lumber_app_id = $_POST['lumber_app_id'];




         
// $lumber_app = "SELECT * FROM lumber_application where lumber_app_id = $lumber_app_id";
// // && Number_of_doc = $number  
// $lumber_app_qry = mysqli_query($con, $lumber_app);
// $result = mysqli_fetch_assoc($lumber_app_qry);

// echo $result['muncity_code'];

// $mun_code = $result['muncity_code'];


         
// $lumber_app2 = "SELECT * FROM muncity where mun_code = $mun_code";
// // && Number_of_doc = $number  
// $lumber_app_qry2 = mysqli_query($con, $lumber_app2);
// $result2 = mysqli_fetch_assoc($lumber_app_qry2);
// $office_cover = $result2['office_cover'];



	
$Entity_Name = $_POST["Entity_Name"];
$Serial_No = $_POST["Serial_No"];
$Date_Issued = $_POST["Date_Issued"];
$Name_of_Payor = $_POST["Name_of_Payor"];
$Address_Office_of_Payor = $_POST["Address_Office_of_Payor"];
// $Amount_Word = $_POST["Amount_Word"];
$Amount_Decimal = $_POST["number"];
$payment_transaction = $_POST["payment_transaction"];
$purpose = $_POST["purpose"];
$Bill_No = $_POST["Bill_No"];
$Dated  = $_POST["Dated"];
$Bank_no = isset($_POST["Bank_no"]) ? $_POST["Bank_no"] : "";
$Name_of_Bank = isset($_POST["Name_of_Bank"]) ? $_POST["Name_of_Bank"] : "";
$Amount = isset($_POST["Amount"]) ? $_POST["Amount"] : "";
$FundCluster = isset($_POST["Fund_Cluster"]) ? $_POST["Fund_Cluster"] : "";

// $processing_fee = $_POST['processing_fee'];






if (isset($_POST['processing_fee'])) {
	$processing_fee = $_POST['processing_fee'];
}else{
	$processing_fee = '';

}



if (isset($_POST['Application_Fee'])) {
	$Application_Fee = $_POST['Application_Fee'];
}else{
	$Application_Fee = '';

}

if (isset($_POST['Registration_Fee'])) {
	$Registration_Fee = $_POST['Registration_Fee'];
}else{
	$Registration_Fee = '';

}

if (isset($_POST['Oath_Fee'])) {
	$Oath_Fee = $_POST['Oath_Fee'];
}else{
	$Oath_Fee = '';

}


	$cash = $_POST['cash'];




// $Registration_Fee = $_POST['Registration_Fee'];
// $Oath_Fee = $_POST['Oath_Fee'];
// $cash = $_POST['cash'];

	
// $Entity_Name 
// $Serial_No 
// $Date_Issued 
// $Name_of_Payor
// $Address_Office_of_Payor 
// $Amount_Word 
// $Amount_Decimal 
// $payment_transaction 
// $purpose
// $Bill_No
// $Dated  
// $Bank_no 
// $Name_of_Bank
// $Amount
// $Application_Fee 
// $Registration_Fee 
// $Application_Fee 
// $Oath_Fee 
// $cash 







$query = $connection->prepare("INSERT INTO order_of_payment(

		lumber_app_id,
		Entity_Name,
		Serial_No,
		Date_Issued,
		Name_of_Payor,
		Address_Office_of_Payor,
		-- Amount_Word,
		Amount_Decimal,
		payment_transaction,
		purpose,
		Bill_No,
		Dated,
		Bank_no,
		Name_of_Bank,
		Amount,
		Application_Fee,
		Registration_Fee,
		Oath_Fee,
		cash,
		processing_fee,
		FundCluster



)
VALUES (

		:lumber_app_id,
		:Entity_Name,
		:Serial_No,
		:Date_Issued,
		:Name_of_Payor,
		:Address_Office_of_Payor,
		-- :Amount_Word,
		:Amount_Decimal,
		:payment_transaction,
		:purpose,
		:Bill_No,
		:Dated,
		:Bank_no,
		:Name_of_Bank,
		:Amount,
		:Application_Fee,
		:Registration_Fee,
		:Oath_Fee,
		:cash,
		:processing_fee,
		:FundCluster


)");


$query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
$query->bindParam("Entity_Name", $Entity_Name, PDO::PARAM_STR);
$query->bindParam("Serial_No", $Serial_No, PDO::PARAM_STR);
$query->bindParam("Date_Issued", $Date_Issued, PDO::PARAM_STR);
$query->bindParam("Name_of_Payor", $Name_of_Payor, PDO::PARAM_STR);
$query->bindParam("Address_Office_of_Payor", $Address_Office_of_Payor, PDO::PARAM_STR);
// $query->bindParam("Amount_Word", $Amount_Word, PDO::PARAM_STR);
$query->bindParam("Amount_Decimal", $Amount_Decimal, PDO::PARAM_STR);
$query->bindParam("payment_transaction", $payment_transaction, PDO::PARAM_STR);
$query->bindParam("purpose", $purpose, PDO::PARAM_STR);
$query->bindParam("Bill_No", $Bill_No, PDO::PARAM_STR);
$query->bindParam("Dated", $Dated, PDO::PARAM_STR);
$query->bindParam("Bank_no", $Bank_no, PDO::PARAM_STR);
$query->bindParam("Name_of_Bank", $Name_of_Bank, PDO::PARAM_STR);
$query->bindParam("Amount", $Amount, PDO::PARAM_STR);

$query->bindParam("Application_Fee", $Application_Fee, PDO::PARAM_STR);
$query->bindParam("Registration_Fee", $Registration_Fee, PDO::PARAM_STR);
$query->bindParam("Oath_Fee", $Oath_Fee, PDO::PARAM_STR);
$query->bindParam("cash", $cash, PDO::PARAM_STR);
$query->bindParam("processing_fee", $processing_fee, PDO::PARAM_STR);
$query->bindParam("FundCluster", $FundCluster, PDO::PARAM_STR);


$result = $query->execute();

// $stat_uss = 'For On Site Validation';
// $Flow_stats = '6';

// $sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
// WHERE lumber_app_id = $lumber_app_id";
// $stmt = $connection->prepare($sql);
// $stmt->execute(array(
// ':Status' => $stat_uss,
// ':Flow_stat' => $Flow_stats,));


// $stat_uss = 'Waiting for Payment Confirmation';







$Title = "Credit Officer"; // Replace with your actual value
$Details = "The credit officer will check and verify the order of payment prepared by FUU and Forward to CENRO for Approval."; // Replace with your actual value

// SQL query to insert data into the table with automatic date and time
$sql = "INSERT INTO client_client_document_history (lumber_app_id, Date, Title, Details, Time)
        VALUES ('$lumber_app_id', CURRENT_DATE, '$Title', '$Details', CURRENT_TIME)";

// Execute the SQL query
if (mysqli_query($con, $sql)) {

} else {

}





$stat_uss = "For the bill collectors' review";
$Flow_stats = '2';

$sql = "UPDATE lumber_application SET Status = :Status, Flow_stat = :Flow_stat
WHERE lumber_app_id = $lumber_app_id";
$stmt = $connection->prepare($sql);
$stmt->execute(array(
':Status' => $stat_uss,
':Flow_stat' => $Flow_stats,));









// // insert payment 



  
// 		$Account_Number = 'N/A' ;
// 		$Account_Name = $Name_of_Payor ;
// 		$Reference_Number = 'N/A';
// 		$Total_Amount  = 'N/A';
// 		$Flow_stat = 'N/A';
// 		$Name_of_Permitte = $Name_of_Payor ;
// 		$Payment_Status = 'NOT PAID';
// 		$Date_payment = date('m/d/y') ;
 




//        $query = $connection->prepare("INSERT INTO payment_feny(
//        lumber_app_id,       
//        Account_Number,
//        Account_Name,
//        Reference_Number,
//        Total_Amount,
//        Flow_stat,
//        Name_of_Permitte,
//        Payment_Status,
//        Date_payment

//        )
//        VALUES (
//        :lumber_app_id,      
//        :Account_Number,
//        :Account_Name,
//        :Reference_Number,
//        :Total_Amount,
//        :Flow_stat,
//        :Name_of_Permitte,
//        :Payment_Status,
//        :Date_payment
 

//        )");
       
//        $query->bindParam("lumber_app_id", $lumber_app_id, PDO::PARAM_STR);
// 	   $query->bindParam("Account_Number", $Account_Number, PDO::PARAM_STR);
// 	   $query->bindParam("Account_Name", $lumber_app_name, PDO::PARAM_STR);
// 	   $query->bindParam("Reference_Number", $Reference_Number, PDO::PARAM_STR);
// 	   $query->bindParam("Total_Amount", $Total_Amount, PDO::PARAM_STR);
// 	   $query->bindParam("Flow_stat", $Flow_stat, PDO::PARAM_STR);
// 	   $query->bindParam("Name_of_Permitte", $Name_of_Permitte, PDO::PARAM_STR);
// 	   $query->bindParam("Payment_Status", $Payment_Status, PDO::PARAM_STR);
// 	   $query->bindParam("Date_payment", $Date_payment, PDO::PARAM_STR);

       
//        $result = $query->execute();



// //        // insert payment 










function function_alert($message) {
      
    // Display the alert box 
	echo "<script type='text/javascript'>alert('Successfully Generated Forwarded to Credit Officer');location='application.php';</script>";
}
  
  
// Function call
function_alert("Successfully Submitted!");


// header( "Location: orderofpayment.php?lumber_app_id=$lumber_app_id" ) ;

?>